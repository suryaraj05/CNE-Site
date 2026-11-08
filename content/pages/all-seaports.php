<?php
return [
    'title'       => 'Customs Clearance at UK Seaports | Cargo Northeast',
    'description' => 'Customs clearance for sea freight arriving at or leaving UK seaports, including London Gateway. HMRC CDS import and export declarations, duty and VAT handled.',
    'breadcrumbs' => [],
    'crumb'       => 'UK seaports',
    'service'     => 'Customs clearance at UK seaports',
    'sections'    => [
        [
            'type'    => 'hero',
            'quote'   => false,
            'eyebrow' => 'UK seaports',
            'title'   => 'Customs clearance at UK seaports',
            'lead'    => 'Import and export declarations for containers and sea freight moving through UK ports, with ocean freight and onward delivery arranged by the same team.',
            'primary' => ['Get a quote', '/request-a-quote/'],
        ],
        [
            'type'    => 'features',
            'id'      => 'seaports',
            'columns' => 3,
            'eyebrow' => 'Ports and sea freight',
            'title'   => 'Where to start',
            'intro'   => 'Pick a port for local details and common questions, or see our full sea freight service.',
            'items'   => [
                ['icon' => 'ship', 'title' => 'London Gateway', 'text' => 'Customs clearance and freight forwarding for containers moving through London Gateway port.', 'href' => '/customs-clearance-at-london-gateway-port/'],
                ['icon' => 'globe', 'title' => 'Sea freight', 'text' => 'FCL and LCL sea freight for UK imports and exports, with customs and door-to-door delivery.', 'href' => '/sea-freight-newcastle-upon-tyne/'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Clearing at any UK port',
            'title'      => 'One team, whichever port your cargo uses',
            'paragraphs' => [
                'Customs declarations are submitted electronically to HMRC through the Customs Declaration Service (CDS), so we can clear goods arriving at or leaving any UK port - such as Port of Tyne, Teesport, Felixstowe, Southampton, London Gateway or Liverpool - from our office at Newcastle Airport.',
                'The essentials are the same at every port: an accurate commercial invoice, the right commodity codes, a valid EORI number, and duty and import VAT accounted for correctly. We check the detail before your cargo sails, so containers aren’t held on arrival.',
            ],
            'checklist'  => ['Import & export declarations', 'HMRC & CDS filing', 'EORI number guidance', 'Duty & import VAT', 'Onward UK delivery'],
        ],
        [
            'type'  => 'faq',
            'title' => 'UK seaport customs questions',
            'items' => [
                ['q' => 'Can you clear goods at a port not listed here?', 'a' => 'Yes. Declarations are filed electronically to HMRC through CDS, so we can clear shipments at any UK port. Contact us with your shipment details.'],
                ['q' => 'Do I need to be near the port to use you?', 'a' => 'No. We work with importers and exporters across the UK and can arrange haulage from the port to your premises or customer once goods are cleared.'],
                ['q' => 'What do you need from me to clear a sea shipment?', 'a' => 'Usually a commercial invoice, packing list and bill of lading, plus your EORI number. Some goods also need licences or certificates - we’ll tell you before your cargo ships.'],
                ['q' => 'Can you arrange the sea freight as well?', 'a' => 'Yes. We arrange FCL and LCL sea freight for imports and exports alongside the customs clearance, so one team looks after the whole shipment.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Shipping through a UK seaport?'],
    ],
];
