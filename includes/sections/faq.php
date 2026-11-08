    <section<?= section_id($s + ['id' => 'faq']) ?> class="mx-auto max-w-3xl scroll-mt-28 px-6 lg:px-10">
      <?php section_heading($s + ['eyebrow' => 'Frequently asked'], 'center'); ?>
      <div class="mt-12 divide-y divide-line/80 border-y border-line/80">
<?php foreach ($s['items'] as $i => $item): ?>
        <details<?= reveal('up', min(40 + $i * 50, 220)) ?> class="group"<?= $i === 0 ? ' open' : '' ?>>
          <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[15px] font-semibold text-ink transition-colors hover:text-navy [&::-webkit-details-marker]:hidden">
            <?= e($item['q']) ?>
            <span class="shrink-0 text-muted transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-open:rotate-180"><?= icon('chevron-down', 'size-4') ?></span>
          </summary>
          <p class="pb-5 text-[15px] leading-relaxed text-muted"><?= e($item['a']) ?></p>
        </details>
<?php endforeach; ?>
      </div>
    </section>
