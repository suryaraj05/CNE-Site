<?php
/**
 * Our Special Services — horizontal split cards (content left / image right).
 */
$items = $s['items'] ?? [];
$eyebrow = $s['eyebrow'] ?? 'Our special services';
$title = $s['title'] ?? 'More than freight. End-to-end logistics support.';
$accent = $s['accent'] ?? 'logistics support.';
$intro = $s['intro'] ?? 'We go beyond standard freight with a range of specialist services, from Amazon FBA and China-to-UK freight to house moves and secure storage, designed for businesses and individuals.';
?>
    <section<?= section_id($s + ['id' => 'special-services']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <div class="shell relative">
        <!-- Header: heading left / intro right -->
        <div<?= reveal('up') ?> class="grid items-center gap-8 lg:grid-cols-[minmax(0,1.15fr)_1px_minmax(0,0.85fr)] lg:gap-10">
          <div class="min-w-0">
            <p class="eyebrow"><?= e($eyebrow) ?></p>
            <h2 class="heading-section-lg mt-5 max-w-xl">
              <span class="block">More than freight.</span>
              <span class="mt-1 block">End-to-end <span class="mark-lime">logistics support.</span></span>
            </h2>
          </div>
          <div aria-hidden="true" class="hidden self-stretch bg-line lg:block"></div>
          <p class="lede max-w-md"><?= e($intro) ?></p>
        </div>

        <!-- 3×2 horizontal cards: content left, image right -->
        <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 sm:grid-cols-2 lg:mt-12 lg:grid-cols-3 lg:gap-6">
<?php foreach ($items as $i => $item):
    $link = !empty($item['href']);
    $img = $item['image'] ?? null;
?>
          <li<?= reveal('up', min(40 + $i * 55, 280)) ?> class="<?= $link ? 'group relative' : '' ?> card-surface flex h-full min-h-[13.5rem] flex-col overflow-hidden sm:min-h-[14.5rem] sm:flex-row">
            <div class="flex min-w-0 flex-1 flex-col justify-center px-4 py-4 sm:py-5 sm:pr-3 sm:pl-5">
              <span class="mb-2.5 inline-flex text-navy"><?= icon($item['icon'] ?? 'box', 'size-5') ?></span>
              <h3 class="heading-card">
<?php if ($link): ?>
                <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
                <?= e($item['title']) ?>
<?php endif; ?>
              </h3>
              <p class="body-sm mt-1.5 flex-1"><?= e($item['text']) ?></p>
<?php if ($link): ?>
              <span class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-navy" aria-hidden="true">
                Learn more
                <span class="transition-transform duration-300 group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
              </span>
<?php endif; ?>
            </div>

<?php if ($img): ?>
            <!-- image on the right: straight vertical divider -->
            <div class="relative aspect-[16/10] w-full shrink-0 self-stretch overflow-hidden border-t border-lime sm:aspect-auto sm:w-[50%] sm:border-t-0 sm:border-l sm:border-lime">
              <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $item['title']] : $img, 'absolute inset-0 size-full object-cover transition-transform duration-700 group-hover:scale-[1.04]') ?>
            </div>
<?php endif; ?>
          </li>
<?php endforeach; ?>
        </ul>
      </div>
    </section>
