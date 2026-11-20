<?php
declare(strict_types=1);

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$page = $id ? seo_get_page($id) : null;
if (!$page) {
    http_response_code(404);
    seo_layout_start('Not found', 'index');
    echo '<p>Page not found.</p>';
    seo_layout_end();
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!seo_verify_csrf($_POST['csrf'] ?? null)) {
        seo_flash_err('Invalid CSRF token.');
        header('Location: /admin-seo/edit?id=' . $id);
        exit;
    }
    try {
        $data = seo_page_fields_from_post($_POST);
        seo_update_page($id, $data, (int) (seo_user()['id'] ?? 0));
        seo_flash_ok('Page saved. Revision snapshot stored.');
        header('Location: /admin-seo/edit?id=' . $id);
        exit;
    } catch (Throwable $e) {
        seo_flash_err($e->getMessage());
        $page = array_merge($page, $_POST);
    }
}

$action = '/admin-seo/edit?id=' . $id;
$heading = 'Edit /' . ($page['slug'] === 'home' ? '' : $page['slug']) . '/';
seo_layout_start('Edit page', 'index');
echo '<input type="hidden" form="noop">'; // keep id in POST via form action query; also embed:
// Re-open form include with hidden id field injected by wrapping — add id into form via action query is enough for GET reload; for POST use action with id.
require __DIR__ . '/_form.php';
seo_layout_end();
