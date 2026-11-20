<?php
/**
 * Homepage "Our Services" — compact photo cards + dotted world map (ui-inspiration/4).
 */
$items = $s['items'] ?? [];
$title = $s['title'] ?? 'Comprehensive logistics solutions.';
$accent = $s['accent'] ?? 'solutions.';
$eyebrow = $s['eyebrow'] ?? 'Our services';
$intro = $s['intro'] ?? 'From customs clearance to global freight forwarding, we move your goods efficiently, compliantly and on time.';
?>
    <section<?= section_id($s + ['id' => 'services']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <div class="shell relative">
        <!-- Header + map -->
        <div class="relative grid items-center gap-8 lg:grid-cols-[minmax(0,0.95fr)_minmax(0,1.05fr)] lg:gap-6">
          <div<?= reveal('up') ?> class="relative z-10 max-w-xl">
            <p class="eyebrow"><?= e($eyebrow) ?></p>
            <h2 class="heading-section mt-5">
              <?= titled($title, $accent) ?>
            </h2>
            <p class="lede mt-4 max-w-md"><?= e($intro) ?></p>
          </div>

          <!-- Dotted world map artwork (includes routes + markers) -->
          <div class="pointer-events-none relative -mx-2 hidden h-[16rem] lg:block xl:h-[18.5rem]">
            <img
              src="/assets/img/services-world-map.png"
              alt="Global logistics route map showing Cargo Northeast air and sea freight connections"
              width="1672"
              height="941"
              loading="lazy"
              decoding="async"
              class="absolute inset-0 size-full object-contain object-center opacity-95"
            >
          </div>
        </div>

        <!-- Compact service cards -->
        <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4 lg:gap-5">
<?php foreach ($items as $i => $item):
    $link = !empty($item['href']);
?>
          <li<?= reveal('up', min(40 + $i * 70, 280)) ?> class="<?= $link ? 'group relative' : '' ?> card-surface flex h-full flex-col overflow-hidden">
<?php if (!empty($item['image'])): ?>
            <div class="relative shrink-0 overflow-hidden">
              <?= img_tag(is_string($item['image']) ? ['src' => $item['image'], 'alt' => $item['title']] : $item['image'], 'h-[185px] w-full object-cover object-center transition-transform duration-700 group-hover:scale-[1.04]') ?>
            </div>
<?php endif; ?>
            <div class="relative flex flex-1 flex-col px-4 pt-7 pb-4 sm:px-5 sm:pb-5">
<?php if (!empty($item['icon'])): ?>
              <span class="absolute -top-5 left-4 inline-flex size-10 items-center justify-center rounded-xl border border-navy/10 bg-white text-navy shadow-[0_10px_22px_-12px_rgba(26,54,115,0.45)]">
                <?= icon($item['icon'], 'size-5') ?>
              </span>
<?php endif; ?>
              <h3 class="heading-card pr-10">
<?php if ($link): ?>
                <a href="<?= e($item['href']) ?>" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($item['title']) ?></a>
<?php else: ?>
                <?= e($item['title']) ?>
<?php endif; ?>
              </h3>
              <p class="body-sm mt-1.5 flex-1"><?= e($item['text']) ?></p>
<?php if ($link): ?>
              <span class="absolute right-4 bottom-4 inline-flex size-8 items-center justify-center rounded-full bg-mist text-navy transition-transform duration-300 group-hover:translate-x-0.5 group-hover:bg-navy group-hover:text-white" aria-hidden="true">
                <?= icon('arrow-right', 'size-3.5') ?>
              </span>
<?php endif; ?>
            </div>
          </li>
<?php endforeach; ?>
        </ul>
      </div>
    </section>
