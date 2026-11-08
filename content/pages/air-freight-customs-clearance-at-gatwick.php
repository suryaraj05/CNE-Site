<?php
return [
    'title'       => 'Air Freight Customs Clearance at Gatwick | Cargo Northeast',
    'description' => 'Customs broker for London Gatwick Airport (LGW). Import clearance for air freight: HMRC CDS declarations, commodity codes, duty and VAT handled. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'London Gatwick',
    'service'     => 'Air freight customs clearance at London Gatwick Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. New York → London Gatwick (LGW)',
            'eyebrow'           => 'Customs broker, London Gatwick Airport',
            'title'             => 'Air freight customs clearance at Gatwick',
            'lead'              => 'Import clearance for international air freight arriving at London Gatwick. We prepare the customs side before your cargo lands, so it’s released and on its way without last-minute surprises.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs clearance imports to London Gatwick',
            'intro'   => 'Whether you’re importing commercial goods, receiving an urgent shipment or moving cargo internationally on a regular basis, we make Gatwick customs easier to understand and manage.',
            'items'   => [
                ['icon' => 'shield', 'title' => 'Import declarations', 'text' => 'Import entries for goods arriving at LGW, prepared accurately and submitted to HMRC through CDS.'],
                ['icon' => 'users', 'title' => 'Customs broker support', 'text' => 'Practical help if you don’t import often - we explain the procedures and documents that apply to you.'],
                ['icon' => 'search', 'title' => 'Classification & valuation', 'text' => 'Goods descriptions, commodity information, shipment value and country of origin confirmed before filing.'],
                ['icon' => 'truck', 'title' => 'Wider air freight support', 'text' => 'Collection, handling and delivery coordinated alongside customs for a clear view of the whole journey.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Import customs at LGW',
            'title'      => 'Ready before your cargo lands',
            'paragraphs' => [
                'When an international shipment arrives at Gatwick, import customs procedures must be completed before the goods can normally be released. Requirements depend on the type and value of the goods, their origin and their intended use.',
                'Air freight is chosen when time matters, and a hold at customs can hit deliveries, stock levels and customer commitments. We prepare the declaration before arrival, confirm whether customs duty and import VAT apply, and advise on postponed VAT accounting for VAT-registered businesses.',
            ],
            'checklist'  => ['Commercial invoices', 'Goods description & value', 'Commodity codes', 'Country of origin', 'Transport details'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'A Gatwick customs broker that explains things',
            'items'       => [
                ['title' => 'No jargon', 'text' => 'We explain what’s needed in straightforward language, so you know what to expect.'],
                ['title' => 'Every shipment assessed', 'text' => 'Machinery, spare parts, commercial goods, samples or general cargo - each reviewed on its own terms.'],
                ['title' => 'BIFA member', 'text' => 'We trade under BIFA terms and file declarations correctly through CDS.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Gatwick import clearance, step by step',
            'items' => [
                ['title' => 'Send shipment details', 'text' => 'What’s arriving, where from and when - plus the commercial invoice and air waybill.'],
                ['title' => 'We prepare the entry', 'text' => 'Commodity codes, value and origin confirmed; duty and VAT worked out in advance.'],
                ['title' => 'Cleared on arrival', 'text' => 'We submit the import declaration to HMRC through CDS.'],
                ['title' => 'Onward delivery', 'text' => 'Released goods are delivered to your premises or end customer.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Gatwick air freight customs questions',
            'items' => [
                ['q' => 'What does air freight customs clearance at Gatwick involve?', 'a' => 'Declaring imported goods to HMRC so they can be released after arriving at London Gatwick. That means accurate details such as the goods description, value, commodity code and country of origin.'],
                ['q' => 'Do I need an EORI number to import through Gatwick?', 'a' => 'In most cases, yes. An EORI number is a unique identifier businesses use when making customs declarations. If you’re unsure, we can advise before your first shipment.'],
                ['q' => 'Will I pay duty and VAT on goods arriving at Gatwick?', 'a' => 'Possibly. It depends on the commodity code, value, country of origin and any reliefs that apply. VAT-registered businesses may be able to use postponed VAT accounting.'],
                ['q' => 'How do I get help from a customs broker at Gatwick?', 'a' => 'Tell us what you’re shipping, where it’s coming from, where it’s going and when it’s expected. Email opsuk@cargonortheast.com, call +44 7354 595649 or use our quote form.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Air freight landing at Gatwick?'],
    ],
];
