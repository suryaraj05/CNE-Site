<?php
/**
 * How it works — 4 process cards with badges + connectors (ui-inspiration/9).
 */
$steps = $s['items'] ?? [
    ['title' => 'Book', 'text' => "Send us your cargo details and we'll arrange the freight.", 'image' => asset_img('how-it-works-01'), 'icon' => 'calendar'],
    ['title' => 'Ship', 'text' => 'Your goods move by air, sea or road, tracked along the way.', 'image' => asset_img('how-it-works-02'), 'icon' => 'ship'],
    ['title' => 'Clear customs', 'text' => 'We submit your HMRC declaration and clear the shipment.', 'image' => asset_img('how-it-works-03'), 'icon' => 'file'],
    ['title' => 'Deliver', 'text' => 'Onward delivery to your door anywhere in the UK.', 'image' => asset_img('how-it-works-04'), 'icon' => 'box'],
];
$eyebrow = $s['eyebrow'] ?? 'How it works';
$count = count($steps);
?>
    <section<?= section_id($s + ['id' => 'how-it-works']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <!-- soft curved washes -->
      <div aria-hidden="true" class="pointer-events-none absolute -top-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.45),transparent_68%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-36 -left-28 h-[30rem] w-[30rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.35),transparent_70%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute top-1/3 left-1/2 h-[18rem] w-[40rem] -translate-x-1/2 rounded-full bg-[radial-gradient(ellipse,rgba(255,255,255,0.7),transparent_70%)]"></div>

      <div class="shell relative">
        <div<?= reveal('up') ?> class="mx-auto max-w-3xl text-center">
          <p class="inline-flex items-center justify-center gap-3 text-[12px] font-semibold tracking-[0.14em] text-navy uppercase">
            <span aria-hidden="true" class="h-0.5 w-8 rounded-full bg-lime"></span>
            <?= e($eyebrow) ?>
            <span aria-hidden="true" class="h-0.5 w-8 rounded-full bg-lime"></span>
          </p>
          <h2 class="heading-section-lg mt-5">
            <span class="block">From booking to delivery,</span>
            <span class="mt-1 block">we keep it <span class="mark-lime">simple.</span></span>
          </h2>
        </div>

        <ol class="relative mt-8 grid items-stretch gap-6 sm:mt-10 sm:grid-cols-2 lg:mt-12 lg:grid-cols-4 lg:gap-5 xl:gap-6">
<?php foreach ($steps as $i => $step): ?>
          <li<?= reveal('up', 50 + $i * 80) ?> class="relative flex h-full flex-col">
<?php if ($i < $count - 1): ?>
            <!-- connector arrow (desktop) -->
            <span aria-hidden="true" class="absolute top-[11.5rem] -right-[1.15rem] z-30 hidden size-[3.4rem] -translate-y-1/2 items-center justify-center rounded-full bg-white text-navy shadow-[0_12px_28px_-12px_rgba(26,54,115,0.5)] ring-1 ring-navy/[0.06] lg:flex xl:-right-[1.35rem]">
              <?= icon('arrow-right', 'size-4') ?>
            </span>
<?php endif; ?>

            <article class="card-surface flex h-full flex-col overflow-hidden rounded-[1.85rem] bg-white/95">
<?php if (!empty($step['image'])): ?>
              <div class="relative shrink-0">
                <?= img_tag(is_string($step['image']) ? ['src' => $step['image'], 'alt' => $step['title']] : $step['image'], 'h-[185px] w-full object-cover object-center') ?>
                <span class="absolute -bottom-7 left-5 z-20 inline-flex size-[3.9rem] items-center justify-center rounded-full bg-navy text-[1.05rem] font-bold tracking-tight text-white ring-[3px] ring-white shadow-[0_10px_24px_-10px_rgba(29,57,120,0.35)] sm:size-[4.15rem] sm:text-[1.1rem]">
                  <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?>
                </span>
              </div>
<?php endif; ?>

              <div class="flex flex-1 flex-col px-5 pt-10 pb-6 sm:px-6 sm:pt-11 sm:pb-7">
<?php if (!empty($step['icon'])): ?>
                <span class="mb-3 inline-flex text-navy"><?= icon($step['icon'], 'size-7') ?></span>
<?php endif; ?>
                <h3 class="heading-card-lg"><?= e($step['title']) ?></h3>
                <p class="lede mt-2.5 flex-1 text-[15px] sm:text-[16px]"><?= e($step['text']) ?></p>
              </div>
            </article>
          </li>
<?php endforeach; ?>
        </ol>
      </div>
    </section>
