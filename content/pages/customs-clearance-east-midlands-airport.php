<?php
return [
    'title'       => 'Customs Clearance at East Midlands Airport | Cargo Northeast',
    'description' => 'Customs clearance at East Midlands Airport (EMA) for air freight imports and exports. HMRC CDS declarations, EORI, duty and import VAT handled. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'East Midlands Airport',
    'service'     => 'Customs clearance at East Midlands Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Hong Kong → East Midlands (EMA)',
            'eyebrow'           => 'East Midlands air freight customs',
            'title'             => 'Customs clearance at East Midlands Airport',
            'lead'              => 'Import and export declarations for air freight through East Midlands Airport (EMA) - prepared properly, filed with HMRC and kept moving, so your cargo isn’t left waiting at the airport.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'The customs side of your EMA shipment, covered',
            'intro'   => 'Moving goods through an airport involves more than booking the flight. We take care of the declarations and paperwork so commercial cargo, machinery, spare parts and samples clear without fuss.',
            'items'   => [
                ['icon' => 'box', 'title' => 'Import clearance', 'text' => 'Declarations for air freight arriving at East Midlands, from urgent consignments to regular commercial stock.'],
                ['icon' => 'send', 'title' => 'Export clearance', 'text' => 'Export declarations and the supporting information needed before your goods leave the UK through EMA.'],
                ['icon' => 'file', 'title' => 'Document checks', 'text' => 'Commercial invoices, packing lists and air waybills reviewed so the detail matches the goods before we file.'],
                ['icon' => 'message', 'title' => 'Liaison during clearance', 'text' => 'We communicate with the relevant parties while your shipment clears, and keep you updated throughout.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs at East Midlands Airport',
            'title'      => 'Why getting customs right matters',
            'paragraphs' => [
                'Goods entering or leaving the UK through East Midlands Airport must be declared to HMRC through the Customs Declaration Service (CDS). A declaration missing information or carrying the wrong detail can trigger queries that hold your cargo at the airport.',
                'Those delays ripple down the supply chain: stock lands late, customers wait and time-sensitive goods sit in storage. We review what you’re moving before it reaches the customs stage and tell you up front what’s needed - so the clearance itself is routine.',
            ],
            'checklist'  => ['HMRC & CDS declarations', 'EORI number guidance', 'Commodity information', 'Duty & import VAT', 'Invoice & packing list checks'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'Practical customs support for EMA freight',
            'items'       => [
                ['title' => 'Advice before you ship', 'text' => 'We look at your goods first, then explain exactly what the shipment needs - no generic checklists.'],
                ['title' => 'Imports and exports', 'text' => 'One team for declarations in both directions, whether you ship regularly or occasionally.'],
                ['title' => 'BIFA member', 'text' => 'We trade under BIFA terms and file HMRC declarations through CDS correctly.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Clearing cargo at East Midlands',
            'items' => [
                ['title' => 'Tell us about the shipment', 'text' => 'Origin or destination, what you’re shipping, expected dates and your EORI number.'],
                ['title' => 'We check the paperwork', 'text' => 'Invoices, packing list and commodity details reviewed before the cargo arrives at EMA.'],
                ['title' => 'Declaration filed', 'text' => 'We submit the import or export declaration to HMRC through CDS.'],
                ['title' => 'Released and moving', 'text' => 'Once cleared, your goods continue to their destination in the UK or overseas.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'East Midlands Airport customs questions',
            'items' => [
                ['q' => 'What does customs clearance at East Midlands Airport involve?', 'a' => 'It’s the process of declaring goods to HMRC so they can legally enter or leave the UK. For air freight at EMA, declarations are submitted through CDS and include what the goods are, their value, origin and destination.'],
                ['q' => 'What documents are usually needed?', 'a' => 'Commonly a commercial invoice, a packing list and the air waybill, plus your EORI number. Some goods need licences or certificates - we’ll tell you what your cargo requires.'],
                ['q' => 'Will I pay customs duty and VAT?', 'a' => 'Imported goods may be subject to customs duty and import VAT depending on the type of goods, their value and country of origin. Contact us before shipping and we’ll explain what is likely to apply.'],
                ['q' => 'How can I avoid delays at EMA?', 'a' => 'Most delays come from missing or inconsistent information. Send documents early, make sure invoice details match the goods and have your EORI number ready.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Shipping through East Midlands Airport?', 'text' => 'Tell us what you’re moving, where it’s going and when it’s expected - we’ll come back with a clear, no-obligation quote.'],
    ],
];
