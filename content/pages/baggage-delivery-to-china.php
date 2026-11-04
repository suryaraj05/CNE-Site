<?php
return [
    'title'       => 'Baggage Delivery from the UK to China | Cargo Northeast',
    'description' => 'Door-to-door baggage delivery from the UK to China for personal effects and commercial goods: UK collection, export and import clearance, final delivery.',
    'breadcrumbs' => [['Global services', '/services/']],
    'crumb'       => 'Baggage to China',
    'service'     => 'Baggage delivery from the UK to China',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Newcastle → Beijing',
            'eyebrow'           => 'Baggage to China',
            'title'             => 'Baggage delivery from the UK to China',
            'lead'              => 'A stress-free, door-to-door way to send personal belongings or commercial items to China — collected from your door, cleared at both ends and delivered to your chosen address.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'Door-to-door service',
            'title'   => 'We handle every step of the journey',
            'items'   => [
                ['icon' => 'home', 'title' => 'Doorstep collection', 'text' => 'We collect your baggage or goods from your address anywhere in the UK.'],
                ['icon' => 'file', 'title' => 'UK export clearance', 'text' => 'Export paperwork prepared so your shipment complies with UK export regulations.'],
                ['icon' => 'shield', 'title' => 'Chinese import clearance', 'text' => 'The documentation needed to clear Chinese customs, managed by our experienced team.'],
                ['icon' => 'map-pin', 'title' => 'Final delivery in China', 'text' => 'Delivered directly to your chosen address in China.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs & documentation',
            'title'      => 'UK and Chinese customs, handled properly',
            'paragraphs' => [
                'International shipping rules can be challenging, and shipments to China must satisfy customs at both ends. We take that complexity off your hands with an end-to-end service that covers every stage of the journey.',
                'Our team prepares and verifies all documentation, makes sure your shipment complies with UK export and Chinese import regulations, and handles any taxes, duties and import requirements — minimising the risk of delays.',
            ],
            'checklist'  => ['UK export compliance', 'Chinese import regulations', 'Documentation prepared & verified', 'Taxes and duties handled', 'Personal effects & commercial goods'],
        ],
        [
            'type'    => 'features',
            'columns' => 4,
            'eyebrow' => 'Safe and secure',
            'title'   => 'Your belongings protected at every stage',
            'items'   => [
                ['icon' => 'box', 'title' => 'Protective packaging', 'text' => 'Customised packing to keep your items safe in transit.'],
                ['icon' => 'search', 'title' => 'Tracking & monitoring', 'text' => 'Regular updates from collection in the UK to delivery in China.'],
                ['icon' => 'lock', 'title' => 'Trusted carriers', 'text' => 'Carefully chosen partners and high handling standards throughout.'],
                ['icon' => 'message', 'title' => 'Dedicated support', 'text' => 'Clear communication and personal help from first query to delivery.'],
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Book', 'text' => 'Tell us what you’re sending and where in China it’s going.'],
                ['title' => 'Collect', 'text' => 'We pack if needed and collect from your door in the UK.'],
                ['title' => 'Clear customs', 'text' => 'We handle UK export and Chinese import clearance.'],
                ['title' => 'Deliver', 'text' => 'Your items are delivered to your chosen address in China.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Baggage to China questions',
            'items' => [
                ['q' => 'Can I send personal belongings as well as commercial goods?', 'a' => 'Yes. Our Baggage to China service covers both personal effects and commercial items, collected from your door in the UK and delivered to your address in China.'],
                ['q' => 'Do you handle customs in China?', 'a' => 'Yes. We manage the UK export paperwork and the documentation needed for Chinese import clearance, including any applicable taxes and duties.'],
                ['q' => 'Can you pack my items?', 'a' => 'We offer customised protective packaging to keep your belongings safe during transit. Let us know what you’re sending and we’ll advise.'],
                ['q' => 'Can I track my baggage?', 'a' => 'Yes. We provide regular updates from collection in the UK through to delivery in China, and our team is on hand to answer questions throughout.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to send your baggage to China?', 'text' => 'Tell us what you’re sending and where it’s going, and we’ll come back with a clear, customised quote.'],
    ],
];
