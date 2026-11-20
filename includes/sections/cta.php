<?php
/**
 * Shipment CTA banner — compact navy strip with ship photo (ui-inspiration/13).
 */
$title  = $s['title'] ?? 'Need help with a shipment?';
$accent = $s['accent'] ?? null;
$text   = $s['text'] ?? 'Speak to our team for expert advice, a quick quote or help with customs and delivery.';
$ctaImg = $s['image'] ?? asset_img('cta-ship') ?: asset_img('china') ?: asset_img('sea') ?: asset_img('cargo');
$quoteHref = $s['quote_href'] ?? '/request-a-quote/';
?>
    <section class="relative overflow-hidden bg-mist-50 pt-2 pb-1 sm:pt-3 sm:pb-2">
      <div class="shell">
        <div<?= reveal('up') ?> class="relative isolate overflow-hidden rounded-[1.5rem] bg-navy-700 shadow-[0_24px_50px_-34px_rgba(21,39,77,0.55)] sm:rounded-[1.65rem] lg:min-h-[11.75rem]">
<?php if ($ctaImg): ?>
          <!-- Ship art fills the right side; PNG left fade blends into navy (no plate / overlay) -->
          <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-0 w-full sm:w-[68%] lg:w-[52%] xl:w-[48%]">
            <?= img_tag(
                is_string($ctaImg) ? ['src' => $ctaImg, 'alt' => $s['image_alt'] ?? 'Container ship at sunset port'] : $ctaImg,
                'h-full w-full object-cover object-right'
            ) ?>
          </div>
<?php endif; ?>

          <div class="relative z-10 flex flex-col justify-center gap-5 px-6 py-8 sm:px-8 sm:py-9 lg:flex-row lg:items-center lg:gap-7 lg:py-7 xl:gap-9 xl:px-10">
            <div class="flex min-w-0 items-start gap-4 sm:gap-5">
              <span aria-hidden="true" class="mt-1 hidden h-14 w-1.5 shrink-0 rounded-full bg-lime sm:block lg:mt-0.5 lg:h-16"></span>
              <div class="min-w-0 max-w-xl">
                <h2 class="text-[1.55rem] leading-[1.15] font-bold tracking-[-0.025em] text-balance text-white sm:text-[1.75rem] lg:text-[1.9rem]">
                  <?= titled($title, $accent) ?>
                </h2>
                <p class="mt-2.5 max-w-md text-[14px] leading-relaxed text-white/80 sm:text-[15px]"><?= e($text) ?></p>
              </div>
            </div>

            <div class="flex shrink-0 flex-wrap items-center gap-3 lg:ml-auto lg:mr-[38%] xl:mr-[42%]">
              <a href="<?= e($quoteHref) ?>" class="btn btn-on-dark btn-sm sm:h-11 sm:px-6">
                Get a quote <?= icon('arrow-right', 'size-4') ?>
              </a>
              <a href="tel:<?= e(PHONE_E164) ?>" class="btn btn-ghost btn-sm sm:h-11 sm:px-6">
                <?= icon('phone', 'size-4') ?> <?= e(PHONE_DISPLAY) ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
