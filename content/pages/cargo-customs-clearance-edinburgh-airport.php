<?php
return [
    'title'       => 'Cargo Customs Clearance at Edinburgh Airport | Cargo Northeast',
    'description' => 'Import and export customs clearance for air cargo at Edinburgh Airport (EDI). HMRC CDS declarations, EORI, commodity codes, duty and VAT handled for you.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Edinburgh',
    'service'     => 'Cargo customs clearance at Edinburgh Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Frankfurt → Edinburgh (EDI)',
            'eyebrow'           => 'Edinburgh air cargo & customs',
            'title'             => 'Cargo customs clearance at Edinburgh Airport',
            'lead'              => 'Import and export clearance for air cargo through Edinburgh, with the full customs process handled so your goods move without waiting on paperwork.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs clearance at Edinburgh Airport',
            'intro'   => 'Missing documents, wrong commodity codes or an incorrect declaration can hold up a shipment and add unexpected costs. We get the detail right before your cargo moves.',
            'items'   => [
                ['icon' => 'box', 'title' => 'Import clearance Edinburgh', 'text' => 'Import declarations, duty and VAT calculations and release of your goods as soon as the rules allow.'],
                ['icon' => 'send', 'title' => 'Export clearance Edinburgh', 'text' => 'Export declarations, commodity classification, licence checks and proof of export for VAT zero-rating.'],
                ['icon' => 'clipboard', 'title' => 'Commodity classification', 'text' => 'Correct commodity codes, which affect duty rates, licensing and declaration accuracy.'],
                ['icon' => 'route', 'title' => 'Freight forwarding', 'text' => 'Airlines and cargo handlers coordinated so your documents and goods are ready together.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Why cargo customs clearance matters',
            'title'      => 'Accurate declarations keep freight moving',
            'paragraphs' => [
                'Every commercial shipment entering or leaving the UK must be declared to HMRC through the Customs Declaration Service (CDS). The declaration sets out what the goods are, their value, their commodity code and where they’re coming from or going to. If any detail is wrong, cargo can be held, delivery dates slip and penalties can follow.',
                'We check your GB EORI number, classify your goods, flag anything that needs a licence or extra checks, and explain how duty and import VAT apply. For imports, we review the paperwork before the cargo lands to help avoid queries and storage delays.',
            ],
            'checklist'  => ['Import & export declarations via CDS', 'EORI number checks', 'Commodity codes', 'Licences & restricted goods', 'Duty & import VAT'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'One team for paperwork and cargo',
            'items'   => [
                ['title' => 'Clearance and forwarding together', 'text' => 'One provider for declarations and freight keeps your records consistent and shipments easier to track.'],
                ['title' => 'Checked before arrival', 'text' => 'We review documents before your cargo lands or departs, not after it’s held.'],
                ['title' => 'One-off or regular', 'text' => 'Single clearances or ongoing arrangements, whether you ship occasionally or every week.'],
                ['title' => 'BIFA member', 'text' => 'Trading under BIFA terms, with HMRC declarations filed correctly.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'How an Edinburgh clearance works',
            'items' => [
                ['title' => 'Send your details', 'text' => 'Share your shipment details, commercial invoice and packing list.'],
                ['title' => 'We check the detail', 'text' => 'We confirm your EORI number, commodity codes and any licence requirements.'],
                ['title' => 'Declare to HMRC', 'text' => 'We submit the declaration through CDS and keep you updated until it clears.'],
                ['title' => 'Cleared', 'text' => 'Your goods move on and you receive the customs documentation for your records.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Edinburgh customs questions',
            'items' => [
                ['q' => 'What is cargo customs clearance at Edinburgh Airport?', 'a' => 'Declaring your goods to HMRC so they can legally enter or leave the UK. It covers preparing the declaration, confirming commodity codes, calculating duty and VAT where it applies and making sure your paperwork matches the shipment.'],
                ['q' => 'Do I need an EORI number for import or export clearance?', 'a' => 'In most cases, yes. A GB EORI number is generally required to make customs declarations to HMRC. If you don’t have one, we can guide you through registering before your first shipment.'],
                ['q' => 'How are duty and VAT handled?', 'a' => 'Imports may attract duty and import VAT depending on the goods, their origin and value. UK exports are generally zero-rated for VAT if you hold valid proof of export, though duty may apply in the destination country.'],
                ['q' => 'Can you handle both customs clearance and freight forwarding in Edinburgh?', 'a' => 'Yes. We handle import clearance, export clearance and freight forwarding for Edinburgh, so your documents and cargo are coordinated by one team.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Moving cargo through Edinburgh?'],
    ],
];
