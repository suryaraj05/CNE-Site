<?php
$img = $s['image'] ?? null;
$icons = $s['icons'] ?? null;
if ($icons === null && !empty($s['checklist']) && (($s['id'] ?? '') === 'customs' || !empty($s['icon_row']))) {
    $defaults = ['file', 'id-card', 'box', 'map-pin', 'calendar'];
    $icons = [];
    foreach ($s['checklist'] as $i => $label) {
        $icons[] = ['icon' => $defaults[$i] ?? 'check', 'label' => $label];
    }
}
$angled = (!empty($s['angled']) || (($s['id'] ?? '') === 'customs')) && (bool) $img;
?>
    <section<?= section_id($s) ?> class="relative scroll-mt-28 overflow-hidden <?= $angled || $img ? 'section-y bg-white' : 'section-y bg-mist-50' ?>">
<?php if ($angled): ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-0 w-[46%] bg-gradient-to-l from-mist-50 via-mist-50/70 to-transparent max-lg:hidden"></div>
<?php endif; ?>
      <div class="shell relative">
        <div class="<?= $img ? 'grid items-center gap-10 lg:grid-cols-2 lg:gap-12 xl:gap-16' : '' ?>">
          <div<?= reveal('right') ?> class="relative z-10 min-w-0">
            <?php section_heading($s); ?>
            <div class="lede mt-5 max-w-xl space-y-4">
<?php foreach ($s['paragraphs'] ?? [] as $p): ?>
              <p><?= e($p) ?></p>
<?php endforeach; ?>
            </div>

<?php if ($icons): ?>
            <ul class="mt-8 grid grid-cols-2 gap-x-4 gap-y-5 sm:grid-cols-4">
<?php foreach ($icons as $i => $item): ?>
              <li<?= reveal('up', 40 + $i * 45) ?> class="flex flex-col items-start gap-2.5">
                <span class="icon-tile"><?= icon($item['icon'] ?? 'check', 'size-5') ?></span>
                <span class="label-sm"><?= e($item['label']) ?></span>
              </li>
<?php endforeach; ?>
            </ul>
<?php elseif (!empty($s['checklist'])): ?>
            <ul class="mt-8 grid gap-3 sm:grid-cols-2">
<?php foreach ($s['checklist'] as $item): ?>
              <li class="flex items-start gap-3 rounded-2xl bg-mist px-4 py-3 text-[14px] font-medium text-ink">
                <span class="mt-0.5 inline-flex size-6 shrink-0 items-center justify-center rounded-full bg-lime text-navy"><?= icon('check', 'size-3.5') ?></span>
                <?= e($item) ?>
              </li>
<?php endforeach; ?>
            </ul>
<?php endif; ?>

<?php if (!empty($s['cta'])): ?>
            <div class="mt-8 flex flex-wrap gap-3">
              <a href="<?= e($s['cta'][1]) ?>" class="btn btn-primary"><?= e($s['cta'][0]) ?> <?= icon('arrow-right', 'size-4') ?></a>
<?php if (!empty($s['cta_secondary'])): ?>
              <a href="<?= e($s['cta_secondary'][1]) ?>" class="btn btn-secondary"><?= e($s['cta_secondary'][0]) ?></a>
<?php endif; ?>
            </div>
<?php endif; ?>
          </div>

<?php if ($img): ?>
<?php if ($angled): ?>
          <div<?= reveal('left', 100) ?> class="relative mx-auto w-full max-w-xl lg:max-w-none">
            <div aria-hidden="true" class="absolute -right-3 -bottom-4 left-[18%] top-[26%] -z-10 rounded-br-[2.5rem] rounded-tr-[1.5rem] bg-navy-700 [clip-path:polygon(16%_0,100%_0,100%_100%,0_100%)] sm:-right-5 sm:-bottom-6"></div>
            <div aria-hidden="true" class="absolute bottom-2 left-[8%] -z-[5] h-3 w-[42%] -skew-x-[18deg] rounded-sm bg-lime sm:bottom-3 sm:h-3.5"></div>
            <div class="relative overflow-hidden rounded-br-[1.75rem] rounded-tr-[1rem] bg-mist [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)] sm:rounded-br-[2.5rem] sm:rounded-tr-[1.25rem]">
              <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ''] : $img, 'aspect-[5/4] w-full object-cover object-[68%_35%] sm:aspect-[4/3]') ?>
            </div>
          </div>
<?php else: ?>
          <div<?= reveal('left', 100) ?> class="relative">
            <div class="card-surface overflow-hidden p-2 sm:p-2.5">
              <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ''] : $img, 'aspect-[4/3] w-full rounded-[1.25rem] object-cover object-center lg:aspect-[5/4]') ?>
            </div>
          </div>
<?php endif; ?>
<?php endif; ?>
        </div>
      </div>
    </section>
