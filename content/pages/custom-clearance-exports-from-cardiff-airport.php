<?php
return [
    'title'       => 'Export Customs Clearance at Cardiff Airport | Cargo Northeast',
    'description' => 'Export customs clearance and air freight from Cardiff Airport (CWL). CDS declarations, EORI checks, commodity codes and export VAT guidance. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Cardiff',
    'service'     => 'Export customs clearance and air freight from Cardiff Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Cardiff (CWL) → Dubai',
            'eyebrow'           => 'Cardiff air freight & customs',
            'title'             => 'Export customs clearance from Cardiff Airport',
            'lead'              => 'Shipping goods abroad by air from Wales? We manage the full customs process so your cargo departs Cardiff on schedule and in line with UK customs rules.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Everything your Cardiff export needs',
            'intro'   => 'A missing document or an incorrect declaration can hold cargo on the ground and add costs you didn’t plan for. We check the detail before your goods reach the airport.',
            'items'   => [
                ['icon' => 'send', 'title' => 'Export declarations', 'text' => 'Export declarations prepared and submitted to HMRC through the Customs Declaration Service (CDS).'],
                ['icon' => 'clipboard', 'title' => 'Commodity classification', 'text' => 'The right commodity codes assigned - they affect duty rates, licensing and the accuracy of your declaration.'],
                ['icon' => 'lock', 'title' => 'Licences & restricted goods', 'text' => 'Goods that need an export licence or extra checks flagged before they reach the airport.'],
                ['icon' => 'plane', 'title' => 'Air freight & handlers', 'text' => 'Carriers and cargo handlers coordinated so your documents and goods arrive together.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Export customs at Cardiff Airport',
            'title'      => 'Declared correctly before departure',
            'paragraphs' => [
                'Every commercial shipment leaving the UK must be declared to HMRC before it can depart. The declaration records what you’re sending, its value, its commodity code and its destination. If any detail is wrong, goods can be held at the airport, shipments delayed and penalties incurred.',
                'We check your GB EORI number, prepare the declaration and explain how duty and VAT apply - including the proof of export you need to keep for VAT zero-rating. We also handle imports into Cardiff, so one team keeps your import and export records consistent.',
            ],
            'checklist'  => ['CDS export declarations', 'EORI number checks', 'Commodity codes', 'Export VAT zero-rating evidence', 'Import clearance into Cardiff'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Customs and air freight from one team',
            'items'   => [
                ['title' => 'Fewer handovers', 'text' => 'One team coordinates your paperwork, carriers and handling agents from booking to delivery.'],
                ['title' => 'Imports and exports', 'text' => 'Use the same team both ways, so your declarations and records stay consistent.'],
                ['title' => 'One-off or regular', 'text' => 'Whether you ship occasionally or every week, we support single clearances and ongoing arrangements.'],
                ['title' => 'BIFA member', 'text' => 'Trading under BIFA terms, with HMRC declarations filed correctly.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Exporting through Cardiff',
            'items' => [
                ['title' => 'Send your details', 'text' => 'Share your shipment details, commercial invoice and packing list.'],
                ['title' => 'We check the detail', 'text' => 'We confirm your EORI number, commodity codes and any licence requirements.'],
                ['title' => 'Declare to HMRC', 'text' => 'We submit the declaration through CDS and keep you updated until it clears.'],
                ['title' => 'Depart CWL', 'text' => 'Your cargo flies and you receive the customs documentation for your records.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Cardiff export customs questions',
            'items' => [
                ['q' => 'Do I need an EORI number to export from Cardiff Airport?', 'a' => 'In most cases, yes. A GB EORI number is generally required to make export declarations to HMRC. If you don’t have one, we can guide you through registering before your first shipment.'],
                ['q' => 'Are export declarations required for every shipment?', 'a' => 'Commercial goods leaving the UK usually need a declaration, though requirements vary by goods, value and destination. We’ll confirm what applies to your shipment before it travels.'],
                ['q' => 'How are duty and VAT handled on exports?', 'a' => 'UK exports are generally zero-rated for VAT if you hold valid proof of export, though duty may apply in the destination country. Imports may attract duty and import VAT depending on the goods, origin and value.'],
                ['q' => 'Can you handle both customs clearance and air freight at Cardiff?', 'a' => 'Yes. We handle export and import clearance at Cardiff Airport alongside the air freight, so your documents and cargo are coordinated by one team.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Exporting goods from Cardiff?'],
    ],
];
