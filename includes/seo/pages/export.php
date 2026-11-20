<?php
declare(strict_types=1);

$format = strtolower((string) ($_GET['format'] ?? 'json'));
$pages = seo_list_pages([]);
[$dupTitles, $dupDescs] = seo_duplicate_maps($pages);

$rows = [];
foreach ($pages as $p) {
    $rows[] = [
        'id' => (int) $p['id'],
        'slug' => $p['slug'],
        'category' => $p['category'],
        'status' => $p['status'],
        'seo_title' => $p['seo_title'],
        'meta_description' => $p['meta_description'],
        'focus_keyword' => $p['focus_keyword'],
        'h1' => $p['h1'],
        'robots' => $p['robots'],
        'canonical' => $p['canonical'],
        'flags' => seo_audit_flags($p, $dupTitles, $dupDescs),
        'updated_at' => $p['updated_at'],
    ];
}

if ($format === 'csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="seo-pages.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['id', 'slug', 'category', 'status', 'seo_title', 'meta_description', 'focus_keyword', 'h1', 'robots', 'canonical', 'flags', 'updated_at']);
    foreach ($rows as $r) {
        fputcsv($out, [
            $r['id'], $r['slug'], $r['category'], $r['status'], $r['seo_title'], $r['meta_description'],
            $r['focus_keyword'], $r['h1'], $r['robots'], $r['canonical'], implode('|', $r['flags']), $r['updated_at'],
        ]);
    }
    fclose($out);
    exit;
}

header('Content-Type: application/json; charset=utf-8');
header('Content-Disposition: attachment; filename="seo-pages.json"');
echo json_encode(['exported_at' => date('c'), 'count' => count($rows), 'pages' => $rows], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
