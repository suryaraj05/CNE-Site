<?php
return [
    'title'       => 'Customs Clearance Services in Aberdeen | Cargo Northeast',
    'description' => 'Customs clearance for Aberdeen importers and exporters, including air cargo through Aberdeen Airport (ABZ). CDS declarations, EORI, duty and VAT guidance.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Aberdeen',
    'service'     => 'Customs clearance services in Aberdeen',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Houston → Aberdeen (ABZ)',
            'eyebrow'           => 'Customs agent Aberdeen',
            'title'             => 'Customs clearance services in Aberdeen',
            'lead'              => 'Import and export declarations, documentation and duty and VAT guidance for Aberdeen businesses — so your shipments meet customs requirements without avoidable delays.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs support for Aberdeen traders',
            'intro'   => 'Every shipment is different. What’s needed for clearance depends on the goods, their origin and destination, and the customs procedure involved.',
            'items'   => [
                ['icon' => 'box', 'title' => 'Import clearance', 'text' => 'Import documentation and declarations prepared for goods entering the UK.'],
                ['icon' => 'send', 'title' => 'Export clearance', 'text' => 'Export declarations and the supporting paperwork for goods leaving the UK.'],
                ['icon' => 'plane', 'title' => 'Airport customs clearance', 'text' => 'Air cargo through Aberdeen Airport, where tight schedules make accurate, timely declarations essential.'],
                ['icon' => 'pound', 'title' => 'Duty & VAT guidance', 'text' => 'Clear explanations of customs duty, import VAT and any associated charges on your goods.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'HMRC, CDS, EORI and more',
            'title'      => 'Customs clearance in Aberdeen, explained',
            'paragraphs' => [
                'HMRC oversees UK customs and collects duty and VAT. Import and export declarations are submitted through the Customs Declaration Service (CDS), and businesses generally need an EORI number to carry out customs activity in Great Britain.',
                'Any duty and import VAT due depends on the commodity classification, customs value, origin and any reliefs that apply. Providing accurate shipment information from the outset — a commercial invoice, packing list, commodity codes and origin details — is the best way to avoid errors and preventable delays.',
            ],
            'checklist'  => ['Import & export declarations via CDS', 'EORI number guidance', 'Commodity codes', 'Customs value & origin', 'Duty & import VAT'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Customs support that’s clear and practical',
            'items'   => [
                ['title' => 'Practical support', 'text' => 'We tell you exactly what documentation and information your clearance needs.'],
                ['title' => 'Imports and exports', 'text' => 'Support for businesses trading in both directions, regular or one-off.'],
                ['title' => 'Clear communication', 'text' => 'Straight answers on the customs information and potential charges for your shipment.'],
                ['title' => 'Tailored to your cargo', 'text' => 'Advice based on your goods, shipping arrangements and clearance requirements.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'How an Aberdeen clearance works',
            'items' => [
                ['title' => 'Share shipment details', 'text' => 'Goods, origin, destination, transport method, value and shipping date.'],
                ['title' => 'Documents checked', 'text' => 'We review your invoice, packing list, commodity codes and EORI number.'],
                ['title' => 'Declare to HMRC', 'text' => 'Your import or export declaration is submitted through CDS.'],
                ['title' => 'Released', 'text' => 'Imports are released for delivery; exports depart for their destination.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Aberdeen customs questions',
            'items' => [
                ['q' => 'What do customs clearance services in Aberdeen include?', 'a' => 'Preparing and submitting the customs declaration, checking supporting documents and dealing with any import or export requirements — including HMRC procedures, CDS, EORI numbers, duty and VAT.'],
                ['q' => 'Can you help with airport customs clearance in Aberdeen?', 'a' => 'Yes. We can handle declarations and supporting documents for air freight through Aberdeen Airport. Contact us with your shipment details to confirm what your cargo needs.'],
                ['q' => 'Do I need an EORI number?', 'a' => 'Businesses generally need an EORI number to import goods into or export goods from Great Britain. Check your EORI details are valid before you ship — we can advise if you’re unsure.'],
                ['q' => 'What documents are needed for import and export declarations?', 'a' => 'Commonly a commercial invoice, packing list, commodity codes, goods description, customs value, country of origin and transport details. Some goods also need licences or certificates.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Need customs clearance in Aberdeen?'],
    ],
];
