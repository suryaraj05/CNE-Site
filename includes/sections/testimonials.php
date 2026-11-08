    <section<?= section_id($s) ?> class="scroll-mt-28 bg-mist-50/80 py-16 sm:py-20">
      <div class="mx-auto max-w-7xl px-6 lg:px-10">
      <?php section_heading($s + ['eyebrow' => 'What clients say'], 'center'); ?>
      <ul class="mt-14 grid items-stretch gap-6 <?= count($s['items']) >= 3 ? 'md:grid-cols-3' : 'md:grid-cols-2' ?> md:gap-8">
<?php foreach ($s['items'] as $i => $t): ?>
        <li<?= reveal('up', 60 + $i * 90) ?> class="flex h-full">
          <figure class="flex h-full w-full flex-col rounded-2xl bg-white p-7 ring-1 ring-navy/[0.06] sm:p-8">
            <blockquote class="flex-1 font-serif text-[1.35rem] leading-snug text-ink sm:text-[1.5rem]">“<?= e($t['quote']) ?>”</blockquote>
            <figcaption class="mt-7 flex items-center gap-3 text-sm">
              <span aria-hidden="true" class="h-px w-8 bg-navy/30"></span>
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
