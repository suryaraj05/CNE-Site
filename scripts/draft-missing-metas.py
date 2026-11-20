"""Draft SEO title/description for pages that had no Yoast fields; apply where PHP exists."""
from __future__ import annotations

import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
EXPORT = ROOT / "content" / "yoast-seo-export.json"
PAGES = ROOT / "content" / "pages"
OUT = ROOT / "content" / "seo-meta-drafts.json"

# Hand-written drafts for WP pages with no Yoast + no (or weak) PHP coverage intent.
# Keys = path
DRAFTS: dict[str, dict] = {
    "/air-freight-uk-usa/": {
        "title": "Air Freight UK to USA | Cargo Northeast",
        "description": "Affordable UK to USA air freight via Heathrow, Manchester and Birmingham to New York, LA, Chicago and Miami. Door-to-door with customs support. Get a quote.",
    },
    "/all-airports/": {
        "title": "Air Freight & Customs at UK Airports | Cargo Northeast",
        "description": "Air freight and HMRC customs clearance at 16 UK airports including Heathrow, Gatwick, Manchester, East Midlands and Newcastle. Request a quote today.",
    },
    "/all-seaports/": {
        "title": "Customs Clearance at UK Seaports | Cargo Northeast",
        "description": "Sea freight customs clearance at Felixstowe, London Gateway, Southampton, Liverpool, Dover, Teesport, Port of Tyne and more. CDS declarations. Get a quote.",
    },
    "/amazon-fba-logistics-solutions/": {
        "title": "Amazon FBA Logistics UK | Cargo Northeast",
        "description": "Amazon FBA prep, FNSKU labelling, storage and delivery to UK fulfilment centres. End-to-end logistics for Amazon sellers from Cargo Northeast. Get a quote.",
    },
    "/baggage-delivery-to-china/": {
        "title": "Baggage Delivery UK to China | Cargo Northeast",
        "description": "Door-to-door baggage delivery from the UK to China. Collection, export/import clearance and final delivery for personal effects and goods. Get a quote.",
    },
    "/baggage-delivery-to-india/": {
        "title": "Baggage Delivery UK to India | Cargo Northeast",
        "description": "Door-to-door baggage delivery from the UK to India with collection, UK and India customs clearance, and delivery to any address. Get a quote today.",
    },
    "/blog/": {
        "title": "Industry Updates: UK Customs & Trade | Cargo Northeast",
        "description": "UK customs, import and trade news from Cargo Northeast — border rules, HMRC updates and measures that affect importers and exporters.",
    },
    "/cargo-solutions-northeast-uk/": {
        "title": "Mission, Vision & Values | Cargo Northeast",
        "description": "Mission, vision and values behind Cargo Northeast: affordable, efficient and reliable customs and freight solutions for North East England and the UK.",
    },
    "/contact/": {
        "title": "Contact Cargo Northeast | Newcastle & Mumbai",
        "description": "Contact Cargo Northeast at Freight Village, Newcastle Airport, or our Mumbai office. Call, email or message us about customs clearance and freight.",
    },
    "/customs-clearance-logistics-newcastle-northeast-england/": {
        "title": "About Us | Customs & Logistics Newcastle | Cargo Northeast",
        "description": "Cargo Northeast is a Newcastle-based customs broker and freight forwarder for HMRC clearance plus air, sea and road freight across North East England and the UK.",
    },
    "/customs-clearance-service-uk/": {
        "title": "Customs Clearance Service UK | Cargo Northeast",
        "description": "UK customs clearance for imports and exports. HMRC CDS declarations, EORI guidance and UK–EU compliance from Cargo Northeast in Newcastle. Get a quote.",
    },
    "/faqs/": {
        "title": "FAQs: Customs Clearance & Freight | Cargo Northeast",
        "description": "Common questions about UK customs clearance, EORI, air, sea and road freight, Amazon FBA, baggage delivery and house moves with Cargo Northeast.",
    },
    "/house-move-service-tyne-and-wear/": {
        "title": "House Moves Tyne and Wear | Cargo Northeast",
        "description": "House removals in Newcastle, Tyne and Wear, Durham and Sunderland, plus UK-wide moves. Packing, furniture help and a personal moving team. Get a quote.",
    },
    "/import-from-china/": {
        "title": "China to UK Freight — Air & Sea | Cargo Northeast",
        "description": "Import from China to the UK by air or sea (FCL/LCL) with customs clearance at major UK ports and airports. Cargo Northeast handles end-to-end logistics.",
    },
    "/locations/": {
        "title": "Locations: Airports, Seaports & Offices | Cargo Northeast",
        "description": "Find Cargo Northeast customs clearance locations across UK airports and seaports, plus our Newcastle Airport and Mumbai offices.",
    },
    "/our-expertise/": {
        "title": "Our Expertise | Customs, Freight & Moves | Cargo Northeast",
        "description": "Customs clearance, Amazon FBA, UK–EU road transport, India–UK freight, baggage delivery, house moves and storage — from one Newcastle logistics team.",
    },
    "/our-services/": {
        "title": "Our Services | Customs & Freight UK | Cargo Northeast",
        "description": "Customs clearance, air, sea and road freight, China imports, Amazon FBA, baggage delivery and house moves from Cargo Northeast. Explore our services.",
    },
    "/privacy-policy/": {
        "title": "Privacy Policy | Cargo Northeast Ltd",
        "description": "How Cargo Northeast Ltd collects, uses and protects personal information, how long we keep it, and your rights under UK data protection law.",
    },
    "/request-a-quote/": {
        "title": "Request a Quote | Customs & Freight | Cargo Northeast",
        "description": "Request a no-obligation quote for customs clearance, air, sea or road freight, logistics or a house move. Send your shipment details to Cargo Northeast.",
    },
    "/road-transport-uk-eu/": {
        "title": "Road Transport UK to EU | Cargo Northeast",
        "description": "UK–EU road freight with post-Brexit customs clearance. FTL and LTL to France, Germany, Spain, the Netherlands and more. Get a road freight quote.",
    },
    "/safe-storage-newcastle-upon-tyne-northeast/": {
        "title": "Safe Storage Newcastle | Cargo Northeast",
        "description": "Secure, flexible storage in Newcastle upon Tyne with collection and delivery options. Business and personal storage across Tyne and Wear. Get a quote.",
    },
    "/sea-freight-newcastle-upon-tyne/": {
        "title": "Sea Freight Newcastle & UK Ports | Cargo Northeast",
        "description": "FCL and LCL sea freight for UK imports and exports via Port of Tyne, Teesport, Felixstowe, Southampton and Liverpool, with customs and delivery.",
    },
    "/services/": {
        "title": "Global Services | Air, Sea & Road Freight | Cargo Northeast",
        "description": "Global logistics from Newcastle: China to UK, UK to USA air freight, sea freight, worldwide shipping and baggage to China. Request a quote.",
    },
    "/shipment-form/": {
        "title": "Shipment Booking Form | Cargo Northeast",
        "description": "Book a shipment with Cargo Northeast. Submit sender, receiver and goods details so we can prepare your consignment and customs paperwork.",
    },
    "/terms-and-conditions/": {
        "title": "Terms and Conditions | Cargo Northeast Ltd",
        "description": "Cargo Northeast Ltd terms of carriage, liability under BIFA conditions, exclusions, indemnity and cargo insurance information.",
    },
    "/testimonials/": {
        "title": "Customer Testimonials | Cargo Northeast",
        "description": "What businesses and families say about Cargo Northeast customs clearance, freight, house moves and storage in Newcastle. Request a quote.",
    },
    "/thank-you/": {
        "title": "Thank You | Cargo Northeast",
        "description": "Thanks for contacting Cargo Northeast. We’ve received your message and will reply on working days. Explore our customs and freight services.",
        "robots": "noindex,follow",
    },
    "/track-your-shipment/": {
        "title": "Track Your Shipment | Cargo Northeast",
        "description": "Track your Cargo Northeast air, sea or road shipment with your AWB, booking or tracking reference, or contact our team for a status update.",
    },
    "/uk-to-restoftheworld-freight/": {
        "title": "UK to Rest of World Freight | Cargo Northeast",
        "description": "International air and sea freight from the UK worldwide: express and consolidated air, FCL/LCL sea, customs clearance and cargo insurance.",
    },
    # No PHP page yet — drafts only (+ Immingham scaffolded separately)
    "/air-cargo-may-become-short-term-solution/": {
        "title": "Air Cargo as a Short-term Shipping Solution | Cargo Northeast",
        "description": "When air cargo makes sense as a short-term alternative to sea freight for urgent UK imports and exports. Insights from Cargo Northeast.",
        "note": "Blog/article — no PHP page yet",
    },
    "/comprehensive-logistics-solutions-scotland-uk-2/": {
        "title": "Our Services | Cargo Northeast",
        "description": "Redirect target: use /our-services/. Comprehensive logistics for Scotland and the UK.",
        "note": "Redirect to /our-services/ — do not publish as thin duplicate",
        "redirect_to": "/our-services/",
    },
    "/customs-clearance-immingham-port/": {
        "title": "Customs Clearance Immingham Port | Cargo Northeast Ltd.",
        "description": "Expert customs clearance at Immingham Port with Cargo Northeast Ltd. Import/export clearance and Humber sea freight support. Get a quote today.",
        "note": "Scaffold seaport page",
    },
    "/customs-clearance/": {
        "title": "Customs Clearance Enquiry | Cargo Northeast",
        "description": "Send a customs clearance enquiry to Cargo Northeast. Prefer /request-a-quote/ or /customs-clearance-service-uk/ for the main service page.",
        "note": "Likely form/legacy URL — redirect to /request-a-quote/ or service page",
        "redirect_to": "/customs-clearance-service-uk/",
    },
    "/gallery/": {
        "title": "Gallery | Cargo Northeast",
        "description": "Photos from Cargo Northeast operations, freight and logistics work across the UK.",
        "note": "No PHP page — low SEO priority; consider noindex or omit",
    },
    "/new-import-and-export-updates-uk/": {
        "title": "UK Import & Export Updates | Cargo Northeast",
        "description": "Updates on UK import and export rules from the Department for Business and Trade, explained for importers and exporters by Cargo Northeast.",
        "note": "Blog/article — no PHP page yet",
    },
    "/ocean-freight-forwarding/": {
        "title": "Ocean Freight Forwarding UK | Cargo Northeast",
        "description": "Ocean freight forwarding for UK imports and exports. Prefer the main sea freight page for bookings and clearance.",
        "note": "Redirect to /sea-freight-newcastle-upon-tyne/",
        "redirect_to": "/sea-freight-newcastle-upon-tyne/",
    },
    "/parcel-delivery-to-india/": {
        "title": "Parcel & Baggage Delivery to India | Cargo Northeast",
        "description": "Parcel and baggage delivery from the UK to India. Redirect preferred: /baggage-delivery-to-india/.",
        "note": "Duplicate of baggage page — redirect",
        "redirect_to": "/baggage-delivery-to-india/",
    },
    "/we-introduce-new-boat-and-flight-service/": {
        "title": "New Boat and Flight Services | Cargo Northeast",
        "description": "Cargo Northeast introduces expanded boat and flight freight options for UK importers and exporters.",
        "note": "Blog/article — no PHP page yet",
    },
}


def php_escape(value: str) -> str:
    return value.replace("\\", "\\\\").replace("'", "\\'")


def apply_meta(text: str, title: str, description: str) -> tuple[str, bool]:
    lines = text.splitlines(keepends=True)
    head, rest = "".join(lines[:40]), "".join(lines[40:])
    changed = False
    head2, n = re.subn(
        r"('title'\s*=>\s*)'(?:\\'|[^'])*'",
        rf"\1'{php_escape(title)}'",
        head,
        count=1,
    )
    if n:
        head, changed = head2, True
    head2, n = re.subn(
        r"('description'\s*=>\s*)'(?:\\'|[^'])*'",
        rf"\1'{php_escape(description)}'",
        head,
        count=1,
    )
    if n:
        head, changed = head2, True
    return head + rest, changed


def slug_file(path: str) -> Path:
    slug = path.strip("/") or "home"
    return PAGES / f"{slug}.php"


def main() -> None:
    export = json.loads(EXPORT.read_text(encoding="utf-8"))
    needed = {r["path"]: r for r in export["needs_meta_written"]}

    rows = []
    updated = []
    skipped = []

    for path, meta in needed.items():
        draft = DRAFTS.get(path)
        php = slug_file(path)
        exists = php.exists()
        row = {
            "path": path,
            "wordpress_title": meta["wordpress_title"],
            "php_file": php.name if exists else None,
            "php_exists": exists,
            "title": (draft or {}).get("title"),
            "description": (draft or {}).get("description"),
            "robots": (draft or {}).get("robots"),
            "redirect_to": (draft or {}).get("redirect_to"),
            "note": (draft or {}).get("note"),
            "applied": False,
        }
        if draft and exists and draft.get("title") and not draft.get("redirect_to"):
            original = php.read_text(encoding="utf-8")
            new_text, ok = apply_meta(original, draft["title"], draft["description"])
            if ok and new_text != original:
                # Only apply robots if page supports it — skip unless key exists
                if draft.get("robots") and "'robots'" in original:
                    new_text, _ = re.subn(
                        r"('robots'\s*=>\s*)'(?:\\'|[^'])*'",
                        rf"\1'{php_escape(draft['robots'])}'",
                        new_text,
                        count=1,
                    )
                elif draft.get("robots") and "'description'" in new_text:
                    # insert robots after description in header
                    new_text = re.sub(
                        r"('description'\s*=>\s*'(?:\\'|[^'])*',\n)",
                        rf"\1    'robots'      => '{php_escape(draft['robots'])}',\n",
                        new_text,
                        count=1,
                    )
                php.write_text(new_text, encoding="utf-8")
                row["applied"] = True
                updated.append(path)
            else:
                skipped.append(path)
        rows.append(row)

    OUT.write_text(
        json.dumps(
            {
                "source": "needs_meta_written + editorial drafts",
                "counts": {
                    "total": len(rows),
                    "applied_to_php": len(updated),
                    "no_php_or_redirect": len(rows) - len(updated),
                },
                "pages": rows,
            },
            indent=2,
            ensure_ascii=False,
        ),
        encoding="utf-8",
    )
    print(f"Wrote {OUT}")
    print(f"Applied: {len(updated)}")
    for p in updated:
        print(f"  OK {p}")
    print(f"Not applied (no file / redirect / unchanged): {len(rows) - len(updated)}")


if __name__ == "__main__":
    main()
