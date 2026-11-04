<?php
$grid = [
    2 => 'sm:grid-cols-2',
    3 => 'sm:grid-cols-2 lg:grid-cols-3',
    4 => 'sm:grid-cols-2 lg:grid-cols-4',
    5 => 'sm:grid-cols-2 lg:grid-cols-5',
][$s['columns'] ?? 2];
$dark = !empty($s['dark']);
?>
    <section<?= section_id($s) ?> class="scroll-mt-28 <?= $dark ? 'bg-navy py-20 sm:py-24' : '' ?>">
      <div class="mx-auto max-w-6xl px-6">
      <?php section_heading($s, 'left', $dark); ?>
      <ul class="mt-10 grid gap-5 <?= $grid ?>">
<?php foreach ($s['items'] as $item): $link = !empty($item['href']); ?>
        <li class="<?= $link ? 'group relative' : '' ?> flex flex-col overflow-hidden rounded-2xl border p-7 transition-[border-color,box-shadow,background-color] duration-200 <?= $dark ? 'border-white/10 bg-white/[0.04]' : 'border-line bg-white' ?> <?= $link ? ($dark ? 'hover:border-white/25 hover:bg-white/[0.07]' : 'hover:border-navy/25 hover:shadow-[0_16px_40px_-24px_rgba(23,43,117,0.35)]') : '' ?>">
<?php if (!empty($item['image'])): ?>
          <?= img_tag($item['image'], '-mx-7 -mt-7 mb-1 aspect-[16/10] w-[calc(100%+3.5rem)] max-w-none object-cover') ?>
<?php else: ?>
          <span class="flex size-10 items-center justify-center rounded-lg <?= $dark ? 'bg-white/10 text-white' : 'bg-mist text-navy' ?>"><?= icon($item['icon'] ?? 'box') ?></span>
<?php endif; ?>
          <h3 class="mt-5 text-lg font-bold tracking-tight <?= $dark ? 'text-white' : 'text-ink' ?>">
<?php if ($link): ?>
            <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 after:rounded-2xl focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
            <?= e($item['title']) ?>
<?php endif; ?>
          </h3>
          <p class="mt-2 text-sm leading-relaxed <?= $dark ? 'text-blue-100/75' : 'text-muted' ?>"><?= e($item['text']) ?></p>
<?php if ($link): ?>
          <span class="mt-auto flex items-center gap-1.5 pt-5 text-sm font-semibold <?= $dark ? 'text-white' : 'text-navy' ?>" aria-hidden="true">Learn more <span class="transition-transform duration-200 group-hover:translate-x-0.5"><?= icon('arrow-right', 'size-4') ?></span></span>
<?php endif; ?>
        </li>
<?php endforeach; ?>
      </ul>
      </div>
    </section>
