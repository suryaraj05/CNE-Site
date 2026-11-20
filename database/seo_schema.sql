-- Cargo Northeast — Custom SEO Dashboard schema (Neon PostgreSQL)
-- Run once in Neon SQL Editor. Safe to re-run: uses IF NOT EXISTS / ON CONFLICT DO NOTHING.

CREATE TABLE IF NOT EXISTS seo_users (
    id              BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name            TEXT NOT NULL,
    email           TEXT NOT NULL UNIQUE,
    password_hash   TEXT NOT NULL,
    role            TEXT NOT NULL DEFAULT 'editor' CHECK (role IN ('admin', 'editor')),
    created_at      TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS seo_pages (
    id               BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    slug             TEXT NOT NULL UNIQUE,
    category         TEXT NOT NULL DEFAULT 'general',
    status           TEXT NOT NULL DEFAULT 'draft' CHECK (status IN ('draft', 'published', 'archived')),
    wordpress_title  TEXT,
    seo_title        TEXT,
    meta_description TEXT,
    focus_keyword    TEXT,
    h1               TEXT,
    robots           TEXT DEFAULT 'index,follow',
    canonical        TEXT,
    og_title         TEXT,
    og_description   TEXT,
    og_image         TEXT,
    schema_types     TEXT,
    schema_json      JSONB,
    body_content     TEXT,
    updated_by       BIGINT REFERENCES seo_users(id) ON DELETE SET NULL,
    created_at       TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    updated_at       TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS seo_pages_category_idx ON seo_pages (category);
CREATE INDEX IF NOT EXISTS seo_pages_status_idx ON seo_pages (status);
CREATE INDEX IF NOT EXISTS seo_pages_updated_idx ON seo_pages (updated_at DESC);

CREATE TABLE IF NOT EXISTS seo_redirects (
    id          BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    old_url     TEXT NOT NULL UNIQUE,
    new_url     TEXT NOT NULL,
    status_code INT NOT NULL DEFAULT 301 CHECK (status_code IN (301, 302)),
    hits        BIGINT NOT NULL DEFAULT 0,
    updated_at  TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS seo_revisions (
    id            BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    page_id       BIGINT NOT NULL REFERENCES seo_pages(id) ON DELETE CASCADE,
    snapshot_json JSONB NOT NULL,
    changed_by    BIGINT REFERENCES seo_users(id) ON DELETE SET NULL,
    created_at    TIMESTAMPTZ NOT NULL DEFAULT NOW()
);

CREATE INDEX IF NOT EXISTS seo_revisions_page_idx ON seo_revisions (page_id, created_at DESC);

-- Default admin (password: ChangeMe-SEO-2026) — change after first login.
INSERT INTO seo_users (name, email, password_hash, role)
VALUES (
    'SEO Admin',
    'seo@cargonortheast.com',
    '$2y$10$gWsecZ43IahDn9PAlw9bZOVxJJuO92fDnKopXRX5Juxcy/Wf8kZ06',
    'admin'
)
ON CONFLICT (email) DO NOTHING;
