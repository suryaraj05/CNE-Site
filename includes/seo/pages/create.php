<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!seo_verify_csrf($_POST['csrf'] ?? null)) {
        seo_flash_err('Invalid CSRF token.');
        header('Location: /admin-seo/create');
        exit;
    }
    try {
        $data = seo_page_fields_from_post($_POST);
        $id = seo_insert_page($data, (int) (seo_user()['id'] ?? 0));
        seo_flash_ok('Page created.');
        header('Location: /admin-seo/edit?id=' . $id);
        exit;
    } catch (Throwable $e) {
        seo_flash_err($e->getMessage());
    }
}

$page = [
    'slug' => '',
    'category' => 'general',
    'status' => 'draft',
    'robots' => 'index,follow',
];
$action = '/admin-seo/create';
$heading = 'Create SEO page';
seo_layout_start('Create page', 'create');
require __DIR__ . '/_form.php';
seo_layout_end();
