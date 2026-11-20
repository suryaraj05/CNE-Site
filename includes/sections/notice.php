<?php
/**
 * Premium promotional banners (shared layout).
 * Supports a single notice or `banners` => [ ... ] for a stacked pair.
 */
$banners = $s['banners'] ?? null;
if ($banners === null) {
    $banners = [[
        'tone'        => $s['tone'] ?? '',
        'label'       => $s['label'] ?? '',
        'title'       => $s['title'] ?? ($s['text'] ?? ''),
        'accent'      => $s['accent'] ?? null,
        'accent_mode' => $s['accent_mode'] ?? 'mark',
        'support'     => $s['support'] ?? '',
        'link'        => $s['link'] ?? 'Read more',
        'href'        => $s['href'] ?? '#',
        'icon'        => $s['icon'] ?? 'tag',
        'image'       => $s['image'] ?? asset_img('sea') ?: asset_img('cargo'),
        'image_alt'   => $s['image_alt'] ?? 'Shipping containers',
    ]];
}
$imgFallback = asset_img('sea') ?: asset_img('cargo');
?>
    <aside<?= section_id($s) ?> class="shell scroll-mt-28 my-6 sm:my-8" aria-label="Promotions">
      <div class="flex flex-col gap-5 sm:gap-6">
<?php foreach ($banners as $i => $b):
    $offer = ($b['tone'] ?? '') === 'offer';
    $title = $b['title'] ?? '';
    $accent = $b['accent'] ?? null;
    $mode = $b['accent_mode'] ?? 'mark';
    $support = $b['support'] ?? '';
    $img = $b['image'] ?? $imgFallback;

    if ($accent && str_contains($title, $accent)) {
        $parts = explode($accent, $title, 2);
        // On dark banners: bold light-blue text only (no highlight pill)
        $titleHtml = e($parts[0]) . '<span class="font-bold text-[var(--color-lime)]">' . e($accent) . '</span>' . e($parts[1] ?? '');
    } else {
        $titleHtml = e($title);
    }
?>
        <div<?= reveal('up', $i * 80) ?> class="relative isolate grid min-h-[12rem] overflow-hidden rounded-[1.5rem] text-white sm:min-h-[13rem] sm:rounded-[1.75rem] lg:grid-cols-[7rem_minmax(0,1fr)_minmax(14rem,38%)]"
             style="background: linear-gradient(105deg, var(--color-navy-700) 0%, var(--color-navy) 45%, var(--color-navy-500) 100%);">

          <!-- LEFT: icon -->
          <div class="relative z-10 flex items-center justify-center py-5 pl-4 sm:pl-0">
            <div class="relative">
<?php if ($offer): ?>
              <span class="relative inline-flex text-white">
                <?= icon('tag', 'size-11 sm:size-12') ?>
                <span aria-hidden="true" class="absolute top-0.5 right-0 size-2.5 rounded-full bg-[var(--color-lime)] ring-2 ring-[var(--color-navy-700)] sm:size-3"></span>
              </span>
<?php else: ?>
              <span class="relative inline-flex text-white">
                <?= icon('file', 'size-11 sm:size-12') ?>
                <span aria-hidden="true" class="absolute -right-1.5 -bottom-1.5 inline-flex size-6 items-center justify-center rounded-full bg-[var(--color-lime)] text-navy shadow-sm sm:size-7">
                  <?= icon('megaphone', 'size-3.5') ?>
                </span>
              </span>
<?php endif; ?>
            </div>
            <span aria-hidden="true" class="absolute top-[20%] right-0 bottom-[20%] hidden w-px bg-white/25 lg:block"></span>
          </div>

          <!-- CENTRE: content -->
          <div class="relative z-10 flex min-w-0 flex-col justify-center px-5 py-5 sm:px-6 lg:pr-8 lg:pl-5">
            <p class="inline-flex items-center gap-2.5 text-[11px] font-semibold tracking-[0.14em] text-white/90 uppercase sm:text-[12px]">
              <span aria-hidden="true" class="h-0.5 w-5 shrink-0 rounded-full bg-[var(--color-lime)] sm:w-6"></span>
              <?= e($b['label'] ?? '') ?>
            </p>
            <h2 class="mt-2.5 max-w-xl text-[1.2rem] leading-snug font-bold tracking-[-0.02em] text-balance sm:text-[1.5rem] lg:text-[1.7rem]">
              <?= $titleHtml ?>
            </h2>
<?php if ($support !== ''): ?>
            <p class="mt-2 max-w-lg text-[13px] leading-relaxed text-white/80 sm:text-[15px]"><?= e($support) ?></p>
<?php endif; ?>
            <a href="<?= e($b['href'] ?? '#') ?>" class="btn btn-primary btn-sm mt-4 self-start lg:hidden">
              <?= e($b['link'] ?? 'Learn more') ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
          </div>

          <!-- RIGHT: diagonal photo + CTA -->
          <div class="relative z-10 hidden min-h-[13rem] lg:block">
<?php if ($img): ?>
            <div class="absolute inset-0 overflow-hidden [clip-path:polygon(22%_0,100%_0,100%_100%,0_100%)]">
              <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $b['image_alt'] ?? ''] : $img, 'size-full object-cover object-[72%_center]') ?>
              <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-[var(--color-navy-700)]/40 via-[var(--color-navy-700)]/10 to-transparent"></div>
            </div>
            <span aria-hidden="true" class="absolute inset-y-[-8%] left-[18%] w-[3px] origin-top -skew-x-[16deg] bg-[var(--color-lime)] shadow-[0_0_20px_rgba(61,125,214,0.45)]"></span>
<?php endif; ?>
            <div class="absolute inset-0 z-10 flex items-center justify-start pl-[18%] pr-8">
              <a href="<?= e($b['href'] ?? '#') ?>" class="btn btn-primary">
                <?= e($b['link'] ?? 'Learn more') ?> <?= icon('arrow-right', 'size-4') ?>
              </a>
            </div>
          </div>
        </div>
<?php endforeach; ?>
      </div>
    </aside>
