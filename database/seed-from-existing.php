<?php
/**
 * Optional one-time import of existing PHP page title/description into seo_pages.
 * Safe: ON CONFLICT DO NOTHING — never overwrites dashboard rows.
 *
 * Usage (from project root, with DATABASE_URL set):
 *   php database/seed-from-existing.php
 */
declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/includes/config.php';
require $root . '/includes/helpers.php';
require $root . '/includes/seo/db.php';
require $root . '/includes/seo/sanitize.php';

$pdo = seo_pdo();
$dir = $root . '/content/pages';
$inserted = 0;
$skipped = 0;

foreach (glob($dir . '/*.php') as $file) {
    $slug = basename($file, '.php');
    if ($slug === '_404') {
        continue;
    }
    $page = require $file;
    if (!is_array($page)) {
        continue;
    }
    $title = $page['title'] ?? null;
    $desc = $page['description'] ?? null;
    $h1 = null;
    foreach ($page['sections'] ?? [] as $section) {
        if (($section['type'] ?? '') === 'hero' && !empty($section['title'])) {
            $h1 = $section['title'];
            break;
        }
    }
    $category = match (true) {
        $slug === 'home' => 'home',
        str_contains($slug, 'airport') || str_contains($slug, 'heathrow') || str_contains($slug, 'gatwick') => 'airports',
        str_contains($slug, 'port') || str_contains($slug, 'seaport') || str_contains($slug, 'felixstowe') || str_contains($slug, 'hull') || str_contains($slug, 'poole') || str_contains($slug, 'thames') || str_contains($slug, 'grimsby') || str_contains($slug, 'immingham') => 'seaports',
        default => 'general',
    };

    $stmt = $pdo->prepare(
        'INSERT INTO seo_pages (slug, category, status, wordpress_title, seo_title, meta_description, h1, robots)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)
         ON CONFLICT (slug) DO NOTHING'
    );
    $stmt->execute([
        $slug === 'home' ? 'home' : $slug,
        $category,
        'draft',
        $title,
        $title,
        $desc,
        $h1,
        $page['robots'] ?? 'index,follow',
    ]);
    if ($stmt->rowCount() > 0) {
        $inserted++;
        echo "Inserted: $slug\n";
    } else {
        $skipped++;
        echo "Skipped (exists): $slug\n";
    }
}

echo "\nDone. Inserted=$inserted skipped=$skipped\n";
