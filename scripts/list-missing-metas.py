import json
from pathlib import Path

root = Path(__file__).resolve().parents[1]
data = json.loads((root / "content/yoast-seo-export.json").read_text(encoding="utf-8"))
pages_dir = root / "content/pages"

print(f"needs_meta_written: {len(data['needs_meta_written'])}")
for r in data["needs_meta_written"]:
    slug = r["path"].strip("/") or "home"
    php = pages_dir / f"{slug}.php"
    exists = php.exists()
    if not exists and "cardiff" in slug:
        exists = (pages_dir / "custom-clearance-exports-from-cardiff-airport.php").exists()
    flag = "OK" if exists else "--"
    print(f"{flag} {r['path']} | {r['wordpress_title']}")
