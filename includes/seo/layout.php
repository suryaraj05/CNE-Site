<?php
declare(strict_types=1);

function seo_h(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function seo_layout_start(string $title, string $active = ''): void
{
    $user = seo_user();
    $nav = [
        'index'     => ['Pages', '/admin-seo/'],
        'create'    => ['New page', '/admin-seo/create'],
        'redirects' => ['Redirects', '/admin-seo/redirects'],
        'export'    => ['Export', '/admin-seo/export'],
    ];
    echo '<!doctype html><html lang="en-GB"><head><meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<meta name="robots" content="noindex,nofollow">';
    echo '<title>' . seo_h($title) . ' · SEO Dashboard</title>';
    echo '<style>
:root{--navy:#1D3978;--ink:#0f172a;--muted:#64748b;--line:#e2e8f0;--bg:#f8fafc;--ok:#166534;--warn:#b45309;--bad:#b91c1c;--card:#fff}
*{box-sizing:border-box}body{margin:0;font:14px/1.5 system-ui,Segoe UI,sans-serif;background:var(--bg);color:var(--ink)}
a{color:var(--navy);text-decoration:none}a:hover{text-decoration:underline}
.top{background:var(--navy);color:#fff;padding:0 1.25rem;display:flex;align-items:center;gap:1.5rem;min-height:52px}
.top strong{font-size:15px}.top nav{display:flex;gap:.25rem;flex:1;flex-wrap:wrap}
.top nav a{color:#c7d2fe;padding:.55rem .75rem;border-radius:.5rem}.top nav a.on,.top nav a:hover{background:rgba(255,255,255,.12);color:#fff;text-decoration:none}
.top .who{margin-left:auto;opacity:.85;font-size:13px}
.wrap{max-width:1200px;margin:0 auto;padding:1.25rem}
.card{background:var(--card);border:1px solid var(--line);border-radius:.85rem;padding:1rem 1.15rem;box-shadow:0 1px 2px rgba(15,23,42,.04)}
.grid{display:grid;gap:1rem}.grid-2{grid-template-columns:1.2fr .8fr}@media(max-width:900px){.grid-2{grid-template-columns:1fr}}
h1{font-size:1.35rem;margin:0 0 .75rem}h2{font-size:1.05rem;margin:0 0 .5rem}
.muted{color:var(--muted)}.flash{padding:.75rem 1rem;border-radius:.65rem;margin-bottom:1rem}
.flash.ok{background:#ecfdf5;color:var(--ok)}.flash.err{background:#fef2f2;color:var(--bad)}
table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:.55rem .45rem;border-bottom:1px solid var(--line);vertical-align:top}
th{font-size:12px;text-transform:uppercase;letter-spacing:.03em;color:var(--muted)}
.badge{display:inline-block;font-size:11px;font-weight:600;padding:.15rem .45rem;border-radius:999px;background:#e2e8f0}
.badge.draft{background:#fef3c7;color:#92400e}.badge.published{background:#dcfce7;color:#166534}.badge.archived{background:#e2e8f0}
.flag{display:inline-block;font-size:11px;margin:.1rem .15rem 0 0;padding:.1rem .4rem;border-radius:.35rem;background:#fee2e2;color:var(--bad)}
.flag.warn{background:#ffedd5;color:var(--warn)}
label{display:block;font-weight:600;font-size:13px;margin:0 0 .3rem}
input[type=text],input[type=email],input[type=password],input[type=url],input[type=number],select,textarea{
width:100%;padding:.55rem .65rem;border:1px solid var(--line);border-radius:.55rem;font:inherit;background:#fff}
textarea{min-height:90px;font-family:ui-monospace,Consolas,monospace;font-size:12.5px}
.field{margin-bottom:.85rem}.row{display:grid;grid-template-columns:1fr 1fr;gap:.75rem}@media(max-width:700px){.row{grid-template-columns:1fr}}
.btn{display:inline-flex;align-items:center;gap:.35rem;border:0;border-radius:.55rem;padding:.55rem .9rem;font:inherit;font-weight:600;cursor:pointer;background:var(--navy);color:#fff}
.btn:hover{filter:brightness(1.05)}.btn.secondary{background:#fff;color:var(--navy);border:1px solid var(--line)}
.btn.danger{background:var(--bad)}.actions{display:flex;gap:.5rem;flex-wrap:wrap;margin-top:1rem}
.counter{font-size:12px;color:var(--muted)}.counter.over{color:var(--bad);font-weight:700}
.serp{font-family:Arial,sans-serif;padding:1rem;background:#fff;border:1px solid var(--line);border-radius:.65rem}
.serp .u{color:#202124;font-size:14px}.serp .t{color:#1a0dab;font-size:20px;line-height:1.3;margin:.15rem 0}.serp .d{color:#4d5156;font-size:14px}
.og{border:1px solid var(--line);border-radius:.65rem;overflow:hidden;background:#fff;max-width:420px}
.og img{display:block;width:100%;height:160px;object-fit:cover;background:#e2e8f0}.og .b{padding:.75rem}.og .s{font-size:12px;color:var(--muted);text-transform:uppercase}
.og .t{font-weight:700;margin:.2rem 0}.og .d{font-size:13px;color:var(--muted)}
.filters{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1rem}.filters input,.filters select{width:auto;min-width:140px}
.login-wrap{max-width:380px;margin:4rem auto}
</style></head><body>';
    if ($user) {
        echo '<header class="top"><strong>SEO Dashboard</strong><nav>';
        foreach ($nav as $key => [$label, $href]) {
            $on = $active === $key ? ' on' : '';
            echo '<a class="' . trim($on) . '" href="' . seo_h($href) . '">' . seo_h($label) . '</a>';
        }
        echo '</nav><span class="who">' . seo_h($user['name']) . ' · <a style="color:#fff" href="/admin-seo/logout">Log out</a></span></header>';
    }
    echo '<main class="wrap">';
}

function seo_layout_end(): void
{
    echo '</main></body></html>';
}

function seo_flash_render(): void
{
    if (!empty($_SESSION['seo_flash_ok'])) {
        echo '<div class="flash ok">' . seo_h($_SESSION['seo_flash_ok']) . '</div>';
        unset($_SESSION['seo_flash_ok']);
    }
    if (!empty($_SESSION['seo_flash_err'])) {
        echo '<div class="flash err">' . seo_h($_SESSION['seo_flash_err']) . '</div>';
        unset($_SESSION['seo_flash_err']);
    }
}

function seo_flash_ok(string $msg): void
{
    $_SESSION['seo_flash_ok'] = $msg;
}

function seo_flash_err(string $msg): void
{
    $_SESSION['seo_flash_err'] = $msg;
}
