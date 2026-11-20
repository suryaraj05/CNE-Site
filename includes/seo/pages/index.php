<?php
declare(strict_types=1);

$filters = [
    'q'        => trim((string) ($_GET['q'] ?? '')),
    'category' => trim((string) ($_GET['category'] ?? '')),
    'status'   => trim((string) ($_GET['status'] ?? '')),
    'issues'   => isset($_GET['issues']),
];

$pages = seo_list_pages($filters);
[$dupTitles, $dupDescs] = seo_duplicate_maps(seo_list_pages([]));

$categories = seo_pdo()->query('SELECT DISTINCT category FROM seo_pages ORDER BY category')->fetchAll(PDO::FETCH_COLUMN);

seo_layout_start('Page inventory', 'index');
seo_flash_render();
echo '<div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap">';
echo '<h1>SEO page inventory</h1>';
echo '<a class="btn" href="/admin-seo/create">New page</a></div>';
echo '<p class="muted">Existing site pages are untouched. Records here only apply when you opt in with <code>render_seo_meta()</code>.</p>';

echo '<form class="filters card" method="get" action="/admin-seo/">';
echo '<input type="text" name="q" placeholder="Search slug / title / desc" value="' . seo_h($filters['q']) . '">';
echo '<select name="category"><option value="">All categories</option>';
foreach ($categories as $cat) {
    $sel = $filters['category'] === $cat ? ' selected' : '';
    echo '<option value="' . seo_h($cat) . '"' . $sel . '>' . seo_h($cat) . '</option>';
}
echo '</select><select name="status"><option value="">All statuses</option>';
foreach (['draft', 'published', 'archived'] as $st) {
    $sel = $filters['status'] === $st ? ' selected' : '';
    echo '<option value="' . $st . '"' . $sel . '>' . ucfirst($st) . '</option>';
}
echo '</select><label style="display:flex;align-items:center;gap:.35rem;font-weight:500"><input type="checkbox" name="issues" value="1"' . ($filters['issues'] ? ' checked' : '') . '> Issues only</label>';
echo '<button class="btn secondary" type="submit">Filter</button>';
echo '<a class="btn secondary" href="/admin-seo/export?format=csv">CSV</a>';
echo '<a class="btn secondary" href="/admin-seo/export?format=json">JSON</a>';
echo '</form>';

echo '<div class="card" style="overflow:auto"><table><thead><tr>';
echo '<th>Slug</th><th>Category</th><th>Status</th><th>SEO title</th><th>Issues</th><th></th></tr></thead><tbody>';

$shown = 0;
foreach ($pages as $page) {
    $flags = seo_audit_flags($page, $dupTitles, $dupDescs);
    if ($filters['issues'] && $flags === []) {
        continue;
    }
    $shown++;
    echo '<tr>';
    echo '<td><code>/' . seo_h($page['slug'] === 'home' ? '' : $page['slug']) . '/</code></td>';
    echo '<td>' . seo_h($page['category']) . '</td>';
    echo '<td><span class="badge ' . seo_h($page['status']) . '">' . seo_h($page['status']) . '</span></td>';
    echo '<td>' . seo_h($page['seo_title'] ?: '—') . '</td><td>';
    foreach ($flags as $f) {
        $warn = str_contains($f, 'long') || str_contains($f, 'duplicate');
        echo '<span class="flag' . ($warn ? ' warn' : '') . '">' . seo_h(str_replace('_', ' ', $f)) . '</span>';
    }
    if ($flags === []) {
        echo '<span class="muted">OK</span>';
    }
    echo '</td><td><a href="/admin-seo/edit?id=' . (int) $page['id'] . '">Edit</a>';
    echo ' · <a href="/admin-seo/revisions?page_id=' . (int) $page['id'] . '">History</a></td></tr>';
}
if ($shown === 0) {
    echo '<tr><td colspan="6" class="muted">No pages yet. Create one, or run <code>database/seed-from-existing.php</code> manually.</td></tr>';
}
echo '</tbody></table></div>';
seo_layout_end();
