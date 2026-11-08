<?php
$img     = $s['image'] ?? null;
$reverse = !empty($s['reverse']);
?>
    <section<?= section_id($s) ?> class="mx-auto max-w-7xl scroll-mt-28 px-6 lg:px-10">
<?php if ($img): ?>
      <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
        <div<?= reveal($reverse ? 'left' : 'right') ?> class="<?= $reverse ? 'lg:order-2' : '' ?>">
          <?php section_heading($s); ?>
          <div class="prose-cne <?= !empty($s['title']) ? 'mt-6' : '' ?>">
<?= $s['html'] ?>
          </div>
        </div>
        <div<?= reveal($reverse ? 'right' : 'left', 100) ?> class="relative <?= $reverse ? 'lg:order-1' : '' ?>">
          <div aria-hidden="true" class="absolute -inset-3 -z-10 rounded-[1.75rem] bg-gradient-to-br from-navy/[0.06] to-mist/40 <?= $reverse ? 'rotate-[-1.5deg]' : 'rotate-[1.5deg]' ?>"></div>
          <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ($s['title'] ?? '')] : $img, 'aspect-[4/3] w-full rounded-[1.35rem] object-cover') ?>
        </div>
      </div>
<?php else: ?>
      <div class="mx-auto max-w-3xl">
        <?php section_heading($s, 'center'); ?>
        <div<?= reveal('up', 60) ?> class="prose-cne <?= !empty($s['title']) ? 'mt-6' : '' ?>">
<?= $s['html'] ?>
        </div>
      </div>
<?php endif; ?>
    </section>
