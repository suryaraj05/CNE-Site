<?php
declare(strict_types=1);

/**
 * Writes storage/seo-sitemap.xml from published seo_pages.
 * Does NOT replace the site's existing /sitemap.xml unless you opt in.
 */
function seo_regenerate_sitemap(): string
{
    $site = rtrim(defined('SITE_URL') ? SITE_URL : (getenv('CNE_SITE_URL') ?: 'https://cargonortheast.com'), '/');
    $rows = seo_pdo()->query(
        "SELECT slug, updated_at FROM seo_pages WHERE status = 'published' ORDER BY slug"
    )->fetchAll();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($rows as $row) {
        $slug = $row['slug'];
        $loc = $slug === 'home' || $slug === '' ? $site . '/' : $site . '/' . trim($slug, '/') . '/';
        $last = !empty($row['updated_at']) ? date('Y-m-d', strtotime($row['updated_at'])) : date('Y-m-d');
        $xml .= "  <url>\n    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        $xml .= "    <lastmod>$last</lastmod>\n  </url>\n";
    }
    $xml .= '</urlset>' . "\n";

    $dir = dirname(__DIR__, 2) . '/storage';
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    $path = $dir . '/seo-sitemap.xml';
    file_put_contents($path, $xml);
    return $path;
}
