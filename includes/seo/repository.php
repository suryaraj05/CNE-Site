<?php
declare(strict_types=1);

function seo_page_fields_from_post(array $in): array
{
    $schemaRaw = trim((string) ($in['schema_json'] ?? ''));
    $schema = seo_validate_schema_json($schemaRaw === '' ? null : $schemaRaw);
    return [
        'slug'             => seo_normalize_slug((string) ($in['slug'] ?? '')),
        'category'         => trim((string) ($in['category'] ?? 'general')) ?: 'general',
        'status'           => in_array($in['status'] ?? '', ['draft', 'published', 'archived'], true) ? $in['status'] : 'draft',
        'wordpress_title'  => trim((string) ($in['wordpress_title'] ?? '')) ?: null,
        'seo_title'        => trim((string) ($in['seo_title'] ?? '')) ?: null,
        'meta_description' => trim((string) ($in['meta_description'] ?? '')) ?: null,
        'focus_keyword'    => trim((string) ($in['focus_keyword'] ?? '')) ?: null,
        'h1'               => trim((string) ($in['h1'] ?? '')) ?: null,
        'robots'           => trim((string) ($in['robots'] ?? 'index,follow')) ?: 'index,follow',
        'canonical'        => trim((string) ($in['canonical'] ?? '')) ?: null,
        'og_title'         => trim((string) ($in['og_title'] ?? '')) ?: null,
        'og_description'   => trim((string) ($in['og_description'] ?? '')) ?: null,
        'og_image'         => trim((string) ($in['og_image'] ?? '')) ?: null,
        'schema_types'     => trim((string) ($in['schema_types'] ?? '')) ?: null,
        'schema_json'      => $schema,
        'body_content'     => seo_sanitize_html((string) ($in['body_content'] ?? '')),
    ];
}

function seo_snapshot_page(array $page): array
{
    unset($page['id'], $page['created_at'], $page['updated_at']);
    return $page;
}

function seo_save_revision(int $pageId, array $page, ?int $userId): void
{
    $stmt = seo_pdo()->prepare(
        'INSERT INTO seo_revisions (page_id, snapshot_json, changed_by) VALUES (?, ?::jsonb, ?)'
    );
    $stmt->execute([
        $pageId,
        json_encode(seo_snapshot_page($page), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        $userId,
    ]);
}

function seo_insert_page(array $data, ?int $userId): int
{
    $sql = 'INSERT INTO seo_pages (
        slug, category, status, wordpress_title, seo_title, meta_description, focus_keyword, h1,
        robots, canonical, og_title, og_description, og_image, schema_types, schema_json, body_content, updated_by
    ) VALUES (
        :slug, :category, :status, :wordpress_title, :seo_title, :meta_description, :focus_keyword, :h1,
        :robots, :canonical, :og_title, :og_description, :og_image, :schema_types, CAST(:schema_json AS jsonb), :body_content, :updated_by
    ) RETURNING id';

    $payload = $data + ['updated_by' => $userId];
    $payload['schema_json'] = $data['schema_json'] === null
        ? null
        : json_encode($data['schema_json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $stmt = seo_pdo()->prepare($sql);
    $stmt->execute([
        ':slug' => $payload['slug'],
        ':category' => $payload['category'],
        ':status' => $payload['status'],
        ':wordpress_title' => $payload['wordpress_title'],
        ':seo_title' => $payload['seo_title'],
        ':meta_description' => $payload['meta_description'],
        ':focus_keyword' => $payload['focus_keyword'],
        ':h1' => $payload['h1'],
        ':robots' => $payload['robots'],
        ':canonical' => $payload['canonical'],
        ':og_title' => $payload['og_title'],
        ':og_description' => $payload['og_description'],
        ':og_image' => $payload['og_image'],
        ':schema_types' => $payload['schema_types'],
        ':schema_json' => $payload['schema_json'],
        ':body_content' => $payload['body_content'],
        ':updated_by' => $payload['updated_by'],
    ]);
    $id = (int) $stmt->fetchColumn();
    seo_regenerate_sitemap();
    return $id;
}

function seo_update_page(int $id, array $data, ?int $userId): void
{
    $current = seo_pdo()->prepare('SELECT * FROM seo_pages WHERE id = ?');
    $current->execute([$id]);
    $before = $current->fetch();
    if (!$before) {
        throw new RuntimeException('Page not found');
    }
    seo_save_revision($id, $before, $userId);

    $sql = 'UPDATE seo_pages SET
        slug = :slug, category = :category, status = :status, wordpress_title = :wordpress_title,
        seo_title = :seo_title, meta_description = :meta_description, focus_keyword = :focus_keyword, h1 = :h1,
        robots = :robots, canonical = :canonical, og_title = :og_title, og_description = :og_description,
        og_image = :og_image, schema_types = :schema_types, schema_json = CAST(:schema_json AS jsonb),
        body_content = :body_content, updated_by = :updated_by, updated_at = NOW()
        WHERE id = :id';

    $schemaJson = $data['schema_json'] === null
        ? null
        : json_encode($data['schema_json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    seo_pdo()->prepare($sql)->execute([
        ':id' => $id,
        ':slug' => $data['slug'],
        ':category' => $data['category'],
        ':status' => $data['status'],
        ':wordpress_title' => $data['wordpress_title'],
        ':seo_title' => $data['seo_title'],
        ':meta_description' => $data['meta_description'],
        ':focus_keyword' => $data['focus_keyword'],
        ':h1' => $data['h1'],
        ':robots' => $data['robots'],
        ':canonical' => $data['canonical'],
        ':og_title' => $data['og_title'],
        ':og_description' => $data['og_description'],
        ':og_image' => $data['og_image'],
        ':schema_types' => $data['schema_types'],
        ':schema_json' => $schemaJson,
        ':body_content' => $data['body_content'],
        ':updated_by' => $userId,
    ]);
    seo_regenerate_sitemap();
}

function seo_get_page(int $id): ?array
{
    $stmt = seo_pdo()->prepare('SELECT * FROM seo_pages WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function seo_list_pages(array $filters = []): array
{
    $sql = 'SELECT * FROM seo_pages WHERE 1=1';
    $params = [];
    if (!empty($filters['q'])) {
        $sql .= ' AND (slug ILIKE ? OR seo_title ILIKE ? OR meta_description ILIKE ? OR h1 ILIKE ?)';
        $q = '%' . $filters['q'] . '%';
        array_push($params, $q, $q, $q, $q);
    }
    if (!empty($filters['category'])) {
        $sql .= ' AND category = ?';
        $params[] = $filters['category'];
    }
    if (!empty($filters['status'])) {
        $sql .= ' AND status = ?';
        $params[] = $filters['status'];
    }
    $sql .= ' ORDER BY updated_at DESC, id DESC';
    $stmt = seo_pdo()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function seo_duplicate_maps(array $pages): array
{
    $titles = [];
    $descs = [];
    foreach ($pages as $p) {
        $t = trim((string) ($p['seo_title'] ?? ''));
        $d = trim((string) ($p['meta_description'] ?? ''));
        if ($t !== '') {
            $titles[$t] = ($titles[$t] ?? 0) + 1;
        }
        if ($d !== '') {
            $descs[$d] = ($descs[$d] ?? 0) + 1;
        }
    }
    return [$titles, $descs];
}
