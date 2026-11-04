<?php
return [
    'title'       => 'Heathrow Air Freight & Customs Clearance | Cargo Northeast',
    'description' => 'Air freight into London Heathrow with full HMRC customs clearance through CDS, duty and VAT handled, and onward UK delivery. Request a Heathrow quote today.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'London Heathrow',
    'service'     => 'Air freight and customs clearance at London Heathrow',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Shanghai → London (LHR)',
            'eyebrow'           => 'Air freight & customs clearance',
            'title'             => 'Air freight to London via Heathrow',
            'lead'              => 'Reliable air cargo into the UK’s largest gateway — with full customs clearance handled end to end, from booking through to final delivery.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Everything your shipment needs at Heathrow',
            'items'   => [
                ['icon' => 'send', 'title' => 'Air freight into Heathrow', 'text' => 'Commercial cargo, urgent parts, samples and e-commerce goods flown into the UK’s major gateway.'],
                ['icon' => 'shield', 'title' => 'Customs clearance', 'text' => 'Import and export declarations submitted to HMRC through CDS, with duty & VAT handled correctly.'],
                ['icon' => 'file', 'title' => 'Documentation & compliance', 'text' => 'Commercial invoices, commodity codes, EORI and supporting paperwork checked before we file.'],
                ['icon' => 'truck', 'title' => 'Collection & UK delivery', 'text' => 'Onward delivery from Heathrow to London and anywhere across the UK, arranged alongside the freight.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Heathrow air freight customs',
            'title'      => 'Customs, handled properly',
            'paragraphs' => [
                'When goods arrive at Heathrow they must be declared to HMRC through the Customs Declaration Service (CDS) before release. Getting the detail right keeps your cargo moving and avoids costly holds.',
                'We prepare and submit the declaration for you, confirm the right commodity codes, and make sure duty and import VAT are accounted for correctly — including postponed VAT accounting where it applies.',
            ],
            'checklist'  => ['HMRC & CDS declarations', 'EORI number guidance', 'Commodity code classification', 'Duty & import VAT', 'Postponed VAT accounting'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'A customs partner, not just a carrier',
            'items'       => [
                ['title' => 'One point of contact', 'text' => 'The same team handles your freight and your customs — no hand-offs.'],
                ['title' => 'Compliance done right', 'text' => 'BIFA member, trading under BIFA terms, with HMRC/CDS declarations filed correctly.'],
                ['title' => 'Clear, quick answers', 'text' => 'Straight talk on documents, duty and timings before your cargo moves.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Book', 'text' => 'Send us your cargo details and we arrange the air freight.'],
                ['title' => 'Ship', 'text' => 'Your goods fly into Heathrow, tracked along the way.'],
                ['title' => 'Clear customs', 'text' => 'We submit your HMRC declaration and clear the shipment.'],
                ['title' => 'Deliver', 'text' => 'Onward delivery to your door anywhere in the UK.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Heathrow air freight questions',
            'items' => [
                ['q' => 'How does Heathrow air freight customs work?', 'a' => 'Arriving goods must be declared to HMRC through CDS before release. Duty and import VAT may apply depending on the goods and their origin — we handle the declaration for you.'],
                ['q' => 'What documents do I need?', 'a' => 'Usually a commercial invoice, packing list and the air waybill, plus your EORI number. Some goods also need licences or certificates — we check everything before your cargo flies.'],
                ['q' => 'How can I avoid delays at Heathrow?', 'a' => 'Accurate commodity codes, complete invoices and having your EORI and VAT details ready are the biggest factors. Sending us documents before departure lets us prepare the declaration in advance.'],
                ['q' => 'Do you handle both import and export?', 'a' => 'Yes. We handle import and export declarations at Heathrow, along with the air freight booking and collection or delivery anywhere in the UK.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to move cargo through Heathrow?'],
    ],
];
