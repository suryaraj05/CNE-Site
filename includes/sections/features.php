<?php
$grid = [
    2 => 'sm:grid-cols-2',
    3 => 'sm:grid-cols-2 lg:grid-cols-3',
    4 => 'sm:grid-cols-2 lg:grid-cols-4',
    5 => 'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
][$s['columns'] ?? 2];
$dark = !empty($s['dark']);
$cols = (int) ($s['columns'] ?? 2);
$split = !empty($s['split']);
$showcase = !empty($s['showcase']) || (($s['id'] ?? '') === 'services');
$surface = $s['surface'] ?? null;
$align = $showcase || $split ? 'left' : ((!empty($s['center']) || $cols >= 3) ? 'center' : 'left');
$sectionBg = $dark
    ? 'overflow-hidden bg-ink py-12 sm:py-14'
    : (($showcase || $split || $surface === 'white')
        ? 'section-y overflow-hidden bg-white'
        : 'section-y bg-mist-50');
?>
    <section<?= section_id($s) ?> class="relative scroll-mt-28 <?= $sectionBg ?>">
<?php if ($dark): ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_70%_60%_at_0%_0%,rgba(42,74,154,0.4),transparent_55%),radial-gradient(ellipse_55%_50%_at_100%_100%,rgba(158,194,240,0.12),transparent_50%)]"></div>
<?php elseif ($showcase): ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-[22rem] bg-[radial-gradient(ellipse_80%_70%_at_85%_20%,rgba(232,237,246,0.95),transparent_60%)]"></div>
<?php endif; ?>
      <div class="shell relative">
<?php if ($split): ?>
        <div<?= reveal('up') ?> class="grid items-center gap-8 lg:grid-cols-[minmax(0,1.15fr)_1px_minmax(0,0.85fr)] lg:gap-10">
          <div>
<?php if (!empty($s['eyebrow'])): ?>
            <p class="eyebrow"><?= e($s['eyebrow']) ?></p>
<?php endif; ?>
<?php if (!empty($s['title'])): ?>
            <h2 class="<?= !empty($s['eyebrow']) ? 'mt-5' : '' ?>">
              <?= titled($s['title'], $s['accent'] ?? null, 'block text-[2rem] leading-[1.12] font-bold tracking-[-0.03em] text-balance text-ink sm:text-[2.55rem] lg:text-[2.75rem]') ?>
            </h2>
<?php endif; ?>
          </div>
          <div aria-hidden="true" class="hidden h-full min-h-[5.5rem] bg-line lg:block"></div>
<?php if (!empty($s['intro'])): ?>
          <p class="max-w-md text-[15px] leading-relaxed text-muted sm:text-base lg:pt-2"><?= e($s['intro']) ?></p>
<?php endif; ?>
        </div>
<?php elseif ($showcase): ?>
        <div class="grid items-end gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)] lg:gap-12">
          <div>
            <?php section_heading($s, 'left', $dark); ?>
          </div>
          <div aria-hidden="true" class="relative hidden min-h-[11rem] lg:block">
            <svg class="absolute inset-0 size-full text-navy/15" viewBox="0 0 520 200" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g fill="currentColor" opacity="0.55">
<?php for ($y = 18; $y <= 180; $y += 14): for ($x = 12; $x <= 508; $x += 14): ?>
                <circle cx="<?= $x + (($y / 14) % 2) * 7 ?>" cy="<?= $y ?>" r="1.35"/>
<?php endfor; endfor; ?>
              </g>
              <path d="M48 128 C140 40, 250 40, 340 88 S470 150, 500 118" stroke="currentColor" stroke-width="1.6" stroke-dasharray="5 7" class="text-navy/45" opacity="0.9"/>
              <circle cx="120" cy="78" r="5" class="fill-navy/70"/>
              <circle cx="320" cy="92" r="5" class="fill-navy/70"/>
              <circle cx="455" cy="132" r="5" class="fill-navy/70"/>
            </svg>
            <span class="absolute top-[2.4rem] left-[5.5rem] inline-flex size-11 items-center justify-center rounded-full bg-white text-navy shadow-[0_12px_30px_-14px_rgba(26,54,115,0.45)] ring-1 ring-navy/10"><?= icon('plane', 'size-5') ?></span>
            <span class="absolute top-[7.2rem] right-[4.5rem] inline-flex size-11 items-center justify-center rounded-full bg-white text-navy shadow-[0_12px_30px_-14px_rgba(26,54,115,0.45)] ring-1 ring-navy/10"><?= icon('ship', 'size-5') ?></span>
            <span class="absolute bottom-2 left-[42%] size-3 rounded-full bg-lime"></span>
          </div>
        </div>
<?php elseif ($align === 'center' && !empty($s['intro'])): ?>
        <div class="mx-auto max-w-3xl text-center">
          <?php section_heading($s, 'center', $dark); ?>
        </div>
<?php else: ?>
        <?php section_heading($s, $align, $dark); ?>
<?php endif; ?>

<?php if ($split): ?>
      <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
<?php foreach ($s['items'] as $i => $item): $link = !empty($item['href']); ?>
        <li<?= reveal('up', min(40 + $i * 60, 280)) ?> class="<?= $link ? 'group relative' : '' ?> flex h-full min-h-[11.5rem] overflow-hidden rounded-[1.35rem] bg-white ring-1 ring-navy/[0.06] shadow-[0_18px_48px_-36px_rgba(26,54,115,0.4)]">
<?php if (!empty($item['image'])): ?>
          <div class="relative w-[44%] shrink-0 self-stretch overflow-hidden [clip-path:polygon(0_0,100%_0,82%_100%,0_100%)] sm:w-[46%]">
            <?= img_tag(is_string($item['image']) ? ['src' => $item['image'], 'alt' => $item['title']] : $item['image'], 'absolute inset-0 size-full object-cover transition-transform duration-700 group-hover:scale-[1.05]') ?>
            <span aria-hidden="true" class="absolute right-[14%] bottom-0 size-4 bg-lime [clip-path:polygon(100%_0,100%_100%,0_100%)] sm:size-5"></span>
          </div>
<?php endif; ?>
          <div class="flex min-w-0 flex-1 flex-col justify-center py-4 pr-4 pl-3 sm:py-5 sm:pr-5 sm:pl-2">
            <span class="mb-2.5 inline-flex size-8 items-center justify-center text-navy"><?= icon($item['icon'] ?? 'box', 'size-5') ?></span>
            <h3 class="text-[15px] font-bold tracking-tight text-ink sm:text-base">
<?php if ($link): ?>
              <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
              <?= e($item['title']) ?>
<?php endif; ?>
            </h3>
            <p class="mt-1.5 flex-1 text-[13px] leading-relaxed text-muted sm:text-sm"><?= e($item['text']) ?></p>
<?php if ($link): ?>
            <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-navy" aria-hidden="true">
              Learn more
              <span class="transition-transform duration-300 group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
            </span>
<?php endif; ?>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
<?php else: ?>
      <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 sm:gap-6 <?= $grid ?>">
<?php foreach ($s['items'] as $i => $item): $link = !empty($item['href']); ?>
        <li<?= reveal('up', min(40 + $i * 70, 320)) ?> class="<?= $link ? 'group relative' : '' ?> flex h-full flex-col overflow-hidden rounded-[1.35rem] <?= $dark
            ? 'bg-white/[0.07] ring-1 ring-white/15 shadow-none'
            : ($showcase
                ? 'bg-white shadow-[0_18px_50px_-34px_rgba(26,54,115,0.4)] ring-1 ring-navy/[0.05]'
                : 'bg-white ring-1 ring-navy/[0.06] shadow-[0_16px_40px_-32px_rgba(26,54,115,0.3)]') ?>">
<?php if (!empty($item['image'])): ?>
          <div class="relative overflow-hidden">
            <?= img_tag(is_string($item['image']) ? ['src' => $item['image'], 'alt' => $item['title']] : $item['image'], ($showcase ? 'aspect-[16/11]' : 'aspect-[5/3]') . ' w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-[1.04]') ?>
<?php if (!empty($item['icon'])): ?>
            <span class="absolute -bottom-5 left-5 z-10 inline-flex size-11 items-center justify-center rounded-xl border border-navy/10 bg-white text-navy shadow-[0_10px_24px_-12px_rgba(26,54,115,0.45)]"><?= icon($item['icon'], 'size-5') ?></span>
<?php endif; ?>
          </div>
<?php else: ?>
          <span class="mx-5 mt-5 inline-flex size-10 items-center justify-center rounded-xl <?= $dark ? 'bg-lime/90 text-navy' : 'bg-mist text-navy ring-1 ring-navy/[0.06]' ?>"><?= icon($item['icon'] ?? 'box', 'size-5') ?></span>
<?php endif; ?>
          <div class="flex flex-1 flex-col p-5 sm:p-6 <?= !empty($item['image']) ? 'pt-8' : 'pt-4' ?>">
            <h3 class="text-[1.05rem] font-bold tracking-tight <?= $dark ? 'text-white' : 'text-ink' ?>">
<?php if ($link): ?>
              <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
              <?= e($item['title']) ?>
<?php endif; ?>
            </h3>
            <p class="mt-2.5 flex-1 text-[14px] leading-relaxed <?= $dark ? 'text-white/75' : 'text-muted' ?>"><?= e($item['text']) ?></p>
<?php if ($link): ?>
            <span class="mt-5 inline-flex size-9 items-center justify-center self-end rounded-full transition-transform duration-300 group-hover:translate-x-0.5 <?= $dark ? 'bg-white/10 text-white group-hover:bg-lime group-hover:text-navy' : 'bg-mist text-navy group-hover:bg-navy group-hover:text-white' ?>" aria-hidden="true">
              <?= icon('arrow-right', 'size-4') ?>
            </span>
<?php endif; ?>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
<?php endif; ?>
      </div>
    </section>
