<?php
$ph = explode('→', preg_replace('/^e\.g\.\s*/', '', $s['quote_placeholder'] ?? ''));
[$fromPh, $toPh] = count($ph) === 2 ? array_map('trim', $ph) : ['Shanghai', 'Newcastle'];
$modes = ['air' => ['Air', 'plane'], 'sea' => ['Sea', 'ship'], 'road' => ['Road', 'truck'], 'customs' => ['Customs', 'shield']];
?>
<div id="quote"<?= reveal('left', 140) ?> class="w-full min-w-0 scroll-mt-28 rounded-[1.35rem] border border-white/60 bg-white/95 shadow-[0_28px_80px_-36px_rgba(12,18,57,0.55)] backdrop-blur-sm">
  <div class="flex items-center justify-between gap-4 px-5 pt-5 pb-1 sm:px-7">
    <h2 class="text-lg font-bold tracking-tight text-ink">Request a quote</h2>
    <p class="shrink-0 text-xs font-medium text-muted">Free · No obligation</p>
  </div>

  <form x-data="apiForm" @submit.prevent="submit" action="<?= e(API_BASE_URL) ?>/quotes" method="post" class="min-w-0 space-y-3.5 px-5 pt-5 pb-5 sm:px-7">
    <fieldset class="min-w-0">
      <legend class="sr-only">Service</legend>
      <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
<?php foreach ($modes as $value => [$label, $ico]): ?>
        <label class="flex h-10 min-w-0 cursor-pointer items-center justify-center gap-1.5 overflow-hidden rounded-full border border-line bg-mist-50 px-2.5 text-[12px] font-semibold text-muted transition-[transform,background-color,border-color,color,box-shadow] duration-300 hover:-translate-y-0.5 hover:border-navy/30 hover:text-navy has-checked:border-navy has-checked:bg-navy has-checked:text-white has-checked:shadow-[0_10px_24px_-14px_rgba(36,62,149,0.7)] has-focus-visible:ring-4 has-focus-visible:ring-navy/20 sm:text-[13px] sm:px-3">
          <input type="radio" name="mode" value="<?= e($value) ?>" class="sr-only">
          <?= icon($ico, 'size-3.5 shrink-0 opacity-80') ?>
          <span class="truncate"><?= e($label) ?></span>
        </label>
<?php endforeach; ?>
      </div>
    </fieldset>

    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
      <div class="min-w-0">
        <label for="q-from" class="field-label">From</label>
        <div class="relative">
          <?= icon('map-pin', 'pointer-events-none absolute top-1/2 left-3.5 size-4 -translate-y-1/2 text-muted') ?>
          <input id="q-from" name="origin" type="text" required autocomplete="off" placeholder="<?= e($fromPh) ?>" class="field pl-10">
        </div>
      </div>
      <div class="min-w-0">
        <label for="q-to" class="field-label">To</label>
        <div class="relative">
          <?= icon('map-pin', 'pointer-events-none absolute top-1/2 left-3.5 size-4 -translate-y-1/2 text-muted') ?>
          <input id="q-to" name="destination" type="text" required autocomplete="off" placeholder="<?= e($toPh) ?>" class="field pl-10">
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
      <div class="min-w-0">
        <label for="q-weight" class="field-label">Weight <span class="font-normal text-muted">(kg)</span></label>
        <input id="q-weight" name="weight_kg" type="number" min="0" step="any" inputmode="decimal" placeholder="e.g. 250" class="field">
      </div>
      <div class="min-w-0">
        <label for="q-dims" class="field-label">Size <span class="font-normal text-muted">(L×W×H cm)</span></label>
        <input id="q-dims" name="dimensions_cm" type="text" autocomplete="off" placeholder="120×80×100" class="field">
      </div>
    </div>

    <div class="grid gap-3 sm:grid-cols-2">
      <div class="min-w-0">
        <label for="q-goods" class="field-label">Goods</label>
        <input id="q-goods" name="goods" type="text" required autocomplete="off" placeholder="e.g. 2 pallets" class="field">
      </div>
      <div class="min-w-0">
        <label for="q-email" class="field-label">Email</label>
        <input id="q-email" name="email" type="email" required autocomplete="email" placeholder="you@email.com" class="field">
      </div>
    </div>

    <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

    <button type="submit" :disabled="state === 'sending'" class="btn btn-primary btn-block mt-5 h-12">
      <span x-text="state === 'sending' ? 'Sending…' : 'Get my quote'">Get my quote</span> <?= icon('arrow-right', 'size-4') ?>
    </button>

    <p role="status" aria-live="polite" class="text-center text-sm empty:hidden"
       :class="state === 'error' ? 'text-navy-700' : 'text-navy'"
       x-text="state === 'sent' ? 'Thanks - we’ll be in touch shortly.' : state === 'error' ? 'Something went wrong. Please call or email us.' : ''"></p>
    <p class="flex items-center justify-center gap-1.5 text-xs text-muted"><?= icon('lock', 'size-3.5') ?> Reply within hours · Your details stay private</p>
  </form>
</div>
