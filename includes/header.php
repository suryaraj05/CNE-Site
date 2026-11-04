<?php
$page += [
    'title'       => 'Customs Clearance & Freight Forwarding in Newcastle | ' . SITE_NAME,
    'description' => 'Newcastle-based customs clearance and air, sea and road freight forwarding for UK importers and exporters. BIFA member, IATA, HMRC CDS declarations.',
];
$canonical = SITE_URL . $page['path'];
$nav = require __DIR__ . '/nav.php';

$schema = [
    '@context' => 'https://schema.org',
    '@graph'   => array_merge([
        [
            '@type'      => 'LocalBusiness',
            '@id'        => SITE_URL . '/#business',
            'name'       => SITE_LEGAL_NAME,
            'url'        => SITE_URL . '/',
            'telephone'  => PHONE_E164,
            'email'      => EMAIL,
            'address'    => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => ADDRESS['street'],
                'addressLocality' => ADDRESS['locality'],
                'postalCode'      => ADDRESS['postcode'],
                'addressCountry'  => ADDRESS['country'],
            ],
            'openingHoursSpecification' => [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'opens'     => '09:00',
                'closes'    => '17:00',
            ],
            'sameAs'     => array_column(SOCIAL, 1),
            'areaServed' => ['@type' => 'Country', 'name' => 'United Kingdom'],
            'identifier' => ['@type' => 'PropertyValue', 'propertyID' => 'Companies House', 'value' => COMPANY_NO],
            'memberOf'   => ['@type' => 'Organization', 'name' => 'British International Freight Association (BIFA)'],
        ],
        [
            '@type'     => 'WebSite',
            '@id'       => SITE_URL . '/#website',
            'url'       => SITE_URL . '/',
            'name'      => SITE_NAME,
            'publisher' => ['@id' => SITE_URL . '/#business'],
        ],
    ], $page['schema']),
];

$current = fn(string $href): string => $href === $page['path'] ? ' aria-current="page"' : '';
$inMenu = fn(array $item): bool => $item['href'] === $page['path'] || isset(($item['items'] ?? [])[$page['path']]);
?>
<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page['title']) ?></title>
  <meta name="description" content="<?= e($page['description']) ?>">
  <meta name="robots" content="<?= e($page['robots']) ?>">
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta name="theme-color" content="#172B75">
  <meta name="format-detection" content="telephone=no">

  <meta property="og:type" content="<?= empty($page['post']) ? 'website' : 'article' ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:locale" content="en_GB">
  <meta property="og:title" content="<?= e($page['title']) ?>">
  <meta property="og:description" content="<?= e($page['description']) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
<?php if ($page['image']): ?>
  <meta property="og:image" content="<?= e($page['image']) ?>">
<?php endif; ?>
  <meta name="twitter:card" content="<?= $page['image'] ? 'summary_large_image' : 'summary' ?>">

  <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">

  <link rel="preload" href="/dist/plus-jakarta-sans-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= e(asset('app.css')) ?>">
  <script type="module" src="<?= e(asset('app.js')) ?>"></script>

  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
</head>
<body class="bg-canvas font-sans text-ink antialiased">
  <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-lg focus:bg-navy focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-white">Skip to content</a>

  <div x-data="{ office: 'uk' }" class="bg-ink text-[13px] text-blue-100/80">
    <div class="mx-auto flex h-10 max-w-6xl items-center justify-between gap-4 px-6">
      <div class="flex min-w-0 items-center gap-5">
        <div role="group" aria-label="Choose office" class="flex shrink-0 rounded-md bg-white/10 p-0.5 text-xs font-semibold">
          <button type="button" @click="office = 'uk'" :aria-pressed="(office === 'uk').toString()" aria-pressed="true" class="rounded px-2.5 py-1 transition-colors hover:text-white aria-pressed:bg-white aria-pressed:text-ink">UK office</button>
          <button type="button" @click="office = 'india'" :aria-pressed="(office === 'india').toString()" aria-pressed="false" class="rounded px-2.5 py-1 transition-colors hover:text-white aria-pressed:bg-white aria-pressed:text-ink">India office</button>
        </div>
        <ul x-show="office === 'uk'" class="flex min-w-0 items-center gap-5">
          <li><a href="tel:<?= e(PHONE_E164) ?>" class="flex items-center gap-1.5 whitespace-nowrap transition-colors hover:text-white"><?= icon('phone', 'size-3.5') ?><?= e(PHONE_DISPLAY) ?></a></li>
          <li class="hidden sm:block"><a href="mailto:<?= e(EMAIL) ?>" class="flex items-center gap-1.5 transition-colors hover:text-white"><?= icon('mail', 'size-3.5') ?><?= e(EMAIL) ?></a></li>
          <li class="hidden min-w-0 items-center gap-1.5 xl:flex"><?= icon('map-pin', 'size-3.5 shrink-0') ?><span class="truncate"><?= e(ADDRESS['short']) ?>, <?= e(ADDRESS['postcode']) ?></span></li>
        </ul>
        <ul x-show="office === 'india'" x-cloak class="flex min-w-0 items-center gap-5">
          <li><a href="tel:<?= e(INDIA_OFFICE['phone_e164']) ?>" class="flex items-center gap-1.5 whitespace-nowrap transition-colors hover:text-white"><?= icon('phone', 'size-3.5') ?><?= e(INDIA_OFFICE['phone_display']) ?></a></li>
          <li class="hidden min-w-0 items-center gap-1.5 sm:flex"><?= icon('map-pin', 'size-3.5 shrink-0') ?><span class="truncate"><?= e(INDIA_OFFICE['address']) ?></span></li>
        </ul>
      </div>
      <div class="hidden items-center gap-1 lg:flex">
        <?= social_links('flex size-7 items-center justify-center rounded-md transition-colors hover:bg-white/10 hover:text-white', 'size-3.5') ?>
      </div>
    </div>
  </div>

  <header x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-40 border-b border-line bg-white">
    <div class="relative mx-auto flex h-[84px] max-w-6xl items-center justify-between gap-6 px-6">
      <a href="/" class="flex items-center gap-2.5 text-[17px] font-bold tracking-tight text-ink" aria-label="<?= e(SITE_NAME) ?> home">
<?php if ($logo = asset_img('logo')): ?>
        <img src="<?= e($logo) ?>" alt="" class="h-11 w-auto">
<?php else: ?>
        <svg class="size-8 shrink-0" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="14.5" stroke="#172B75" stroke-width="1.6"/><g stroke="#172B75" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8.5 22.5 12v8L16 23.5 9.5 20v-8L16 8.5Z"/><path d="M9.5 12 16 15.5 22.5 12M16 15.5v8"/></g></svg>
        <?= e(SITE_NAME) ?>
<?php endif; ?>
      </a>

      <nav aria-label="Primary" class="hidden self-stretch lg:flex">
        <ul class="flex items-stretch gap-0.5 text-sm font-medium text-slate-600">
<?php foreach ($nav['primary'] as $item):
    $active = $inMenu($item) ? 'text-navy' : '';
?>
<?php if (!isset($item['items'])): ?>
          <li class="flex items-center"><a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="rounded-lg px-3 py-2 transition-colors hover:text-navy <?= $active ?>"><?= e($item['label']) ?></a></li>
<?php else: ?>
          <li class="relative flex items-center" x-data="{ menu: false }" @mouseenter="menu = true" @mouseleave="menu = false" @keydown.escape="menu = false">
            <a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="py-2 pl-3 transition-colors hover:text-navy <?= $active ?>"><?= e($item['label']) ?></a>
            <button type="button" @click="menu = !menu" :aria-expanded="menu.toString()" aria-expanded="false" class="rounded-md py-2 pr-2.5 pl-1 transition-colors hover:text-navy <?= $active ?>">
              <span class="sr-only"><?= e($item['label']) ?> menu</span>
              <span :class="menu && 'rotate-180'" class="block transition-transform duration-150"><?= icon('chevron-down', 'size-3.5') ?></span>
            </button>
            <div x-show="menu" x-cloak x-transition.opacity.duration.150ms class="absolute top-full -left-2 z-50 w-64">
              <div class="rounded-2xl border border-line bg-white p-2 shadow-[0_24px_60px_-24px_rgba(15,26,61,0.3)]">
                <ul>
<?php foreach ($item['items'] as $href => $label): ?>
                  <li><a href="<?= e($href) ?>"<?= $current($href) ?> class="block rounded-lg px-3 py-2.5 text-ink transition-colors hover:bg-mist hover:text-navy aria-[current=page]:bg-mist aria-[current=page]:text-navy"><?= e($label) ?></a></li>
<?php endforeach; ?>
                </ul>
              </div>
            </div>
          </li>
<?php endif; ?>
<?php endforeach; ?>
        </ul>
      </nav>

      <div class="hidden items-center gap-6 lg:flex">
        <a href="tel:<?= e(PHONE_E164) ?>" class="hidden text-sm font-semibold text-ink transition-colors hover:text-navy xl:block"><?= e(PHONE_DISPLAY) ?></a>
        <a href="/request-a-quote/" class="inline-flex h-10 items-center rounded-lg bg-navy px-5 text-sm font-semibold text-white shadow-sm transition-colors hover:bg-navy-700 focus-visible:ring-4 focus-visible:ring-navy/20 focus-visible:outline-none">Get a quote</a>
      </div>

      <button type="button" @click="open = !open" :aria-expanded="open.toString()" aria-controls="mobile-nav" aria-expanded="false" class="-mr-2 inline-flex size-10 items-center justify-center rounded-lg text-ink hover:bg-mist lg:hidden">
        <span class="sr-only">Toggle menu</span>
        <svg x-show="!open" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
        <svg x-show="open" x-cloak class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
      </button>
    </div>

    <nav id="mobile-nav" x-show="open" x-cloak x-transition.opacity.duration.150ms aria-label="Mobile" class="max-h-[calc(100dvh-84px)] overflow-y-auto overscroll-contain border-t border-line bg-white lg:hidden">
      <ul class="mx-auto max-w-6xl space-y-1 px-6 py-4 text-[15px] font-medium">
<?php foreach ($nav['primary'] as $item): ?>
<?php if (!isset($item['items'])): ?>
        <li><a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="block rounded-lg px-3 py-2.5 text-slate-700 hover:bg-mist hover:text-navy aria-[current=page]:text-navy"><?= e($item['label']) ?></a></li>
<?php else: ?>
        <li x-data="{ sub: <?= $inMenu($item) ? 'true' : 'false' ?> }">
          <button type="button" @click="sub = !sub" :aria-expanded="sub.toString()" aria-expanded="false" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-slate-700 hover:bg-mist">
            <?= e($item['label']) ?>
            <span :class="sub && 'rotate-180'" class="transition-transform duration-150"><?= icon('chevron-down', 'size-4') ?></span>
          </button>
          <div x-show="sub" x-cloak class="pb-2 pl-3">
            <ul>
<?php foreach ($item['items'] as $href => $label): ?>
              <li><a href="<?= e($href) ?>"<?= $current($href) ?> class="block rounded-lg px-3 py-2 text-sm text-slate-700 hover:bg-mist hover:text-navy aria-[current=page]:text-navy"><?= e($label) ?></a></li>
<?php endforeach; ?>
            </ul>
          </div>
        </li>
<?php endif; ?>
<?php endforeach; ?>
        <li class="flex flex-col gap-2 pt-3">
          <a href="tel:<?= e(PHONE_E164) ?>" class="flex h-11 items-center justify-center rounded-lg border border-line font-semibold text-ink"><?= e(PHONE_DISPLAY) ?></a>
          <a href="/request-a-quote/" class="flex h-11 items-center justify-center rounded-lg bg-navy font-semibold text-white">Get a quote</a>
        </li>
      </ul>
    </nav>
  </header>

  <main id="main">
