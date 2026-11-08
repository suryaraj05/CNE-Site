<?php
declare(strict_types=1);

require_once __DIR__ . '/inbox.php';

/** Core pages surfaced first in the admin dashboard. */
const ADMIN_PRIORITY = [
    'home',
    'contact',
    'request-a-quote',
    'services',
    'our-services',
    'our-expertise',
    'locations',
    'faqs',
    'blog',
    'testimonials',
    'customs-clearance-service-uk',
    'customs-clearance-logistics-newcastle-northeast-england',
    'track-your-shipment',
    'shipment-form',
];

function admin_password(): string
{
    return getenv('CNE_ADMIN_PASSWORD') ?: 'cne-admin';
}

function admin_boot(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Lax',
            'use_strict_mode' => true,
        ]);
    }
    $dir = page_override_dir();
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    inbox_ensure();
}

function admin_logged_in(): bool
{
    return !empty($_SESSION['cne_admin']);
}

function admin_require_login(): void
{
    if (!admin_logged_in()) {
        header('Location: /admin/login');
        exit;
    }
}

function admin_csrf_token(): string
{
    if (empty($_SESSION['cne_csrf'])) {
        $_SESSION['cne_csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['cne_csrf'];
}

function admin_verify_csrf(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['cne_csrf'])
        && hash_equals($_SESSION['cne_csrf'], $token);
}

/** @return list<array{slug:string,title:string,path:string,priority:bool,overridden:bool}> */
function admin_list_pages(): array
{
    $pages = [];
    foreach (glob(CONTENT_DIR . '/pages/*.php') as $file) {
        $slug = basename($file, '.php');
        if ($slug === '_404') {
            continue;
        }
        $data = require $file;
        $pages[] = [
            'slug'       => $slug,
            'title'      => (string) ($data['title'] ?? $slug),
            'path'       => $slug === 'home' ? '/' : "/$slug/",
            'priority'   => in_array($slug, ADMIN_PRIORITY, true),
            'overridden' => load_page_override($slug) !== [],
        ];
    }
    usort($pages, function (array $a, array $b): int {
        if ($a['priority'] !== $b['priority']) {
            return $a['priority'] ? -1 : 1;
        }
        $ai = array_search($a['slug'], ADMIN_PRIORITY, true);
        $bi = array_search($b['slug'], ADMIN_PRIORITY, true);
        if ($ai !== false || $bi !== false) {
            return ($ai === false ? 999 : $ai) <=> ($bi === false ? 999 : $bi);
        }
        return strcasecmp($a['title'], $b['title']);
    });
    return $pages;
}

function admin_load_page(string $slug): ?array
{
    if (!preg_match('~^[a-z0-9-]+$~', $slug)) {
        return null;
    }
    $file = CONTENT_DIR . "/pages/$slug.php";
    if (!is_file($file)) {
        return null;
    }
    return require $file;
}

function admin_save_override(string $slug, array $data): void
{
    $clean = array_filter([
        'title'       => trim((string) ($data['title'] ?? '')),
        'description' => trim((string) ($data['description'] ?? '')),
        'hero'        => array_filter([
            'eyebrow' => trim((string) ($data['hero']['eyebrow'] ?? '')),
            'title'   => trim((string) ($data['hero']['title'] ?? '')),
            'lead'    => trim((string) ($data['hero']['lead'] ?? '')),
        ], fn($v) => $v !== ''),
    ], fn($v) => $v !== '' && $v !== []);

    $path = page_override_dir() . "/$slug.json";
    if ($clean === []) {
        if (is_file($path)) {
            unlink($path);
        }
        return;
    }

    file_put_contents(
        $path,
        json_encode($clean, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n",
        LOCK_EX
    );
}

function admin_nav(string $current = ''): array
{
    $counts = inbox_counts();
    return [
        ['href' => '/admin', 'label' => 'Home', 'key' => 'home', 'icon' => 'home'],
        ['href' => '/admin/quotes', 'label' => 'Quote requests', 'key' => 'quotes', 'icon' => 'clipboard', 'badge' => $counts['quotes_new']],
        ['href' => '/admin/enquiries', 'label' => 'Enquiries', 'key' => 'enquiries', 'icon' => 'message', 'badge' => $counts['enquiries_new']],
        ['href' => '/admin/pages', 'label' => 'Pages', 'key' => 'pages', 'icon' => 'file'],
        ['href' => '/admin/trash', 'label' => 'Trash', 'key' => 'trash', 'icon' => 'box', 'badge' => $counts['trash']],
    ];
}

function admin_render(string $view, array $vars = []): void
{
    extract($vars, EXTR_SKIP);
    $logo = asset_img('logo');
    $isLogin = $view === 'login';
    $navKey = $navKey ?? '';
    $nav = $isLogin ? [] : admin_nav($navKey);
    $viewFile = __DIR__ . '/admin/' . $view . '.php';
    require __DIR__ . '/admin/layout.php';
}

function admin_handle_submission_action(?string $redirect = null): ?string
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null;
    }
    if (!admin_verify_csrf($_POST['_csrf'] ?? null)) {
        return 'Invalid session token.';
    }
    $id = (string) ($_POST['id'] ?? '');
    $action = (string) ($_POST['action'] ?? '');
    if ($id === '' || $action === '') {
        return 'Missing action.';
    }

    $message = match ($action) {
        'status' => inbox_update($id, ['status' => (string) ($_POST['status'] ?? 'new')])
            ? 'Status updated.'
            : 'Submission not found.',
        'trash' => inbox_trash($id) ? 'Moved to trash.' : 'Could not trash item.',
        'restore' => inbox_restore($id) ? 'Restored.' : 'Could not restore item.',
        'delete' => inbox_delete($id) ? 'Permanently deleted.' : 'Could not delete item.',
        default => 'Unknown action.',
    };

    if ($redirect !== null && ($action === 'trash' || $action === 'delete')) {
        header('Location: ' . $redirect);
        exit;
    }

    return $message;
}

function handle_admin(string $path): void
{
    admin_boot();

    if ($path === '/admin/login') {
        if (admin_logged_in()) {
            header('Location: /admin');
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pass = (string) ($_POST['password'] ?? '');
            if ($pass !== '' && hash_equals(admin_password(), $pass)) {
                $_SESSION['cne_admin'] = true;
                header('Location: /admin');
                exit;
            }
            $error = 'Incorrect password.';
        }
        admin_render('login', ['error' => $error, 'title' => 'Admin login']);
        return;
    }

    if ($path === '/admin/logout') {
        $_SESSION = [];
        session_destroy();
        header('Location: /admin/login');
        exit;
    }

    admin_require_login();

    if ($path === '/admin') {
        $counts = inbox_counts();
        admin_render('home', [
            'title' => 'Dashboard',
            'navKey' => 'home',
            'counts' => $counts,
            'recentQuotes' => array_slice(inbox_list('quotes'), 0, 6),
            'recentEnquiries' => array_slice(inbox_list('enquiries'), 0, 6),
        ]);
        return;
    }

    if ($path === '/admin/quotes' || $path === '/admin/enquiries') {
        $type = $path === '/admin/quotes' ? 'quotes' : 'enquiries';
        $flash = admin_handle_submission_action();
        admin_render('submissions', [
            'title' => $type === 'quotes' ? 'Quote requests' : 'Enquiries',
            'navKey' => $type,
            'type' => $type,
            'items' => inbox_list($type),
            'flash' => $flash,
        ]);
        return;
    }

    if (preg_match('~^/admin/(quotes|enquiries)/([a-f0-9]+)$~', $path, $m)) {
        $flash = admin_handle_submission_action('/admin/' . $m[1]);
        $item = inbox_get($m[2]);
        if ($item === null || ($item['_bucket'] ?? '') === 'trash') {
            http_response_code(404);
            echo 'Submission not found';
            return;
        }
        admin_render('submission', [
            'title' => ($item['ref'] ?? 'Submission'),
            'navKey' => $m[1],
            'item' => $item,
            'flash' => $flash,
        ]);
        return;
    }

    if ($path === '/admin/trash') {
        $flash = admin_handle_submission_action();
        admin_render('trash', [
            'title' => 'Trash',
            'navKey' => 'trash',
            'items' => inbox_list('trash'),
            'flash' => $flash,
        ]);
        return;
    }

    if ($path === '/admin/pages') {
        admin_render('pages', [
            'title' => 'Pages',
            'navKey' => 'pages',
            'pages' => admin_list_pages(),
        ]);
        return;
    }

    if (preg_match('~^/admin/pages/([a-z0-9-]+)$~', $path, $m)) {
        $slug = $m[1];
        $page = admin_load_page($slug);
        if ($page === null) {
            http_response_code(404);
            echo 'Page not found';
            return;
        }

        $hero = null;
        foreach ($page['sections'] ?? [] as $section) {
            if (($section['type'] ?? '') === 'hero') {
                $hero = $section;
                break;
            }
        }
        $override = load_page_override($slug);
        $flash = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!admin_verify_csrf($_POST['_csrf'] ?? null)) {
                http_response_code(400);
                echo 'Invalid session token.';
                return;
            }
            if (!empty($_POST['reset'])) {
                admin_save_override($slug, []);
                $flash = 'Overrides cleared — live file content restored.';
                $override = [];
            } else {
                admin_save_override($slug, [
                    'title'       => $_POST['title'] ?? '',
                    'description' => $_POST['description'] ?? '',
                    'hero'        => [
                        'eyebrow' => $_POST['hero_eyebrow'] ?? '',
                        'title'   => $_POST['hero_title'] ?? '',
                        'lead'    => $_POST['hero_lead'] ?? '',
                    ],
                ]);
                $flash = 'Saved. Changes are live on the site.';
                $override = load_page_override($slug);
            }
        }

        $values = [
            'title'         => $override['title'] ?? ($page['title'] ?? ''),
            'description'   => $override['description'] ?? ($page['description'] ?? ''),
            'hero_eyebrow'  => $override['hero']['eyebrow'] ?? ($hero['eyebrow'] ?? ''),
            'hero_title'    => $override['hero']['title'] ?? ($hero['title'] ?? ''),
            'hero_lead'     => $override['hero']['lead'] ?? ($hero['lead'] ?? ''),
        ];

        admin_render('edit', [
            'title'      => 'Edit · ' . $slug,
            'navKey'     => 'pages',
            'slug'       => $slug,
            'path'       => $slug === 'home' ? '/' : "/$slug/",
            'values'     => $values,
            'hasHero'    => $hero !== null,
            'flash'      => $flash,
            'overridden' => $override !== [],
        ]);
        return;
    }

    http_response_code(404);
    echo 'Admin page not found';
}
