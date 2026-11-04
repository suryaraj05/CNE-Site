    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <div class="grid gap-10 rounded-2xl bg-mist px-7 py-10 sm:px-12 sm:py-12 lg:grid-cols-[minmax(0,1fr)_320px] lg:items-start">
        <div>
          <?php section_heading($s); ?>
          <div class="mt-5 space-y-4 text-[15px] leading-relaxed text-muted">
<?php foreach ($s['paragraphs'] ?? [] as $p): ?>
            <p><?= e($p) ?></p>
<?php endforeach; ?>
          </div>
        </div>
<?php if (!empty($s['checklist'])): ?>
        <ul class="space-y-3.5 rounded-xl bg-white p-6 text-sm font-semibold text-ink shadow-[0_12px_32px_-24px_rgba(23,43,117,0.4)]">
<?php foreach ($s['checklist'] as $item): ?>
          <li class="flex items-start gap-3"><?= icon('check', 'mt-0.5 size-4 shrink-0 text-navy') ?><?= e($item) ?></li>
<?php endforeach; ?>
        </ul>
<?php endif; ?>
      </div>
    </section>
