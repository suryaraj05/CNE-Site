    <section<?= section_id($s + ['id' => 'faq']) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <?php section_heading($s + ['eyebrow' => 'Frequently asked']); ?>
      <div class="mt-10 space-y-3">
<?php foreach ($s['items'] as $i => $item): ?>
        <details class="group rounded-xl border border-line bg-white px-6 open:shadow-[0_12px_32px_-28px_rgba(23,43,117,0.5)]"<?= $i === 0 ? ' open' : '' ?>>
          <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-[15px] font-semibold text-ink [&::-webkit-details-marker]:hidden">
            <?= e($item['q']) ?>
            <span class="shrink-0 text-muted transition-transform duration-200 group-open:rotate-180"><?= icon('chevron-down', 'size-4') ?></span>
          </summary>
          <p class="-mt-1 pb-5 text-sm leading-relaxed text-muted"><?= e($item['a']) ?></p>
        </details>
<?php endforeach; ?>
      </div>
    </section>
