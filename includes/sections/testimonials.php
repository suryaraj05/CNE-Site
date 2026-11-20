    <section<?= section_id($s) ?> class="section-y scroll-mt-28 bg-mist-50">
      <div class="shell">
      <?php section_heading($s + ['eyebrow' => 'What clients say', 'accent' => $s['accent'] ?? null], 'center'); ?>
      <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 <?= count($s['items']) >= 3 ? 'md:grid-cols-3' : 'md:grid-cols-2' ?> md:gap-6">
<?php foreach ($s['items'] as $i => $t): ?>
        <li<?= reveal('up', 60 + $i * 90) ?> class="flex h-full">
          <figure class="card-surface flex h-full w-full flex-col border-l-4 border-b-4 border-lime p-7 sm:p-8">
            <div class="flex gap-1 text-navy" aria-hidden="true">
<?php for ($star = 0; $star < 5; $star++): ?>
              <?= icon('star', 'size-4 fill-current') ?>
<?php endfor; ?>
            </div>
            <blockquote class="mt-5 flex-1 font-serif text-[1.3rem] leading-snug text-ink sm:text-[1.45rem]">“<?= e($t['quote']) ?>”</blockquote>
            <figcaption class="mt-7 flex items-center gap-3 text-sm">
              <span aria-hidden="true" class="h-px w-8 bg-navy/25"></span>
              <span>
                <span class="font-semibold text-ink"><?= e($t['name']) ?></span>
<?php if (!empty($t['role'])): ?>
                <span class="text-muted"> · <?= e($t['role']) ?></span>
<?php endif; ?>
              </span>
            </figcaption>
          </figure>
        </li>
<?php endforeach; ?>
      </ul>
      </div>
    </section>
