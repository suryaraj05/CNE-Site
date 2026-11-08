<?php
declare(strict_types=1);

$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');

// PHP's built-in dev server: let it serve real files (dist/, assets/, robots.txt).
if (PHP_SAPI === 'cli-server' && $path !== '/' && is_file(__DIR__ . $path)) {
    return false;
}

require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/render.php';

if ($path === '/sitemap.xml') {
    require __DIR__ . '/includes/sitemap.php';
    exit;
}

if (str_starts_with($path, '/api/')) {
    require __DIR__ . '/includes/api.php';
    handle_api(rtrim($path, '/') ?: '/api');
    exit;
}

if (str_starts_with($path, '/admin')) {
    require __DIR__ . '/includes/admin.php';
    handle_admin(rtrim($path, '/') ?: '/admin');
    exit;
}

$redirect = (require __DIR__ . '/includes/redirects.php')($path);
if ($redirect !== null) {
    $query = $_SERVER['QUERY_STRING'] ?? '';
    header('Location: ' . $redirect . ($query !== '' ? "?$query" : ''), true, 301);
    exit;
}

$slug = trim($path, '/');
$page = null;

if ($slug === '') {
    $page = require CONTENT_DIR . '/pages/home.php';
    $slug = 'home';
} elseif (preg_match('~^[a-z0-9-]+$~', $slug)) {
    if (is_file($file = CONTENT_DIR . "/pages/$slug.php")) {
        $page = require $file;
    } elseif (is_file($file = CONTENT_DIR . "/posts/$slug.php")) {
        $page = post_page(require $file, $slug);
    }
}

if ($page === null) {
    http_response_code(404);
    $page = require CONTENT_DIR . '/pages/_404.php';
} else {
    $page['path'] ??= $slug === 'home' ? '/' : "/$slug/";
    if ($slug !== '' && $slug !== '_404') {
        $page = apply_page_overrides($page, $slug);
    }
}

render_page($page);
