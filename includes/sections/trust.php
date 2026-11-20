<?php
$trust = $s['items'] ?? ['BIFA Member', 'IATA', 'HMRC · CDS authorised', 'Company No. ' . COMPANY_NO, 'Newcastle-based · UK-wide'];
?>
    <section aria-label="Accreditations" class="border-y border-line/60 bg-white">
      <ul<?= reveal('up') ?> class="shell flex flex-wrap items-center justify-center gap-x-6 gap-y-2 py-4 text-[13px] font-medium text-ink/75 sm:gap-x-8">
<?php foreach ($trust as $i => $item): ?>
<?php if ($i > 0): ?>
        <li aria-hidden="true" class="hidden text-line sm:block">·</li>
<?php endif; ?>
        <li class="flex items-center gap-2">
          <?= $i === 0 ? icon('shield', 'size-3.5 text-navy') : '' ?>
          <?= e($item) ?>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
