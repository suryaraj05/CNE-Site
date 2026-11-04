<?php
header('Content-Type: application/xml; charset=utf-8');

$urls = [];
foreach (glob(CONTENT_DIR . '/pages/*.php') as $file) {
    $slug = basename($file, '.php');
    if ($slug[0] === '_') {
        continue;
    }
    $page = require $file;
    if (str_contains($page['robots'] ?? '', 'noindex')) {
        continue;
    }
    $urls[$slug === 'home' ? '/' : "/$slug/"] = filemtime($file);
}
foreach (glob(CONTENT_DIR . '/posts/*.php') as $file) {
    $urls['/' . basename($file, '.php') . '/'] = filemtime($file);
}

echo '<?xml version="1.0" encoding="UTF-8"?>', "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', "\n";
foreach ($urls as $path => $mtime) {
    echo '  <url><loc>', e(SITE_URL . $path), '</loc><lastmod>', date('Y-m-d', $mtime), "</lastmod></url>\n";
}
echo '</urlset>', "\n";
