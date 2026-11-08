<?php
$grid = [
    2 => 'sm:grid-cols-2',
    3 => 'sm:grid-cols-2 lg:grid-cols-3',
    4 => 'sm:grid-cols-2 lg:grid-cols-4',
    5 => 'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
][$s['columns'] ?? 2];
$dark = !empty($s['dark']);
$cols = (int) ($s['columns'] ?? 2);
$align = $cols >= 3 ? 'center' : 'left';
?>
    <section<?= section_id($s) ?> class="relative scroll-mt-28 <?= $dark ? 'overflow-hidden bg-ink py-20 sm:py-28' : 'bg-white/70 py-16 sm:py-20' ?>">
<?php if ($dark): ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_70%_60%_at_0%_0%,rgba(58,86,176,0.4),transparent_55%),radial-gradient(ellipse_55%_50%_at_100%_100%,rgba(255,255,255,0.08),transparent_50%),linear-gradient(180deg,rgba(26,31,46,1),rgba(26,45,110,0.92))]"></div>
<?php else: ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(36,62,149,0.05),transparent_55%)]"></div>
<?php endif; ?>
      <div class="relative mx-auto max-w-7xl px-6 lg:px-10">
      <?php section_heading($s, $align, $dark); ?>
      <ul class="mt-14 grid items-stretch gap-x-6 gap-y-8 sm:gap-x-8 sm:gap-y-10 <?= $grid ?>">
<?php foreach ($s['items'] as $i => $item): $link = !empty($item['href']); ?>
        <li<?= reveal('up', min(40 + $i * 70, 320)) ?> class="<?= $link ? 'group relative' : '' ?> flex h-full flex-col <?= $dark ? '' : 'rounded-2xl bg-shade/90 p-5 ring-1 ring-navy/[0.06] sm:p-6' ?>">
<?php if (!empty($item['image'])): ?>
          <div class="overflow-hidden rounded-xl <?= $dark ? 'ring-1 ring-white/10' : 'ring-1 ring-navy/[0.05]' ?>">
            <?= img_tag(is_string($item['image']) ? ['src' => $item['image'], 'alt' => $item['title']] : $item['image'], 'aspect-[5/3] w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-[1.04]') ?>
          </div>
<?php else: ?>
          <span class="mb-1 inline-flex size-9 items-center justify-center text-navy <?= $dark ? 'text-white/70' : '' ?>"><?= icon($item['icon'] ?? 'box', 'size-6') ?></span>
<?php endif; ?>
          <h3 class="mt-5 text-lg font-bold tracking-tight <?= $dark ? 'text-white' : 'text-ink' ?>">
<?php if ($link): ?>
            <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
            <?= e($item['title']) ?>
<?php endif; ?>
          </h3>
          <p class="mt-2 flex-1 text-[15px] leading-relaxed <?= $dark ? 'text-white/70' : 'text-muted' ?>"><?= e($item['text']) ?></p>
<?php if ($link): ?>
          <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold <?= $dark ? 'text-white/80' : 'text-navy' ?>" aria-hidden="true">
            <span class="border-b border-current/30 transition-[border-color] duration-300 group-hover:border-current">Learn more</span>
            <span class="transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
          </span>
<?php endif; ?>
        </li>
<?php endforeach; ?>
      </ul>
      </div>
    </section>
