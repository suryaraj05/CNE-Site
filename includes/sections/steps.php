<?php
$steps = $s['items'] ?? [
    ['title' => 'Book', 'text' => 'Send us your cargo details and we arrange the freight.'],
    ['title' => 'Ship', 'text' => 'Your goods move by air, sea or road, tracked along the way.'],
    ['title' => 'Clear customs', 'text' => 'We submit your HMRC declaration and clear the shipment.'],
    ['title' => 'Deliver', 'text' => 'Onward delivery to your door anywhere in the UK.'],
];
?>
    <section<?= section_id($s + ['id' => 'how-it-works']) ?> class="scroll-mt-28 bg-white/70 py-16 sm:py-20">
      <div class="mx-auto max-w-7xl px-6 lg:px-10">
      <?php section_heading($s + ['eyebrow' => 'How it works', 'title' => 'Four steps, one team'], 'center'); ?>
      <ol class="mt-14 grid items-stretch gap-6 sm:grid-cols-2 <?= count($steps) === 3 ? 'lg:grid-cols-3' : 'lg:grid-cols-4' ?> lg:gap-8">
<?php foreach ($steps as $i => $step): ?>
        <li<?= reveal('up', 50 + $i * 80) ?> class="relative flex h-full flex-col rounded-2xl bg-shade/90 p-6 ring-1 ring-navy/[0.06] sm:p-7">
<?php if ($i < count($steps) - 1): ?>
          <span aria-hidden="true" class="absolute top-10 right-0 z-10 hidden h-px w-6 translate-x-1/2 bg-navy/20 lg:block"></span>
<?php endif; ?>
          <span class="font-serif text-5xl leading-none text-navy/25"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
          <h3 class="mt-4 text-base font-bold text-ink"><?= e($step['title']) ?></h3>
          <p class="mt-2 flex-1 text-[15px] leading-relaxed text-muted"><?= e($step['text']) ?></p>
        </li>
<?php endforeach; ?>
      </ol>
      </div>
    </section>
