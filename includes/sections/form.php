<?php $fid = $s['form_id'] ?? 'form'; ?>
    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <div class="grid gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(0,600px)] lg:gap-16">
        <div>
          <?php section_heading($s); ?>
<?php if (!empty($s['points'])): ?>
          <ul class="mt-8 space-y-3.5 text-[15px] text-ink">
<?php foreach ($s['points'] as $point): ?>
            <li class="flex items-start gap-3"><?= icon('check', 'mt-0.5 size-5 shrink-0 text-emerald-600') ?><?= e($point) ?></li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>
<?php if (!empty($s['items'])): ?>
          <ul class="mt-10 space-y-7">
<?php foreach ($s['items'] as $item): ?>
            <li class="flex items-start gap-4">
              <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-mist text-navy"><?= icon($item['icon'] ?? 'check') ?></span>
              <div>
                <h3 class="text-base font-bold text-ink"><?= e($item['title']) ?></h3>
                <p class="mt-1 text-sm leading-relaxed text-muted"><?= e($item['text']) ?></p>
              </div>
            </li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>
<?php if (!empty($s['contact'])): ?>
          <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
            <div class="rounded-2xl border border-line bg-white p-6">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('building', 'size-4 text-navy') ?> UK office</h3>
              <address class="mt-3 space-y-1.5 text-sm text-muted not-italic">
                <p><?= e(ADDRESS['street']) ?>, <?= e(ADDRESS['locality']) ?> <?= e(ADDRESS['postcode']) ?>, United Kingdom</p>
                <p><a href="tel:<?= e(PHONE_E164) ?>" class="font-semibold text-navy hover:underline"><?= e(PHONE_DISPLAY) ?></a></p>
                <p><a href="mailto:<?= e(EMAIL) ?>" class="font-semibold break-all text-navy hover:underline"><?= e(EMAIL) ?></a></p>
              </address>
            </div>
            <div class="rounded-2xl border border-line bg-white p-6">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('globe', 'size-4 text-navy') ?> India office</h3>
              <address class="mt-3 space-y-1.5 text-sm text-muted not-italic">
                <p><?= e(INDIA_OFFICE['name']) ?>, <?= e(INDIA_OFFICE['address']) ?></p>
                <p><a href="tel:<?= e(INDIA_OFFICE['phone_e164']) ?>" class="font-semibold text-navy hover:underline"><?= e(INDIA_OFFICE['phone_display']) ?></a></p>
              </address>
            </div>
            <div class="rounded-2xl border border-line bg-white p-6">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('clock', 'size-4 text-navy') ?> Working hours</h3>
              <dl class="mt-3 space-y-1.5 text-sm">
<?php foreach (OPENING_HOURS as $days => $hours): ?>
                <div class="flex justify-between gap-4"><dt class="text-muted"><?= e($days) ?></dt><dd class="font-semibold <?= $hours === 'Closed' ? 'text-red-600' : 'text-ink' ?>"><?= e($hours) ?></dd></div>
<?php endforeach; ?>
              </dl>
            </div>
            <div class="rounded-2xl border border-line bg-white p-6">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('users', 'size-4 text-navy') ?> We’re social</h3>
              <div class="mt-3 flex items-center gap-2">
                <?= social_links('flex size-9 items-center justify-center rounded-lg border border-line text-muted transition-colors hover:border-navy/30 hover:text-navy') ?>
              </div>
            </div>
          </div>
<?php endif; ?>
        </div>

        <div class="self-start rounded-2xl border border-line bg-white p-6 shadow-[0_24px_48px_-28px_rgba(23,43,117,0.28)] sm:p-8">
<?php if (!empty($s['form_title'])): ?>
          <h3 class="mb-6 text-xl font-bold tracking-tight text-ink"><?= e($s['form_title']) ?></h3>
<?php endif; ?>
          <form x-data="apiForm" @submit.prevent="submit" action="<?= e(API_BASE_URL . $s['endpoint']) ?>" method="post"<?= !empty($s['success']) ? ' data-success="' . e($s['success']) . '"' : '' ?> class="grid gap-x-4 gap-y-5 sm:grid-cols-2">
<?php foreach ($s['fields'] as $f):
    $type = $f['type'] ?? 'text';
    $id   = $fid . '-' . ($f['name'] ?? '');
    $req  = !empty($f['required']);
    $span = !empty($f['half']) ? '' : 'sm:col-span-2';
    $ph   = isset($f['placeholder']) ? ' placeholder="' . e($f['placeholder']) . '"' : '';
    $ac   = ' autocomplete="' . e($f['autocomplete'] ?? 'off') . '"';
?>
<?php if ($type === 'heading'): ?>
            <p class="border-b border-line pb-2 text-sm font-bold text-ink sm:col-span-2 [&:not(:first-child)]:mt-4"><?= e($f['label']) ?></p>
<?php continue; endif; ?>
            <div class="<?= $span ?>">
              <label for="<?= e($id) ?>" class="field-label"><?= e($f['label']) ?><?= $req ? '' : ' <span class="font-normal text-muted">(optional)</span>' ?></label>
<?php if ($type === 'select'): ?>
              <select id="<?= e($id) ?>" name="<?= e($f['name']) ?>"<?= $req ? ' required' : '' ?> class="field">
                <option value="">Please choose…</option>
<?php foreach ($f['options'] as $opt): ?>
                <option><?= e($opt) ?></option>
<?php endforeach; ?>
              </select>
<?php elseif ($type === 'textarea'): ?>
              <textarea id="<?= e($id) ?>" name="<?= e($f['name']) ?>" rows="4"<?= $req ? ' required' : '' ?><?= $ph ?> class="field h-auto py-3"></textarea>
<?php else: ?>
              <input id="<?= e($id) ?>" name="<?= e($f['name']) ?>" type="<?= e($type) ?>"<?= $req ? ' required' : '' ?><?= $ph . $ac ?><?= $type === 'number' ? ' min="0" step="any" inputmode="decimal"' : '' ?> class="field">
<?php endif; ?>
            </div>
<?php endforeach; ?>

            <input type="text" name="company_website" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

            <div class="sm:col-span-2">
              <button type="submit" :disabled="state === 'sending'" class="flex h-12 w-full items-center justify-center rounded-lg bg-navy text-[15px] font-semibold text-white shadow-sm transition-colors hover:bg-navy-700 focus-visible:ring-4 focus-visible:ring-navy/20 focus-visible:outline-none disabled:cursor-wait disabled:opacity-70">
                <span x-text="state === 'sending' ? 'Sending…' : <?= e(json_encode($s['submit'] ?? 'Send')) ?>"><?= e($s['submit'] ?? 'Send') ?></span>
              </button>
              <p role="status" aria-live="polite" class="mt-3 text-center text-sm empty:hidden"
                 :class="state === 'error' ? 'text-red-600' : 'text-emerald-700'"
                 x-text="state === 'sent' ? 'Thanks — we’ll be in touch shortly.' : state === 'error' ? 'Something went wrong. Please call or email us.' : ''"></p>
            </div>
          </form>
        </div>
      </div>
    </section>
