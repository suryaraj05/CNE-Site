# Custom SEO Dashboard (non-destructive)

Isolated under `/admin-seo/` + `/includes/seo/` + `/database/`.  
**Existing site pages, routes, and content are unchanged** until you opt in.

## 1. Create tables in Neon

1. Open your Neon project → **SQL Editor**.
2. Paste and run [`database/seo_schema.sql`](database/seo_schema.sql).
3. Confirm tables: `seo_users`, `seo_pages`, `seo_redirects`, `seo_revisions`.

Default login (change after first sign-in):

- Email: `seo@cargonortheast.com`
- Password: `ChangeMe-SEO-2026`

## 2. Configure the database URL

After `neon init` / `neon deploy`, Neon writes connection strings to **`.env.local`** (gitignored):

```env
DATABASE_URL=...              # pooled — use for the PHP app / SEO dashboard
DATABASE_URL_UNPOOLED=...     # direct — use for schema migrations (psql / DDL)
NEON_BRANCH=production
NEON_BRANCH_ID=...
```

`includes/seo/db.php` loads `.env.local` then `.env`. Runtime uses **pooled** `DATABASE_URL`; pass `seo_pdo(true)` or `DATABASE_URL_UNPOOLED` for migrations.

Or discrete vars:

```env
DB_HOST=...
DB_PORT=5432
DB_NAME=...
DB_USER=...
DB_PASS=...
DB_SSLMODE=require
```

PHP needs the `pdo_pgsql` extension (enabled in the Fly Dockerfile; enable locally in `php.ini` if needed).

Smoke test:

```bash
php scripts/test-neon-seo.php
```

## 3. Open the dashboard (safe — no live page impact)

With the site running (`npm run serve` / Fly):

1. Visit **https://your-host/admin-seo/**
2. Sign in with the default user.
3. Create pages, edit metas, manage redirects.
4. Export CSV/JSON from the inventory.

Until you call the helpers below, **nothing on the public site changes**.

## 4. Optional: seed from existing PHP pages

Manual, one-time, never overwrites:

```bash
php database/seed-from-existing.php
```

Uses `ON CONFLICT DO NOTHING`. Starts as `draft` so nothing publishes by accident.

## 5. Optional: wire helpers (one page at a time)

In `includes/seo/helper.php`:

- `render_seo_meta($slug)` — outputs title/meta/OG/schema **only** when a **published** row exists; otherwise returns `''` (keep existing HTML).
- `apply_seo_redirects()` — applies DB redirects when matched; no-op if DB down.

Example test (do **not** apply site-wide until ready):

```php
// Early in index.php (optional):
// require_once __DIR__ . '/includes/seo/helper.php';
// apply_seo_redirects();

// In <head> of a single test template:
// echo render_seo_meta($slug);
```

Published saves also write `storage/seo-sitemap.xml` (does **not** replace `/sitemap.xml` unless you choose to).

## 6. Launch checklist

- [ ] Change the default SEO admin password in Neon (`seo_users`).
- [ ] Keep preview `noindex` until go-live.
- [ ] Only then opt in `render_seo_meta()` / `apply_seo_redirects()` if you want DB-driven SEO.
