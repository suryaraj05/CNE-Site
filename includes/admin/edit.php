<div class="mb-8">
  <a href="/admin/pages" class="text-sm font-medium text-muted transition-colors hover:text-navy">← All pages</a>
  <h1 class="mt-3 text-3xl font-bold tracking-tight text-ink">Edit page</h1>
  <p class="mt-2 text-muted">
    <a href="<?= e($path) ?>" class="font-medium text-navy hover:underline" target="_blank" rel="noopener"><?= e($path) ?></a>
<?php if (!empty($overridden)): ?>
    <span class="ml-2 inline-flex rounded-full bg-navy/10 px-2.5 py-0.5 text-xs font-semibold text-navy align-middle">Override active</span>
<?php endif; ?>
  </p>
</div>

<?php if (!empty($flash)): ?>
  <p class="mb-6 rounded-2xl bg-mist-50 px-4 py-3 text-sm font-medium text-navy" role="status"><?= e($flash) ?></p>
<?php endif; ?>

<form method="post" class="space-y-8 rounded-3xl bg-white p-6 ring-1 ring-navy/[0.06] sm:p-8">
  <input type="hidden" name="_csrf" value="<?= e(admin_csrf_token()) ?>">

  <div class="grid gap-5">
    <div>
      <label for="title" class="field-label">Meta title</label>
      <input id="title" name="title" type="text" required value="<?= e($values['title']) ?>" class="field !rounded-2xl">
    </div>
    <div>
      <label for="description" class="field-label">Meta description</label>
      <textarea id="description" name="description" rows="3" required class="field"><?= e($values['description']) ?></textarea>
    </div>
  </div>

<?php if (!empty($hasHero)): ?>
  <div class="border-t border-line/70 pt-8">
    <h2 class="text-lg font-bold text-ink">Hero</h2>
    <p class="mt-1 text-sm text-muted">Homepage and landing page headline block.</p>
    <div class="mt-5 grid gap-5">
      <div>
        <label for="hero_eyebrow" class="field-label">Eyebrow</label>
        <input id="hero_eyebrow" name="hero_eyebrow" type="text" value="<?= e($values['hero_eyebrow']) ?>" class="field !rounded-2xl">
      </div>
      <div>
        <label for="hero_title" class="field-label">Headline</label>
        <input id="hero_title" name="hero_title" type="text" value="<?= e($values['hero_title']) ?>" class="field !rounded-2xl">
      </div>
      <div>
        <label for="hero_lead" class="field-label">Lead</label>
        <textarea id="hero_lead" name="hero_lead" rows="4" class="field"><?= e($values['hero_lead']) ?></textarea>
      </div>
    </div>
  </div>
<?php else: ?>
  <input type="hidden" name="hero_eyebrow" value="">
  <input type="hidden" name="hero_title" value="">
  <input type="hidden" name="hero_lead" value="">
<?php endif; ?>

  <div class="flex flex-wrap items-center gap-3 border-t border-line/70 pt-6">
    <button type="submit" class="btn btn-primary">Save changes</button>
    <button type="submit" name="reset" value="1" class="btn btn-secondary" onclick="return confirm('Clear overrides for this page?')">Reset to file defaults</button>
    <a href="<?= e($path) ?>" class="btn btn-secondary" target="_blank" rel="noopener">Preview</a>
  </div>
</form>
