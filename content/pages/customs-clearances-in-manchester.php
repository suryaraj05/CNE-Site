<?php
return [
    'title'       => 'Customs Clearance & Air Freight in Manchester | Cargo Northeast',
    'description' => 'Customs clearance in Manchester (MAN) for air freight imports and exports. HMRC CDS declarations, EORI, duty, import VAT and postponed VAT accounting handled.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Manchester',
    'service'     => 'Customs clearance and air freight in Manchester',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Delhi → Manchester (MAN)',
            'eyebrow'           => 'Air freight Manchester',
            'title'             => 'Customs clearance in Manchester',
            'lead'              => 'Air freight and customs clearance through Manchester Airport (MAN), planned together from the start - so time-sensitive cargo isn’t held up by a missing detail.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Freight and customs for Manchester traders',
            'intro'   => 'Manchester is a major centre for businesses trading internationally. Getting cargo on a flight is only part of the journey - customs has to be right before imports are released or exports can leave.',
            'items'   => [
                ['icon' => 'send', 'title' => 'Air freight Manchester', 'text' => 'Time-sensitive cargo, commercial shipments, spare parts, samples and equipment flown in and out of MAN.'],
                ['icon' => 'box', 'title' => 'Import declarations', 'text' => 'Goods described, classified and valued correctly so they can be released and continue to their destination.'],
                ['icon' => 'globe', 'title' => 'Export declarations', 'text' => 'Export customs handled for products and equipment leaving the UK, whether regular or one-off.'],
                ['icon' => 'pound', 'title' => 'Duty & VAT advice', 'text' => 'Clear guidance on customs duty, import VAT and postponed VAT accounting for VAT-registered businesses.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'HMRC, CDS, EORI and more',
            'title'      => 'Customs clearance in Manchester, made simple',
            'paragraphs' => [
                'Every shipment crossing the UK border must be declared to HMRC, which oversees customs controls and collects duty and VAT. Most declarations go through the Customs Declaration Service (CDS). An import declaration covers goods entering the UK; an export declaration covers goods leaving it.',
                'Both typically include a description of the goods, commodity code, value, country of origin and transport details, and in most cases the business needs an EORI number. Duty and import VAT depend on the commodity code, value and origin - and VAT-registered businesses may be able to use postponed VAT accounting.',
            ],
            'checklist'  => ['Import & export declarations via CDS', 'Commodity codes', 'Country of origin & value', 'EORI number guidance', 'Postponed VAT accounting'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'Customs and air freight working together',
            'items'       => [
                ['title' => 'Planned from day one', 'text' => 'We consider customs alongside the transport booking, not once the goods have landed.'],
                ['title' => 'No one-size-fits-all', 'text' => 'We look at the goods, their origin, destination and circumstances before advising on next steps.'],
                ['title' => 'Clear communication', 'text' => 'We explain what information is needed and work with you to deal with it.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'How a Manchester shipment works',
            'items' => [
                ['title' => 'Plan the shipment', 'text' => 'Tell us what you’re shipping, its origin or destination and when it needs to move.'],
                ['title' => 'Book the air freight', 'text' => 'We arrange the flight into or out of Manchester alongside the customs plan.'],
                ['title' => 'Declare to HMRC', 'text' => 'We submit the import or export declaration through CDS.'],
                ['title' => 'Deliver', 'text' => 'Cleared goods continue to your premises or your customer.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Manchester customs questions',
            'items' => [
                ['q' => 'What is HMRC’s role in customs clearance?', 'a' => 'HMRC is the UK authority responsible for customs controls. It processes import and export declarations and collects customs duty and VAT on goods crossing the UK border.'],
                ['q' => 'What is the difference between an import and an export declaration?', 'a' => 'An import declaration is submitted when goods enter the UK and an export declaration when they leave. Both include the goods description, commodity code, value, country of origin and transport information.'],
                ['q' => 'Do I need an EORI number?', 'a' => 'In most cases, yes. An EORI number is a unique identifier businesses use when making customs declarations. If you’re unsure, we can advise before your first shipment.'],
                ['q' => 'How do I get a quote for customs clearance in Manchester?', 'a' => 'Tell us what you’re shipping, where it’s coming from or going to and when it needs to move. Email opsuk@cargonortheast.com, call +44 7354 595649 or use our quote form.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Need customs clearance in Manchester?'],
    ],
];
