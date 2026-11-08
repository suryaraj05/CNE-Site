<?php $counts = $counts ?? inbox_counts(); ?>
<div class="grid grid-cols-2 gap-3 lg:grid-cols-4 lg:gap-4">
  <a href="/admin/quotes" class="rounded-2xl bg-gradient-to-br from-navy to-navy-700 p-4 text-white shadow-[0_20px_40px_-28px_rgba(36,62,149,0.8)] transition-transform hover:-translate-y-0.5 sm:rounded-3xl sm:p-5">
    <p class="text-xs text-white/75 sm:text-sm">Quote requests</p>
    <p class="mt-2 text-2xl font-bold sm:mt-3 sm:text-3xl"><?= (int) $counts['quotes'] ?></p>
    <p class="mt-1 text-[11px] text-white/70 sm:text-xs"><?= (int) $counts['quotes_new'] ?> new</p>
  </a>
  <a href="/admin/enquiries" class="rounded-2xl bg-white p-4 ring-1 ring-navy/[0.06] transition-transform hover:-translate-y-0.5 sm:rounded-3xl sm:p-5">
    <p class="text-xs text-muted sm:text-sm">Enquiries</p>
    <p class="mt-2 text-2xl font-bold text-ink sm:mt-3 sm:text-3xl"><?= (int) $counts['enquiries'] ?></p>
    <p class="mt-1 text-[11px] text-navy sm:text-xs"><?= (int) $counts['enquiries_new'] ?> new</p>
  </a>
  <a href="/admin/pages" class="rounded-2xl bg-white p-4 ring-1 ring-navy/[0.06] transition-transform hover:-translate-y-0.5 sm:rounded-3xl sm:p-5">
    <p class="text-xs text-muted sm:text-sm">Pages</p>
    <p class="mt-2 text-2xl font-bold text-ink sm:mt-3 sm:text-3xl"><?= count(admin_list_pages()) ?></p>
    <p class="mt-1 text-[11px] text-muted sm:text-xs">SEO &amp; hero copy</p>
  </a>
  <a href="/admin/trash" class="rounded-2xl bg-white p-4 ring-1 ring-navy/[0.06] transition-transform hover:-translate-y-0.5 sm:rounded-3xl sm:p-5">
    <p class="text-xs text-muted sm:text-sm">Trash</p>
    <p class="mt-2 text-2xl font-bold text-ink sm:mt-3 sm:text-3xl"><?= (int) $counts['trash'] ?></p>
    <p class="mt-1 text-[11px] text-muted sm:text-xs">Recoverable</p>
  </a>
</div>

<div class="mt-10 grid gap-8 xl:grid-cols-2">
  <section class="rounded-3xl bg-white ring-1 ring-navy/[0.06]">
    <div class="flex items-center justify-between border-b border-line/70 px-5 py-4">
      <h2 class="font-bold text-ink">Latest quotes</h2>
      <a href="/admin/quotes" class="text-sm font-semibold text-navy hover:underline">View all</a>
    </div>
<?php if (empty($recentQuotes)): ?>
    <p class="px-5 py-8 text-sm text-muted">No quote requests yet.</p>
<?php else: ?>
    <ul class="divide-y divide-line/60">
<?php foreach ($recentQuotes as $item): $f = $item['fields'] ?? []; ?>
      <li>
        <a href="/admin/quotes/<?= e((string) ($item['id'] ?? '')) ?>" class="flex items-center justify-between gap-4 px-5 py-4 transition-colors hover:bg-mist-50/80">
          <div class="min-w-0">
            <p class="truncate font-semibold text-ink"><?= e((string) ($item['ref'] ?? '')) ?> · <?= e(trim(($f['origin'] ?? '?') . ' → ' . ($f['destination'] ?? '?'), ' →')) ?></p>
            <p class="mt-0.5 truncate text-sm text-muted"><?= e((string) ($f['email'] ?? '')) ?><?php if (!empty($f['mode'])): ?> · <?= e(ucfirst((string) $f['mode'])) ?><?php endif; ?><?php if (!empty($f['goods'])): ?> · <?= e((string) $f['goods']) ?><?php endif; ?></p>
          </div>
          <span class="shrink-0 rounded-full px-2.5 py-1 text-xs font-semibold <?= ($item['status'] ?? '') === 'new' ? 'bg-navy/10 text-navy' : 'bg-mist text-muted' ?>"><?= e(ucfirst((string) ($item['status'] ?? 'new'))) ?></span>
        </a>
      </li>
<?php endforeach; ?>
    </ul>
<?php endif; ?>
  </section>

  <section class="rounded-3xl bg-white ring-1 ring-navy/[0.06]">
    <div class="flex items-center justify-between border-b border-line/70 px-5 py-4">
      <h2 class="font-bold text-ink">Latest enquiries</h2>
      <a href="/admin/enquiries" class="text-sm font-semibold text-navy hover:underline">View all</a>
    </div>
<?php if (empty($recentEnquiries)): ?>
    <p class="px-5 py-8 text-sm text-muted">No enquiries yet.</p>
<?php else: ?>
    <ul class="divide-y divide-line/60">
<?php foreach ($recentEnquiries as $item): $f = $item['fields'] ?? []; ?>
      <li>
        <a href="/admin/enquiries/<?= e((string) ($item['id'] ?? '')) ?>" class="flex items-center justify-between gap-4 px-5 py-4 transition-colors hover:bg-mist-50/80">
          <div class="min-w-0">
            <p class="truncate font-semibold text-ink"><?= e((string) ($item['ref'] ?? '')) ?> · <?= e((string) ($f['name'] ?? 'Enquiry')) ?></p>
            <p class="mt-0.5 truncate text-sm text-muted"><?= e((string) ($f['email'] ?? '')) ?><?php if (!empty($f['enquiry_type'])): ?> · <?= e((string) $f['enquiry_type']) ?><?php endif; ?><?php if (!empty($f['subject'])): ?> · <?= e((string) $f['subject']) ?><?php endif; ?></p>
          </div>
          <span class="shrink-0 rounded-full px-2.5 py-1 text-xs font-semibold <?= ($item['status'] ?? '') === 'new' ? 'bg-navy/10 text-navy' : 'bg-mist text-muted' ?>"><?= e(ucfirst((string) ($item['status'] ?? 'new'))) ?></span>
        </a>
      </li>
<?php endforeach; ?>
    </ul>
<?php endif; ?>
  </section>
</div>
