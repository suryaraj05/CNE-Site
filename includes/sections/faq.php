<?php
/**
 * FAQ — two-column layout with decorative containers + accordion (ui-inspiration/12).
 */
$img = $s['image'] ?? asset_img('china') ?: asset_img('cargo') ?: asset_img('sea');
$intro = $s['intro'] ?? 'Quick answers to common questions about customs clearance, importing, exporting and our freight services.';
$eyebrow = $s['eyebrow'] ?? 'Frequently asked questions';
$accent = $s['accent'] ?? 'answered.';
$title = $s['title'] ?? 'Customs and freight questions, answered.';
$contactHref = $s['contact_href'] ?? '/contact/';
$contactLabel = $s['contact_label'] ?? 'Contact us';
?>
    <section<?= section_id($s + ['id' => 'faq']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <!-- soft blue washes -->
      <div aria-hidden="true" class="pointer-events-none absolute -top-28 right-[-6rem] h-[28rem] w-[28rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.42),transparent_68%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-36 -left-24 h-[30rem] w-[30rem] rounded-full bg-[radial-gradient(circle,rgba(186,205,235,0.32),transparent_70%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute top-1/3 left-1/3 h-[18rem] w-[36rem] -translate-x-1/2 rounded-full bg-[radial-gradient(ellipse,rgba(255,255,255,0.65),transparent_70%)]"></div>

      <div class="shell relative grid items-start gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.25fr)] lg:gap-12 xl:gap-16">
        <!-- LEFT: heading + decorative image -->
        <div class="relative z-10 flex min-h-0 min-w-0 flex-col">
          <div<?= reveal('up') ?> class="relative z-20 max-w-xl">
            <p class="eyebrow"><?= e($eyebrow) ?></p>

            <h2 class="heading-section-lg mt-5">
<?php
// Prefer the approved three-line home wording when title matches.
if (str_contains($title, 'Customs and freight questions')):
?>
              <span class="block">Customs and</span>
              <span class="mt-0.5 block">freight questions,</span>
              <span class="mt-1 block"><span class="mark-lime"><?= e($accent) ?></span></span>
<?php else: ?>
              <?= titled($title, $accent) ?>
<?php endif; ?>
            </h2>

            <p class="lede mt-5 max-w-[31rem]"><?= e($intro) ?></p>
          </div>

<?php if ($img): ?>
          <div<?= reveal('up', 100) ?> class="relative z-0 mt-10 w-[min(100%,28rem)] lg:mt-auto lg:-mb-10 lg:-ml-6 xl:-mb-14 xl:-ml-10 xl:w-[min(118%,34rem)]">
            <div class="relative overflow-hidden rounded-tr-[1.75rem] sm:rounded-tr-[2rem]">
              <?= img_tag(
                  is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? 'Stacked shipping containers'] : $img,
                  'aspect-[5/4] w-full object-cover object-[68%_28%] sm:aspect-[4/3] lg:h-[22rem] lg:aspect-auto'
              ) ?>
            </div>
          </div>
<?php endif; ?>
        </div>

        <!-- RIGHT: accordion + support CTA -->
        <div class="relative z-10 min-w-0 space-y-5">
          <div<?= reveal('up', 60) ?> class="card-surface rounded-[1.75rem] bg-white/95 p-3.5 sm:rounded-[1.9rem] sm:p-5">
            <div class="space-y-3">
<?php foreach ($s['items'] as $i => $item): ?>
              <details<?= reveal('up', min(40 + $i * 45, 200)) ?> class="group rounded-[1.15rem] border border-line/90 bg-white transition-[background-color,box-shadow] duration-300 open:border-transparent open:bg-mist open:shadow-[inset_0_0_0_1px_rgba(29,57,120,0.04)]"<?= $i === 0 ? ' open' : '' ?>>
                <summary class="flex cursor-pointer list-none items-center justify-between gap-5 px-5 py-4 text-[15px] leading-snug font-bold text-ink transition-colors sm:px-6 sm:py-5 sm:text-[16px] [&::-webkit-details-marker]:hidden">
                  <span class="pr-2"><?= e($item['q']) ?></span>
                  <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-full bg-white text-navy shadow-[0_8px_18px_-12px_rgba(29,57,120,0.45)] ring-1 ring-navy/[0.08] transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-open:rotate-180">
                    <?= icon('chevron-down', 'size-4') ?>
                  </span>
                </summary>
                <p class="lede px-5 pb-5 text-[15px] sm:px-6 sm:pb-6 sm:text-[16px]"><?= e($item['a']) ?></p>
              </details>
<?php endforeach; ?>
            </div>
          </div>

          <div<?= reveal('up', 120) ?> class="flex flex-col gap-4 rounded-[1.6rem] bg-white/80 p-5 ring-1 ring-line/90 backdrop-blur-sm sm:flex-row sm:items-center sm:justify-between sm:gap-6 sm:rounded-[1.65rem] sm:p-6">
            <div class="flex items-start gap-3.5 sm:items-center">
              <span class="inline-flex size-12 shrink-0 items-center justify-center rounded-xl bg-lime text-navy sm:size-[3.25rem] sm:rounded-[0.95rem]">
                <?= icon('headset', 'size-6') ?>
              </span>
              <div class="min-w-0">
                <p class="heading-card text-[16px] sm:text-[17px]">Still have a question?</p>
                <p class="body-sm mt-0.5 sm:text-[15px]">Our team is here to help with any specific enquiry.</p>
              </div>
            </div>
            <a href="<?= e($contactHref) ?>" class="btn btn-secondary btn-sm shrink-0 self-start sm:self-center">
              <?= e($contactLabel) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
          </div>
        </div>
      </div>
    </section>
