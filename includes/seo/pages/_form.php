<?php
declare(strict_types=1);

/** Shared create/edit form. Expects $page (array), $action (url), $heading (string). */
$user = seo_user();
$schemaText = '';
if (!empty($page['schema_json'])) {
    $schemaText = is_string($page['schema_json'])
        ? $page['schema_json']
        : json_encode($page['schema_json'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}
$seoTitle = (string) ($page['seo_title'] ?? '');
$metaDesc = (string) ($page['meta_description'] ?? '');
$ogTitle = (string) ($page['og_title'] ?? '');
$ogDesc = (string) ($page['og_description'] ?? '');
$ogImage = (string) ($page['og_image'] ?? '');
?>
<script>
function seoCount(id, max, counterId){
  const el=document.getElementById(id), c=document.getElementById(counterId);
  if(!el||!c) return;
  const tick=()=>{const n=el.value.length;c.textContent=n+' / '+max;c.classList.toggle('over', n>max);};
  el.addEventListener('input', tick); tick();
}
function seoPreview(){
  const t=document.getElementById('seo_title')?.value||'Untitled page';
  const d=document.getElementById('meta_description')?.value||'';
  const slug=document.getElementById('slug')?.value||'page';
  const ogt=document.getElementById('og_title')?.value||t;
  const ogd=document.getElementById('og_description')?.value||d;
  const img=document.getElementById('og_image')?.value||'';
  const st=document.getElementById('serp-title'); if(st) st.textContent=t;
  const sd=document.getElementById('serp-desc'); if(sd) sd.textContent=d;
  const su=document.getElementById('serp-url'); if(su) su.textContent='https://cargonortheast.com/'+(slug==='home'?'':slug+'/');
  const ot=document.getElementById('ogp-title'); if(ot) ot.textContent=ogt;
  const od=document.getElementById('ogp-desc'); if(od) od.textContent=ogd;
  const oi=document.getElementById('ogp-img'); if(oi){ oi.style.display=img?'block':'none'; oi.src=img; }
}
document.addEventListener('DOMContentLoaded',()=>{
  ['seo_title','meta_description','slug','og_title','og_description','og_image'].forEach(id=>{
    document.getElementById(id)?.addEventListener('input', seoPreview);
  });
  seoCount('seo_title',60,'title-count');
  seoCount('meta_description',160,'desc-count');
  seoPreview();
  document.getElementById('html-toggle')?.addEventListener('change', (e)=>{
    const ta=document.getElementById('body_content');
    if(!ta) return;
    ta.style.fontFamily = e.target.checked ? 'ui-monospace,Consolas,monospace' : 'inherit';
  });
});
</script>
<div class="grid grid-2">
  <form class="card" method="post" action="<?= seo_h($action) ?>">
    <input type="hidden" name="csrf" value="<?= seo_h(seo_csrf_token()) ?>">
    <h1><?= seo_h($heading) ?></h1>
    <?php seo_flash_render(); ?>
    <div class="row">
      <div class="field"><label for="slug">Slug</label><input id="slug" name="slug" type="text" required value="<?= seo_h($page['slug'] ?? '') ?>" placeholder="customs-clearance-service-uk"></div>
      <div class="field"><label for="category">Category</label><input id="category" name="category" type="text" value="<?= seo_h($page['category'] ?? 'general') ?>" list="seo-cats">
        <datalist id="seo-cats"><option>home</option><option>company</option><option>services</option><option>airports</option><option>seaports</option><option>blog</option><option>general</option></datalist>
      </div>
    </div>
    <div class="row">
      <div class="field"><label for="status">Status</label>
        <select id="status" name="status">
          <?php foreach (['draft','published','archived'] as $st): ?>
            <option value="<?= $st ?>"<?= (($page['status'] ?? 'draft') === $st) ? ' selected' : '' ?>><?= ucfirst($st) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="field"><label for="robots">Robots</label><input id="robots" name="robots" type="text" value="<?= seo_h($page['robots'] ?? 'index,follow') ?>"></div>
    </div>
    <div class="field"><label for="wordpress_title">WordPress / CMS title</label><input id="wordpress_title" name="wordpress_title" type="text" value="<?= seo_h($page['wordpress_title'] ?? '') ?>"></div>
    <div class="field"><label for="h1">H1</label><input id="h1" name="h1" type="text" value="<?= seo_h($page['h1'] ?? '') ?>"></div>
    <div class="field">
      <label for="seo_title">SEO title <span id="title-count" class="counter"></span></label>
      <input id="seo_title" name="seo_title" type="text" value="<?= seo_h($seoTitle) ?>">
    </div>
    <div class="field">
      <label for="meta_description">Meta description <span id="desc-count" class="counter"></span></label>
      <textarea id="meta_description" name="meta_description" rows="3"><?= seo_h($metaDesc) ?></textarea>
    </div>
    <div class="field"><label for="focus_keyword">Focus keyword</label><input id="focus_keyword" name="focus_keyword" type="text" value="<?= seo_h($page['focus_keyword'] ?? '') ?>"></div>
    <div class="field"><label for="canonical">Canonical URL</label><input id="canonical" name="canonical" type="url" value="<?= seo_h($page['canonical'] ?? '') ?>" placeholder="https://cargonortheast.com/..."></div>
    <div class="row">
      <div class="field"><label for="og_title">OG title</label><input id="og_title" name="og_title" type="text" value="<?= seo_h($ogTitle) ?>"></div>
      <div class="field"><label for="og_image">OG image URL</label><input id="og_image" name="og_image" type="url" value="<?= seo_h($ogImage) ?>"></div>
    </div>
    <div class="field"><label for="og_description">OG description</label><textarea id="og_description" name="og_description" rows="2"><?= seo_h($ogDesc) ?></textarea></div>
    <div class="field"><label for="schema_types">Schema types (comma-separated)</label><input id="schema_types" name="schema_types" type="text" value="<?= seo_h($page['schema_types'] ?? '') ?>" placeholder="Organization, LocalBusiness, Service"></div>
    <div class="field"><label for="schema_json">Schema JSON-LD</label><textarea id="schema_json" name="schema_json" rows="8" placeholder='{"@context":"https://schema.org","@type":"WebPage"}'><?= seo_h($schemaText) ?></textarea></div>
    <div class="field">
      <label for="body_content">Body content <label style="display:inline;font-weight:500;margin-left:.5rem"><input id="html-toggle" type="checkbox" checked> HTML mode</label></label>
      <textarea id="body_content" name="body_content" rows="10"><?= seo_h($page['body_content'] ?? '') ?></textarea>
      <p class="muted" style="margin:.35rem 0 0">Scripts, iframes and inline event handlers are stripped on save.</p>
    </div>
    <div class="actions">
      <button class="btn" type="submit">Save</button>
      <a class="btn secondary" href="/admin-seo/">Cancel</a>
      <?php if (!empty($page['id'])): ?>
        <a class="btn secondary" href="/admin-seo/revisions?page_id=<?= (int) $page['id'] ?>">Revisions</a>
      <?php endif; ?>
    </div>
  </form>
  <aside class="grid" style="align-content:start">
    <div class="card">
      <h2>Google SERP preview</h2>
      <div class="serp">
        <div class="u" id="serp-url">https://cargonortheast.com/</div>
        <div class="t" id="serp-title">Title</div>
        <div class="d" id="serp-desc">Description</div>
      </div>
    </div>
    <div class="card">
      <h2>Open Graph preview</h2>
      <div class="og">
        <img id="ogp-img" alt="" style="display:none">
        <div class="b">
          <div class="s">cargonortheast.com</div>
          <div class="t" id="ogp-title">Title</div>
          <div class="d" id="ogp-desc">Description</div>
        </div>
      </div>
    </div>
    <div class="card muted">
      Signed in as <?= seo_h($user['email'] ?? '') ?>. Published rows only affect the live site after you call <code>render_seo_meta()</code> on that page.
    </div>
  </aside>
</div>
