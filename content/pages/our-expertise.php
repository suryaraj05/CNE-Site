<?php
return [
    'title'       => 'Our Expertise: Customs, Freight & Moves | Cargo Northeast',
    'description' => 'Customs clearance, Amazon FBA, UK–EU road transport, India to UK freight, baggage to India, house moves and safe storage - all from one Newcastle-based team.',
    'breadcrumbs' => [],
    'crumb'       => 'Our expertise',
    'sections'    => [
        [
            'type'    => 'hero',
            'quote'   => false,
            'image'   => asset_img('expertise'),
            'eyebrow' => 'Our expertise',
            'title'   => 'Specialist logistics expertise from Newcastle',
            'lead'    => 'From UK customs clearance and cross-border freight to baggage shipping, house moves and storage - one experienced team, based at Newcastle Airport, handles it all.',
            'primary' => ['Get a quote', '/request-a-quote/'],
        ],
        [
            'type'    => 'features',
            'id'      => 'expertise',
            'columns' => 3,
            'eyebrow' => 'What we do',
            'title'   => 'Explore our areas of expertise',
            'items'   => [
                ['image' => asset_img('customs'), 'icon' => 'shield', 'title' => 'Customs clearance (UK & EU)', 'text' => 'HMRC import and export declarations, post-Brexit compliance and non-resident representation. First three clearances free.', 'href' => '/customs-clearance-service-uk/'],
                ['image' => asset_img('amazon'), 'icon' => 'cart', 'title' => 'Amazon FBA', 'text' => 'Prep, FNSKU labelling, storage and delivery to Amazon fulfilment centres across the UK and EU.', 'href' => '/amazon-fba-logistics-solutions/'],
                ['image' => asset_img('road'), 'icon' => 'truck', 'title' => 'Road transport (UK & EU)', 'text' => 'FTL and LTL road freight between the UK and Europe, with customs handled on both sides.', 'href' => '/road-transport-uk-eu/'],
                ['image' => asset_img('air'), 'icon' => 'plane', 'title' => 'Air & sea freight (India to UK)', 'text' => 'Air freight from India from Rs.325/kg, door to door in 7–10 days with UK customs clearance included.', 'href' => '/air-freight-india-uk/'],
                ['image' => asset_img('cargo'), 'icon' => 'luggage', 'title' => 'Baggage delivery to India', 'text' => 'Door-to-door shipping of personal belongings and excess baggage from anywhere in the UK to any city in India.', 'href' => '/baggage-delivery-to-india/'],
                ['image' => asset_img('house'), 'icon' => 'home', 'title' => 'House moves', 'text' => 'Affordable removals across Tyne and Wear, Durham and Sunderland from £49, and UK-wide from £99.', 'href' => '/house-move-service-tyne-and-wear/'],
                ['image' => asset_img('storage'), 'icon' => 'warehouse', 'title' => 'Safe storage', 'text' => 'Secure, flexible storage in Newcastle with collection and delivery. Students from £50 per pallet/month.', 'href' => '/safe-storage-newcastle-upon-tyne-northeast/'],
            ],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'One team for every shipment',
            'items'   => [
                ['title' => 'Customs at the core', 'text' => 'BIFA member trading under BIFA terms, with HMRC declarations filed correctly through CDS.'],
                ['title' => 'Offices in the UK and India', 'text' => 'Teams at Newcastle Airport and in Mumbai look after shipments at both ends.'],
                ['title' => 'Transparent pricing', 'text' => 'Clear rates published up front - from £25 customs clearances to £49 house moves.'],
                ['title' => 'Local, personal service', 'text' => 'A Newcastle-based team you can call directly, with straight answers and quick replies.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Questions about our services',
            'items' => [
                ['q' => 'Where is Cargo Northeast based?', 'a' => 'Our UK office is at Freight Village, Newcastle Airport, NE13 8BH. We also have an office in Borivali (West), Mumbai, for shipments to and from India.'],
                ['q' => 'Do you only work with businesses?', 'a' => 'No. Alongside customs clearance and freight for businesses, we help individuals and families with baggage shipping to India, house moves and storage.'],
                ['q' => 'Can you combine services?', 'a' => 'Yes. Many customers combine services - for example customs clearance with delivery to Amazon, or a house move with storage. Tell us what you need and we’ll quote for the whole job.'],
                ['q' => 'How do I get a quote?', 'a' => 'Use our online quote form, call +44 7354 595649 or email opsuk@cargonortheast.com. We usually reply within hours on working days.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Not sure which service you need?', 'text' => 'Tell us what you’re moving and where - we’ll recommend the right solution and send a no-obligation quote.'],
    ],
];
