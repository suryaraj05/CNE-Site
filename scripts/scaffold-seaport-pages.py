"""Scaffold missing UK seaport location pages from Yoast export + Gateway template."""
from __future__ import annotations

from pathlib import Path
from textwrap import dedent

ROOT = Path(__file__).resolve().parents[1]
PAGES = ROOT / "content" / "pages"

# Skip India promo duplicates — already covered by /air-freight-india-uk/
PORTS = [
    {
        "slug": "customs-clearance-at-dover-port",
        "crumb": "Dover",
        "name": "Dover Port",
        "label": "Dover",
        "title": "Customs Clearance at Dover Port | Cargo Northeast Ltd.",
        "description": "Expert customs clearance at Dover Port with Cargo Northeast Ltd. Import/export agent and sea freight Dover support. Get a quote today.",
        "quote": "e.g. Calais → Dover",
        "blurb": "Ro-ro, trailers and ferry freight moving through Dover",
    },
    {
        "slug": "customs-clearance-at-harwich-port",
        "crumb": "Harwich",
        "name": "Harwich Port",
        "label": "Harwich",
        "title": "Customs Clearance at Harwich Port | Cargo Northeast Ltd.",
        "description": "Customs clearance at Harwich Port from Cargo Northeast Ltd. Your Harwich customs broker for freight services and import/export clearance. Get a quote today.",
        "quote": "e.g. Rotterdam → Harwich",
        "blurb": "Ferry and container traffic through Harwich",
    },
    {
        "slug": "customs-clearance-at-liverpool-port",
        "crumb": "Liverpool",
        "name": "Liverpool Port",
        "label": "Liverpool",
        # Yoast title/desc were wrongly copied from Southampton — corrected here
        "title": "Customs Clearance at Liverpool Port | Cargo Northeast Ltd.",
        "description": "Expert customs clearance at Liverpool Port with Cargo Northeast Ltd. Import/export clearance and freight forwarding for Mersey sea freight. Get a quote today.",
        "quote": "e.g. Dublin → Liverpool",
        "blurb": "Containers and sea freight through the Port of Liverpool",
    },
    {
        "slug": "customs-clearance-at-plymouth-docks",
        "crumb": "Plymouth",
        "name": "Plymouth Docks",
        "label": "Plymouth",
        "title": "Customs Clearance at Plymouth Docks | Cargo Northeast Ltd.",
        "description": "Customs clearance at Plymouth Docks from Cargo Northeast Ltd. Plymouth import customs clearance, export support and sea freight. Get a quote today.",
        "quote": "e.g. Roscoff → Plymouth",
        "blurb": "Ferry and dock freight through Plymouth",
    },
    {
        "slug": "customs-clearance-at-port-of-tilbury",
        "crumb": "Tilbury",
        "name": "Port of Tilbury",
        "label": "Tilbury",
        "title": "Customs Clearance at Port of Tilbury | Cargo Northeast Ltd.",
        "description": "Customs clearance at Port of Tilbury from Cargo Northeast Ltd. Thames customs clearance, sea freight and export support. Get a quote today.",
        "quote": "e.g. Rotterdam → Tilbury",
        "blurb": "Thames container and breakbulk cargo at Tilbury",
    },
    {
        "slug": "customs-clearance-at-portsmouth-international-port",
        "crumb": "Portsmouth",
        "name": "Portsmouth International Port",
        "label": "Portsmouth",
        "title": "Customs Clearance at Portsmouth International Port | Cargo Northeast Ltd.",
        "description": "Customs clearance at Portsmouth International Port by Cargo Northeast Ltd. Import, export and sea freight Portsmouth support. Get a quote today.",
        "quote": "e.g. Caen → Portsmouth",
        "blurb": "Ferry and freight traffic through Portsmouth",
    },
    {
        "slug": "customs-clearance-at-teesport-port",
        "crumb": "Teesport",
        "name": "Teesport",
        "label": "Teesport",
        "title": "Customs Clearance at Teesport | Cargo Northeast Ltd.",
        "description": "Customs clearance at Teesport made simple with Cargo Northeast Ltd. Teesport import clearance and sea freight support. Get a quote today.",
        "quote": "e.g. Rotterdam → Teesport",
        "blurb": "North East container and bulk cargo at Teesport",
    },
    {
        "slug": "customs-clearance-at-the-port-of-southampton",
        "crumb": "Southampton",
        "name": "Port of Southampton",
        "label": "Southampton",
        "title": "Customs Clearance at the Port of Southampton | Cargo Northeast Ltd.",
        "description": "Expert customs clearance at the Port of Southampton with Cargo Northeast Ltd. Import/export clearance and freight forwarding Southampton. Get a quote today.",
        "quote": "e.g. Shanghai → Southampton",
        "blurb": "Deep-sea containers moving through Southampton",
    },
    {
        "slug": "customs-clearance-grimsby",
        "crumb": "Grimsby",
        "name": "Grimsby Port",
        "label": "Grimsby",
        "title": "Customs Clearance Grimsby | Cargo Northeast Ltd.",
        "description": "Expert customs clearance Grimsby with Cargo Northeast Ltd. Import/export clearance at Grimsby Port plus freight services. Get a quote today.",
        "quote": "e.g. Esbjerg → Grimsby",
        "blurb": "Humber freight and ferry cargo through Grimsby",
    },
    {
        "slug": "customs-clearance-port-of-tyne",
        "crumb": "Port of Tyne",
        "name": "Port of Tyne",
        "label": "Port of Tyne",
        "title": "Customs Clearance Port of Tyne | Cargo Northeast Ltd.",
        "description": "Customs clearance Port of Tyne from Cargo Northeast Ltd. Your Newcastle customs broker for sea freight, storage and HMRC paperwork. Get a quote today.",
        "quote": "e.g. Amsterdam → Port of Tyne",
        "blurb": "Local North East sea freight through Port of Tyne",
    },
    {
        "slug": "felixstowe-customs-clearance",
        "crumb": "Felixstowe",
        "name": "Felixstowe Port",
        "label": "Felixstowe",
        "title": "Felixstowe Customs Clearance | Cargo Northeast Ltd.",
        "description": "Expert Felixstowe customs clearance with Cargo Northeast Ltd. Fast, compliant import and export clearance at Felixstowe Port. Get a quote today.",
        "quote": "e.g. Shanghai → Felixstowe",
        "blurb": "The UK’s largest container port at Felixstowe",
    },
    {
        "slug": "hull-customs-clearance",
        "crumb": "Hull",
        "name": "Hull / Humber Port",
        "label": "Hull",
        "title": "Hull Customs Clearance | Cargo Northeast Ltd.",
        "description": "Expert Hull customs clearance with Cargo Northeast Ltd. Customs clearance at Hull Humber Port, Humber sea freight and import/export broker. Get a quote.",
        "quote": "e.g. Rotterdam → Hull",
        "blurb": "Humber estuary freight through Hull",
    },
    {
        "slug": "poole-ferry-terminal-customs-clearance",
        "crumb": "Poole",
        "name": "Poole Ferry Terminal",
        "label": "Poole",
        "title": "Poole Ferry Terminal Customs Clearance | Cargo Northeast Ltd.",
        "description": "Poole ferry terminal customs clearance from Cargo Northeast Ltd. Import and export clearance plus Poole port freight services. Get a quote today.",
        "quote": "e.g. Cherbourg → Poole",
        "blurb": "Ferry freight through Poole",
    },
    {
        "slug": "thames-europort-customs-clearance",
        "crumb": "Thames Europort",
        "name": "Thames Europort",
        "label": "Thames Europort",
        "title": "Thames Europort Customs Clearance | Cargo Northeast Ltd.",
        "description": "Thames Europort customs clearance from Cargo Northeast Ltd. Dartford customs clearance, sea freight and export support handled for you. Get a quote today.",
        "quote": "e.g. Vlissingen → Thames Europort",
        "blurb": "Short-sea and ferry freight at Thames Europort",
    },
]


def php_escape(s: str) -> str:
    return s.replace("\\", "\\\\").replace("'", "\\'")


def page_php(p: dict) -> str:
    n = php_escape(p["name"])
    crumb = php_escape(p["crumb"])
    title = php_escape(p["title"])
    desc = php_escape(p["description"])
    quote = php_escape(p["quote"])
    blurb = php_escape(p["blurb"])
    return dedent(
        f"""\
        <?php
        return [
            'title'       => '{title}',
            'description' => '{desc}',
            'breadcrumbs' => [['UK seaports', '/all-seaports/']],
            'crumb'       => '{crumb}',
            'service'     => 'Customs clearance at {n}',
            'sections'    => [
                [
                    'type'              => 'hero',
                    'quote'             => true,
                    'quote_placeholder' => '{quote}',
                    'eyebrow'           => 'Sea freight & customs clearance',
                    'title'             => 'Customs clearance at {n}',
                    'lead'              => 'Containers and sea freight declared correctly, released quickly and delivered on time — with customs and onward transport from {n} handled by one team.',
                ],
                ['type' => 'trust'],
                [
                    'type'    => 'features',
                    'id'      => 'services',
                    'eyebrow' => 'What we handle',
                    'title'   => 'Everything your cargo needs at {n}',
                    'intro'   => 'At a busy UK port every hour counts. Incorrect paperwork, a wrong commodity code or a missing EORI number can hold your goods, trigger storage charges and delay delivery.',
                    'items'   => [
                        ['icon' => 'shield', 'title' => 'Import & export declarations', 'text' => 'Declarations prepared and submitted to HMRC through the Customs Declaration Service (CDS).'],
                        ['icon' => 'clipboard', 'title' => 'Commodity classification', 'text' => 'The right commodity codes assigned — they affect duty rates, licensing and the accuracy of your declaration.'],
                        ['icon' => 'ship', 'title' => 'Shipping line & terminal liaison', 'text' => 'We coordinate with shipping lines, hauliers and the terminal so documents and cargo are ready together.'],
                        ['icon' => 'truck', 'title' => 'Freight forwarding & delivery', 'text' => 'Clearance and onward transport brought together, so your cargo is easier to track from booking to delivery.'],
                    ],
                ],
                [
                    'type'       => 'panel',
                    'id'         => 'customs',
                    'eyebrow'    => 'Why customs clearance matters',
                    'title'      => 'Keep your shipments moving through {n}',
                    'paragraphs' => [
                        'Every commercial shipment entering or leaving the UK by sea must be declared to HMRC. The declaration records what the goods are, their value, their commodity code and their origin or destination. If any detail is wrong, cargo can be held, costs build up and penalties can follow.',
                        'We check your GB EORI number before your shipment arrives or departs, flag goods that need a licence or extra checks, and explain how duty and import VAT apply. Declarations are filed electronically through CDS, so we clear {n} cargo from our office at Newcastle Airport — including {blurb}.',
                    ],
                    'checklist'  => ['Import & export declarations via CDS', 'EORI number checks', 'Commodity codes', 'Licences & restricted goods', 'Duty & import VAT'],
                ],
                [
                    'type'    => 'why',
                    'eyebrow' => 'Why Cargo Northeast',
                    'title'   => 'Your {n} customs clearance agent',
                    'items'   => [
                        ['title' => 'One point of contact', 'text' => 'The same team handles your clearance and forwarding, so there are fewer handovers.'],
                        ['title' => 'HMRC and CDS know-how', 'text' => 'Up-to-date knowledge of HMRC requirements and CDS processes as customs rules change.'],
                        ['title' => 'Fewer errors', 'text' => 'Accurate declarations mean fewer delays, queries, storage charges and penalties.'],
                        ['title' => 'One-off or regular', 'text' => 'Whether you ship occasionally or every week, we support single clearances and ongoing arrangements.'],
                    ],
                ],
                [
                    'type'  => 'steps',
                    'title' => 'Clearing cargo at {n}',
                    'items' => [
                        ['title' => 'Send your details', 'text' => 'Share your shipment and container details, commercial invoice and packing list.'],
                        ['title' => 'We check the detail', 'text' => 'We confirm your EORI number, commodity codes and any licence requirements.'],
                        ['title' => 'Declare to HMRC', 'text' => 'We submit the declaration through CDS and keep you updated until it clears.'],
                        ['title' => 'Deliver', 'text' => 'Cleared cargo moves on by road, and you receive the customs documentation for your records.'],
                    ],
                ],
                [
                    'type'  => 'faq',
                    'title' => '{n} customs questions',
                    'items' => [
                        ['q' => 'What does customs clearance at {n} involve?', 'a' => 'Declaring your goods to HMRC so they can legally enter or leave the UK. It covers preparing the declaration, confirming commodity codes, calculating duty and VAT where it applies and making sure your paperwork matches the shipment.'],
                        ['q' => 'Do I need an EORI number?', 'a' => 'In most cases, yes. A GB EORI number is generally required to make customs declarations to HMRC. If you don’t have one, we can guide you through registering before your first shipment.'],
                        ['q' => 'How are duty and VAT handled?', 'a' => 'Imports may attract duty and import VAT depending on the goods, their origin and value. UK exports are generally zero-rated for VAT if you hold valid proof of export, though duty may apply in the destination country.'],
                        ['q' => 'Can you provide freight forwarding as well as customs clearance?', 'a' => 'Yes. We offer freight forwarding alongside customs clearance at {n}, so your documents, carriers and onward delivery are coordinated by one team.'],
                    ],
                ],
                ['type' => 'cta', 'title' => 'Shipping through {n}?'],
            ],
        ];
        """
    )


def main() -> None:
    written = []
    for p in PORTS:
        path = PAGES / f"{p['slug']}.php"
        path.write_text(page_php(p), encoding="utf-8")
        written.append(path.name)
    print(f"Wrote {len(written)} pages:")
    for name in written:
        print(f"  {name}")


if __name__ == "__main__":
    main()
