<?php
return [
    'title'       => 'Customs Clearance for Exports from Leeds | Cargo Northeast',
    'description' => 'Export customs clearance from Leeds and Leeds Bradford Airport (LBA): CDS export declarations, EORI checks, VAT relief on exports and air freight. Get a quote.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Leeds Bradford',
    'service'     => 'Export customs clearance and air freight from Leeds Bradford Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Leeds Bradford (LBA) → Toronto',
            'eyebrow'           => 'Export clearance LBA',
            'title'             => 'Customs clearance for exports from Leeds',
            'lead'              => 'Export declarations and air freight for businesses shipping from Leeds through Leeds Bradford Airport — so your goods leave the UK on time and arrive ready for their destination.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Everything a Leeds export needs',
            'intro'   => 'Whether you send regular commercial consignments or a one-off international shipment, we make exporting from Leeds straightforward.',
            'items'   => [
                ['icon' => 'shield', 'title' => 'Export declarations', 'text' => 'Export customs declarations prepared and submitted to HMRC through CDS before your goods depart.'],
                ['icon' => 'send', 'title' => 'Air freight for Leeds Bradford', 'text' => 'Time-critical, high-value and regular export cargo, door to door or airport to airport.'],
                ['icon' => 'pound', 'title' => 'VAT relief on exports', 'text' => 'Guidance on duty and VAT, including VAT relief on exported goods where it applies.'],
                ['icon' => 'clipboard', 'title' => 'Export documentation', 'text' => 'Commercial invoices, packing lists, commodity data and destination requirements in order.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Export customs at Leeds Bradford Airport',
            'title'      => 'Cleared to leave, ready to land',
            'paragraphs' => [
                'Goods exported from Leeds must be declared to HMRC before they leave the UK, with the export declaration submitted through the Customs Declaration Service (CDS). For shipments departing via Leeds Bradford Airport (LBA), that declaration needs to be complete before the cargo is loaded.',
                'We check your EORI number, prepare the declaration and commodity data, advise on export VAT treatment and coordinate with freight and logistics providers. If HMRC raises a query, we deal with it — keeping customs-related delays to a minimum.',
            ],
            'checklist'  => ['CDS export declarations', 'EORI number checks', 'Commodity & export data', 'Export VAT relief guidance', 'HMRC query handling'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'A practical partner for Yorkshire exporters',
            'items'       => [
                ['title' => 'Customs and freight together', 'text' => 'Declarations and air freight coordinated by one team for a more streamlined export.'],
                ['title' => 'Responsive communication', 'text' => 'Clear answers on documents and requirements before your shipment moves.'],
                ['title' => 'Flexible freight options', 'text' => 'Door-to-door or airport-to-airport, one-off or regular — whatever your export needs.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Exporting from Leeds in four steps',
            'items' => [
                ['title' => 'Tell us the destination', 'text' => 'Goods, value, destination and timescales — plus your EORI number.'],
                ['title' => 'Paperwork prepared', 'text' => 'Commercial invoice, packing list and export data checked against destination requirements.'],
                ['title' => 'Export declaration filed', 'text' => 'We submit the declaration to HMRC through CDS.'],
                ['title' => 'Flown from LBA', 'text' => 'Your cargo departs Leeds Bradford for its international destination.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Leeds export customs questions',
            'items' => [
                ['q' => 'What is export customs clearance?', 'a' => 'The process of declaring goods to customs before they leave the country. It involves submitting accurate documentation and shipment details so the goods can be legally exported.'],
                ['q' => 'What does Export Clearance LBA mean?', 'a' => 'It means completing the required export customs procedures for goods departing through Leeds Bradford Airport (LBA), so shipments can move on to their international destination without avoidable delays.'],
                ['q' => 'What documents are needed to export goods from Leeds?', 'a' => 'Commonly a commercial invoice, a packing list, an air waybill and an export declaration. Some shipments need licences or certificates of origin — we’ll advise on what yours requires.'],
                ['q' => 'Do you offer air freight for urgent exports?', 'a' => 'Yes. Our air freight services for Leeds Bradford suit urgent, high-value and time-sensitive consignments, and we coordinate customs clearance alongside the freight.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Exporting from Leeds?', 'text' => 'Tell us what you’re shipping, where it’s going and when — we’ll come back with a clear, no-obligation export quote.'],
    ],
];
