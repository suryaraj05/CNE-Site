"""Apply Yoast title/description from yoast-seo-export.json into content/pages/*.php."""
from __future__ import annotations

import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
EXPORT = ROOT / "content" / "yoast-seo-export.json"
PAGES = ROOT / "content" / "pages"


def php_escape(value: str) -> str:
    return value.replace("\\", "\\\\").replace("'", "\\'")


def apply_meta(text: str, title: str | None, description: str | None) -> tuple[str, bool]:
    """Replace only the first 'title' and 'description' in the page header (first 40 lines)."""
    lines = text.splitlines(keepends=True)
    head = "".join(lines[:40])
    rest = "".join(lines[40:])
    changed = False

    if title:
        head2, n = re.subn(
            r"('title'\s*=>\s*)'(?:\\'|[^'])*'",
            rf"\1'{php_escape(title)}'",
            head,
            count=1,
        )
        if n:
            head = head2
            changed = True

    if description:
        head2, n = re.subn(
            r"('description'\s*=>\s*)'(?:\\'|[^'])*'",
            rf"\1'{php_escape(description)}'",
            head,
            count=1,
        )
        if n:
            head = head2
            changed = True

    return head + rest, changed


def main() -> None:
    data = json.loads(EXPORT.read_text(encoding="utf-8"))
    updated: list[str] = []
    skipped_no_file: list[str] = []
    skipped_no_change: list[str] = []
    errors: list[str] = []

    for row in data["ready_for_php"]:
        path = row["path"]
        slug = path.strip("/") or "home"
        php = PAGES / f"{slug}.php"
        if not php.exists():
            skipped_no_file.append(f"{path} -> {php.name}")
            continue

        title = row.get("title") or None
        description = row.get("description") or None
        if not title and not description:
            skipped_no_change.append(path)
            continue

        original = php.read_text(encoding="utf-8")
        new_text, changed = apply_meta(original, title, description)
        if not changed or new_text == original:
            errors.append(f"{path} ({php.name}): could not patch title/description")
            continue

        php.write_text(new_text, encoding="utf-8")
        updated.append(php.name)

    print(f"Updated: {len(updated)}")
    for name in updated:
        print(f"  OK {name}")
    print(f"No PHP file: {len(skipped_no_file)}")
    for item in skipped_no_file:
        print(f"  SKIP {item}")
    print(f"Patch errors: {len(errors)}")
    for item in errors:
        print(f"  ERR {item}")


if __name__ == "__main__":
    main()
