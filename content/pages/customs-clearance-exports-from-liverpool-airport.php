<?php
return [
    'title'       => 'Export Customs Clearance at Liverpool Airport | Cargo Northeast',
    'description' => 'Export customs clearance and air freight from Liverpool John Lennon Airport (LPL). CDS export declarations, EORI checks and VAT relief guidance. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Liverpool',
    'service'     => 'Export customs clearance and air freight from Liverpool Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Liverpool (LPL) → Singapore',
            'eyebrow'           => 'Liverpool air freight & customs',
            'title'             => 'Export customs clearance from Liverpool Airport',
            'lead'              => 'Export documentation, customs declarations and air freight for businesses shipping from Liverpool - coordinated by one team from preparation to departure.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'From Liverpool into international markets',
            'items'   => [
                ['icon' => 'file', 'title' => 'Export documentation', 'text' => 'Commercial shipment paperwork and export requirements prepared accurately before the cargo moves.'],
                ['icon' => 'shield', 'title' => 'Customs clearances Liverpool', 'text' => 'Export declarations coordinated and submitted to HMRC through CDS, tailored to your freight.'],
                ['icon' => 'plane', 'title' => 'Liverpool air freight', 'text' => 'Urgent, time-sensitive, small and high-value export cargo, plus regular air freight requirements.'],
                ['icon' => 'globe', 'title' => 'Onward international transport', 'text' => 'Coordination with freight and airport processes through to your goods’ final destination.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Export customs at Liverpool Airport',
            'title'      => 'Exports that leave on schedule',
            'paragraphs' => [
                'Export clearance involves more than getting cargo to the airport. Before goods leave the UK, an export declaration must be submitted to HMRC through the Customs Declaration Service (CDS), with accurate shipment information that meets HMRC requirements.',
                'We check your EORI number, prepare the declaration and commercial documents, and advise on duty and VAT - including VAT relief on exports where it applies. If HMRC has a query, we handle the communication so your shipment isn’t held back.',
            ],
            'checklist'  => ['CDS export declarations', 'EORI number checks', 'Commercial documentation', 'Export VAT relief guidance', 'HMRC query handling'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Built around exporters’ needs',
            'items'   => [
                ['title' => 'Experienced customs support', 'text' => 'We know how much accurate documentation matters when arranging export clearance.'],
                ['title' => 'Freight coordinated', 'text' => 'Liverpool air freight arranged alongside customs procedures and onward logistics.'],
                ['title' => 'Business-focused', 'text' => 'Support shaped around your goods, destination, documents and delivery requirements.'],
                ['title' => 'Efficient exports', 'text' => 'Customs and freight properly lined up to reduce unnecessary delays.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Exporting through Liverpool',
            'items' => [
                ['title' => 'Share shipment details', 'text' => 'Goods, value, destination and timescales.'],
                ['title' => 'Export paperwork', 'text' => 'We prepare the commercial documents and check export requirements.'],
                ['title' => 'Declare to HMRC', 'text' => 'Your export declaration is submitted through CDS.'],
                ['title' => 'Depart LPL', 'text' => 'Cargo is loaded and flown on to its international destination.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Liverpool export customs questions',
            'items' => [
                ['q' => 'What is export customs clearance?', 'a' => 'Declaring goods to customs before they leave the country. It involves submitting accurate documentation and shipment details so the goods can be legally exported and loaded for international transport.'],
                ['q' => 'What documents are needed for export clearance at Liverpool?', 'a' => 'Commonly a commercial invoice, a packing list, an air waybill and an export declaration. Some shipments need licences or certificates of origin - we’ll advise on yours.'],
                ['q' => 'Can you handle urgent or time-sensitive exports?', 'a' => 'Yes. Air freight suits urgent consignments, and we coordinate customs and freight arrangements together to keep time-sensitive goods moving.'],
                ['q' => 'How can I avoid delays with export clearance?', 'a' => 'Most delays come from incomplete or inaccurate paperwork. Provide correct commodity descriptions, values and consignee details, and send documents in good time.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Exporting goods from Liverpool?'],
    ],
];
