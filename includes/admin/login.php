<div class="flex min-h-screen items-center justify-center px-6 py-16">
  <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-[0_24px_60px_-40px_rgba(36,62,149,0.35)] ring-1 ring-navy/[0.06]">
<?php if (!empty($logo)): ?>
    <img src="<?= e($logo) ?>" alt="Cargo Northeast" class="mx-auto h-14 w-auto">
<?php endif; ?>
    <h1 class="mt-6 text-center text-2xl font-bold tracking-tight text-ink">Admin login</h1>
    <p class="mt-2 text-center text-sm text-muted">Edit SEO titles, descriptions and hero copy.</p>
<?php if (!empty($error)): ?>
    <p class="mt-5 rounded-2xl bg-mist-50 px-4 py-3 text-center text-sm font-medium text-navy-700" role="alert"><?= e($error) ?></p>
<?php endif; ?>
    <form method="post" class="mt-8 space-y-5">
      <div>
        <label for="password" class="field-label">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" class="field">
      </div>
      <button type="submit" class="btn btn-primary btn-block h-12">Sign in</button>
    </form>
  </div>
</div>
