<?php $img = $s['image'] ?? null; ?>
    <section<?= section_id($s) ?> class="scroll-mt-28">
      <div class="mx-auto max-w-7xl px-6 lg:px-10">
        <div class="<?= $img ? 'grid items-center gap-12 lg:grid-cols-2 lg:gap-16' : '' ?>">
          <div<?= reveal('right') ?>>
            <?php section_heading($s); ?>
            <div class="mt-6 space-y-4 text-[17px] leading-relaxed text-muted">
<?php foreach ($s['paragraphs'] ?? [] as $p): ?>
              <p><?= e($p) ?></p>
<?php endforeach; ?>
            </div>
<?php if (!empty($s['checklist'])): ?>
            <ul class="mt-8 space-y-3 border-t border-line/80 pt-7">
<?php foreach ($s['checklist'] as $item): ?>
              <li class="flex items-start gap-3 text-[15px] text-ink">
                <span class="mt-1.5 size-1.5 shrink-0 rounded-full bg-navy"></span>
                <?= e($item) ?>
              </li>
<?php endforeach; ?>
            </ul>
<?php endif; ?>
          </div>
<?php if ($img): ?>
          <div<?= reveal('left', 100) ?> class="relative">
            <div aria-hidden="true" class="absolute -inset-4 -z-10 rounded-[1.75rem] bg-gradient-to-br from-navy/5 to-transparent"></div>
            <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ''] : $img, 'aspect-[4/3] w-full rounded-[1.35rem] object-cover lg:aspect-[5/4]') ?>
          </div>
<?php endif; ?>
        </div>
      </div>
    </section>
