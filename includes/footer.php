<?php
$footerCols = [
    'Our expertise'   => $nav['expertise'],
    'Global services' => $nav['global'] + ['/all-airports/' => 'UK airports', '/all-seaports/' => 'UK seaports'],
    'Company'         => $nav['company'],
];
$badges = ['bifa' => 'BIFA Member', 'iata' => 'IATA'];
?>
  </main>

  <footer class="border-t border-line bg-white">
    <div class="mx-auto grid max-w-6xl gap-12 px-6 py-16 lg:grid-cols-[minmax(0,1.3fr)_repeat(3,minmax(0,1fr))]">
      <div>
        <a href="/" class="flex items-center gap-2.5 text-[17px] font-bold tracking-tight text-ink" aria-label="<?= e(SITE_NAME) ?> home">
<?php if ($logo = asset_img('logo')): ?>
          <img src="<?= e($logo) ?>" alt="" loading="lazy" class="h-11 w-auto">
<?php else: ?>
          <svg class="size-8 shrink-0" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="14.5" stroke="#172B75" stroke-width="1.6"/><g stroke="#172B75" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8.5 22.5 12v8L16 23.5 9.5 20v-8L16 8.5Z"/><path d="M9.5 12 16 15.5 22.5 12M16 15.5v8"/></g></svg>
          <?= e(SITE_NAME) ?>
<?php endif; ?>
        </a>
        <p class="mt-4 max-w-xs text-sm leading-relaxed text-muted">Not just another logistics company. Built on dedication, reliability and innovation, we handle customs clearance and air, sea and road freight from Newcastle upon Tyne for businesses and families across the UK.</p>
        <div class="mt-6 space-y-4 text-sm">
          <address class="not-italic">
            <span class="block font-semibold text-ink">UK office</span>
            <span class="text-muted"><?= e(ADDRESS['short']) ?>, <?= e(ADDRESS['postcode']) ?></span><br>
            <a href="tel:<?= e(PHONE_E164) ?>" class="text-muted transition-colors hover:text-navy"><?= e(PHONE_DISPLAY) ?></a> &middot;
            <a href="mailto:<?= e(EMAIL) ?>" class="text-muted transition-colors hover:text-navy"><?= e(EMAIL) ?></a>
          </address>
          <address class="not-italic">
            <span class="block font-semibold text-ink">India office</span>
            <span class="text-muted"><?= e(INDIA_OFFICE['address']) ?></span><br>
            <a href="tel:<?= e(INDIA_OFFICE['phone_e164']) ?>" class="text-muted transition-colors hover:text-navy"><?= e(INDIA_OFFICE['phone_display']) ?></a>
          </address>
        </div>
        <div class="mt-6 flex items-center gap-2">
          <?= social_links('flex size-9 items-center justify-center rounded-lg border border-line text-muted transition-colors hover:border-navy/30 hover:text-navy') ?>
        </div>
        <ul class="mt-6 flex flex-wrap items-center gap-3" aria-label="Accreditations">
<?php foreach ($badges as $key => $label): ?>
<?php if ($src = asset_img($key)): ?>
          <li><img src="<?= e($src) ?>" alt="<?= e($label) ?>" loading="lazy" class="h-11 w-auto"></li>
<?php else: ?>
          <li class="inline-flex h-9 items-center gap-1.5 rounded-lg bg-mist px-3 text-xs font-semibold text-navy"><?= icon('award', 'size-4') ?><?= e($label) ?></li>
<?php endif; ?>
<?php endforeach; ?>
        </ul>
      </div>
<?php foreach ($footerCols as $title => $links): ?>
      <nav aria-label="<?= e($title) ?>">
        <p class="text-[13px] font-semibold text-ink"><?= e($title) ?></p>
        <ul class="mt-4 space-y-2.5 text-sm">
<?php foreach ($links as $href => $label): ?>
          <li><a href="<?= e($href) ?>" class="text-muted transition-colors hover:text-navy"><?= e($label) ?></a></li>
<?php endforeach; ?>
        </ul>
      </nav>
<?php endforeach; ?>
    </div>

    <div class="border-t border-line">
      <div class="mx-auto flex max-w-6xl flex-col gap-3 px-6 py-6 text-xs leading-relaxed text-muted sm:flex-row sm:items-center sm:justify-between">
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
     class="fixed right-5 bottom-5 z-30 flex size-11 items-center justify-center rounded-full bg-navy text-white shadow-[0_12px_32px_-12px_rgba(23,43,117,0.6)] transition-colors hover:bg-navy-700 focus-visible:ring-4 focus-visible:ring-navy/25 focus-visible:outline-none">
    <?= icon('arrow-up', 'size-5') ?><span class="sr-only">Back to top</span>
  </a>
</body>
</html>
