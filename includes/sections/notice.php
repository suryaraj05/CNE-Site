<?php $offer = ($s['tone'] ?? '') === 'offer'; ?>
    <aside<?= section_id($s) ?> aria-label="<?= e($s['label']) ?>" class="mx-auto max-w-6xl px-6">
      <a href="<?= e($s['href']) ?>" class="group flex flex-col gap-4 rounded-2xl border p-5 transition-colors sm:flex-row sm:items-center sm:gap-5 sm:p-6 <?= $offer ? 'border-navy/15 bg-mist hover:border-navy/30' : 'border-amber-200 bg-amber-50 hover:border-amber-300' ?>">
        <span class="flex size-11 shrink-0 items-center justify-center rounded-xl <?= $offer ? 'bg-navy text-white' : 'bg-amber-100 text-amber-700' ?>"><?= icon($offer ? 'tag' : 'bell') ?></span>
        <span class="min-w-0">
          <span class="block text-xs font-semibold tracking-[0.14em] uppercase <?= $offer ? 'text-navy' : 'text-amber-800' ?>"><?= e($s['label']) ?></span>
          <span class="mt-1 block text-[15px] leading-snug font-semibold text-ink sm:text-base"><?= e($s['text']) ?></span>
        </span>
        <span class="flex shrink-0 items-center gap-1.5 text-sm font-semibold text-navy sm:ml-auto"><?= e($s['link'] ?? 'Read more') ?> <span class="transition-transform duration-200 group-hover:translate-x-0.5"><?= icon('arrow-right', 'size-4') ?></span></span>
      </a>
    </aside>
