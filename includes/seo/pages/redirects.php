<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!seo_verify_csrf($_POST['csrf'] ?? null)) {
        seo_flash_err('Invalid CSRF token.');
        header('Location: /admin-seo/redirects');
        exit;
    }
    $action = $_POST['action'] ?? 'save';
    try {
        if ($action === 'delete') {
            seo_pdo()->prepare('DELETE FROM seo_redirects WHERE id = ?')->execute([(int) ($_POST['id'] ?? 0)]);
            seo_flash_ok('Redirect deleted.');
        } else {
            $old = seo_normalize_path((string) ($_POST['old_url'] ?? ''));
            $new = trim((string) ($_POST['new_url'] ?? ''));
            $code = (int) ($_POST['status_code'] ?? 301);
            if ($new === '') {
                throw new InvalidArgumentException('new_url is required');
            }
            if (!in_array($code, [301, 302], true)) {
                $code = 301;
            }
            $id = (int) ($_POST['id'] ?? 0);
            if ($id > 0) {
                seo_pdo()->prepare(
                    'UPDATE seo_redirects SET old_url = ?, new_url = ?, status_code = ?, updated_at = NOW() WHERE id = ?'
                )->execute([$old, $new, $code, $id]);
                seo_flash_ok('Redirect updated.');
            } else {
                seo_pdo()->prepare(
                    'INSERT INTO seo_redirects (old_url, new_url, status_code) VALUES (?, ?, ?)
                     ON CONFLICT (old_url) DO UPDATE SET new_url = EXCLUDED.new_url, status_code = EXCLUDED.status_code, updated_at = NOW()'
                )->execute([$old, $new, $code]);
                seo_flash_ok('Redirect saved.');
            }
        }
    } catch (Throwable $e) {
        seo_flash_err($e->getMessage());
    }
    header('Location: /admin-seo/redirects');
    exit;
}

$rows = seo_pdo()->query('SELECT * FROM seo_redirects ORDER BY updated_at DESC')->fetchAll();

seo_layout_start('Redirects', 'redirects');
seo_flash_render();
echo '<h1>Redirects</h1>';
echo '<p class="muted">DB redirects are inactive on the live site until you call <code>apply_seo_redirects()</code> in the front controller.</p>';

echo '<div class="card" style="margin-bottom:1rem"><h2>Add redirect</h2>';
echo '<form method="post" class="row" style="align-items:end">';
echo '<input type="hidden" name="csrf" value="' . seo_h(seo_csrf_token()) . '">';
echo '<div class="field"><label>Old URL</label><input name="old_url" required placeholder="/old-path/"></div>';
echo '<div class="field"><label>Send visitors to</label><input name="new_url" required placeholder="/new-path/"></div>';
echo '<div class="field"><label>Code</label><select name="status_code"><option value="301">301</option><option value="302">302</option></select></div>';
echo '<div class="field"><button class="btn" type="submit">Save</button></div></form></div>';

echo '<div class="card" style="overflow:auto"><table><thead><tr><th>Old</th><th>New</th><th>Code</th><th>Hits</th><th></th></tr></thead><tbody>';
foreach ($rows as $r) {
    echo '<tr>';
    echo '<td><code>' . seo_h($r['old_url']) . '</code></td>';
    echo '<td><code>' . seo_h($r['new_url']) . '</code></td>';
    echo '<td>' . (int) $r['status_code'] . '</td>';
    echo '<td>' . (int) $r['hits'] . '</td>';
    echo '<td><form method="post" style="display:inline" onsubmit="return confirm(\'Delete this redirect?\')">';
    echo '<input type="hidden" name="csrf" value="' . seo_h(seo_csrf_token()) . '">';
    echo '<input type="hidden" name="action" value="delete">';
    echo '<input type="hidden" name="id" value="' . (int) $r['id'] . '">';
    echo '<button class="btn danger" type="submit" style="padding:.3rem .55rem;font-size:12px">Delete</button></form></td></tr>';
}
if (!$rows) {
    echo '<tr><td colspan="5" class="muted">No redirects yet.</td></tr>';
}
echo '</tbody></table></div>';
seo_layout_end();
