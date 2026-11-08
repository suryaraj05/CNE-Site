<?php
return [
    'title'       => 'Customs Clearance at BHX Birmingham Airport | Cargo Northeast',
    'description' => 'Air freight customs clearance at Birmingham Airport (BHX). Import and export declarations to HMRC via CDS, EORI guidance and duty and VAT advice. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Birmingham (BHX)',
    'service'     => 'Customs clearance at Birmingham Airport (BHX)',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Dubai → Birmingham (BHX)',
            'eyebrow'           => 'Birmingham air freight customs',
            'title'             => 'Customs clearance at BHX',
            'lead'              => 'Import and export clearance for air freight through Birmingham Airport. We help you prepare the right information early, so cargo clears without avoidable delays.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs support for Birmingham Airport freight',
            'items'   => [
                ['icon' => 'box', 'title' => 'Import clearance at BHX', 'text' => 'Import procedures completed so goods arriving at Birmingham can be released and continue to their destination.'],
                ['icon' => 'send', 'title' => 'Export clearance', 'text' => 'Export customs for products, equipment, machinery and samples leaving the UK through BHX.'],
                ['icon' => 'plane', 'title' => 'Air freight Birmingham', 'text' => 'Customs considered alongside the air freight arrangements, giving you a clear picture of every stage.'],
                ['icon' => 'clipboard', 'title' => 'Documentation', 'text' => 'Commercial invoices, packing details, values, commodity information and origin checked before filing.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs at Birmingham Airport',
            'title'      => 'Prepare early, clear smoothly',
            'paragraphs' => [
                'Customs controls in the UK are overseen by HMRC. Whenever goods are imported into or exported from the UK through Birmingham Airport, the shipment must be declared - mostly through the Customs Declaration Service (CDS) - with complete and accurate information.',
                'Air freight is usually chosen when speed matters, so a hold-up caused by missing documents can affect delivery schedules, customer commitments and the wider supply chain. That’s why we look at customs from the moment you plan the shipment, not when the cargo reaches the airport.',
            ],
            'checklist'  => ['HMRC & CDS declarations', 'Commodity codes', 'EORI number guidance', 'Duty & import VAT', 'Postponed VAT accounting'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'One partner for freight and customs',
            'items'   => [
                ['title' => 'Transport and customs together', 'text' => 'Fewer moving parts when the same team arranges the freight and the declaration.'],
                ['title' => 'Clear, practical answers', 'text' => 'You’ll know what information is needed, what happens next and who to contact.'],
                ['title' => 'Any type of cargo', 'text' => 'Commercial goods, machinery, spare parts, samples, e-commerce and time-sensitive consignments.'],
                ['title' => 'BIFA member', 'text' => 'Trading under BIFA terms, with HMRC declarations filed correctly.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Clearing cargo through BHX',
            'items' => [
                ['title' => 'Brief us', 'text' => 'What you’re shipping, where it’s coming from or going to, and when it’s expected.'],
                ['title' => 'We review', 'text' => 'We confirm the documents, commodity codes and values your goods need.'],
                ['title' => 'Declare', 'text' => 'The import or export declaration is submitted to HMRC through CDS.'],
                ['title' => 'Release', 'text' => 'Cleared goods leave Birmingham Airport for delivery or depart for overseas.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Birmingham Airport customs questions',
            'items' => [
                ['q' => 'What does customs clearance at BHX involve?', 'a' => 'Declaring goods to HMRC so they can be released into the UK or leave it through Birmingham Airport. It means providing accurate details such as the goods description, value, commodity code and country of origin.'],
                ['q' => 'Do I need an EORI number to import or export through Birmingham Airport?', 'a' => 'In most cases, yes. An EORI number is a unique identifier businesses use when making customs declarations. If you’re unsure whether you need one, we can advise before your first shipment.'],
                ['q' => 'Will I pay duty and VAT on goods arriving at BHX?', 'a' => 'Possibly. It depends on the commodity code, value, country of origin and any reliefs that apply. VAT-registered businesses may be able to use postponed VAT accounting for import VAT.'],
                ['q' => 'How do I get a quote for BHX customs clearance?', 'a' => 'Tell us what you’re shipping, where it’s coming from or going to and when it needs to move. Email opsuk@cargonortheast.com, call +44 7354 595649 or use our quote form.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Shipping through Birmingham Airport?'],
    ],
];
