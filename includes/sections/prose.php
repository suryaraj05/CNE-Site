<?php
$img     = $s['image'] ?? null;
$reverse = !empty($s['reverse']);
$framed  = !empty($s['framed']) || (($s['id'] ?? '') === 'welcome');
?>
    <section<?= section_id($s) ?> class="scroll-mt-28 <?= $framed ? 'section-y bg-mist-50' : 'shell py-4' ?>">
<?php if ($img): ?>
      <div class="<?= $framed ? 'shell' : '' ?> grid items-center gap-10 lg:grid-cols-2 <?= $framed ? 'lg:gap-14 xl:gap-16' : 'lg:gap-16' ?>">
        <div<?= reveal($reverse ? 'left' : 'right') ?> class="min-w-0 <?= $reverse ? 'lg:order-2' : '' ?>">
          <?php section_heading($s); ?>
          <div class="prose-cne <?= !empty($s['title']) ? 'mt-5' : '' ?> <?= $framed ? 'max-w-xl' : '' ?>">
<?= $s['html'] ?>
          </div>
<?php if (!empty($s['cta']) || !empty($s['cta_secondary'])): ?>
          <div class="mt-8 flex flex-wrap gap-3">
<?php if (!empty($s['cta'])): ?>
            <a href="<?= e($s['cta'][1]) ?>" class="btn btn-primary"><?= e($s['cta'][0]) ?> <?= icon('arrow-right', 'size-4') ?></a>
<?php endif; ?>
<?php if (!empty($s['cta_secondary'])): ?>
            <a href="<?= e($s['cta_secondary'][1]) ?>" class="btn btn-secondary"><?= e($s['cta_secondary'][0]) ?></a>
<?php endif; ?>
          </div>
<?php endif; ?>
        </div>
        <div<?= reveal($reverse ? 'right' : 'left', 100) ?> class="relative <?= $reverse ? 'lg:order-1' : '' ?>">
<?php if ($framed): ?>
          <div class="card-surface overflow-hidden p-2 sm:p-2.5">
            <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ($s['title'] ?? '')] : $img, 'aspect-[4/3] w-full rounded-[1.25rem] object-cover object-center sm:rounded-[1.35rem]') ?>
          </div>
<?php else: ?>
          <div aria-hidden="true" class="absolute -inset-3 -z-10 rounded-[1.75rem] bg-gradient-to-br from-navy/[0.07] to-lime-soft/40 <?= $reverse ? 'rotate-[-1.5deg]' : 'rotate-[1.5deg]' ?>"></div>
          <?= img_tag(is_string($img) ? ['src' => $img, 'alt' => $s['image_alt'] ?? ($s['title'] ?? '')] : $img, 'aspect-[4/3] w-full rounded-[1.5rem] object-cover object-center') ?>
<?php endif; ?>
        </div>
      </div>
<?php else: ?>
      <div class="<?= $framed ? 'shell' : '' ?> mx-auto max-w-3xl">
        <?php section_heading($s, 'center'); ?>
        <div<?= reveal('up', 60) ?> class="prose-cne <?= !empty($s['title']) ? 'mt-5' : '' ?>">
<?= $s['html'] ?>
        </div>
      </div>
<?php endif; ?>
    </section>
