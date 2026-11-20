<?php
declare(strict_types=1);

$pageId = (int) ($_GET['page_id'] ?? $_POST['page_id'] ?? 0);
$page = $pageId ? seo_get_page($pageId) : null;
if (!$page) {
    http_response_code(404);
    seo_layout_start('Not found', 'index');
    echo '<p>Page not found.</p>';
    seo_layout_end();
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'restore') {
    if (!seo_verify_csrf($_POST['csrf'] ?? null)) {
        seo_flash_err('Invalid CSRF token.');
        header('Location: /admin-seo/revisions?page_id=' . $pageId);
        exit;
    }
    $revId = (int) ($_POST['revision_id'] ?? 0);
    $stmt = seo_pdo()->prepare('SELECT * FROM seo_revisions WHERE id = ? AND page_id = ?');
    $stmt->execute([$revId, $pageId]);
    $rev = $stmt->fetch();
    if (!$rev) {
        seo_flash_err('Revision not found.');
        header('Location: /admin-seo/revisions?page_id=' . $pageId);
        exit;
    }
    $snap = is_string($rev['snapshot_json'])
        ? json_decode($rev['snapshot_json'], true)
        : $rev['snapshot_json'];
    if (!is_array($snap)) {
        seo_flash_err('Invalid revision snapshot.');
        header('Location: /admin-seo/revisions?page_id=' . $pageId);
        exit;
    }
    // Keep current slug constraints; restore content fields.
    $data = seo_page_fields_from_post(array_merge($snap, [
        'slug' => $snap['slug'] ?? $page['slug'],
        'schema_json' => isset($snap['schema_json'])
            ? (is_string($snap['schema_json']) ? $snap['schema_json'] : json_encode($snap['schema_json']))
            : '',
    ]));
    seo_update_page($pageId, $data, (int) (seo_user()['id'] ?? 0));
    seo_flash_ok('Revision restored.');
    header('Location: /admin-seo/edit?id=' . $pageId);
    exit;
}

$stmt = seo_pdo()->prepare(
    'SELECT r.*, u.name AS user_name FROM seo_revisions r
     LEFT JOIN seo_users u ON u.id = r.changed_by
     WHERE r.page_id = ? ORDER BY r.created_at DESC LIMIT 50'
);
$stmt->execute([$pageId]);
$revs = $stmt->fetchAll();

seo_layout_start('Revisions', 'index');
seo_flash_render();
echo '<h1>Revisions · /' . seo_h($page['slug'] === 'home' ? '' : $page['slug']) . '/</h1>';
echo '<p><a href="/admin-seo/edit?id=' . $pageId . '">← Back to editor</a></p>';
echo '<div class="card"><table><thead><tr><th>When</th><th>By</th><th>Snapshot</th><th></th></tr></thead><tbody>';
foreach ($revs as $r) {
    $snap = is_string($r['snapshot_json']) ? json_decode($r['snapshot_json'], true) : $r['snapshot_json'];
    $label = is_array($snap) ? (($snap['seo_title'] ?? $snap['slug'] ?? 'snapshot')) : 'snapshot';
    echo '<tr>';
    echo '<td>' . seo_h($r['created_at']) . '</td>';
    echo '<td>' . seo_h($r['user_name'] ?: '—') . '</td>';
    echo '<td>' . seo_h((string) $label) . '</td>';
    echo '<td><form method="post" onsubmit="return confirm(\'Restore this revision? Current state will be snapshotted first.\')">';
    echo '<input type="hidden" name="csrf" value="' . seo_h(seo_csrf_token()) . '">';
    echo '<input type="hidden" name="action" value="restore">';
    echo '<input type="hidden" name="page_id" value="' . $pageId . '">';
    echo '<input type="hidden" name="revision_id" value="' . (int) $r['id'] . '">';
    echo '<button class="btn secondary" type="submit">Restore</button></form></td></tr>';
}
if (!$revs) {
    echo '<tr><td colspan="4" class="muted">No revisions yet. Save the page once to create history.</td></tr>';
}
echo '</tbody></table></div>';
seo_layout_end();
