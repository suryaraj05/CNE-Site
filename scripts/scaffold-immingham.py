import importlib.util
from pathlib import Path

root = Path(__file__).resolve().parents[1]
spec = importlib.util.spec_from_file_location("sc", root / "scripts/scaffold-seaport-pages.py")
sc = importlib.util.module_from_spec(spec)
spec.loader.exec_module(sc)

p = {
    "slug": "customs-clearance-immingham-port",
    "crumb": "Immingham",
    "name": "Immingham Port",
    "label": "Immingham",
    "title": "Customs Clearance Immingham Port | Cargo Northeast Ltd.",
    "description": "Expert customs clearance at Immingham Port with Cargo Northeast Ltd. Import/export clearance and Humber sea freight support. Get a quote today.",
    "quote": "e.g. Rotterdam → Immingham",
    "blurb": "Humber container and ferry freight through Immingham",
}
path = sc.PAGES / f"{p['slug']}.php"
path.write_text(sc.page_php(p), encoding="utf-8")
print("Wrote", path)
