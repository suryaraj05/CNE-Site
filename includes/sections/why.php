<?php $t = $s['testimonial'] ?? null; $list = empty($s['numbered']) ? 'ul' : 'ol'; ?>
    <section<?= section_id($s) ?> class="mx-auto grid max-w-6xl scroll-mt-28 gap-10 px-6 <?= $t ? 'lg:grid-cols-[minmax(0,1fr)_340px] lg:items-center lg:gap-16' : '' ?>">
      <div>
        <?php section_heading($s); ?>
        <<?= $list ?> class="mt-8 grid gap-6 <?= $t ? '' : 'sm:grid-cols-2' ?>">
<?php foreach ($s['items'] as $i => $item): ?>
          <li class="flex items-start gap-3">
<?php if (!empty($s['numbered'])): ?>
            <span class="flex size-6 shrink-0 items-center justify-center rounded-full bg-mist text-xs font-bold text-navy"><?= $i + 1 ?></span>
<?php else: ?>
            <?= icon('check', 'mt-0.5 size-5 shrink-0 text-emerald-600') ?>
<?php endif; ?>
            <div>
              <h3 class="text-[15px] font-bold text-navy"><?= e($item['title']) ?></h3>
              <p class="mt-1 text-sm leading-relaxed text-muted"><?= e($item['text']) ?></p>
            </div>
          </li>
<?php endforeach; ?>
        </<?= $list ?>>
      </div>
<?php if ($t): ?>
      <figure class="rounded-2xl bg-ink p-8 text-white">
        <svg class="size-7 text-blue-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.6 6C6.5 7.4 4.5 10 4.5 13.6V18h5.4v-5.4H7.2c0-2 1.1-3.7 3.2-4.7L9.6 6Zm9 0c-3.1 1.4-5.1 4-5.1 7.6V18h5.4v-5.4h-2.7c0-2 1.1-3.7 3.2-4.7L18.6 6Z"/></svg>
        <blockquote class="mt-5 text-lg leading-relaxed font-semibold">“<?= e($t['quote']) ?>”</blockquote>
        <figcaption class="mt-6 text-sm text-blue-200">— <?= e($t['name']) ?><?= !empty($t['role']) ? ', ' . e($t['role']) : '' ?></figcaption>
      </figure>
<?php endif; ?>
    </section>
