<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/sanitize.php';
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/sitemap.php';
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/helper.php';

function seo_admin_handle(string $path): void
{
    seo_session_boot();
    $path = rtrim($path, '/') ?: '/admin-seo';
    $route = substr($path, strlen('/admin-seo')) ?: '/';
    $route = '/' . ltrim($route, '/');

    try {
        match (true) {
            $route === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST' => seo_route_login_post(),
            $route === '/login' => seo_route_login_get(),
            $route === '/logout' => seo_route_logout(),
            default => seo_route_authed($route),
        };
    } catch (Throwable $e) {
        seo_session_boot();
        http_response_code(500);
        seo_layout_start('Error', '');
        echo '<div class="flash err">' . seo_h($e->getMessage()) . '</div>';
        echo '<p class="muted">Check DATABASE_URL / Neon schema. See README-SEO.md.</p>';
        seo_layout_end();
    }
}

function seo_route_authed(string $route): void
{
    seo_require_login();

    if ($route === '/' || $route === '/index') {
        require __DIR__ . '/pages/index.php';
        return;
    }
    if ($route === '/create') {
        require __DIR__ . '/pages/create.php';
        return;
    }
    if ($route === '/edit') {
        require __DIR__ . '/pages/edit.php';
        return;
    }
    if ($route === '/export') {
        require __DIR__ . '/pages/export.php';
        return;
    }
    if ($route === '/redirects') {
        require __DIR__ . '/pages/redirects.php';
        return;
    }
    if ($route === '/revisions') {
        require __DIR__ . '/pages/revisions.php';
        return;
    }

    http_response_code(404);
    seo_layout_start('Not found', '');
    echo '<p>Unknown SEO dashboard route.</p>';
    seo_layout_end();
}

function seo_route_login_get(): void
{
    if (seo_logged_in()) {
        header('Location: /admin-seo/');
        exit;
    }
    seo_layout_start('Login', '');
    echo '<div class="login-wrap card">';
    echo '<h1>SEO Dashboard</h1><p class="muted">Sign in to manage titles, metas, redirects and schema.</p>';
    seo_flash_render();
    echo '<form method="post" action="/admin-seo/login">';
    echo '<input type="hidden" name="csrf" value="' . seo_h(seo_csrf_token()) . '">';
    echo '<div class="field"><label>Email</label><input type="email" name="email" required autocomplete="username"></div>';
    echo '<div class="field"><label>Password</label><input type="password" name="password" required autocomplete="current-password"></div>';
    echo '<button class="btn" type="submit">Sign in</button></form></div>';
    seo_layout_end();
}

function seo_route_login_post(): void
{
    if (!seo_verify_csrf($_POST['csrf'] ?? null)) {
        seo_flash_err('Invalid CSRF token.');
        header('Location: /admin-seo/login');
        exit;
    }
    if (seo_login((string) ($_POST['email'] ?? ''), (string) ($_POST['password'] ?? ''))) {
        header('Location: /admin-seo/');
        exit;
    }
    seo_flash_err('Invalid email or password.');
    header('Location: /admin-seo/login');
    exit;
}

function seo_route_logout(): void
{
    seo_logout();
    header('Location: /admin-seo/login');
    exit;
}
