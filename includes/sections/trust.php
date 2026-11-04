<?php
$trust = $s['items'] ?? ['BIFA Member', 'IATA', 'HMRC · CDS authorised', 'Company No. ' . COMPANY_NO, 'Newcastle-based · UK-wide'];
?>
    <section aria-label="Accreditations" class="border-y border-line/60 bg-mist">
      <ul class="mx-auto flex max-w-6xl flex-wrap items-center justify-center gap-x-5 gap-y-2 px-6 py-5 text-[13px] font-semibold text-ink sm:gap-x-7">
<?php foreach ($trust as $i => $item): ?>
<?php if ($i > 0): ?>
        <li aria-hidden="true" class="hidden size-1 rounded-full bg-slate-300 sm:block"></li>
<?php endif; ?>
        <li class="flex items-center gap-2">
          <?= $i === 0 ? icon('shield', 'size-4 text-navy') : '' ?>
          <?= e($item) ?>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
