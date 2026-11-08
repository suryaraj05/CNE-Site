<div class="mb-4 flex flex-wrap items-end justify-between gap-3">
  <p class="max-w-xl text-sm text-muted">Priority pages first. Edits save as overrides and apply live without touching PHP source files.</p>
  <p class="text-sm text-muted"><?= count($pages) ?> pages</p>
</div>

<div class="overflow-x-auto rounded-2xl bg-white ring-1 ring-navy/[0.06]">
  <table class="w-full min-w-[640px] table-fixed text-left text-[13px]">
    <thead class="border-b border-line/70 bg-shade/70 text-[11px] font-semibold tracking-wide text-muted uppercase">
      <tr>
        <th class="px-3 py-2.5">Page</th>
        <th class="hidden w-[14rem] px-3 py-2.5 sm:table-cell">Path</th>
        <th class="w-[6rem] px-3 py-2.5">Status</th>
        <th class="w-[4.5rem] px-3 py-2.5"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line/50">
<?php foreach ($pages as $p): ?>
      <tr class="align-middle hover:bg-mist-50/60">
        <td class="truncate px-3 py-2.5">
          <span class="font-semibold text-ink"><?= e($p['title']) ?></span>
<?php if ($p['priority']): ?>
          <span class="ml-2 text-[11px] font-semibold text-navy">Priority</span>
<?php endif; ?>
        </td>
        <td class="hidden truncate px-3 py-2.5 font-mono text-[12px] text-muted sm:table-cell"><?= e($p['path']) ?></td>
        <td class="px-3 py-2.5">
<?php if ($p['overridden']): ?>
          <span class="inline-flex rounded-full bg-navy/10 px-2 py-0.5 text-[11px] font-semibold text-navy">Edited</span>
<?php else: ?>
          <span class="inline-flex rounded-full bg-mist px-2 py-0.5 text-[11px] font-medium text-muted">Default</span>
<?php endif; ?>
        </td>
        <td class="px-3 py-2.5 text-right">
          <a href="/admin/pages/<?= e($p['slug']) ?>" class="text-[12px] font-semibold text-navy hover:underline">Edit</a>
        </td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>
