<?php
/**
 * Post-Brexit Customs — editorial split layout (ui-inspiration/6).
 */
$img = $s['image'] ?? asset_img('post-brexit-customs') ?: asset_img('customs') ?: asset_img('expertise') ?: asset_img('cargo');
$features = $s['features'] ?? null;
if ($features === null && !empty($s['checklist'])) {
    $defaults = ['file', 'id-card', 'box', 'pound', 'calendar'];
    $features = [];
    foreach ($s['checklist'] as $i => $label) {
        $features[] = ['icon' => $defaults[$i] ?? 'check', 'label' => $label];
    }
}
$cta = $s['cta'] ?? ['Get customs support', '/customs-clearance-service-uk/'];
$ctaSecondary = $s['cta_secondary'] ?? ['Learn more', '/customs-clearance-service-uk/'];
$eyebrow = $s['eyebrow'] ?? 'Post-Brexit customs';
$lead = $s['paragraphs'][0] ?? '';
?>
    <section<?= section_id($s + ['id' => 'customs']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-white">
      <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-0 w-[48%] bg-gradient-to-l from-mist-50 via-mist-50/70 to-transparent max-lg:hidden"></div>

      <div class="shell relative grid items-center gap-12 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:gap-10 xl:gap-14">
        <!-- LEFT -->
        <div<?= reveal('right') ?> class="relative z-10 min-w-0">
          <p class="eyebrow"><?= e($eyebrow) ?></p>

          <h2 class="heading-section-lg mt-5 max-w-lg">
            <span class="block">Customs, handled</span>
            <span class="mark-lime mt-1 inline-block">properly.</span>
          </h2>

<?php if ($lead !== ''): ?>
          <p class="lede mt-6 max-w-xl"><?= e($lead) ?></p>
<?php endif; ?>

<?php if ($features): ?>
          <ul class="mt-10 grid grid-cols-2 gap-y-6 sm:grid-cols-3 lg:grid-cols-5 lg:gap-0">
<?php foreach ($features as $i => $f): ?>
            <li class="relative flex flex-col items-start gap-3 px-0 sm:px-2 lg:px-3 <?= $i > 0 ? 'lg:border-l lg:border-line/70' : '' ?>">
              <span class="relative inline-flex text-navy">
                <?= icon($f['icon'] ?? 'check', 'size-7') ?>
                <span aria-hidden="true" class="absolute -right-1 -bottom-0.5 size-2 rounded-full bg-lime"></span>
              </span>
              <span class="label-sm"><?= e($f['label']) ?></span>
            </li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>

          <div class="mt-10 flex flex-wrap items-center gap-3">
            <a href="<?= e($cta[1]) ?>" class="btn btn-primary">
              <?= e($cta[0]) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
            <a href="<?= e($ctaSecondary[1]) ?>" class="btn btn-secondary">
              <?= e($ctaSecondary[0]) ?>
            </a>
          </div>
        </div>

        <!-- RIGHT: editorial angled photo -->
        <div<?= reveal('left', 100) ?> class="relative mx-auto w-full max-w-xl lg:mx-0 lg:max-w-none">
          <!-- soft mist wash -->
          <div aria-hidden="true" class="absolute -inset-6 -z-20 rounded-[2rem] bg-gradient-to-br from-mist via-transparent to-mist-50 max-lg:hidden"></div>

          <!-- navy geometric plate (bottom-right, behind) -->
          <div aria-hidden="true" class="absolute -right-3 -bottom-4 left-[20%] top-[28%] -z-10 rounded-br-[2.5rem] rounded-tr-[1.5rem] bg-navy-700 [clip-path:polygon(16%_0,100%_0,100%_100%,0_100%)] sm:-right-5 sm:-bottom-6 sm:rounded-br-[3rem]"></div>

          <!-- lime diagonal accent under image -->
          <div aria-hidden="true" class="absolute bottom-2 left-[8%] -z-[5] h-3 w-[42%] -skew-x-[18deg] rounded-sm bg-lime sm:bottom-3 sm:h-3.5"></div>

          <!-- white-bordered angled image -->
          <div class="relative z-10">
            <span aria-hidden="true" class="absolute top-3 left-[10%] z-20 size-3.5 -skew-x-[18deg] rounded-sm bg-lime sm:size-4"></span>
            <div class="overflow-hidden rounded-br-[2rem] rounded-tr-[1.25rem] bg-white p-[4px] shadow-[0_32px_80px_-42px_rgba(23,38,74,0.55)] [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)] sm:rounded-br-[2.75rem] sm:rounded-tr-[1.5rem] sm:p-[5px]">
              <div class="overflow-hidden rounded-br-[1.75rem] rounded-tr-[1rem] bg-mist [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)] sm:rounded-br-[2.5rem] sm:rounded-tr-[1.25rem]">
<?php if ($img): ?>
                <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? 'Customs and warehouse logistics'] : $img, 'aspect-[5/4] w-full object-cover object-[68%_35%] sm:aspect-[4/3]') ?>
<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
