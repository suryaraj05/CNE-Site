<?php
return [
    'title'       => 'Customs Clearance Services in Newcastle | Cargo Northeast',
    'description' => 'Customs clearance and freight services in Newcastle, based at Newcastle Airport. Import and export declarations via HMRC CDS, EORI, duty and VAT. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Newcastle',
    'service'     => 'Customs clearance services in Newcastle',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Dubai → Newcastle (NCL)',
            'eyebrow'           => 'Freight services Newcastle UK',
            'title'             => 'Customs clearance services in Newcastle',
            'lead'              => 'Our UK office is at Freight Village, Newcastle Airport — so imports and exports through Newcastle are cleared by a team that’s right on the doorstep.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs and freight from our Newcastle base',
            'intro'   => 'We combine freight arrangements with customs support to simplify moving goods to and from Newcastle and the North East.',
            'items'   => [
                ['icon' => 'send', 'title' => 'Exports from Newcastle Airport', 'text' => 'Export declarations, shipment documentation and commodity data prepared before your goods depart.'],
                ['icon' => 'box', 'title' => 'Imports to Newcastle Airport', 'text' => 'Import declarations, document checks and coordination with airlines and handlers for incoming consignments.'],
                ['icon' => 'plane', 'title' => 'Air freight coordination', 'text' => 'Urgent, time-sensitive, small and high-value cargo, regular or one-off, with onward international transport.'],
                ['icon' => 'map-pin', 'title' => 'Local onward delivery', 'text' => 'Delivery arrangements across Newcastle, Tyne and Wear, Durham and beyond once goods are cleared.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs at Newcastle Airport',
            'title'      => 'Declarations done right, first time',
            'paragraphs' => [
                'Goods leaving or entering the UK through Newcastle need the correct customs formalities completed and declared to HMRC through the Customs Declaration Service (CDS). Accurate information and good communication are what keep shipments from being held.',
                'We make sure your EORI number, declarations and duty and VAT details are accurate and compliant from the start, coordinate with the airport and freight providers, and handle any customs queries so you don’t have to.',
            ],
            'checklist'  => ['Import & export declarations via CDS', 'EORI number checks', 'Duty & VAT guidance', 'Commodity & shipment data', 'Customs query handling'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'Newcastle’s local customs partner',
            'items'       => [
                ['title' => 'Based at the airport', 'text' => 'Our office is at Freight Village, Newcastle Airport, NE13 8BH.'],
                ['title' => 'Freight and customs together', 'text' => 'We coordinate the freight alongside the customs procedures, so everything lines up.'],
                ['title' => 'Business-focused', 'text' => 'Support tailored to your goods, destination, documents and delivery needs.'],
                ['title' => 'BIFA member', 'text' => 'Trading under BIFA terms, with HMRC declarations filed correctly.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Clearing goods through Newcastle',
            'items' => [
                ['title' => 'Get in touch', 'text' => 'Call, email or send a quote request with your goods, destination or origin and timescales.'],
                ['title' => 'Paperwork checked', 'text' => 'We review documents, commodity details and your EORI number.'],
                ['title' => 'Declared to HMRC', 'text' => 'Your import or export declaration is submitted via CDS.'],
                ['title' => 'On its way', 'text' => 'Exports depart from Newcastle Airport; imports are released for delivery.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Newcastle customs questions',
            'items' => [
                ['q' => 'Where are you based in Newcastle?', 'a' => 'Our UK office is at Freight Village, Newcastle Airport, NE13 8BH. You can call +44 7354 595649 or email opsuk@cargonortheast.com.'],
                ['q' => 'Can you help with customs clearance for exports from Newcastle Airport?', 'a' => 'Yes. We coordinate export declarations, shipment documentation and the freight and airport processes involved in exporting goods from Newcastle Airport.'],
                ['q' => 'What documents are usually needed?', 'a' => 'Commonly a commercial invoice, a packing list, an air waybill and a customs declaration. Some shipments need extra paperwork such as licences or certificates of origin — we’ll advise on yours.'],
                ['q' => 'Do your Newcastle freight services cover urgent shipments?', 'a' => 'Yes. Air freight suits urgent and high-value consignments, and we coordinate customs clearance alongside the freight to keep time-sensitive goods moving.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Need customs clearance in Newcastle?', 'text' => 'Talk to our team at Newcastle Airport about your import or export — we’ll come back with a clear, no-obligation quote.'],
    ],
];
