<?php
$f = is_array($item['fields'] ?? null) ? $item['fields'] : [];
$type = ($item['type'] ?? '') === 'quotes' ? 'quotes' : 'enquiries';
$listHref = '/admin/' . $type;
$id = (string) ($item['id'] ?? '');
$ref = (string) ($item['ref'] ?? '');
$status = (string) ($item['status'] ?? 'new');
$csrf = admin_csrf_token();

$headline = $type === 'quotes'
    ? trim(($f['origin'] ?? '') . ' → ' . ($f['destination'] ?? ''), ' →')
    : (string) ($f['name'] ?? $f['email'] ?? 'Enquiry');
if ($headline === '') {
    $headline = $ref !== '' ? $ref : 'Submission';
}

$labels = [
    'mode' => 'Mode',
    'origin' => 'Origin',
    'destination' => 'Destination',
    'email' => 'Email',
    'name' => 'Name',
    'phone' => 'Phone',
    'company' => 'Company',
    'weight_kg' => 'Weight',
    'dimensions_cm' => 'Dimensions',
    'goods' => 'Goods',
    'message' => 'Message',
    'subject' => 'Subject',
    'enquiry_type' => 'Enquiry type',
    'sender_city' => 'Sender city',
    'receiver_city' => 'Receiver city',
];

$prefer = $type === 'quotes'
    ? ['mode', 'origin', 'destination', 'email', 'name', 'phone', 'company', 'weight_kg', 'dimensions_cm', 'goods', 'message']
    : ['name', 'email', 'phone', 'company', 'subject', 'enquiry_type', 'sender_city', 'receiver_city', 'weight_kg', 'message'];

$wideKeys = ['message', 'goods'];
$rows = [];
foreach ($prefer as $key) {
    if (!array_key_exists($key, $f)) {
        continue;
    }
    $value = $f[$key];
    if ($value === '' || $value === null) {
        continue;
    }
    if ($key === 'weight_kg' && is_scalar($value)) {
        $value = $value . ' kg';
    }
    if ($key === 'dimensions_cm' && is_scalar($value) && !str_contains((string) $value, 'cm')) {
        $value = $value . ' cm';
    }
    $rows[$key] = $value;
}
foreach ($f as $key => $value) {
    if (isset($rows[$key]) || $value === '' || $value === null) {
        continue;
    }
    $rows[$key] = $value;
}

$compact = [];
$wide = [];
foreach ($rows as $key => $value) {
    if (in_array($key, $wideKeys, true)) {
        $wide[$key] = $value;
    } else {
        $compact[$key] = $value;
    }
}

$received = '—';
if (!empty($item['created_at'])) {
    $ts = strtotime((string) $item['created_at']);
    if ($ts) {
        $received = date('j M Y, H:i', $ts) . ' UTC';
    }
}
?>
<?php if (!empty($flash)): ?>
  <p class="mb-4 rounded-xl bg-mist-50 px-3 py-2.5 text-sm font-medium text-navy" role="status"><?= e((string) $flash) ?></p>
<?php endif; ?>

<div class="mb-4">
  <a href="<?= e($listHref) ?>" class="text-sm font-medium text-muted transition-colors hover:text-navy">&larr; Back to list</a>
</div>

<section class="min-w-0 rounded-2xl bg-white ring-1 ring-navy/[0.06]">
  <div class="flex flex-wrap items-start justify-between gap-3 border-b border-line/60 px-5 py-4 sm:px-6">
    <div class="min-w-0">
      <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
        <p class="font-mono text-[12px] font-semibold text-navy"><?= e($ref) ?></p>
        <span class="text-xs text-muted"><?= e($type === 'quotes' ? 'Quote request' : 'Enquiry') ?></span>
      </div>
      <h2 class="mt-1 text-xl font-bold tracking-tight break-words text-ink"><?= e($headline) ?></h2>
      <p class="mt-1 text-xs text-muted">
        <?= e($received) ?>
<?php if (!empty($item['page'])): ?>
        <span class="mx-1.5 text-line">·</span>
        <span title="<?= e((string) $item['page']) ?>"><?= e((string) $item['page']) ?></span>
<?php endif; ?>
      </p>
    </div>
    <span class="shrink-0 rounded-full px-2.5 py-1 text-[11px] font-semibold <?= $status === 'new' ? 'bg-navy/10 text-navy' : 'bg-mist text-muted' ?>"><?= e(ucfirst($status)) ?></span>
  </div>

<?php if ($rows === []): ?>
  <p class="px-5 py-6 text-sm text-muted sm:px-6">No form fields were captured for this submission.</p>
<?php else: ?>
  <div class="px-5 py-2 sm:px-6">
<?php if ($compact !== []):
    $half = (int) ceil(count($compact) / 2);
    $left = array_slice($compact, 0, $half, true);
    $right = array_slice($compact, $half, null, true);
?>
    <div class="grid gap-x-10 md:grid-cols-2">
      <dl class="divide-y divide-line/50">
<?php foreach ($left as $key => $value):
    $label = $labels[$key] ?? ucwords(str_replace('_', ' ', (string) $key));
    $text = is_scalar($value) ? (string) $value : json_encode($value, JSON_UNESCAPED_UNICODE);
?>
        <div class="grid grid-cols-[7.5rem_minmax(0,1fr)] items-baseline gap-3 py-3">
          <dt class="text-[13px] text-muted"><?= e($label) ?></dt>
          <dd class="min-w-0 break-words text-[13px] font-semibold text-ink"><?= e($text) ?></dd>
        </div>
<?php endforeach; ?>
      </dl>
      <dl class="divide-y divide-line/50">
<?php foreach ($right as $key => $value):
    $label = $labels[$key] ?? ucwords(str_replace('_', ' ', (string) $key));
    $text = is_scalar($value) ? (string) $value : json_encode($value, JSON_UNESCAPED_UNICODE);
?>
        <div class="grid grid-cols-[7.5rem_minmax(0,1fr)] items-baseline gap-3 py-3">
          <dt class="text-[13px] text-muted"><?= e($label) ?></dt>
          <dd class="min-w-0 break-words text-[13px] font-semibold text-ink"><?= e($text) ?></dd>
        </div>
<?php endforeach; ?>
      </dl>
    </div>
<?php endif; ?>

<?php foreach ($wide as $key => $value):
    $label = $labels[$key] ?? ucwords(str_replace('_', ' ', (string) $key));
    $text = is_scalar($value) ? (string) $value : json_encode($value, JSON_UNESCAPED_UNICODE);
?>
    <div class="border-t border-line/50 py-4">
      <p class="text-[13px] text-muted"><?= e($label) ?></p>
      <p class="mt-1.5 text-[13px] leading-relaxed font-semibold break-words text-ink"><?= e($text) ?></p>
    </div>
<?php endforeach; ?>
  </div>
<?php endif; ?>

  <div class="flex flex-wrap items-end gap-3 border-t border-line/60 px-5 py-4 sm:px-6">
    <form method="post" class="flex min-w-0 flex-1 flex-wrap items-end gap-2.5">
      <input type="hidden" name="_csrf" value="<?= e($csrf) ?>">
      <input type="hidden" name="id" value="<?= e($id) ?>">
      <input type="hidden" name="action" value="status">
      <div class="w-full max-w-[14rem]">
        <label for="status" class="field-label">Status</label>
        <select id="status" name="status" class="field !h-10 !rounded-xl">
<?php foreach (['new', 'contacted', 'quoted', 'closed'] as $st): ?>
          <option value="<?= e($st) ?>"<?= $status === $st ? ' selected' : '' ?>><?= e(ucfirst($st)) ?></option>
<?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-sm h-10">Update status</button>
    </form>
    <form method="post" onsubmit="return confirm('Move to trash?')">
      <input type="hidden" name="_csrf" value="<?= e($csrf) ?>">
      <input type="hidden" name="id" value="<?= e($id) ?>">
      <input type="hidden" name="action" value="trash">
      <button type="submit" class="btn btn-secondary btn-sm h-10">Move to trash</button>
    </form>
  </div>
</section>
