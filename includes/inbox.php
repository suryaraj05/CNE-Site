<?php
declare(strict_types=1);

function inbox_dir(string $type = ''): string
{
    $base = __DIR__ . '/../storage/inbox';
    return $type === '' ? $base : "$base/$type";
}

function inbox_ensure(): void
{
    foreach (['quotes', 'enquiries', 'trash'] as $type) {
        $dir = inbox_dir($type);
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }
}

function inbox_ref(string $prefix = 'CNE'): string
{
    return $prefix . date('ymd') . strtoupper(bin2hex(random_bytes(3)));
}

/** @param array<string,mixed> $payload */
function inbox_store(string $type, array $payload): array
{
    inbox_ensure();
    if (!in_array($type, ['quotes', 'enquiries'], true)) {
        throw new InvalidArgumentException('Invalid inbox type');
    }

    $id = bin2hex(random_bytes(8));
    $record = [
        'id'         => $id,
        'ref'        => inbox_ref($type === 'quotes' ? 'QT' : 'EN'),
        'type'       => $type,
        'status'     => 'new',
        'created_at' => gmdate('c'),
        'updated_at' => gmdate('c'),
        'ip'         => $_SERVER['REMOTE_ADDR'] ?? '',
        'page'       => (string) ($payload['page'] ?? ''),
        'fields'     => $payload,
    ];
    unset($record['fields']['company_website'], $record['fields']['page']);

    $path = inbox_dir($type) . "/$id.json";
    file_put_contents($path, json_encode($record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n", LOCK_EX);
    return $record;
}

/** @return list<array<string,mixed>> */
function inbox_list(string $type, bool $includeTrash = false): array
{
    inbox_ensure();
    $items = [];
    $dirs = [$type];
    if ($includeTrash) {
        $dirs[] = 'trash';
    }
    foreach ($dirs as $dirType) {
        foreach (glob(inbox_dir($dirType) . '/*.json') ?: [] as $file) {
            $data = json_decode((string) file_get_contents($file), true);
            if (!is_array($data)) {
                continue;
            }
            if ($dirType === 'trash' && ($data['type'] ?? '') !== $type && $type !== 'trash') {
                continue;
            }
            if ($type === 'trash' && $dirType !== 'trash') {
                continue;
            }
            $data['_file'] = $file;
            $items[] = $data;
        }
    }
    usort($items, fn($a, $b) => strcmp((string) ($b['created_at'] ?? ''), (string) ($a['created_at'] ?? '')));
    return $items;
}

function inbox_get(string $id): ?array
{
    inbox_ensure();
    foreach (['quotes', 'enquiries', 'trash'] as $type) {
        $path = inbox_dir($type) . "/$id.json";
        if (!is_file($path)) {
            continue;
        }
        $data = json_decode((string) file_get_contents($path), true);
        if (!is_array($data)) {
            return null;
        }
        $data['_file'] = $path;
        $data['_bucket'] = $type;
        return $data;
    }
    return null;
}

function inbox_update(string $id, array $patch): ?array
{
    $item = inbox_get($id);
    if ($item === null) {
        return null;
    }
    $file = $item['_file'];
    $bucket = $item['_bucket'];
    unset($item['_file'], $item['_bucket']);
    $item = array_merge($item, $patch);
    $item['updated_at'] = gmdate('c');
    file_put_contents($file, json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n", LOCK_EX);
    $item['_file'] = $file;
    $item['_bucket'] = $bucket;
    return $item;
}

function inbox_trash(string $id): bool
{
    $item = inbox_get($id);
    if ($item === null || ($item['_bucket'] ?? '') === 'trash') {
        return false;
    }
    $from = $item['_file'];
    unset($item['_file'], $item['_bucket']);
    $item['trashed_at'] = gmdate('c');
    $item['updated_at'] = $item['trashed_at'];
    $to = inbox_dir('trash') . '/' . $item['id'] . '.json';
    file_put_contents($to, json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n", LOCK_EX);
    unlink($from);
    return true;
}

function inbox_restore(string $id): bool
{
    $item = inbox_get($id);
    if ($item === null || ($item['_bucket'] ?? '') !== 'trash') {
        return false;
    }
    $type = $item['type'] ?? 'enquiries';
    if (!in_array($type, ['quotes', 'enquiries'], true)) {
        $type = 'enquiries';
    }
    $from = $item['_file'];
    unset($item['_file'], $item['_bucket'], $item['trashed_at']);
    $item['updated_at'] = gmdate('c');
    $to = inbox_dir($type) . '/' . $item['id'] . '.json';
    file_put_contents($to, json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n", LOCK_EX);
    unlink($from);
    return true;
}

function inbox_delete(string $id): bool
{
    $item = inbox_get($id);
    if ($item === null) {
        return false;
    }
    return unlink($item['_file']);
}

function inbox_counts(): array
{
    return [
        'quotes'    => count(glob(inbox_dir('quotes') . '/*.json') ?: []),
        'enquiries' => count(glob(inbox_dir('enquiries') . '/*.json') ?: []),
        'trash'     => count(glob(inbox_dir('trash') . '/*.json') ?: []),
        'quotes_new' => count(array_filter(inbox_list('quotes'), fn($i) => ($i['status'] ?? '') === 'new')),
        'enquiries_new' => count(array_filter(inbox_list('enquiries'), fn($i) => ($i['status'] ?? '') === 'new')),
    ];
}
