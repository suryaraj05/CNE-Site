<?php
/**
 * End-to-end smoke test for Neon + SEO dashboard DB wiring.
 * Usage: php scripts/test-neon-seo.php
 */
declare(strict_types=1);

require __DIR__ . '/../includes/seo/db.php';
require __DIR__ . '/../includes/seo/auth.php';
require __DIR__ . '/../includes/seo/sanitize.php';
require __DIR__ . '/../includes/seo/helper.php';

$fail = 0;
$ok = static function (string $label) {
    echo "OK  $label\n";
};
$bad = static function (string $label, string $err) use (&$fail) {
    echo "FAIL $label: $err\n";
    $fail++;
};

try {
    $pdo = seo_pdo(); // pooled DATABASE_URL
    $one = $pdo->query('SELECT 1 AS n')->fetch();
    $one['n'] == 1 ? $ok('pooled PDO connect + SELECT 1') : $bad('pooled SELECT', 'unexpected');
} catch (Throwable $e) {
    $bad('pooled PDO connect', $e->getMessage());
}

try {
    $direct = seo_pdo(true);
    $direct->query('SELECT 1')->fetch();
    $ok('direct (unpooled) PDO connect');
} catch (Throwable $e) {
    $bad('direct PDO connect', $e->getMessage());
}

try {
    if (!seo_db_ready()) {
        $bad('seo_db_ready', 'tables missing');
    } else {
        $ok('seo_* tables ready');
    }
    $n = (int) seo_pdo()->query('SELECT COUNT(*) FROM seo_users')->fetchColumn();
    $n >= 1 ? $ok("seo_users count=$n") : $bad('seo_users', 'empty');
} catch (Throwable $e) {
    $bad('schema check', $e->getMessage());
}

try {
    // Avoid session_start after CLI output — verify hash directly against DB.
    $stmt = seo_pdo()->prepare('SELECT password_hash FROM seo_users WHERE email = ?');
    $stmt->execute(['seo@cargonortheast.com']);
    $hash = $stmt->fetchColumn();
    if ($hash && password_verify('ChangeMe-SEO-2026', (string) $hash)) {
        $ok('seo_users password_verify');
    } else {
        $bad('seo_users password_verify', 'hash mismatch or missing user');
    }
} catch (Throwable $e) {
    $bad('auth flow', $e->getMessage());
}

try {
    // Insert a draft page, ensure conflict-safe, then delete
    $slug = 'neon-smoke-' . bin2hex(random_bytes(3));
    $stmt = seo_pdo()->prepare(
        "INSERT INTO seo_pages (slug, category, status, seo_title, meta_description, h1)
         VALUES (?, 'general', 'draft', 'Neon Smoke Title', 'Neon smoke meta description for wiring test.', 'Smoke H1')
         RETURNING id"
    );
    $stmt->execute([$slug]);
    $id = (int) $stmt->fetchColumn();
    $ok("insert seo_pages id=$id");

    $meta = render_seo_meta($slug);
    $meta === '' ? $ok('render_seo_meta ignores drafts') : $bad('render_seo_meta draft', 'expected empty');

    seo_pdo()->prepare("UPDATE seo_pages SET status = 'published' WHERE id = ?")->execute([$id]);
    $meta = render_seo_meta($slug);
    str_contains($meta, 'Neon Smoke Title') ? $ok('render_seo_meta published title') : $bad('render_seo_meta published', $meta);

    seo_pdo()->prepare(
        'INSERT INTO seo_redirects (old_url, new_url, status_code) VALUES (?, ?, 301)
         ON CONFLICT (old_url) DO UPDATE SET new_url = EXCLUDED.new_url'
    )->execute(["/$slug-old/", "/$slug/"]);
    $ok('insert seo_redirects');

    seo_pdo()->prepare('DELETE FROM seo_redirects WHERE old_url = ?')->execute(["/$slug-old/"]);
    seo_pdo()->prepare('DELETE FROM seo_pages WHERE id = ?')->execute([$id]);
    $ok('cleanup smoke rows');
} catch (Throwable $e) {
    $bad('crud smoke', $e->getMessage());
}

echo $fail === 0 ? "\nALL PASSED\n" : "\nFAILED ($fail)\n";
exit($fail === 0 ? 0 : 1);
