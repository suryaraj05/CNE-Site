<?php
declare(strict_types=1);

/** Strip script/iframe and on* handlers from HTML body content. */
function seo_sanitize_html(?string $html): string
{
    if ($html === null || $html === '') {
        return '';
    }
    $html = preg_replace('#<\s*(script|iframe|object|embed|link|meta)[^>]*>.*?<\s*/\s*\1\s*>#is', '', $html) ?? $html;
    $html = preg_replace('#<\s*(script|iframe|object|embed|link|meta)[^>]*/?\s*>#is', '', $html) ?? $html;
    $html = preg_replace('/\son[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html) ?? $html;
    $html = preg_replace('/(href|src)\s*=\s*("|\')\s*javascript:[^"\']*\2/i', '$1="#"', $html) ?? $html;
    return $html;
}

/** Validate schema_json; returns decoded array or null. Throws InvalidArgumentException on bad JSON. */
function seo_validate_schema_json(?string $raw): ?array
{
    if ($raw === null || trim($raw) === '') {
        return null;
    }
    $data = json_decode($raw, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
        throw new InvalidArgumentException('schema_json must be valid JSON object/array: ' . json_last_error_msg());
    }
    return $data;
}

function seo_normalize_slug(string $slug): string
{
    $slug = strtolower(trim($slug));
    $slug = trim($slug, '/');
    $slug = preg_replace('~[^a-z0-9/-]+~', '-', $slug) ?? $slug;
    $slug = preg_replace('~-+~', '-', $slug) ?? $slug;
    return trim($slug, '-/') ?: 'home';
}

function seo_normalize_path(string $url): string
{
    $url = trim($url);
    if ($url === '') {
        return '/';
    }
    if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
        $path = parse_url($url, PHP_URL_PATH) ?: '/';
    } else {
        $path = $url;
    }
    if ($path === '') {
        $path = '/';
    }
    if ($path !== '/' && !str_ends_with($path, '/') && !preg_match('~\.[a-z0-9]+$~i', $path)) {
        $path .= '/';
    }
    return $path;
}
