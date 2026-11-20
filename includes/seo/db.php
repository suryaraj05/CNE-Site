<?php
declare(strict_types=1);

/**
 * Neon PostgreSQL connection for the SEO dashboard only.
 * Does not touch the rest of the site.
 */

function seo_load_dotenv(): void
{
    static $done = false;
    if ($done) {
        return;
    }
    $done = true;
    $root = dirname(__DIR__, 2);
    // Prefer Neon CLI output (.env.local), then .env — never overwrite already-set process env.
    foreach (['.env.local', '.env'] as $name) {
        $file = $root . DIRECTORY_SEPARATOR . $name;
        if (!is_file($file)) {
            continue;
        }
        foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
                continue;
            }
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value, " \t\"'");
            if ($key !== '' && getenv($key) === false) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
}

/**
 * App/runtime: pooled DATABASE_URL.
 * Migrations/admin DDL: prefer DATABASE_URL_UNPOOLED (Neon direct endpoint).
 */
function seo_database_url(bool $unpooled = false): string
{
    seo_load_dotenv();
    if ($unpooled) {
        $url = getenv('DATABASE_URL_UNPOOLED') ?: getenv('DATABASE_URL') ?: '';
    } else {
        $url = getenv('DATABASE_URL') ?: getenv('DATABASE_URL_UNPOOLED') ?: '';
    }
    if ($url === '') {
        throw new RuntimeException('SEO DB not configured. Set DATABASE_URL (Neon .env.local) or DB_* vars.');
    }
    return $url;
}

function seo_pdo(bool $unpooled = false): PDO
{
    static $pool = [];
    $key = $unpooled ? 'direct' : 'pooled';
    if (isset($pool[$key]) && $pool[$key] instanceof PDO) {
        return $pool[$key];
    }

    if (!extension_loaded('pdo_pgsql')) {
        throw new RuntimeException('PHP extension pdo_pgsql is required for the SEO dashboard (Neon Postgres).');
    }

    $dsnUrl = seo_database_url($unpooled);

    // Discrete DB_* fallback when DATABASE_URL is absent (handled above) — parse URL form.
    if (!str_contains($dsnUrl, '://')) {
        // Already a PDO DSN
        $pool[$key] = new PDO($dsnUrl, getenv('DB_USER') ?: null, getenv('DB_PASS') ?: null, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
        return $pool[$key];
    }

    // Neon: postgresql://user:pass@host/db?sslmode=require&channel_binding=require
    $parts = parse_url($dsnUrl);
    if ($parts === false || empty($parts['host'])) {
        throw new RuntimeException('Invalid DATABASE_URL for SEO dashboard.');
    }
    $user = rawurldecode($parts['user'] ?? '');
    $pass = rawurldecode($parts['pass'] ?? '');
    $host = $parts['host'];
    $port = $parts['port'] ?? 5432;
    $db   = ltrim($parts['path'] ?? '', '/');
    $query = [];
    parse_str($parts['query'] ?? '', $query);
    $ssl = $query['sslmode'] ?? (getenv('DB_SSLMODE') ?: 'require');

    // Neon SNI: modern libpq (Fly/Linux) sends the hostname correctly — do NOT also
    // inject options=endpoint=… or Neon returns:
    // "Inconsistent project name inferred from SNI (...-pooler) and project option (...)"
    // Older Windows/XAMPP libpq often lacks SNI; set NEON_FORCE_ENDPOINT=1 locally.
    // https://neon.com/docs/connect/connection-errors#sni
    $endpoint = $query['options'] ?? '';
    if ($endpoint !== '') {
        $endpoint = rawurldecode($endpoint);
        if (!str_starts_with($endpoint, 'endpoint=')) {
            $endpoint = 'endpoint=' . ltrim($endpoint, '=');
        }
    } elseif (
        (getenv('NEON_FORCE_ENDPOINT') === '1' || PHP_OS_FAMILY === 'Windows')
        && preg_match('/^(ep-[a-z0-9-]+?)(?:-pooler)?\./i', $host, $m)
    ) {
        $endpoint = 'endpoint=' . $m[1];
    } else {
        $endpoint = '';
    }

    $pdoDsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=$ssl";
    if ($endpoint !== '') {
        $pdoDsn .= ';options=' . $endpoint;
    }

    $pool[$key] = new PDO($pdoDsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    return $pool[$key];
}

function seo_db_ready(): bool
{
    try {
        seo_pdo()->query('SELECT 1 FROM seo_pages LIMIT 1');
        return true;
    } catch (Throwable) {
        return false;
    }
}
