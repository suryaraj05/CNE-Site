<?php
/**
 * Why Choose Cargo Northeast + enquiry form (ui-inspiration/8).
 * Preserves apiForm submission / fields from the shared form pattern.
 */
$fid = $s['form_id'] ?? 'enquiry';
$items = $s['items'] ?? [];
$eyebrow = $s['eyebrow'] ?? 'Why choose Cargo Northeast';
$intro = $s['intro'] ?? 'From global freight to customs and specialist services, we deliver practical, cost-effective solutions with a focus on care, compliance and clear communication.';
?>
    <section<?= section_id($s + ['id' => 'enquiry']) ?> class="section-y relative scroll-mt-28 overflow-hidden bg-mist-50">
      <div aria-hidden="true" class="pointer-events-none absolute -top-24 left-0 size-[26rem] rounded-full bg-[radial-gradient(circle,rgba(234,240,250,0.9),transparent_70%)]"></div>
      <div aria-hidden="true" class="pointer-events-none absolute right-0 bottom-0 size-[22rem] rounded-full bg-[radial-gradient(circle,rgba(29,57,120,0.06),transparent_70%)]"></div>

      <div class="shell relative grid items-center gap-10 lg:grid-cols-2 lg:gap-12 xl:gap-14">
        <!-- LEFT -->
        <div class="relative min-w-0">
          <div<?= reveal('up') ?>>
            <p class="eyebrow"><?= e($eyebrow) ?></p>
            <h2 class="heading-section-lg mt-5 max-w-lg">
              <span class="block">Reliable logistics.</span>
              <span class="mt-1 block">A partner you can trust.</span>
            </h2>
            <p class="lede mt-5 max-w-md"><?= e($intro) ?></p>
          </div>

<?php if ($items): ?>
          <ul class="mt-8 grid grid-cols-1 gap-5 sm:mt-9 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-6">
<?php foreach ($items as $i => $item): ?>
            <li<?= reveal('up', 60 + $i * 50) ?> class="flex items-start gap-3.5">
              <span class="icon-tile size-12 shrink-0 rounded-2xl">
                <?= icon($item['icon'] ?? 'check', 'size-5') ?>
              </span>
              <div class="min-w-0 pt-0.5">
                <h3 class="heading-card"><?= e($item['title']) ?></h3>
                <p class="body-sm mt-1"><?= e($item['text']) ?></p>
              </div>
            </li>
<?php endforeach; ?>
          </ul>
<?php endif; ?>
        </div>

        <!-- RIGHT: enquiry form (same apiForm behaviour) -->
        <div<?= reveal('left', 100) ?> class="card-surface relative z-10 self-center rounded-[2rem] p-6 sm:rounded-[2.25rem] sm:p-8 lg:p-9">
          <div class="mb-6 flex items-start gap-3.5">
            <span class="mt-0.5 inline-flex size-11 shrink-0 items-center justify-center rounded-xl bg-lime text-navy"><?= icon('mail', 'size-5') ?></span>
            <div>
              <h3 class="text-xl font-bold tracking-tight text-ink"><?= e($s['form_title'] ?? 'Send an enquiry') ?></h3>
<?php if (!empty($s['form_intro'])): ?>
              <p class="mt-1.5 text-sm leading-relaxed text-muted"><?= e($s['form_intro']) ?></p>
<?php endif; ?>
            </div>
          </div>

          <form x-data="apiForm" @submit.prevent="submit" action="<?= e(API_BASE_URL . ($s['endpoint'] ?? '/enquiries')) ?>" method="post"<?= !empty($s['success']) ? ' data-success="' . e($s['success']) . '"' : '' ?> class="grid gap-x-4 gap-y-4 sm:grid-cols-2">
<?php foreach ($s['fields'] as $f):
    $type = $f['type'] ?? 'text';
    $id   = $fid . '-' . ($f['name'] ?? '');
    $req  = !empty($f['required']);
    $span = !empty($f['half']) ? '' : 'sm:col-span-2';
    $ph   = isset($f['placeholder']) ? ' placeholder="' . e($f['placeholder']) . '"' : '';
    $ac   = ' autocomplete="' . e($f['autocomplete'] ?? 'off') . '"';
?>
            <div class="<?= $span ?>">
              <label for="<?= e($id) ?>" class="field-label">
                <?= e($f['label']) ?><?= $req ? '<span class="text-red-500" aria-hidden="true">*</span>' : '' ?>
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

            <div class="sm:col-span-2 pt-1">
              <button type="submit" :disabled="state === 'sending'" class="btn btn-primary btn-block h-12">
                <span x-text="state === 'sending' ? 'Sending…' : <?= e(json_encode($s['submit'] ?? 'Send enquiry')) ?>"><?= e($s['submit'] ?? 'Send enquiry') ?></span>
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
