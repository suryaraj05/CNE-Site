<?php
$quote     = !empty($s['quote']);
$primary   = $s['primary'] ?? ['Get a quote', $quote ? '#quote' : '/request-a-quote/'];
$secondary = $s['secondary'] ?? ['Talk to our team', 'tel:' . PHONE_E164];
$note      = $s['note'] ?? 'Reply within hours on working days · No-obligation quote';
$img       = $quote ? null : ($s['image'] ?? null);
$bg        = $s['background'] ?? null;
$dark      = !empty($s['dark']) || $bg;
$layout    = match (true) {
    $quote && $dark => 'grid items-center gap-12 py-14 sm:py-20 lg:grid-cols-[minmax(0,1fr)_440px] lg:gap-12 lg:py-20 xl:gap-16',
    $quote          => 'grid items-center gap-12 pt-14 pb-14 sm:pt-20 lg:grid-cols-[minmax(0,1fr)_440px] lg:gap-12 lg:pt-20 xl:gap-16',
    (bool) $img     => 'grid items-center gap-12 pt-12 pb-16 sm:pt-16 sm:pb-20 lg:grid-cols-2 lg:gap-16',
    default         => 'pt-12 pb-16 sm:pt-16 sm:pb-20',
};
?>
    <section aria-labelledby="page-title" class="relative isolate overflow-hidden <?= $dark ? 'bg-ink' : 'bg-white' ?>">
<?php if ($dark): ?>
<?php if ($bg): ?>
      <?= img_tag(is_string($bg) ? ['src' => $bg] : $bg, 'absolute inset-0 -z-20 size-full object-cover object-[57%_50%]', true) ?>
      <div aria-hidden="true" class="absolute inset-0 -z-10 bg-ink/80 lg:bg-transparent lg:bg-[linear-gradient(90deg,rgba(15,26,61,0.92)_0%,rgba(15,26,61,0.8)_32%,rgba(15,26,61,0.25)_52%,rgba(15,26,61,0.1)_100%)]"></div>
<?php else: ?>
      <div aria-hidden="true" class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,rgba(96,165,250,0.18),transparent_60%)]"></div>
<?php endif; ?>
<?php endif; ?>
      <div class="mx-auto max-w-6xl px-6 <?= $layout ?>">
        <div class="<?= $quote || $img ? '' : 'max-w-3xl' ?><?= $bg ? ' [&>h1,&>p]:[text-shadow:0_1px_18px_rgba(15,26,61,0.75)]' : '' ?>">
<?php if ($page['breadcrumbs'] !== null): ?>
          <nav aria-label="Breadcrumb" class="mb-8 text-[13px] <?= $dark ? 'text-blue-100/70' : 'text-muted' ?>">
            <ol class="flex flex-wrap items-center gap-x-2 gap-y-1">
              <li><a href="/" class="transition-colors <?= $dark ? 'hover:text-white' : 'hover:text-navy' ?>">Home</a></li>
<?php foreach ($page['breadcrumbs'] as [$label, $href]): ?>
              <li aria-hidden="true" class="<?= $dark ? 'text-white/30' : 'text-slate-300' ?>">/</li>
              <li><a href="<?= e($href) ?>" class="transition-colors <?= $dark ? 'hover:text-white' : 'hover:text-navy' ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
              <li aria-hidden="true" class="<?= $dark ? 'text-white/30' : 'text-slate-300' ?>">/</li>
              <li aria-current="page" class="font-medium <?= $dark ? 'text-white' : 'text-ink' ?>"><?= e($page['crumb'] ?? $s['title']) ?></li>
            </ol>
          </nav>
<?php endif; ?>
<?php if (!empty($s['eyebrow'])): ?>
          <p class="text-xs font-semibold tracking-[0.14em] uppercase <?= $dark ? 'text-blue-200' : 'text-navy' ?>"><?= e($s['eyebrow']) ?></p>
<?php endif; ?>
          <h1 id="page-title" class="mt-4 text-[2.5rem] leading-[1.08] font-bold tracking-[-0.03em] text-balance sm:text-5xl <?= $dark ? 'text-white' : 'text-ink' ?> <?= $quote ? 'lg:text-[3.5rem]' : 'lg:text-[3.25rem]' ?>"><?= e($s['title']) ?></h1>
<?php if (!empty($s['lead'])): ?>
          <p class="mt-6 max-w-[36rem] text-lg leading-relaxed <?= $dark ? 'text-blue-100/85' : 'text-muted' ?>"><?= e($s['lead']) ?></p>
<?php endif; ?>

<?php if ($primary || $secondary): ?>
          <div class="mt-9 flex flex-wrap items-center gap-3">
<?php if ($primary): ?>
            <a href="<?= e($primary[1]) ?>" class="inline-flex h-12 items-center gap-3 rounded-lg px-7 text-[15px] font-semibold shadow-sm transition-colors focus-visible:ring-4 focus-visible:outline-none <?= $dark ? 'bg-white text-navy hover:bg-mist focus-visible:ring-white/30' : 'bg-navy text-white hover:bg-navy-700 focus-visible:ring-navy/20' ?>">
              <?= e($primary[0]) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
<?php endif; ?>
<?php if ($secondary): ?>
            <a href="<?= e($secondary[1]) ?>" class="inline-flex h-12 items-center rounded-lg border px-6 text-[15px] font-semibold transition-colors focus-visible:ring-4 focus-visible:outline-none <?= $dark ? 'border-white/30 bg-ink/40 text-white backdrop-blur-sm hover:border-white/50 hover:bg-white/10 focus-visible:ring-white/20' : 'border-line bg-white text-ink hover:border-navy/30 hover:bg-mist-50 focus-visible:ring-navy/15' ?>"><?= e($secondary[0]) ?></a>
<?php endif; ?>
          </div>
<?php endif; ?>

<?php if ($note): ?>
          <p class="mt-6 flex items-center gap-2 text-sm <?= $dark ? 'text-blue-100/80' : 'text-muted' ?>">
            <?= icon('check', 'size-4 shrink-0 ' . ($dark ? 'text-emerald-400' : 'text-emerald-600')) ?>
            <?= e($note) ?>
          </p>
<?php endif; ?>
        </div>

<?php if ($quote) require __DIR__ . '/../quote-card.php'; ?>
<?php if ($img): ?>
        <?= img_tag($img, 'aspect-[4/3] w-full rounded-2xl object-cover', true) ?>
<?php endif; ?>
      </div>
    </section>
