<?php
$fid = $s['form_id'] ?? 'form';
$enquiry = ($s['id'] ?? '') === 'enquiry' || !empty($s['enquiry_layout']);
?>
    <section<?= section_id($s) ?> class="relative scroll-mt-28 overflow-hidden <?= $enquiry ? 'section-y bg-mist-50' : 'section-y bg-mist-50' ?>">
<?php if ($enquiry): ?>
      <div aria-hidden="true" class="pointer-events-none absolute -top-24 -left-20 size-[28rem] rounded-full bg-[radial-gradient(circle,rgba(232,237,246,0.95),transparent_68%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -right-16 bottom-0 size-[24rem] rounded-full bg-[radial-gradient(circle,rgba(204,255,0,0.12),transparent_70%)]"></div>
<?php endif; ?>
      <div class="shell relative grid items-start gap-12 lg:grid-cols-2 lg:gap-14 xl:gap-16">
        <div>
          <?php section_heading($s); ?>
<?php if (!empty($s['points'])): ?>
          <ul class="mt-8 space-y-3.5 text-[15px] text-ink">
<?php foreach ($s['points'] as $point): ?>
            <li class="flex items-start gap-3"><?= icon('check', 'mt-0.5 size-5 shrink-0 text-navy') ?><?= e($point) ?></li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>
<?php if (!empty($s['items'])): ?>
          <ul class="mt-10 grid grid-cols-1 items-stretch gap-4 sm:grid-cols-2 <?= $enquiry ? 'sm:gap-5' : '' ?>">
<?php foreach ($s['items'] as $i => $item): ?>
            <li<?= reveal('up', 80 + $i * 90) ?> class="flex h-full flex-col <?= $enquiry ? 'rounded-[1.25rem] bg-white/80 p-5 shadow-[0_14px_40px_-32px_rgba(26,54,115,0.35)] ring-1 ring-navy/[0.05]' : 'rounded-[1.25rem] bg-white p-5 ring-1 ring-navy/[0.06]' ?>">
              <span class="flex size-11 items-center justify-center rounded-2xl <?= $enquiry ? 'bg-mist text-navy shadow-sm ring-1 ring-navy/[0.06]' : 'bg-lime/80 text-ink' ?>"><?= icon($item['icon'] ?? 'check') ?></span>
              <h3 class="mt-4 text-base font-bold text-ink"><?= e($item['title']) ?></h3>
              <p class="mt-1.5 flex-1 text-sm leading-relaxed text-muted"><?= e($item['text']) ?></p>
            </li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>
<?php if (!empty($s['image'])): ?>
          <div<?= reveal('up', 60) ?> class="mt-8 overflow-hidden rounded-[1.35rem] <?= $enquiry ? 'shadow-[0_20px_50px_-36px_rgba(26,54,115,0.45)] ring-1 ring-navy/[0.06]' : '' ?>">
            <?= img_tag(is_string($s['image']) ? ['src' => $s['image'], 'alt' => $s['image_alt'] ?? 'Our office'] : $s['image'], 'aspect-[16/10] w-full object-cover') ?>
          </div>
<?php endif; ?>
<?php if (!empty($s['contact'])): ?>
          <div class="mt-8 grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl bg-shade/90 p-5 ring-1 ring-navy/[0.06]">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('building', 'size-4 text-navy') ?> UK office</h3>
              <address class="mt-3 space-y-1.5 text-sm text-muted not-italic">
                <p><?= e(ADDRESS['street']) ?>, <?= e(ADDRESS['locality']) ?> <?= e(ADDRESS['postcode']) ?>, United Kingdom</p>
                <p><a href="tel:<?= e(PHONE_E164) ?>" class="font-semibold text-navy hover:underline"><?= e(PHONE_DISPLAY) ?></a></p>
                <p><a href="mailto:<?= e(EMAIL) ?>" class="font-semibold break-all text-navy hover:underline"><?= e(EMAIL) ?></a></p>
              </address>
            </div>
            <div class="rounded-2xl bg-shade/90 p-5 ring-1 ring-navy/[0.06]">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('globe', 'size-4 text-navy') ?> India office</h3>
              <address class="mt-3 space-y-1.5 text-sm text-muted not-italic">
                <p><?= e(INDIA_OFFICE['name']) ?>, <?= e(INDIA_OFFICE['address']) ?></p>
                <p><a href="tel:<?= e(INDIA_OFFICE['phone_e164']) ?>" class="font-semibold text-navy hover:underline"><?= e(INDIA_OFFICE['phone_display']) ?></a></p>
              </address>
            </div>
            <div class="rounded-2xl bg-shade/90 p-5 ring-1 ring-navy/[0.06]">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('clock', 'size-4 text-navy') ?> Working hours</h3>
              <dl class="mt-3 space-y-1.5 text-sm">
<?php foreach (OPENING_HOURS as $days => $hours): ?>
                <div class="flex justify-between gap-4"><dt class="text-muted"><?= e($days) ?></dt><dd class="font-semibold <?= $hours === 'Closed' ? 'text-navy-700' : 'text-ink' ?>"><?= e($hours) ?></dd></div>
<?php endforeach; ?>
              </dl>
            </div>
            <div class="rounded-2xl bg-shade/90 p-5 ring-1 ring-navy/[0.06]">
              <h3 class="flex items-center gap-2 text-[15px] font-bold text-ink"><?= icon('users', 'size-4 text-navy') ?> We’re social</h3>
              <div class="mt-3 flex items-center gap-2">
                <?= social_links('flex size-9 items-center justify-center rounded-lg border border-line text-muted transition-colors hover:border-navy/30 hover:text-navy') ?>
              </div>
            </div>
          </div>
<?php endif; ?>
        </div>

        <div<?= reveal('left', 140) ?> class="card-surface self-start p-6 sm:p-8 lg:sticky lg:top-28">
<?php if (!empty($s['form_title'])): ?>
          <div class="mb-6 flex items-start gap-3.5">
<?php if ($enquiry): ?>
            <span class="mt-0.5 inline-flex size-11 shrink-0 items-center justify-center rounded-xl bg-lime text-ink"><?= icon('mail', 'size-5') ?></span>
<?php endif; ?>
            <div>
              <h3 class="text-xl font-bold tracking-tight text-ink"><?= e($s['form_title']) ?></h3>
<?php if (!empty($s['form_intro'])): ?>
              <p class="mt-1.5 text-sm leading-relaxed text-muted"><?= e($s['form_intro']) ?></p>
<?php endif; ?>
            </div>
          </div>
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
              <label for="<?= e($id) ?>" class="field-label">
                <?= e($f['label']) ?><?= $req ? '<span class="text-red-500" aria-hidden="true">*</span>' : ' <span class="font-normal text-muted">(optional)</span>' ?>
              </label>
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
              <button type="submit" :disabled="state === 'sending'" class="btn <?= $enquiry ? 'btn-primary' : 'btn-lime' ?> btn-block h-12">
                <span x-text="state === 'sending' ? 'Sending…' : <?= e(json_encode($s['submit'] ?? 'Send')) ?>"><?= e($s['submit'] ?? 'Send') ?></span>
                <?= icon('arrow-right', 'size-4') ?>
              </button>
              <p role="status" aria-live="polite" class="mt-3 text-center text-sm empty:hidden"
                 :class="state === 'error' ? 'text-navy-700' : 'text-navy'"
                 x-text="state === 'sent' ? 'Thanks - we’ll be in touch shortly.' : state === 'error' ? 'Something went wrong. Please call or email us.' : ''"></p>
            </div>
          </form>
        </div>
      </div>
    </section>
