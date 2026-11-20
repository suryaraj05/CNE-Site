<?php
$quote     = !empty($s['quote']);
$primary   = $s['primary'] ?? ['Get a quote', $quote ? '#quote' : '/request-a-quote/'];
$secondary = $s['secondary'] ?? ['Talk to our team', 'tel:' . PHONE_E164];
$note      = $s['note'] ?? 'Reply within hours on working days · No-obligation quote';
$img       = $quote ? null : ($s['image'] ?? null);
$bg        = $s['background'] ?? null;
$dark      = !empty($s['dark']) || $bg;
$highlights = $s['highlights'] ?? ($quote ? [
    ['icon' => 'shield', 'label' => 'Customs declarations'],
    ['icon' => 'plane', 'label' => 'Air, sea & road freight'],
    ['icon' => 'box', 'label' => 'End-to-end support'],
] : []);
$bgPos     = $s['background_position'] ?? ($quote && $bg ? '52% 34%' : '60% 45%');
$layout    = match (true) {
    $quote && $dark => 'grid min-w-0 items-center gap-8 py-10 sm:gap-10 sm:py-12 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,24rem)] lg:gap-10 lg:py-14 xl:gap-14',
    $quote          => 'grid min-w-0 items-center gap-8 pt-10 pb-12 sm:pt-12 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,24rem)] lg:gap-10 xl:gap-14',
    (bool) $img     => 'grid items-start gap-8 pt-8 pb-10 sm:gap-10 sm:pt-10 sm:pb-12 lg:grid-cols-2 lg:gap-12 xl:gap-14',
    default         => 'pt-10 pb-12 sm:pt-12 sm:pb-14',
};
?>
    <section aria-labelledby="page-title" class="relative isolate overflow-hidden <?= $dark ? 'bg-ink' : 'bg-white' ?>">
<?php if ($dark): ?>
<?php if ($bg): ?>
      <?php
        $bgSrc = is_string($bg) ? $bg : ($bg['src'] ?? '');
        $bgAlt = is_array($bg) ? ($bg['alt'] ?? '') : '';
      ?>
      <img src="<?= e($bgSrc) ?>" alt="<?= e($bgAlt) ?>" fetchpriority="high" decoding="async" class="absolute inset-0 -z-20 size-full object-cover" style="object-position: <?= e($bgPos) ?>">
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 hero-bg-scrim"></div>
<?php else: ?>
      <div aria-hidden="true" class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,rgba(42,74,154,0.35),transparent_55%),radial-gradient(ellipse_at_bottom_left,rgba(255,255,255,0.08),transparent_50%)]"></div>
<?php endif; ?>
<?php endif; ?>
      <div class="shell <?= $layout ?>">
        <div<?= reveal($quote || $img ? 'right' : 'up', 80) ?> class="<?= $quote || $img ? 'min-w-0' : 'max-w-3xl' ?>">
<?php if ($page['breadcrumbs'] !== null): ?>
          <nav aria-label="Breadcrumb" class="mb-5 text-[13px] sm:mb-6 <?= $dark ? 'text-white/70' : 'text-muted' ?>">
            <ol class="flex flex-wrap items-center gap-x-2 gap-y-1">
              <li><a href="/" class="transition-colors <?= $dark ? 'hover:text-white' : 'hover:text-navy' ?>">Home</a></li>
<?php foreach ($page['breadcrumbs'] as [$label, $href]): ?>
              <li aria-hidden="true" class="<?= $dark ? 'text-white/30' : 'text-line' ?>">/</li>
              <li><a href="<?= e($href) ?>" class="transition-colors <?= $dark ? 'hover:text-white' : 'hover:text-navy' ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
              <li aria-hidden="true" class="<?= $dark ? 'text-white/30' : 'text-line' ?>">/</li>
              <li aria-current="page" class="font-medium <?= $dark ? 'text-white' : 'text-ink' ?>"><?= e($page['crumb'] ?? $s['title']) ?></li>
            </ol>
          </nav>
<?php endif; ?>
<?php if (!empty($s['eyebrow'])): ?>
          <p class="eyebrow <?= $dark ? 'eyebrow-light' : '' ?>"><?= e($s['eyebrow']) ?></p>
<?php endif; ?>
          <h1 id="page-title" class="<?= !empty($s['eyebrow']) ? 'mt-4' : 'mt-3' ?> <?= $quote ? 'heading-hero' : 'heading-section-lg' ?> max-w-xl <?= $dark ? 'text-white' : 'text-ink' ?>">
            <?= titled($s['title'], $s['accent'] ?? null, '', $s['accent_mode'] ?? 'mark') ?>
          </h1>
<?php if (!empty($s['lead'])): ?>
          <p class="lede mt-4 max-w-[34rem] <?= $dark ? 'text-white/85' : '' ?>"><?= e($s['lead']) ?></p>
<?php endif; ?>

<?php if ($highlights): ?>
          <ul class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-3 sm:gap-4 <?= $quote ? 'max-w-xl' : '' ?>">
<?php foreach ($highlights as $h): ?>
            <li class="flex min-w-0 items-center gap-2.5 sm:flex-col sm:items-start sm:gap-2.5">
              <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-full bg-lime/90 text-navy"><?= icon($h['icon'] ?? 'check', 'size-4') ?></span>
              <span class="text-[13px] leading-snug font-semibold sm:text-sm <?= $dark ? 'text-white' : 'text-ink' ?>"><?= e($h['label']) ?></span>
            </li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>

<?php if ($primary || $secondary): ?>
          <div class="<?= $img ? 'mt-7' : 'mt-9' ?> flex flex-wrap items-center gap-3">
<?php if ($primary): ?>
            <a href="<?= e($primary[1]) ?>" class="btn <?= $dark ? 'btn-on-dark' : 'btn-primary' ?>">
              <?= e($primary[0]) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
<?php endif; ?>
<?php if ($secondary): ?>
            <a href="<?= e($secondary[1]) ?>" class="btn <?= $dark ? 'btn-ghost' : 'btn-secondary' ?>">
<?php if (str_starts_with($secondary[1], 'tel:')): ?><?= icon('phone', 'size-4') ?><?php endif; ?>
              <?= e($secondary[0]) ?>
            </a>
<?php endif; ?>
          </div>
<?php endif; ?>

<?php if ($note): ?>
          <p class="mt-5 flex items-center gap-2 text-sm <?= $dark ? 'text-white/80' : 'text-muted' ?>">
            <?= icon('check', 'size-4 shrink-0 ' . ($dark ? 'text-lime' : 'text-navy')) ?>
            <?= e($note) ?>
          </p>
<?php endif; ?>
        </div>

<?php if ($quote) require __DIR__ . '/../quote-card.php'; ?>
<?php if ($img): ?>
        <div<?= reveal('left', 160) ?> class="relative lg:mt-1">
          <div aria-hidden="true" class="absolute -right-2 -bottom-3 left-[14%] top-[18%] -z-10 rounded-br-[2rem] rounded-tr-[1.25rem] bg-navy-700 [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)] sm:-right-3 sm:-bottom-4"></div>
          <div class="relative overflow-hidden rounded-br-[1.75rem] rounded-tr-[1rem] bg-mist [clip-path:polygon(12%_0,100%_0,100%_100%,0_100%)] sm:rounded-br-[2.25rem] sm:rounded-tr-[1.15rem]">
            <?= img_tag($img, 'aspect-[5/4] w-full object-cover object-center lg:aspect-[4/3]', true) ?>
          </div>
          <span aria-hidden="true" class="absolute bottom-3 left-[8%] h-3 w-[36%] -skew-x-[18deg] rounded-sm bg-lime"></span>
        </div>
<?php endif; ?>
      </div>
    </section>
