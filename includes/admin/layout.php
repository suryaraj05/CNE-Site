<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title><?= e($title ?? 'Admin') ?> · Cargo Northeast</title>
  <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="<?= e(asset('app.css')) ?>">
</head>
<body class="min-h-screen bg-canvas font-sans text-ink antialiased">
<?php if (!empty($isLogin)): ?>
  <?php require $viewFile; ?>
<?php else: ?>
  <div class="min-h-screen lg:grid lg:grid-cols-[240px_minmax(0,1fr)]">
    <aside class="flex flex-col border-b border-line/70 bg-ink text-white lg:sticky lg:top-0 lg:h-screen lg:border-b-0 lg:border-r lg:border-white/10">
      <div class="flex h-16 items-center gap-3 border-b border-white/10 px-5">
<?php if (!empty($logo)): ?>
        <span class="inline-flex rounded-lg bg-white px-2 py-1">
          <img src="<?= e($logo) ?>" alt="" class="h-8 w-auto">
        </span>
<?php else: ?>
        <span class="text-sm font-bold">Cargo Northeast</span>
<?php endif; ?>
      </div>
      <nav class="flex-1 space-y-1 p-3 text-sm" aria-label="Admin">
<?php foreach ($nav as $navItem):
    $active = ($navKey ?? '') === $navItem['key'];
?>
        <a href="<?= e($navItem['href']) ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 transition-colors <?= $active ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' ?>">
          <?= icon($navItem['icon'], 'size-4 shrink-0 opacity-80') ?>
          <span class="flex-1 font-medium"><?= e($navItem['label']) ?></span>
<?php if (!empty($navItem['badge'])): ?>
          <span class="rounded-full bg-white/20 px-2 py-0.5 text-[11px] font-semibold"><?= (int) $navItem['badge'] ?></span>
<?php endif; ?>
        </a>
<?php endforeach; ?>
      </nav>
      <div class="border-t border-white/10 p-3">
        <a href="/" class="mb-1 block rounded-xl px-3 py-2 text-sm text-white/70 transition-colors hover:bg-white/10 hover:text-white" target="_blank" rel="noopener">View site</a>
        <a href="/admin/logout" class="block rounded-xl px-3 py-2 text-sm text-white/70 transition-colors hover:bg-white/10 hover:text-white">Log out</a>
      </div>
    </aside>

    <div class="min-w-0">
      <header class="sticky top-0 z-20 flex h-16 items-center justify-between gap-4 border-b border-line/70 bg-white/90 px-5 backdrop-blur-md sm:px-8">
        <div>
          <p class="text-[12px] font-medium text-muted">Admin</p>
          <h1 class="text-base font-bold tracking-tight text-ink"><?= e($title ?? '') ?></h1>
        </div>
      </header>
      <main class="px-5 py-5 sm:px-6 sm:py-6">
        <?php require $viewFile; ?>
      </main>
    </div>
  </div>
<?php endif; ?>
</body>
</html>
