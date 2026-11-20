<?php
$ph = explode('→', preg_replace('/^e\.g\.\s*/', '', $s['quote_placeholder'] ?? ''));
[$fromPh, $toPh] = count($ph) === 2 ? array_map('trim', $ph) : ['Shanghai', 'Newcastle'];
$modes = ['air' => ['Air', 'plane'], 'sea' => ['Sea', 'ship'], 'road' => ['Road', 'truck'], 'customs' => ['Customs', 'shield']];
?>
<div id="quote"<?= reveal('left', 140) ?> class="card-surface w-full min-w-0 scroll-mt-28 p-4 sm:p-5">
  <div class="flex items-center justify-between gap-3">
    <h2 class="text-base font-bold tracking-tight text-ink sm:text-[1.05rem]">Request a quote</h2>
    <p class="shrink-0 text-[11px] font-medium text-muted sm:text-xs">Free · No obligation</p>
  </div>

  <form x-data="apiForm" @submit.prevent="submit" action="<?= e(API_BASE_URL) ?>/quotes" method="post" class="mt-3.5 min-w-0 space-y-2.5">
    <fieldset class="min-w-0">
      <legend class="sr-only">Service</legend>
      <div class="grid grid-cols-4 gap-1.5">
<?php foreach ($modes as $value => [$label, $ico]): ?>
        <label class="flex h-9 min-w-0 cursor-pointer items-center justify-center gap-1 overflow-hidden rounded-full border border-line bg-white px-1.5 text-[11px] font-semibold text-navy/65 transition-[transform,background-color,border-color,color,box-shadow] duration-300 hover:-translate-y-0.5 hover:border-navy/25 hover:bg-mist-50 hover:text-navy has-checked:border-lime has-checked:bg-lime has-checked:text-navy has-checked:shadow-[0_8px_20px_-12px_rgba(61,125,214,0.55)] has-focus-visible:ring-4 has-focus-visible:ring-navy/20 sm:h-10 sm:gap-1.5 sm:px-2 sm:text-[12px]">
          <input type="radio" name="mode" value="<?= e($value) ?>" class="sr-only"<?= $value === 'air' ? ' checked' : '' ?>>
          <?= icon($ico, 'size-3.5 shrink-0 opacity-80') ?>
          <span class="truncate"><?= e($label) ?></span>
        </label>
<?php endforeach; ?>
      </div>
    </fieldset>

    <div class="grid grid-cols-2 gap-2.5">
      <div class="min-w-0">
        <label for="q-from" class="mb-1 block text-[12px] font-medium text-ink/80">From</label>
        <div class="relative">
          <?= icon('map-pin', 'pointer-events-none absolute top-1/2 left-3 size-3.5 -translate-y-1/2 text-muted') ?>
          <input id="q-from" name="origin" type="text" required autocomplete="off" placeholder="<?= e($fromPh) ?>" class="field h-10 rounded-xl pl-9 text-[14px]">
        </div>
      </div>
      <div class="min-w-0">
        <label for="q-to" class="mb-1 block text-[12px] font-medium text-ink/80">To</label>
        <div class="relative">
          <?= icon('map-pin', 'pointer-events-none absolute top-1/2 left-3 size-3.5 -translate-y-1/2 text-muted') ?>
          <input id="q-to" name="destination" type="text" required autocomplete="off" placeholder="<?= e($toPh) ?>" class="field h-10 rounded-xl pl-9 text-[14px]">
        </div>
      </div>
      <div class="min-w-0">
        <label for="q-weight" class="mb-1 block text-[12px] font-medium text-ink/80">Weight <span class="font-normal text-muted">(kg)</span></label>
        <input id="q-weight" name="weight_kg" type="number" min="0" step="any" inputmode="decimal" placeholder="e.g. 250" class="field h-10 rounded-xl text-[14px]">
      </div>
      <div class="min-w-0">
        <label for="q-dims" class="mb-1 block text-[12px] font-medium text-ink/80">Size <span class="font-normal text-muted">(L×W×H cm)</span></label>
        <input id="q-dims" name="dimensions_cm" type="text" autocomplete="off" placeholder="120×80×100" class="field h-10 rounded-xl text-[14px]">
      </div>
      <div class="min-w-0">
        <label for="q-goods" class="mb-1 block text-[12px] font-medium text-ink/80">Goods</label>
        <input id="q-goods" name="goods" type="text" required autocomplete="off" placeholder="e.g. 2 pallets" class="field h-10 rounded-xl text-[14px]">
      </div>
      <div class="min-w-0">
        <label for="q-email" class="mb-1 block text-[12px] font-medium text-ink/80">Email</label>
        <input id="q-email" name="email" type="email" required autocomplete="email" placeholder="you@email.com" class="field h-10 rounded-xl text-[14px]">
      </div>
    </div>

    <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

    <button type="submit" :disabled="state === 'sending'" class="btn btn-primary btn-block mt-1 h-11 text-[14px]">
      <span x-text="state === 'sending' ? 'Sending…' : 'Get my quote'">Get my quote</span> <?= icon('arrow-right', 'size-4') ?>
    </button>

    <p role="status" aria-live="polite" class="text-center text-sm empty:hidden"
       :class="state === 'error' ? 'text-navy-700' : 'text-navy'"
       x-text="state === 'sent' ? 'Thanks - we’ll be in touch shortly.' : state === 'error' ? 'Something went wrong. Please call or email us.' : ''"></p>
    <p class="flex items-center justify-center gap-1.5 text-[11px] text-muted"><?= icon('lock', 'size-3') ?> Your details are private and secure</p>
  </form>
</div>
