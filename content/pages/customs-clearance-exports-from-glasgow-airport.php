<?php
return [
    'title'       => 'Export Customs Clearance at Glasgow Airport | Cargo Northeast',
    'description' => 'Customs broker for exports from Glasgow Airport (GLA). CDS export declarations, EORI checks, licence checks and VAT zero-rating guidance, plus import clearance.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Glasgow',
    'service'     => 'Export customs clearance from Glasgow Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Glasgow (GLA) → New York',
            'eyebrow'           => 'Customs broker Glasgow',
            'title'             => 'Export customs clearance from Glasgow Airport',
            'lead'              => 'Shipping goods abroad by air from Scotland? We manage the full customs process so your cargo leaves Glasgow on schedule and in line with UK customs rules.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Everything your Glasgow export needs',
            'intro'   => 'Missing paperwork or an incorrect declaration can ground your cargo and cost you time and money. We check the detail before your goods reach the airport.',
            'items'   => [
                ['icon' => 'send', 'title' => 'Export declarations', 'text' => 'Export declarations prepared and submitted to HMRC through the Customs Declaration Service (CDS).'],
                ['icon' => 'clipboard', 'title' => 'Commodity classification', 'text' => 'The right commodity codes assigned - they affect duty rates, licensing and the accuracy of your declaration.'],
                ['icon' => 'lock', 'title' => 'Licences & restricted goods', 'text' => 'Goods that need an export licence or extra checks flagged before they reach the airport.'],
                ['icon' => 'box', 'title' => 'Imports into Glasgow', 'text' => 'Import declarations, duty and VAT calculations and release of your goods as quickly as the rules allow.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Export customs at Glasgow Airport',
            'title'      => 'Declared correctly before departure',
            'paragraphs' => [
                'Every commercial shipment leaving the UK must be declared to HMRC before it can depart. The declaration records what you’re sending, its value, its commodity code and its destination. If any detail is wrong, goods can be held at the airport, shipments delayed and penalties incurred.',
                'We check your GB EORI number, prepare and submit the declaration, and explain how duty and VAT apply - including the proof of export you need to keep for VAT zero-rating. We liaise with airlines and handling agents so documents and goods arrive together.',
            ],
            'checklist'  => ['CDS export declarations', 'EORI number checks', 'Commodity codes', 'Export licence checks', 'Export VAT zero-rating evidence'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why use a customs broker',
            'title'   => 'The cost of a mistake falls on your business',
            'items'   => [
                ['title' => 'HMRC and CDS know-how', 'text' => 'Up-to-date knowledge of HMRC requirements and CDS processes as customs rules change.'],
                ['title' => 'Time back', 'text' => 'We handle the declarations so your staff can focus on running the business.'],
                ['title' => 'Fewer errors', 'text' => 'Accurate declarations mean fewer delays, queries and penalties.'],
                ['title' => 'One-off or regular', 'text' => 'Whether you export occasionally or every week, we support single clearances and ongoing arrangements.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Exporting through Glasgow',
            'items' => [
                ['title' => 'Send your details', 'text' => 'Share your shipment details, commercial invoice and packing list.'],
                ['title' => 'We check the detail', 'text' => 'We confirm your EORI number, commodity codes and any licence requirements.'],
                ['title' => 'Declare to HMRC', 'text' => 'We submit the export declaration through CDS and keep you updated until it clears.'],
                ['title' => 'Depart GLA', 'text' => 'Your cargo flies and you receive the export documentation for your records.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Glasgow export customs questions',
            'items' => [
                ['q' => 'Do I need an EORI number to export from Glasgow Airport?', 'a' => 'In most cases, yes. A GB EORI number is generally required to make export declarations to HMRC. If you don’t have one, we can guide you through registering before your first shipment.'],
                ['q' => 'Are export declarations required for every shipment?', 'a' => 'Commercial goods leaving the UK usually need a declaration, though requirements vary by goods, value and destination. We’ll confirm what applies to your shipment before it travels.'],
                ['q' => 'How do duty and VAT apply to exports?', 'a' => 'UK exports are generally zero-rated for VAT, provided you hold valid proof of export. Duty may be payable in the destination country, depending on the goods and local rules.'],
                ['q' => 'Why use a customs broker instead of declaring it myself?', 'a' => 'A broker reduces the risk of incorrect declarations, saves you time and handles communication with HMRC, airlines and cargo handlers - especially useful if you ship regularly or deal with restricted goods.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Exporting goods from Glasgow?'],
    ],
];
