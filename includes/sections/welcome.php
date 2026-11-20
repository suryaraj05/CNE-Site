<?php
$img = $s['image'] ?? asset_img('airport') ?: asset_img('air') ?: asset_img('about');
$highlights = $s['highlights'] ?? [
    ['icon' => 'shield', 'label' => 'Customs Clearance'],
    ['icon' => 'plane', 'label' => 'Air Freight'],
    ['icon' => 'ship', 'label' => 'Sea Freight'],
    ['icon' => 'truck', 'label' => 'Road Transport'],
];
$cta = $s['cta'] ?? ['Get a quote', '/request-a-quote/'];
$ctaSecondary = $s['cta_secondary'] ?? ['Learn more', '/customs-clearance-logistics-newcastle-northeast-england/'];
$title = $s['title'] ?? 'Your trusted partner for international logistics.';
$accent = $s['accent'] ?? 'logistics.';
$lead = $s['lead'] ?? 'Cargo Northeast provides end-to-end customs clearance and freight services from Newcastle, Scotland and across the UK, keeping logistics simple, compliant and dependable for businesses of every size.';
$eyebrow = $s['eyebrow'] ?? 'About Cargo Northeast';
?>
    <section<?= section_id($s + ['id' => 'welcome']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <!-- dotted world map -->
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-[0.28]">
        <svg class="absolute top-8 left-0 h-[70%] w-[62%] text-navy/40 max-lg:w-full" viewBox="0 0 640 360" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<?php for ($y = 20; $y <= 340; $y += 14): for ($x = 16; $x <= 620; $x += 14):
    // soft oval mask so dots fade toward edges / look map-like
    $nx = ($x - 320) / 320;
    $ny = ($y - 180) / 180;
    if (($nx * $nx) + ($ny * $ny * 1.15) > 0.92) continue;
?>
          <circle cx="<?= $x + (($y / 14) % 2) * 7 ?>" cy="<?= $y ?>" r="1.2"/>
<?php endfor; endfor; ?>
        </svg>
      </div>

      <div class="shell relative grid items-center gap-12 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)] lg:gap-14 xl:gap-16">
        <!-- LEFT -->
        <div<?= reveal('right') ?> class="relative z-10 min-w-0">
          <p class="eyebrow"><?= e($eyebrow) ?></p>
          <h2 class="heading-section mt-5 max-w-xl">
            <?= titled($title, $accent) ?>
          </h2>
          <p class="lede mt-5 max-w-md"><?= e($lead) ?></p>

          <ul class="mt-9 grid grid-cols-2 gap-y-5 sm:grid-cols-4 sm:gap-0">
<?php foreach ($highlights as $i => $h): ?>
            <li class="relative flex flex-col items-center gap-2.5 px-2 text-center sm:px-3 <?= $i > 0 ? 'sm:border-l sm:border-line/80' : '' ?>">
              <span class="inline-flex text-navy"><?= icon($h['icon'] ?? 'box', 'size-6') ?></span>
              <span class="label-sm"><?= e($h['label']) ?></span>
            </li>
<?php endforeach; ?>
          </ul>

          <div class="mt-9 flex flex-wrap items-center gap-3">
            <a href="<?= e($cta[1]) ?>" class="btn btn-primary">
              <?= e($cta[0]) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
            <a href="<?= e($ctaSecondary[1]) ?>" class="btn btn-secondary">
              <?= e($ctaSecondary[0]) ?>
            </a>
          </div>
        </div>

        <!-- RIGHT: navy geometry + angled aircraft -->
        <div<?= reveal('left', 100) ?> class="relative mx-auto w-full max-w-lg lg:mx-0 lg:max-w-none">
          <!-- navy geometric plate -->
          <div aria-hidden="true" class="absolute -right-2 top-6 bottom-0 left-[18%] rounded-tr-[2.5rem] rounded-br-[2.5rem] bg-navy max-sm:left-[12%] sm:rounded-tr-[3rem] sm:rounded-br-[3rem] lg:-right-4 lg:left-[22%] [clip-path:polygon(14%_0,100%_0,100%_100%,0_100%)]"></div>

          <div class="relative z-10 py-4 pr-2 sm:pr-4 lg:py-6 lg:pr-6">
            <div class="relative overflow-hidden rounded-tr-[1.75rem] rounded-br-[1.75rem] bg-white p-[3px] shadow-[0_28px_70px_-40px_rgba(26,54,115,0.55)] [clip-path:polygon(12%_0,100%_0,100%_100%,0_100%)] sm:rounded-tr-[2.25rem] sm:rounded-br-[2.25rem]">
              <div class="overflow-hidden rounded-tr-[1.55rem] rounded-br-[1.55rem] bg-mist [clip-path:polygon(12%_0,100%_0,100%_100%,0_100%)] sm:rounded-tr-[2.05rem] sm:rounded-br-[2.05rem]">
<?php if ($img): ?>
                <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? 'Cargo aircraft at the airport'] : $img, 'aspect-[5/4] w-full object-cover object-[60%_45%] sm:aspect-[4/3]') ?>
<?php endif; ?>
              </div>
            </div>
            <span aria-hidden="true" class="absolute bottom-2 left-[28%] size-4 -skew-x-[18deg] rounded-sm bg-lime sm:bottom-3 sm:size-5"></span>
          </div>
        </div>
      </div>
    </section>
