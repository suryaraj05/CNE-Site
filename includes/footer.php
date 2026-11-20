<?php
/**
 * Site footer — brand + link columns + contact card (ui-inspiration/13).
 */
$footerCols = [
    'Our expertise'   => $nav['expertise'],
    'Global services' => $nav['global'],
    'Locations'       => [
        '/locations/'                                   => 'All Locations',
        '/all-airports/'                                => 'All Airports',
        '/all-seaports/'                                => 'All Seaports',
        '/customs-clearance-services-in-newcastle/'     => 'Newcastle (NCL)',
        '/air-freight-london-heathrow/'                 => 'London Heathrow (LHR)',
        '/customs-clearances-in-manchester/'            => 'Manchester (MAN)',
        '/customs-clearance-port-of-tyne/'              => 'Port of Tyne',
        '/felixstowe-customs-clearance/'                => 'Felixstowe',
        '/customs-clearance-at-london-gateway-port/'    => 'London Gateway',
        '/sea-freight-newcastle-upon-tyne/'             => 'Sea Freight',
    ],
    'Company'         => [
        '/customs-clearance-logistics-newcastle-northeast-england/' => 'About Us',
        '/cargo-solutions-northeast-uk/'                            => 'Mission, Vision & Values',
        '/our-services/'                                            => 'Our Services',
        '/testimonials/'                                            => 'Testimonials',
        '/faqs/'                                                    => 'FAQs',
        '/blog/'                                                    => 'Industry Updates',
        '/track-your-shipment/'                                     => 'Track Your Shipment',
        '/contact/'                                                 => 'Contact',
    ],
];
$badges = ['bifa' => 'BIFA Member', 'iata' => 'IATA'];
?>
  </main>

  <footer class="relative overflow-hidden bg-mist-50">
    <!-- soft decorative washes -->
    <div aria-hidden="true" class="pointer-events-none absolute -top-24 right-[-8rem] h-[28rem] w-[28rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.38),transparent_68%)]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute -bottom-40 -left-28 h-[32rem] w-[32rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.32),transparent_70%)]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute bottom-0 left-1/2 h-[14rem] w-[70%] -translate-x-1/2 rounded-[100%] bg-[radial-gradient(ellipse,rgba(29,57,120,0.05),transparent_70%)]"></div>

    <div class="shell relative grid grid-cols-1 gap-10 py-10 sm:grid-cols-2 sm:py-12 lg:grid-cols-6 lg:gap-x-5 lg:gap-y-0 xl:gap-x-6">
      <!-- brand -->
      <div class="min-w-0 sm:col-span-2 lg:col-span-1">
        <a href="/" class="inline-flex items-center" aria-label="<?= e(SITE_NAME) ?> home">
<?php if ($logo = asset_img('logo')): ?>
          <img src="<?= e($logo) ?>" alt="<?= e(SITE_NAME) ?>" width="200" height="52" loading="lazy" class="h-11 w-auto lg:h-10 xl:h-12">
<?php else: ?>
          <span class="text-[17px] font-bold tracking-tight text-ink"><?= e(SITE_NAME) ?></span>
<?php endif; ?>
        </a>
        <p class="body-sm mt-4 text-[13px] leading-[1.65] lg:mt-3 xl:text-[14px]">
          Not just another logistics company. Built on dedication, reliability and innovation, we handle customs clearance and air, sea and road freight from Newcastle upon Tyne for businesses and families across the UK.
        </p>

        <div class="mt-5 flex items-center gap-2 lg:mt-4">
          <?= social_links('flex size-8 items-center justify-center rounded-[0.65rem] bg-white text-navy ring-1 ring-line transition-colors hover:bg-mist hover:text-navy-700') ?>
        </div>

        <ul class="mt-5 flex flex-wrap items-center gap-2 lg:mt-4" aria-label="Accreditations">
<?php foreach ($badges as $key => $label): ?>
<?php if ($src = asset_img($key)): ?>
          <li><img src="<?= e($src) ?>" alt="<?= e($label) ?>" loading="lazy" class="h-9 w-auto"></li>
<?php else: ?>
          <li class="inline-flex h-8 items-center gap-1.5 rounded-full bg-mist px-3 text-[11px] font-semibold text-navy ring-1 ring-line/80">
            <?= icon('award', 'size-3.5') ?><?= e($label) ?>
          </li>
<?php endif; ?>
<?php endforeach; ?>
        </ul>
      </div>

      <!-- link columns -->
<?php foreach ($footerCols as $title => $links): ?>
      <nav aria-label="<?= e($title) ?>" class="min-w-0">
        <p class="text-[13px] font-bold tracking-tight text-ink xl:text-[14px]">
          <?= e($title) ?>
          <span aria-hidden="true" class="accent-underline"></span>
        </p>
        <ul class="mt-4 space-y-2 text-[13px] xl:mt-5 xl:space-y-2.5 xl:text-[14px]">
<?php foreach ($links as $href => $label): ?>
          <li>
            <a href="<?= e($href) ?>" class="text-muted transition-colors hover:text-navy"><?= e($label) ?></a>
          </li>
<?php endforeach; ?>
        </ul>
      </nav>
<?php endforeach; ?>

      <!-- contact card -->
      <div class="card-surface min-w-0 rounded-[1.25rem] bg-[linear-gradient(160deg,var(--color-canvas)_0%,var(--color-mist)_100%)] p-4 sm:col-span-2 lg:col-span-1 lg:rounded-[1.35rem] lg:p-4 xl:p-5">
        <p class="text-[13px] font-bold tracking-tight text-ink xl:text-[14px]">
          Contact
          <span aria-hidden="true" class="accent-underline"></span>
        </p>
        <ul class="mt-4 space-y-3 text-[12px] xl:mt-5 xl:space-y-3.5 xl:text-[13px]">
          <li class="flex gap-2.5">
            <span class="mt-0.5 shrink-0 text-navy"><?= icon('map-pin', 'size-3.5') ?></span>
            <div>
              <p class="font-bold text-ink">UK office</p>
              <p class="mt-0.5 leading-snug text-muted"><?= e(ADDRESS['short']) ?>, <?= e(ADDRESS['postcode']) ?></p>
            </div>
          </li>
          <li class="flex gap-2.5">
            <span class="mt-0.5 shrink-0 text-navy"><?= icon('map-pin', 'size-3.5') ?></span>
            <div>
              <p class="font-bold text-ink">India office</p>
              <p class="mt-0.5 leading-snug text-muted"><?= e(INDIA_OFFICE['address']) ?></p>
            </div>
          </li>
          <li class="flex items-center gap-2.5">
            <span class="shrink-0 text-navy"><?= icon('phone', 'size-3.5') ?></span>
            <a href="tel:<?= e(PHONE_E164) ?>" class="font-bold text-ink transition-colors hover:text-navy"><?= e(PHONE_DISPLAY) ?></a>
          </li>
          <li class="flex items-center gap-2.5">
            <span class="shrink-0 text-navy"><?= icon('mail', 'size-3.5') ?></span>
            <a href="mailto:<?= e(EMAIL) ?>" class="break-all font-bold text-ink transition-colors hover:text-navy"><?= e(EMAIL) ?></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="relative border-t border-line/90">
      <div class="shell flex flex-col gap-3 py-5 text-[12px] leading-relaxed text-muted sm:flex-row sm:items-center sm:justify-between sm:py-6 sm:text-[13px]">
        <p>&copy; <?= date('Y') ?> <?= e(SITE_LEGAL_NAME) ?> &middot; Newcastle, UK &middot; Registered in England &amp; Wales, Company No. <?= e(COMPANY_NO) ?></p>
        <ul class="flex flex-wrap items-center gap-x-2 gap-y-1">
          <li>BIFA Member</li>
          <li aria-hidden="true">&middot;</li>
          <li>IATA</li>
          <li aria-hidden="true">&middot;</li>
          <li><a href="/terms-and-conditions/" class="transition-colors hover:text-navy">Terms</a></li>
          <li aria-hidden="true">&middot;</li>
          <li><a href="/privacy-policy/" class="transition-colors hover:text-navy">Privacy</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <a href="#" x-data="{ show: false }" @scroll.window.throttle.150ms="show = scrollY > 800" x-show="show" x-cloak x-transition.opacity
     class="fixed right-5 bottom-5 z-30 flex size-11 items-center justify-center rounded-full bg-navy text-white shadow-[0_12px_32px_-12px_rgba(29,57,120,0.65)] transition-[transform,background-color,box-shadow] duration-300 hover:-translate-y-0.5 hover:bg-navy-700 hover:shadow-[0_16px_36px_-12px_rgba(29,57,120,0.75)] focus-visible:ring-4 focus-visible:ring-navy/25 focus-visible:outline-none">
    <?= icon('arrow-up', 'size-5') ?><span class="sr-only">Back to top</span>
  </a>
</body>
</html>
