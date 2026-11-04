<?php
return [
    'title'       => 'Sea Freight Imports & Exports, Newcastle | Cargo Northeast',
    'description' => 'FCL and LCL sea freight for UK imports and exports via Port of Tyne, Teesport, Felixstowe, Southampton and Liverpool, with customs and door-to-door delivery.',
    'breadcrumbs' => [['Global services', '/services/']],
    'crumb'       => 'Sea freight',
    'service'     => 'Sea freight imports and exports',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Shanghai → Port of Tyne',
            'eyebrow'           => 'Sea freight forwarding',
            'title'             => 'Sea freight for imports and exports across the UK',
            'lead'              => 'Reliable, cost-effective ocean freight from Newcastle upon Tyne — whether you’re bringing goods in from global suppliers or exporting to international markets.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'columns' => 3,
            'eyebrow' => 'What we handle',
            'title'   => 'Comprehensive sea freight services',
            'items'   => [
                ['icon' => 'ship', 'title' => 'Import services', 'text' => 'Inbound shipments from global suppliers to the UK, from customs clearance to last-mile delivery.'],
                ['icon' => 'globe', 'title' => 'Export services', 'text' => 'Outbound cargo prepared, cleared and delivered to its international destination on schedule.'],
                ['icon' => 'shield', 'title' => 'Customs compliance', 'text' => 'Documentation, tariffs and duties managed for smooth border crossings in both directions.'],
                ['icon' => 'route', 'title' => 'Door-to-door or port-to-port', 'text' => 'Choose full door-to-door delivery or port-to-port shipping, depending on what you need.'],
                ['icon' => 'lock', 'title' => 'Cargo insurance', 'text' => 'Insurance options to protect your goods throughout their time in transit.'],
                ['icon' => 'search', 'title' => 'Shipment tracking', 'text' => 'Follow your shipment’s progress at every step of its journey.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'ports',
            'eyebrow'    => 'Nationwide port coverage',
            'title'      => 'Connected to every major UK port',
            'paragraphs' => [
                'We operate through all major UK ports — including Felixstowe, Southampton, Port of Tyne, Teesport and Liverpool — giving you seamless connections to global shipping routes.',
                'Choose Full Container Load (FCL) when you have the volume to fill a container, or Less than Container Load (LCL) to share space and pay only for what you use. We partner with trusted carriers to keep rates competitive without compromising on reliability.',
            ],
            'checklist'  => ['Felixstowe', 'Southampton', 'Port of Tyne', 'Teesport', 'Liverpool'],
        ],
        [
            'type'    => 'features',
            'columns' => 4,
            'eyebrow' => 'Industries we serve',
            'title'   => 'Sea freight for businesses across the UK',
            'items'   => [
                ['icon' => 'cart', 'title' => 'Retail & e-commerce', 'text' => 'Stock replenishment and inventory moves for retailers and online sellers.'],
                ['icon' => 'building', 'title' => 'Manufacturing', 'text' => 'Raw materials in and finished industrial goods out.'],
                ['icon' => 'truck', 'title' => 'Automotive', 'text' => 'Automotive parts and equipment shipped securely.'],
                ['icon' => 'box', 'title' => 'Food & beverage', 'text' => 'Food and drink products moved with the right documentation.'],
            ],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'Sea freight with customs expertise built in',
            'items'       => [
                ['title' => 'Customs expertise', 'text' => 'Compliance with UK and international regulations for imports and exports, minimising delays.'],
                ['title' => 'Flexible FCL & LCL', 'text' => 'Cost-effective options for large and small consignments alike.'],
                ['title' => 'Competitive pricing', 'text' => 'Sea freight is one of the most economical ways to trade internationally — we keep it that way.'],
                ['title' => 'Personal service', 'text' => 'From Aberdeen, Newcastle and Sunderland to London, Liverpool and Southampton, one team looks after you.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Book', 'text' => 'Share your cargo details and we recommend FCL or LCL and the best port.'],
                ['title' => 'Ship', 'text' => 'Your goods sail with a trusted carrier, tracked along the way.'],
                ['title' => 'Clear customs', 'text' => 'We file the import or export declaration and handle duties.'],
                ['title' => 'Deliver', 'text' => 'Door-to-door or port-to-port delivery, as you prefer.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Sea freight questions',
            'items' => [
                ['q' => 'Should I choose FCL or LCL?', 'a' => 'FCL (Full Container Load) gives you a dedicated container and suits larger shipments. LCL (Less than Container Load) consolidates your goods with other cargo, so it’s more cost-effective for smaller consignments.'],
                ['q' => 'Which UK ports do you use?', 'a' => 'All major UK ports, including Felixstowe, Southampton, Port of Tyne, Teesport and Liverpool. We pick the port that best suits your route, cargo and final destination.'],
                ['q' => 'Do you handle customs for sea freight?', 'a' => 'Yes. We prepare and submit import and export declarations to HMRC through CDS, confirm commodity codes and handle duty and import VAT, so your goods clear smoothly.'],
                ['q' => 'Can you insure my cargo?', 'a' => 'Yes. We offer cargo insurance options to protect your goods while they’re in transit. Ask us for cover when you request your quote.'],
                ['q' => 'Do you offer door-to-door delivery?', 'a' => 'Yes. We offer both door-to-door and port-to-port services, including collection from your supplier and last-mile delivery in the UK.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to ship by sea?'],
    ],
];
