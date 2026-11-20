<?php $t = $s['testimonial'] ?? null; $list = empty($s['numbered']) ? 'ul' : 'ol'; ?>
    <section<?= section_id($s) ?> class="shell scroll-mt-28 <?= $t ? 'grid gap-10 lg:grid-cols-2 lg:items-center lg:gap-16' : '' ?>">
      <div>
        <?php section_heading($s); ?>
        <<?= $list ?> class="mt-8 grid gap-6 <?= $t ? '' : 'sm:grid-cols-2' ?>">
<?php foreach ($s['items'] as $i => $item): ?>
          <li<?= reveal('up', 80 + $i * 80) ?> class="flex items-start gap-3">
<?php if (!empty($s['numbered'])): ?>
            <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-lime text-xs font-bold text-ink"><?= $i + 1 ?></span>
<?php else: ?>
            <?= icon('check', 'mt-0.5 size-5 shrink-0 text-navy') ?>
<?php endif; ?>
            <div>
              <h3 class="text-[15px] font-bold text-ink"><?= e($item['title']) ?></h3>
              <p class="mt-1 text-sm leading-relaxed text-muted"><?= e($item['text']) ?></p>
            </div>
          </li>
<?php endforeach; ?>
        </<?= $list ?>>
      </div>
<?php if ($t): ?>
      <figure<?= reveal('left', 160) ?> class="rounded-[1.35rem] bg-navy p-8 text-white">
        <span class="inline-flex size-10 items-center justify-center rounded-xl bg-lime text-ink"><?= icon('star', 'size-5') ?></span>
        <blockquote class="mt-5 text-lg leading-relaxed font-semibold">“<?= e($t['quote']) ?>”</blockquote>
        <figcaption class="mt-6 text-sm text-white/70">— <?= e($t['name']) ?><?= !empty($t['role']) ? ', ' . e($t['role']) : '' ?></figcaption>
      </figure>
<?php endif; ?>
    </section>
