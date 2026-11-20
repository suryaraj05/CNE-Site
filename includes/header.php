<?php
$page += [
    'title'       => 'Customs Clearance & Freight Forwarding in Newcastle | ' . SITE_NAME,
    'description' => 'Newcastle-based customs clearance and air, sea and road freight forwarding for UK importers and exporters. BIFA member, IATA, HMRC CDS declarations.',
];
$canonical = SITE_URL . $page['path'];
$nav = require __DIR__ . '/nav.php';

// Prefer a JPG/PNG social share image (1200×630) — some networks mishandle .webp.
$ogPath = $page['image'] ?? asset_img('og-default') ?? asset_img('cta-ship') ?? asset_img('hero');
$ogImage = $ogPath ? (str_starts_with($ogPath, 'http') ? $ogPath : SITE_URL . $ogPath) : null;

// Preview hosts must not be indexed (SEO feedback). Production must NOT set CNE_NOINDEX.
$host = strtolower($_SERVER['HTTP_HOST'] ?? '');
$isPreview = getenv('CNE_NOINDEX') === '1'
    || str_contains($host, 'fly.dev')
    || str_contains($host, 'localhost')
    || str_contains($host, '127.0.0.1');
if ($isPreview) {
    $page['robots'] = 'noindex, nofollow';
}
$schema = [
    '@context' => 'https://schema.org',
    '@graph'   => array_merge([
        [
            '@type'      => ['LocalBusiness', 'Organization'],
            '@id'        => SITE_URL . '/#business',
            'name'       => SITE_LEGAL_NAME,
            'alternateName' => SITE_NAME,
            'url'        => SITE_URL . '/',
            'telephone'  => PHONE_E164,
            'email'      => EMAIL,
            'priceRange' => PRICE_RANGE,
            'image'      => $ogImage ? [$ogImage] : [],
            'logo'       => asset_img('logo') ? SITE_URL . asset_img('logo') : null,
            'address'    => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => ADDRESS['street'],
                'addressLocality' => ADDRESS['locality'],
                'postalCode'      => ADDRESS['postcode'],
                'addressCountry'  => ADDRESS['country'],
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => ADDRESS['latitude'],
                'longitude' => ADDRESS['longitude'],
            ],
            'openingHoursSpecification' => [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'opens'     => '09:00',
                'closes'    => '17:00',
            ],
            'contactPoint' => [
                '@type'             => 'ContactPoint',
                'telephone'         => PHONE_E164,
                'contactType'       => 'customer service',
                'areaServed'        => 'GB',
                'availableLanguage' => 'en',
            ],
            'sameAs'     => array_column(SOCIAL, 1),
            'areaServed' => ['@type' => 'Country', 'name' => 'United Kingdom'],
            'identifier' => ['@type' => 'PropertyValue', 'propertyID' => 'Companies House', 'value' => COMPANY_NO],
            'memberOf'   => [
                ['@type' => 'Organization', 'name' => 'British International Freight Association (BIFA)'],
                ['@type' => 'Organization', 'name' => 'IATA'],
            ],
            'knowsAbout' => [
                'Customs clearance',
                'Air freight',
                'Sea freight',
                'Road transport',
                'HMRC CDS declarations',
            ],
        ],
        [
            '@type'           => 'WebSite',
            '@id'             => SITE_URL . '/#website',
            'url'             => SITE_URL . '/',
            'name'            => SITE_NAME,
            'description'     => $page['description'],
            'inLanguage'      => 'en-GB',
            'publisher'       => ['@id' => SITE_URL . '/#business'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => SITE_URL . '/request-a-quote/',
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'       => 'WebPage',
            '@id'         => $canonical . '#webpage',
            'url'         => $canonical,
            'name'        => $page['title'],
            'description' => $page['description'],
            'isPartOf'    => ['@id' => SITE_URL . '/#website'],
            'about'       => ['@id' => SITE_URL . '/#business'],
            'inLanguage'  => 'en-GB',
        ],
    ], $page['schema']),
];
$schema['@graph'] = array_map(static function ($node) {
    return array_filter($node, static fn($v) => $v !== null && $v !== []);
}, $schema['@graph']);

$current = fn(string $href): string => $href === $page['path'] ? ' aria-current="page"' : '';
$inMenu = function (array $item) use ($page): bool {
    if ($item['href'] === $page['path'] || isset(($item['items'] ?? [])[$page['path']])) {
        return true;
    }
    foreach ($item['groups'] ?? [] as $group) {
        if (($group['href'] ?? '') === $page['path'] || isset(($group['items'] ?? [])[$page['path']])) {
            return true;
        }
    }
    return false;
};
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
  <meta name="google-site-verification" content="etZfQLowfSlN3NeEWCf8V-gKxEqwSpmvDsFucXiJFlM">
  <meta name="theme-color" content="#1a3673">
  <meta name="format-detection" content="telephone=no">
<?php if ($ogImage && str_ends_with(strtolower(parse_url($ogImage, PHP_URL_PATH) ?? ''), '.jpg')): ?>
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/jpeg">
<?php endif; ?>

  <meta property="og:type" content="<?= empty($page['post']) ? 'website' : 'article' ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:locale" content="en_GB">
  <meta property="og:title" content="<?= e($page['title']) ?>">
  <meta property="og:description" content="<?= e($page['description']) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
<?php if ($ogImage): ?>
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">
<?php endif; ?>
  <meta name="twitter:card" content="<?= $ogImage ? 'summary_large_image' : 'summary' ?>">
  <meta name="twitter:title" content="<?= e($page['title']) ?>">
  <meta name="twitter:description" content="<?= e($page['description']) ?>">

  <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">

  <link rel="preload" href="/dist/plus-jakarta-sans-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= e(asset('app.css')) ?>">
  <script>document.documentElement.classList.add('js')</script>
  <script type="module" src="<?= e(asset('app.js')) ?>"></script>

  <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
</head>
<body class="bg-canvas font-sans text-ink antialiased">
  <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:rounded-lg focus:bg-navy focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-white">Skip to content</a>

  <div x-data="{ office: 'uk' }" class="bg-navy text-[13px] text-white/85">
    <div class="shell flex h-10 items-center justify-between gap-4">
      <div class="flex min-w-0 items-center gap-5">
        <div role="group" aria-label="Choose office" class="flex shrink-0 rounded-full bg-white/10 p-0.5 text-xs font-semibold">
          <button type="button" @click="office = 'uk'" :aria-pressed="(office === 'uk').toString()" aria-pressed="true" class="rounded-full px-2.5 py-1 transition-colors hover:text-white aria-pressed:bg-lime aria-pressed:text-navy">UK office</button>
          <button type="button" @click="office = 'india'" :aria-pressed="(office === 'india').toString()" aria-pressed="false" class="rounded-full px-2.5 py-1 transition-colors hover:text-white aria-pressed:bg-lime aria-pressed:text-navy">India office</button>
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

  <header x-data="{ open: false, scrolled: false }" @scroll.window.throttle.50ms="scrolled = window.scrollY > 8" @keydown.escape.window="open = false" :class="scrolled && 'shadow-[0_12px_40px_-24px_rgba(26,54,115,0.28)] border-line/80'" class="sticky top-0 z-40 border-b border-line/60 bg-white/90 backdrop-blur-md transition-[box-shadow,border-color] duration-500">
    <div class="shell relative flex h-[80px] items-center justify-between gap-6">
      <a href="/" class="flex shrink-0 items-center" aria-label="<?= e(SITE_NAME) ?> home">
<?php if ($logo = asset_img('logo')): ?>
        <img src="<?= e($logo) ?>" alt="<?= e(SITE_NAME) ?>" width="160" height="40" class="h-8 w-auto sm:h-9">
<?php else: ?>
        <span class="text-[17px] font-bold tracking-tight text-ink"><?= e(SITE_NAME) ?></span>
<?php endif; ?>
      </a>

      <nav aria-label="Primary" class="hidden self-stretch lg:flex">
        <ul class="flex items-stretch gap-0.5 text-sm font-medium text-muted">
<?php foreach ($nav['primary'] as $item):
    $active = $inMenu($item) ? 'text-navy' : '';
    $hasItems = isset($item['items']) || isset($item['groups']);
?>
<?php if (!$hasItems): ?>
          <li class="flex items-center"><a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="rounded-lg px-3 py-2 transition-colors hover:text-navy <?= $active ?>"><?= e($item['label']) ?></a></li>
<?php elseif (isset($item['groups'])): ?>
          <li class="relative flex items-center" x-data="{ menu: false, flyout: null }" @mouseenter="menu = true" @mouseleave="menu = false; flyout = null" @keydown.escape="menu = false; flyout = null">
            <a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="py-2 pl-3 transition-colors hover:text-navy <?= $active ?>"><?= e($item['label']) ?></a>
            <button type="button" @click="menu = !menu; if (!menu) flyout = null" :aria-expanded="menu.toString()" aria-expanded="false" class="rounded-md py-2 pr-2.5 pl-1 transition-colors hover:text-navy <?= $active ?>">
              <span class="sr-only"><?= e($item['label']) ?> menu</span>
              <span :class="menu && 'rotate-180'" class="block transition-transform duration-150"><?= icon('chevron-down', 'size-3.5') ?></span>
            </button>
            <div x-show="menu" x-cloak x-transition.opacity.duration.150ms class="absolute top-full left-0 z-50 pt-2">
              <div class="flex items-start gap-2">
                <!-- Step 1: category choices only -->
                <div class="w-56 shrink-0 rounded-2xl border border-line bg-white p-2 shadow-[0_24px_60px_-24px_rgba(12,18,57,0.3)]">
                  <ul>
                    <li>
                      <a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="block rounded-lg px-3 py-2.5 text-ink transition-colors hover:bg-mist hover:text-navy aria-[current=page]:bg-mist aria-[current=page]:text-navy" @mouseenter="flyout = null">
                        All locations
                      </a>
                    </li>
<?php foreach ($item['groups'] as $gi => $group): ?>
                    <li @mouseenter="flyout = <?= (int) $gi ?>">
                      <button type="button"
                         class="flex w-full items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-left text-ink transition-colors hover:bg-mist hover:text-navy"
                         :class="flyout === <?= (int) $gi ?> && 'bg-mist text-navy'"
                         :aria-expanded="(flyout === <?= (int) $gi ?>).toString()"
                         @click="flyout = flyout === <?= (int) $gi ?> ? null : <?= (int) $gi ?>">
                        <span><?= e($group['label']) ?></span>
                        <?= icon('chevron-down', 'size-3.5 -rotate-90 shrink-0 opacity-70') ?>
                      </button>
                    </li>
<?php endforeach; ?>
                  </ul>
                </div>
                <!-- Step 2: separate panel beside the categories -->
<?php foreach ($item['groups'] as $gi => $group): ?>
                <div x-show="flyout === <?= (int) $gi ?>" x-cloak x-transition.opacity.duration.120ms
                     class="w-64 shrink-0 rounded-2xl border border-line bg-white p-2 shadow-[0_24px_60px_-24px_rgba(12,18,57,0.3)]">
                  <a href="<?= e($group['href']) ?>"<?= $current($group['href']) ?> class="mb-1 block rounded-lg px-3 py-2 text-[13px] font-bold text-navy hover:bg-mist aria-[current=page]:bg-mist">
                    View <?= e($group['label']) ?>
                  </a>
                  <ul class="max-h-[22rem] space-y-0.5 overflow-y-auto">
<?php foreach ($group['items'] as $href => $label): ?>
                    <li>
                      <a href="<?= e($href) ?>"<?= $current($href) ?> class="block rounded-lg px-3 py-2 text-[13px] text-ink transition-colors hover:bg-mist hover:text-navy aria-[current=page]:bg-mist aria-[current=page]:text-navy">
                        <?= e($label) ?>
                      </a>
                    </li>
<?php endforeach; ?>
                  </ul>
                </div>
<?php endforeach; ?>
              </div>
            </div>
          </li>
<?php else: ?>
          <li class="relative flex items-center" x-data="{ menu: false }" @mouseenter="menu = true" @mouseleave="menu = false" @keydown.escape="menu = false">
            <a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="py-2 pl-3 transition-colors hover:text-navy <?= $active ?>"><?= e($item['label']) ?></a>
            <button type="button" @click="menu = !menu" :aria-expanded="menu.toString()" aria-expanded="false" class="rounded-md py-2 pr-2.5 pl-1 transition-colors hover:text-navy <?= $active ?>">
              <span class="sr-only"><?= e($item['label']) ?> menu</span>
              <span :class="menu && 'rotate-180'" class="block transition-transform duration-150"><?= icon('chevron-down', 'size-3.5') ?></span>
            </button>
            <div x-show="menu" x-cloak x-transition.opacity.duration.150ms class="absolute top-full -left-2 z-50 w-64">
              <div class="rounded-2xl border border-line bg-white p-2 shadow-[0_24px_60px_-24px_rgba(12,18,57,0.3)]">
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

      <div class="hidden items-center gap-5 lg:flex">
        <a href="tel:<?= e(PHONE_E164) ?>" class="hidden items-center gap-2 text-sm font-semibold text-ink transition-colors hover:text-navy xl:inline-flex"><?= icon('phone', 'size-3.5 text-navy') ?><?= e(PHONE_DISPLAY) ?></a>
        <a href="/request-a-quote/" class="btn btn-primary btn-sm">Get a quote</a>
      </div>

      <button type="button" @click="open = !open" :aria-expanded="open.toString()" aria-controls="mobile-nav" aria-expanded="false" class="-mr-2 inline-flex size-10 items-center justify-center rounded-lg text-ink hover:bg-mist lg:hidden">
        <span class="sr-only">Toggle menu</span>
        <svg x-show="!open" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
        <svg x-show="open" x-cloak class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
      </button>
    </div>

    <nav id="mobile-nav" x-show="open" x-cloak x-transition.opacity.duration.150ms aria-label="Mobile" class="max-h-[calc(100dvh-80px)] overflow-y-auto overscroll-contain border-t border-line bg-white lg:hidden">
      <ul class="shell space-y-1 py-4 text-[15px] font-medium">
<?php foreach ($nav['primary'] as $item):
    $hasItems = isset($item['items']) || isset($item['groups']);
?>
<?php if (!$hasItems): ?>
        <li><a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="block rounded-lg px-3 py-2.5 text-muted hover:bg-mist hover:text-navy aria-[current=page]:text-navy"><?= e($item['label']) ?></a></li>
<?php elseif (isset($item['groups'])): ?>
        <li x-data="{ sub: <?= $inMenu($item) ? 'true' : 'false' ?> }">
          <button type="button" @click="sub = !sub" :aria-expanded="sub.toString()" aria-expanded="false" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-muted hover:bg-mist">
            <?= e($item['label']) ?>
            <span :class="sub && 'rotate-180'" class="transition-transform duration-150"><?= icon('chevron-down', 'size-4') ?></span>
          </button>
          <div x-show="sub" x-cloak class="space-y-2 pb-2 pl-2">
            <a href="<?= e($item['href']) ?>"<?= $current($item['href']) ?> class="block rounded-lg px-3 py-2 text-sm font-semibold text-navy hover:bg-mist aria-[current=page]:bg-mist">All locations</a>
<?php foreach ($item['groups'] as $gi => $group): ?>
            <div x-data="{ nest: false }" class="rounded-xl bg-mist/60">
              <div class="flex items-center gap-1">
                <a href="<?= e($group['href']) ?>"<?= $current($group['href']) ?> class="min-w-0 flex-1 rounded-lg px-3 py-2 text-sm font-semibold text-ink hover:text-navy aria-[current=page]:text-navy"><?= e($group['label']) ?></a>
                <button type="button" @click="nest = !nest" :aria-expanded="nest.toString()" aria-expanded="false" class="mr-1 inline-flex size-9 items-center justify-center rounded-lg text-muted hover:bg-white hover:text-navy">
                  <span class="sr-only"><?= e($group['label']) ?> options</span>
                  <span :class="nest && 'rotate-180'" class="transition-transform duration-150"><?= icon('chevron-down', 'size-4') ?></span>
                </button>
              </div>
              <ul x-show="nest" x-cloak class="space-y-0.5 px-2 pb-2">
<?php foreach ($group['items'] as $href => $label): ?>
                <li><a href="<?= e($href) ?>"<?= $current($href) ?> class="block rounded-lg px-3 py-1.5 text-sm text-muted hover:bg-white hover:text-navy aria-[current=page]:text-navy"><?= e($label) ?></a></li>
<?php endforeach; ?>
              </ul>
            </div>
<?php endforeach; ?>
          </div>
        </li>
<?php else: ?>
        <li x-data="{ sub: <?= $inMenu($item) ? 'true' : 'false' ?> }">
          <button type="button" @click="sub = !sub" :aria-expanded="sub.toString()" aria-expanded="false" class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-muted hover:bg-mist">
            <?= e($item['label']) ?>
            <span :class="sub && 'rotate-180'" class="transition-transform duration-150"><?= icon('chevron-down', 'size-4') ?></span>
          </button>
          <div x-show="sub" x-cloak class="pb-2 pl-3">
            <ul>
<?php foreach ($item['items'] as $href => $label): ?>
              <li><a href="<?= e($href) ?>"<?= $current($href) ?> class="block rounded-lg px-3 py-2 text-sm text-muted hover:bg-mist hover:text-navy aria-[current=page]:text-navy"><?= e($label) ?></a></li>
<?php endforeach; ?>
            </ul>
          </div>
        </li>
<?php endif; ?>
<?php endforeach; ?>
        <li class="flex flex-col gap-2 pt-3">
          <a href="tel:<?= e(PHONE_E164) ?>" class="btn btn-secondary"><?= e(PHONE_DISPLAY) ?></a>
          <a href="/request-a-quote/" class="btn btn-primary">Get a quote</a>
        </li>
      </ul>
    </nav>
  </header>

  <main id="main">
