import re
from pathlib import Path

pages = Path(__file__).resolve().parents[1] / "content/pages"
slugs = [
    "air-freight-uk-usa",
    "all-airports",
    "all-seaports",
    "amazon-fba-logistics-solutions",
    "baggage-delivery-to-china",
    "baggage-delivery-to-india",
    "blog",
    "cargo-solutions-northeast-uk",
    "contact",
    "customs-clearance-logistics-newcastle-northeast-england",
    "customs-clearance-service-uk",
    "faqs",
    "house-move-service-tyne-and-wear",
    "import-from-china",
    "locations",
    "our-expertise",
    "our-services",
    "privacy-policy",
    "request-a-quote",
    "road-transport-uk-eu",
    "safe-storage-newcastle-upon-tyne-northeast",
    "sea-freight-newcastle-upon-tyne",
    "services",
    "shipment-form",
    "terms-and-conditions",
    "testimonials",
    "thank-you",
    "track-your-shipment",
    "uk-to-restoftheworld-freight",
]

for s in slugs:
    text = (pages / f"{s}.php").read_text(encoding="utf-8")
    title = re.search(r"'title'\s*=>\s*'((?:\\'|[^'])*)'", text)
    desc = re.search(r"'description'\s*=>\s*'((?:\\'|[^'])*)'", text)
    print("===", s)
    print("T:", title.group(1) if title else "?")
    print("D:", (desc.group(1) if desc else "?")[:140])
