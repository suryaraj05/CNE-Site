<?php $offer = ($s['tone'] ?? '') === 'offer'; ?>
    <aside<?= section_id($s) ?> aria-label="<?= e($s['label']) ?>" class="mx-auto max-w-7xl px-6 lg:px-10">
      <a href="<?= e($s['href']) ?>"<?= reveal('up') ?> class="group flex flex-col gap-3 border-y py-5 transition-colors sm:flex-row sm:items-baseline sm:gap-8 sm:py-6 <?= $offer ? 'border-navy/15 hover:border-navy/35' : 'border-navy/20 hover:border-navy/40' ?>">
        <span class="shrink-0 text-[13px] font-medium <?= $offer ? 'text-navy' : 'text-navy' ?>"><?= e($s['label']) ?></span>
        <span class="min-w-0 flex-1 text-[15px] leading-snug text-ink sm:text-base"><?= e($s['text']) ?></span>
        <span class="flex shrink-0 items-center gap-1.5 text-sm font-semibold text-navy">
          <span class="border-b border-navy/25 transition-[border-color] duration-300 group-hover:border-navy"><?= e($s['link'] ?? 'Read more') ?></span>
          <span class="transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
        </span>
      </a>
    </aside>
