<?php
declare(strict_types=1);

function seo_session_boot(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    session_start([
        'name'            => 'CNE_SEOSESSID',
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
        'use_strict_mode' => true,
    ]);
}

function seo_user(): ?array
{
    return $_SESSION['seo_user'] ?? null;
}

function seo_logged_in(): bool
{
    return seo_user() !== null;
}

function seo_require_login(): void
{
    if (!seo_logged_in()) {
        header('Location: /admin-seo/login');
        exit;
    }
}

function seo_csrf_token(): string
{
    if (empty($_SESSION['seo_csrf'])) {
        $_SESSION['seo_csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['seo_csrf'];
}

function seo_verify_csrf(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['seo_csrf'])
        && hash_equals($_SESSION['seo_csrf'], $token);
}

function seo_login(string $email, string $password): bool
{
    $stmt = seo_pdo()->prepare('SELECT id, name, email, password_hash, role FROM seo_users WHERE email = ? LIMIT 1');
    $stmt->execute([strtolower(trim($email))]);
    $user = $stmt->fetch();
    if (!$user || !password_verify($password, $user['password_hash'])) {
        return false;
    }
    session_regenerate_id(true);
    $_SESSION['seo_user'] = [
        'id'    => (int) $user['id'],
        'name'  => $user['name'],
        'email' => $user['email'],
        'role'  => $user['role'],
    ];
    return true;
}

function seo_logout(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], (bool) $p['secure'], (bool) $p['httponly']);
    }
    session_destroy();
}
