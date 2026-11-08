<?php
declare(strict_types=1);

require_once __DIR__ . '/inbox.php';

function api_read_payload(): array
{
    $contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
    if (str_contains($contentType, 'application/json')) {
        $raw = file_get_contents('php://input') ?: '';
        $data = json_decode($raw, true);
        return is_array($data) ? $data : [];
    }
    return $_POST;
}

function api_json(array $data, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

function handle_api(string $path): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Accept');
        http_response_code(204);
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        api_json(['error' => 'Method not allowed'], 405);
        return;
    }

    $payload = api_read_payload();

    // Honeypot
    if (!empty($payload['company_website'])) {
        api_json(['ok' => true, 'id' => 'ignored']);
        return;
    }

    $type = match ($path) {
        '/api/quotes', '/api/quote' => 'quotes',
        '/api/enquiries', '/api/enquiry' => 'enquiries',
        default => null,
    };

    if ($type === null) {
        api_json(['error' => 'Not found'], 404);
        return;
    }

    if ($type === 'quotes') {
        $email = trim((string) ($payload['email'] ?? ''));
        $origin = trim((string) ($payload['origin'] ?? ''));
        $destination = trim((string) ($payload['destination'] ?? ''));
        $goods = trim((string) ($payload['goods'] ?? ''));
        if ($email === '' || $origin === '' || $destination === '' || $goods === '') {
            api_json(['error' => 'Missing required fields'], 422);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            api_json(['error' => 'Invalid email'], 422);
            return;
        }
    } else {
        $email = trim((string) ($payload['email'] ?? ''));
        $name = trim((string) ($payload['name'] ?? ''));
        if ($email === '' || $name === '') {
            api_json(['error' => 'Missing required fields'], 422);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            api_json(['error' => 'Invalid email'], 422);
            return;
        }
    }

    try {
        $record = inbox_store($type, $payload);
        api_json([
            'ok'  => true,
            'id'  => $record['id'],
            'ref' => $record['ref'],
        ], 201);
    } catch (Throwable $e) {
        api_json(['error' => 'Could not save submission'], 500);
    }
}
