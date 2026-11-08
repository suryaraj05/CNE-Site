<?php if (!empty($flash)): ?>
  <p class="mb-4 rounded-xl bg-mist-50 px-3 py-2 text-sm font-medium text-navy" role="status"><?= e((string) $flash) ?></p>
<?php endif; ?>

<div class="overflow-x-auto rounded-2xl bg-white ring-1 ring-navy/[0.06]">
  <table class="w-full min-w-[720px] table-fixed text-left text-[13px]">
    <thead class="border-b border-line/70 bg-shade/70 text-[11px] font-semibold tracking-wide text-muted uppercase">
      <tr>
        <th class="w-[9.5rem] px-3 py-2.5">Ref</th>
        <th class="w-[6rem] px-3 py-2.5">Type</th>
        <th class="px-3 py-2.5">Summary</th>
        <th class="w-[7rem] px-3 py-2.5">Trashed</th>
        <th class="w-[10rem] px-3 py-2.5"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line/50">
<?php if (empty($items)): ?>
      <tr><td colspan="5" class="px-3 py-8 text-center text-muted">Trash is empty.</td></tr>
<?php else: ?>
<?php foreach ($items as $row): $f = is_array($row['fields'] ?? null) ? $row['fields'] : []; ?>
      <tr class="align-middle hover:bg-mist-50/60">
        <td class="truncate px-3 py-2.5 font-mono text-[12px] font-semibold"><?= e((string) ($row['ref'] ?? '')) ?></td>
        <td class="truncate px-3 py-2.5 capitalize text-muted"><?= e((string) ($row['type'] ?? '')) ?></td>
        <td class="truncate px-3 py-2.5 text-ink">
<?= ($row['type'] ?? '') === 'quotes'
    ? e(trim(($f['origin'] ?? '?') . ' → ' . ($f['destination'] ?? '?'), ' →'))
    : e((string) ($f['name'] ?? $f['email'] ?? '—')) ?>
        </td>
        <td class="whitespace-nowrap px-3 py-2.5 text-muted"><?= e(!empty($row['trashed_at']) ? date('j M Y', (int) strtotime((string) $row['trashed_at'])) : '') ?></td>
        <td class="px-3 py-2.5">
          <div class="flex justify-end gap-3">
            <form method="post">
              <input type="hidden" name="_csrf" value="<?= e(admin_csrf_token()) ?>">
              <input type="hidden" name="id" value="<?= e((string) ($row['id'] ?? '')) ?>">
              <input type="hidden" name="action" value="restore">
              <button type="submit" class="text-[12px] font-semibold text-navy hover:underline">Restore</button>
            </form>
            <form method="post" onsubmit="return confirm('Delete permanently?')">
              <input type="hidden" name="_csrf" value="<?= e(admin_csrf_token()) ?>">
              <input type="hidden" name="id" value="<?= e((string) ($row['id'] ?? '')) ?>">
              <input type="hidden" name="action" value="delete">
              <button type="submit" class="text-[12px] font-semibold text-muted hover:text-navy-700 hover:underline">Delete</button>
            </form>
          </div>
        </td>
      </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
  </table>
</div>
