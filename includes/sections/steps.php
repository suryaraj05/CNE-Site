<?php
$steps = $s['items'] ?? [
    ['title' => 'Book', 'text' => 'Send us your cargo details and we arrange the freight.'],
    ['title' => 'Ship', 'text' => 'Your goods move by air, sea or road, tracked along the way.'],
    ['title' => 'Clear customs', 'text' => 'We submit your HMRC declaration and clear the shipment.'],
    ['title' => 'Deliver', 'text' => 'Onward delivery to your door anywhere in the UK.'],
];
?>
    <section<?= section_id($s + ['id' => 'how-it-works']) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <?php section_heading($s + ['eyebrow' => 'How it works', 'title' => 'Four steps, one team']); ?>
      <ol class="mt-10 grid gap-5 sm:grid-cols-2 <?= count($steps) === 3 ? 'lg:grid-cols-3' : 'lg:grid-cols-4' ?>">
<?php foreach ($steps as $i => $step): ?>
        <li class="rounded-2xl border border-line bg-white p-7">
          <span class="text-3xl font-bold text-navy"><?= $i + 1 ?></span>
          <h3 class="mt-4 text-base font-bold text-ink"><?= e($step['title']) ?></h3>
          <p class="mt-2 text-sm leading-relaxed text-muted"><?= e($step['text']) ?></p>
        </li>
<?php endforeach; ?>
      </ol>
    </section>
