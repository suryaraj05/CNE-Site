<?php
return [
    'title'       => 'Customs Clearance at London Stansted (STN) | Cargo Northeast',
    'description' => 'Air freight customs clearance at London Stansted Airport (STN): import and export declarations via HMRC CDS for commercial, e-commerce and urgent cargo.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'London Stansted',
    'service'     => 'Customs clearance at London Stansted Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Shenzhen → London Stansted (STN)',
            'eyebrow'           => 'Stansted air freight customs clearance',
            'title'             => 'Customs clearance at London Stansted Airport',
            'lead'              => 'Import and export clearance for air freight through Stansted (STN). We get the customs information and paperwork in place so your goods can move straight on to their final destination.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'columns' => 3,
            'eyebrow' => 'What we handle',
            'title'   => 'Cargo we clear at Stansted',
            'intro'   => 'From a single consignment to regular international shipments, we support a wide range of air freight moving through STN.',
            'items'   => [
                ['icon' => 'building', 'title' => 'Commercial imports & exports', 'text' => 'Business stock and general air cargo moving into or out of the UK through Stansted.'],
                ['icon' => 'cart', 'title' => 'E-commerce shipments', 'text' => 'Online-seller consignments declared accurately, with commodity information and values checked.'],
                ['icon' => 'clock', 'title' => 'Urgent consignments', 'text' => 'Time-sensitive freight prepared in advance so clearance doesn’t become the bottleneck.'],
                ['icon' => 'warehouse', 'title' => 'Machinery & equipment', 'text' => 'Heavier and higher-value items, with descriptions and classifications that stand up to scrutiny.'],
                ['icon' => 'box', 'title' => 'Spare parts & samples', 'text' => 'Business samples and replacement parts cleared quickly, so operations and sales keep moving.'],
                ['icon' => 'calendar', 'title' => 'Regular shipments', 'text' => 'Repeat import or export flows handled consistently by the same team, shipment after shipment.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs at STN',
            'title'      => 'Imports into, and exports from, Stansted',
            'paragraphs' => [
                'Goods entering or leaving the UK through London Stansted must be declared to HMRC through the Customs Declaration Service (CDS). For imports, that means accurate commercial invoices, packing details, goods descriptions, commodity information and values from the start.',
                'Exports need attention too: the right export procedures and information must be dealt with before cargo leaves the country. Having paperwork and shipment details ready before the goods reach the airport is the simplest way to avoid delays - particularly if you don’t deal with UK customs regularly.',
            ],
            'checklist'  => ['Import & export declarations', 'EORI number guidance', 'Duty & import VAT', 'Commodity information', 'Packing & invoice details'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Straightforward customs, explained clearly',
            'items'   => [
                ['title' => 'Plain-English guidance', 'text' => 'Customs terms and documents explained simply, with clear next steps for your shipment.'],
                ['title' => 'Tailored to your cargo', 'text' => 'Requirements differ by shipment, so we understand what you’re moving before we advise.'],
                ['title' => 'Someone to call', 'text' => 'When goods are waiting at the airport, you’ll know what’s happening and what’s needed next.'],
                ['title' => 'Compliance done right', 'text' => 'BIFA member, with HMRC declarations filed accurately through CDS.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'From Stansted arrival to release',
            'items' => [
                ['title' => 'Share your details', 'text' => 'Send the commercial invoice, packing details and a description of the goods.'],
                ['title' => 'We prepare the entry', 'text' => 'We confirm commodity information, values and any extra paperwork your goods need.'],
                ['title' => 'Submit to HMRC', 'text' => 'Your import or export declaration is filed through CDS.'],
                ['title' => 'Goods move on', 'text' => 'Cleared cargo continues to your premises, your customer or its overseas destination.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'London Stansted customs questions',
            'items' => [
                ['q' => 'What does customs clearance at Stansted involve?', 'a' => 'Declaring goods to HMRC so they can legally enter or leave the UK. Declarations are submitted through CDS and include what the goods are, their value, origin and destination.'],
                ['q' => 'Can you handle both import and export clearance at STN?', 'a' => 'Yes. We support import and export declarations for air freight arriving at or leaving London Stansted Airport.'],
                ['q' => 'What documents do I need?', 'a' => 'Commonly a commercial invoice, a packing list and the air waybill. Businesses also generally need an EORI number. Some goods need extra paperwork, and we’ll tell you what your cargo requires.'],
                ['q' => 'Will I have to pay customs duty and VAT?', 'a' => 'Imported goods may be subject to customs duty and import VAT, depending on the type of goods, their value and their country of origin. Contact us before shipping and we’ll explain what may apply.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Moving air freight through Stansted?'],
    ],
];
