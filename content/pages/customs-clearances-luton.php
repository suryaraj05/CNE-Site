<?php
return [
    'title'       => 'Customs Clearance at London Luton (LTN) | Cargo Northeast',
    'description' => 'UK customs agents for London Luton Airport (LTN). Air freight plus import and export clearance through HMRC CDS, with duty, VAT and EORI guidance. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'London Luton',
    'service'     => 'Customs clearance and air freight at London Luton Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Istanbul → London Luton (LTN)',
            'eyebrow'           => 'London Luton (LTN) customs clearance',
            'title'             => 'Customs clearance at London Luton Airport',
            'lead'              => 'Air freight and customs for goods moving through Luton — handled together from the start, so commercial stock, spare parts and urgent cargo keep moving.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Air freight services for London Luton',
            'intro'   => 'London Luton is a gateway for businesses that need to move goods quickly. We combine the freight and the customs, so neither holds up the other.',
            'items'   => [
                ['icon' => 'plane', 'title' => 'Air freight via LTN', 'text' => 'Commercial consignments, spare parts, samples, equipment and time-sensitive cargo flown through Luton.'],
                ['icon' => 'box', 'title' => 'Import clearance', 'text' => 'Regular stock or one-off shipments declared accurately so they can be released without delay.'],
                ['icon' => 'send', 'title' => 'Export clearance', 'text' => 'Export procedures for products, machinery, equipment and samples before they leave the UK.'],
                ['icon' => 'file', 'title' => 'Shipment information', 'text' => 'Invoices, goods descriptions, values, commodity information and origin prepared for the declaration.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'LTN customs clearance',
            'title'      => 'What clearing goods at Luton involves',
            'paragraphs' => [
                'Every import into or export from the UK must be declared to HMRC, mostly through the Customs Declaration Service (CDS). Declarations typically include a description of the goods, commodity code, value, country of origin and transport details, and businesses usually need an EORI number to make them.',
                'Imported goods may also attract customs duty and import VAT, depending on the commodity code, value and origin. VAT-registered businesses may be able to use postponed VAT accounting. Incomplete information is the most common reason clearance takes longer than expected — so we get it right first time.',
            ],
            'checklist'  => ['HMRC & CDS declarations', 'EORI number guidance', 'Commodity codes', 'Duty & import VAT', 'Postponed VAT accounting'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'UK customs agents who keep it simple',
            'items'   => [
                ['title' => 'Clear language', 'text' => 'We look at your shipment, understand your goal and explain the requirements without jargon.'],
                ['title' => 'Updates at every stage', 'text' => 'You know what’s happening with your shipment and what’s needed next.'],
                ['title' => 'Freight and customs in one', 'text' => 'From air freight booking to the declaration, managed by the same team.'],
                ['title' => 'BIFA member', 'text' => 'Trading under BIFA terms, with declarations filed correctly through CDS.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Moving goods through Luton',
            'items' => [
                ['title' => 'Tell us about the cargo', 'text' => 'Goods, origin and destination, and your expected shipping date.'],
                ['title' => 'Freight arranged', 'text' => 'We book the air freight into or out of London Luton.'],
                ['title' => 'Customs cleared', 'text' => 'Your import or export declaration is submitted to HMRC via CDS.'],
                ['title' => 'Delivered', 'text' => 'Goods continue to your premises, your customer or overseas.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'London Luton customs questions',
            'items' => [
                ['q' => 'What does customs clearance at Luton involve?', 'a' => 'Declaring goods to HMRC so they can be released into the UK or leave it through London Luton Airport. It requires accurate details such as the goods description, value, commodity code and country of origin.'],
                ['q' => 'What is CDS?', 'a' => 'The Customs Declaration Service is HMRC’s system for processing import and export declarations. The details entered need to be complete and accurate for goods to clear smoothly.'],
                ['q' => 'Do I need an EORI number to import or export through Luton?', 'a' => 'In most cases, yes. An EORI number is a unique identifier businesses use when making customs declarations. If you’re unsure, we can advise before your first shipment.'],
                ['q' => 'How do I get a quote for air freight or customs at London Luton?', 'a' => 'Tell us what you’re shipping, where it’s coming from or going to and when it needs to move. Email opsuk@cargonortheast.com, call +44 7354 595649 or use our quote form.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Goods arriving at or leaving Luton?'],
    ],
];
