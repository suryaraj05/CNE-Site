    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <?php section_heading($s + ['eyebrow' => 'What clients say']); ?>
      <ul class="mt-10 grid gap-5 <?= count($s['items']) >= 3 ? 'md:grid-cols-3' : 'md:grid-cols-2' ?>">
<?php foreach ($s['items'] as $t): ?>
        <li>
          <figure class="flex h-full flex-col rounded-2xl border border-line bg-white p-7">
            <div class="flex gap-0.5 text-amber-400" aria-label="5 out of 5 stars"><?php for ($i = 0; $i < 5; $i++) echo icon('star', 'size-4 fill-current'); ?></div>
            <blockquote class="mt-4 text-[15px] leading-relaxed text-ink">“<?= e($t['quote']) ?>”</blockquote>
            <figcaption class="mt-auto pt-6 text-sm">
              <span class="font-semibold text-ink"><?= e($t['name']) ?></span>
<?php if (!empty($t['role'])): ?>
              <span class="text-muted"> · <?= e($t['role']) ?></span>
<?php endif; ?>
            </figcaption>
          </figure>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
