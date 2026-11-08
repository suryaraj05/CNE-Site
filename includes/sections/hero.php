<?php
$quote     = !empty($s['quote']);
$primary   = $s['primary'] ?? ['Get a quote', $quote ? '#quote' : '/request-a-quote/'];
$secondary = $s['secondary'] ?? ['Talk to our team', 'tel:' . PHONE_E164];
$note      = $s['note'] ?? 'Reply within hours on working days · No-obligation quote';
$img       = $quote ? null : ($s['image'] ?? null);
$bg        = $s['background'] ?? null;
$dark      = !empty($s['dark']) || $bg;
$layout    = match (true) {
    $quote && $dark => 'grid min-w-0 items-center gap-12 py-14 sm:py-20 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,420px)] lg:gap-14 lg:py-20 xl:gap-16',
    $quote          => 'grid min-w-0 items-center gap-12 pt-14 pb-14 sm:pt-20 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,420px)] lg:gap-14 lg:pt-20 xl:gap-16',
    (bool) $img     => 'grid items-center gap-12 pt-12 pb-16 sm:pt-16 sm:pb-20 lg:grid-cols-2 lg:gap-16',
    default         => 'pt-12 pb-16 sm:pt-16 sm:pb-20',
};
?>
    <section aria-labelledby="page-title" class="relative isolate overflow-hidden <?= $dark ? 'bg-ink' : 'bg-white' ?>">
<?php if ($dark): ?>
<?php if ($bg): ?>
      <?= img_tag(is_string($bg) ? ['src' => $bg] : $bg, 'absolute inset-0 -z-20 size-full object-cover object-[57%_50%]', true) ?>
      <div aria-hidden="true" class="absolute inset-0 -z-10 bg-[linear-gradient(105deg,rgba(26,31,46,0.94)_0%,rgba(26,45,110,0.88)_34%,rgba(36,62,149,0.45)_58%,rgba(36,62,149,0.12)_100%)] max-lg:bg-ink/85"></div>
<?php else: ?>
      <div aria-hidden="true" class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,rgba(58,86,176,0.28),transparent_55%),radial-gradient(ellipse_at_bottom_left,rgba(255,255,255,0.08),transparent_50%)]"></div>
<?php endif; ?>
<?php endif; ?>
      <div class="mx-auto max-w-7xl px-6 lg:px-10 <?= $layout ?>">
        <div<?= reveal($quote || $img ? 'right' : 'up', 80) ?> class="<?= $quote || $img ? '' : 'max-w-3xl' ?><?= $bg ? ' [&>h1,&>p]:[text-shadow:0_1px_18px_rgba(12,18,57,0.75)]' : '' ?>">
<?php if ($page['breadcrumbs'] !== null): ?>
          <nav aria-label="Breadcrumb" class="mb-8 text-[13px] <?= $dark ? 'text-white/70' : 'text-muted' ?>">
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
          <p class="text-[13px] font-medium <?= $dark ? 'text-white/75' : 'text-navy/80' ?>"><?= e($s['eyebrow']) ?></p>
          <span aria-hidden="true" class="mt-3 block h-px w-9 <?= $dark ? 'bg-white/35' : 'bg-navy/35' ?>"></span>
<?php endif; ?>
          <h1 id="page-title" class="<?= !empty($s['eyebrow']) ? 'mt-5' : 'mt-4' ?> text-[2.5rem] leading-[1.08] font-bold tracking-[-0.03em] text-balance sm:text-5xl <?= $dark ? 'text-white' : 'text-ink' ?> <?= $quote ? 'lg:text-[3.5rem]' : 'lg:text-[3.25rem]' ?>"><?= e($s['title']) ?></h1>
<?php if (!empty($s['lead'])): ?>
          <p class="mt-6 max-w-[36rem] text-lg leading-relaxed <?= $dark ? 'text-white/85' : 'text-muted' ?>"><?= e($s['lead']) ?></p>
<?php endif; ?>

<?php if ($primary || $secondary): ?>
          <div class="mt-9 flex flex-wrap items-center gap-3">
<?php if ($primary): ?>
            <a href="<?= e($primary[1]) ?>" class="btn <?= $dark ? 'btn-on-dark' : 'btn-primary' ?>">
              <?= e($primary[0]) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
<?php endif; ?>
<?php if ($secondary): ?>
            <a href="<?= e($secondary[1]) ?>" class="btn <?= $dark ? 'btn-ghost' : 'btn-secondary' ?>"><?= e($secondary[0]) ?></a>
<?php endif; ?>
          </div>
<?php endif; ?>

<?php if ($note): ?>
          <p class="mt-6 flex items-center gap-2 text-sm <?= $dark ? 'text-white/80' : 'text-muted' ?>">
            <?= icon('check', 'size-4 shrink-0 ' . ($dark ? 'text-white' : 'text-navy')) ?>
            <?= e($note) ?>
          </p>
<?php endif; ?>
        </div>

<?php if ($quote) require __DIR__ . '/../quote-card.php'; ?>
<?php if ($img): ?>
        <div<?= reveal('left', 160) ?>><?= img_tag($img, 'aspect-[4/3] w-full rounded-2xl object-cover', true) ?></div>
<?php endif; ?>
      </div>
    </section>
