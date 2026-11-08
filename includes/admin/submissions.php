<?php if (!empty($flash)): ?>
  <p class="mb-4 rounded-xl bg-mist-50 px-3 py-2 text-sm font-medium text-navy" role="status"><?= e((string) $flash) ?></p>
<?php endif; ?>

<div class="overflow-x-auto rounded-2xl bg-white ring-1 ring-navy/[0.06]">
  <table class="w-full min-w-[920px] table-fixed text-left text-[13px]">
    <thead class="border-b border-line/70 bg-shade/70 text-[11px] font-semibold tracking-wide text-muted uppercase">
      <tr>
<?php if ($type === 'quotes'): ?>
        <th class="w-[9.5rem] px-3 py-2.5">Ref</th>
        <th class="w-[12rem] px-3 py-2.5">Route</th>
        <th class="w-[5rem] px-3 py-2.5">Mode</th>
        <th class="w-[14rem] px-3 py-2.5">Contact</th>
        <th class="px-3 py-2.5">Cargo</th>
<?php else: ?>
        <th class="w-[9.5rem] px-3 py-2.5">Ref</th>
        <th class="w-[10rem] px-3 py-2.5">Name</th>
        <th class="w-[14rem] px-3 py-2.5">Contact</th>
        <th class="px-3 py-2.5">About</th>
<?php endif; ?>
        <th class="w-[5.5rem] px-3 py-2.5">Status</th>
        <th class="w-[7.5rem] px-3 py-2.5">Date</th>
        <th class="w-[4.5rem] px-3 py-2.5"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line/50">
<?php if (empty($items)): ?>
      <tr><td colspan="8" class="px-3 py-8 text-center text-muted">No submissions yet.</td></tr>
<?php else: ?>
<?php foreach ($items as $row):
    $f = is_array($row['fields'] ?? null) ? $row['fields'] : [];
    $cargo = trim(implode(' · ', array_filter([
        $f['goods'] ?? null,
        isset($f['weight_kg']) && $f['weight_kg'] !== '' ? $f['weight_kg'] . ' kg' : null,
        $f['dimensions_cm'] ?? null,
    ])));
    $about = (string) ($f['enquiry_type'] ?? $f['subject'] ?? $f['message'] ?? '—');
?>
      <tr class="align-middle hover:bg-mist-50/60">
<?php if ($type === 'quotes'): ?>
        <td class="truncate px-3 py-2.5 font-mono text-[12px] font-semibold text-ink"><?= e((string) ($row['ref'] ?? '')) ?></td>
        <td class="truncate px-3 py-2.5 font-medium text-ink" title="<?= e(trim(($f['origin'] ?? '') . ' → ' . ($f['destination'] ?? ''), ' →')) ?>"><?= e(trim(($f['origin'] ?? '—') . ' → ' . ($f['destination'] ?? '—'), ' →')) ?></td>
        <td class="truncate px-3 py-2.5 capitalize text-muted"><?= e((string) ($f['mode'] ?? '—')) ?></td>
        <td class="truncate px-3 py-2.5 text-ink" title="<?= e((string) ($f['email'] ?? '')) ?>"><?= e((string) ($f['email'] ?? '—')) ?></td>
        <td class="truncate px-3 py-2.5 text-muted" title="<?= e($cargo) ?>"><?= e($cargo !== '' ? $cargo : '—') ?></td>
<?php else: ?>
        <td class="truncate px-3 py-2.5 font-mono text-[12px] font-semibold text-ink"><?= e((string) ($row['ref'] ?? '')) ?></td>
        <td class="truncate px-3 py-2.5 font-medium text-ink"><?= e((string) ($f['name'] ?? '—')) ?></td>
        <td class="truncate px-3 py-2.5 text-ink" title="<?= e((string) ($f['email'] ?? '')) ?>"><?= e((string) ($f['email'] ?? '—')) ?></td>
        <td class="truncate px-3 py-2.5 text-muted" title="<?= e($about) ?>"><?= e($about) ?></td>
<?php endif; ?>
        <td class="px-3 py-2.5">
          <span class="inline-flex rounded-full px-2 py-0.5 text-[11px] font-semibold <?= ($row['status'] ?? '') === 'new' ? 'bg-navy/10 text-navy' : 'bg-mist text-muted' ?>"><?= e(ucfirst((string) ($row['status'] ?? 'new'))) ?></span>
        </td>
        <td class="whitespace-nowrap px-3 py-2.5 text-muted"><?= e(!empty($row['created_at']) ? date('j M · H:i', (int) strtotime((string) $row['created_at'])) : '') ?></td>
        <td class="px-3 py-2.5 text-right">
          <a href="/admin/<?= e($type) ?>/<?= e((string) ($row['id'] ?? '')) ?>" class="text-[12px] font-semibold text-navy hover:underline">Open</a>
        </td>
      </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>
</div>
