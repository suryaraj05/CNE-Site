<?php
declare(strict_types=1);

/**
 * Opt-in front-end helpers. Existing pages are unchanged until you call these.
 *
 * Example (optional, one page at a time):
 *   require_once __DIR__ . '/../seo/helper.php';
 *   apply_seo_redirects(); // early in front controller
 *   // in <head>:
 *   echo render_seo_meta($slug);
 */

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/sanitize.php';

function seo_find_page(string $slug): ?array
{
    if (!seo_db_ready()) {
        return null;
    }
    $slug = seo_normalize_slug($slug);
    $stmt = seo_pdo()->prepare(
        "SELECT * FROM seo_pages WHERE slug = ? AND status = 'published' LIMIT 1"
    );
    $stmt->execute([$slug]);
    $row = $stmt->fetch();
    return $row ?: null;
}

/**
 * Output <title>, meta description, robots, canonical, OG tags when a published
 * SEO record exists. Returns empty string when no override — keep existing HTML.
 */
function render_seo_meta(string $slug): string
{
    try {
        $page = seo_find_page($slug);
    } catch (Throwable) {
        return '';
    }
    if (!$page) {
        return '';
    }

    $e = static fn(?string $v): string => htmlspecialchars((string) $v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $title = $page['seo_title'] ?: $page['wordpress_title'] ?: $page['h1'];
    $desc  = $page['meta_description'] ?? '';
    $robots = $page['robots'] ?: 'index,follow';
    $canonical = $page['canonical'] ?: null;
    $ogTitle = $page['og_title'] ?: $title;
    $ogDesc = $page['og_description'] ?: $desc;
    $ogImage = $page['og_image'] ?? '';

    $out = '';
    if ($title) {
        $out .= '<title>' . $e($title) . '</title>' . "\n";
    }
    if ($desc !== '') {
        $out .= '<meta name="description" content="' . $e($desc) . '">' . "\n";
    }
    $out .= '<meta name="robots" content="' . $e($robots) . '">' . "\n";
    if ($canonical) {
        $out .= '<link rel="canonical" href="' . $e($canonical) . '">' . "\n";
    }
    if ($ogTitle) {
        $out .= '<meta property="og:title" content="' . $e($ogTitle) . '">' . "\n";
    }
    if ($ogDesc !== '') {
        $out .= '<meta property="og:description" content="' . $e($ogDesc) . '">' . "\n";
    }
    if ($ogImage !== '') {
        $out .= '<meta property="og:image" content="' . $e($ogImage) . '">' . "\n";
    }
    if (!empty($page['schema_json'])) {
        $schema = is_string($page['schema_json'])
            ? $page['schema_json']
            : json_encode($page['schema_json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if ($schema) {
            $out .= '<script type="application/ld+json">' . $schema . '</script>' . "\n";
        }
    }
    return $out;
}

/**
 * Apply DB redirects when a matching old_url exists. No-op if DB unavailable.
 * Call before the existing file-based redirects if you want DB to win.
 */
function apply_seo_redirects(?string $path = null): void
{
    try {
        if (!seo_db_ready()) {
            return;
        }
    } catch (Throwable) {
        return;
    }

    $path ??= rawurldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
    $path = seo_normalize_path($path);

    $stmt = seo_pdo()->prepare('SELECT id, new_url, status_code FROM seo_redirects WHERE old_url = ? LIMIT 1');
    $stmt->execute([$path]);
    $row = $stmt->fetch();
    if (!$row) {
        return;
    }

    seo_pdo()->prepare('UPDATE seo_redirects SET hits = hits + 1, updated_at = NOW() WHERE id = ?')
        ->execute([(int) $row['id']]);

    $query = $_SERVER['QUERY_STRING'] ?? '';
    $target = $row['new_url'] . ($query !== '' ? '?' . $query : '');
    header('Location: ' . $target, true, (int) $row['status_code']);
    exit;
}

function seo_audit_flags(array $page, array $dupTitles = [], array $dupDescs = []): array
{
    $flags = [];
    $title = trim((string) ($page['seo_title'] ?? ''));
    $desc = trim((string) ($page['meta_description'] ?? ''));
    $h1 = trim((string) ($page['h1'] ?? ''));
    if ($title === '') {
        $flags[] = 'missing_title';
    } elseif (mb_strlen($title) > 60) {
        $flags[] = 'title_long';
    }
    if ($desc === '') {
        $flags[] = 'missing_description';
    } elseif (mb_strlen($desc) > 160) {
        $flags[] = 'description_long';
    }
    if ($h1 === '') {
        $flags[] = 'missing_h1';
    }
    if ($title !== '' && isset($dupTitles[$title]) && $dupTitles[$title] > 1) {
        $flags[] = 'duplicate_title';
    }
    if ($desc !== '' && isset($dupDescs[$desc]) && $dupDescs[$desc] > 1) {
        $flags[] = 'duplicate_description';
    }
    return $flags;
}
