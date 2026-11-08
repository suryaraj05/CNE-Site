<?php
return [
    'title'       => 'Global Logistics Services - Air, Sea & Road | Cargo Northeast',
    'description' => 'Global logistics from Newcastle: China to UK imports, UK to USA air freight, sea freight, worldwide shipping, baggage to China and UK airport customs.',
    'breadcrumbs' => [],
    'crumb'       => 'Global services',
    'sections'    => [
        [
            'type'    => 'hero',
            'image'   => asset_img('cargo'),
            'quote'   => false,
            'primary' => ['Get a quote', '/request-a-quote/'],
            'eyebrow' => 'Global services',
            'title'   => 'Global logistics solutions for your business',
            'lead'    => 'Customs clearance plus air, sea and road freight that connect UK businesses with the world - specialising in China to UK freight, international shipping and supply chain optimisation.',
        ],
        [
            'type'    => 'features',
            'id'      => 'services',
            'columns' => 3,
            'eyebrow' => 'Our global services',
            'title'   => 'Freight to and from anywhere',
            'intro'   => 'Tailored, reliable international logistics with a focus on precision and affordability.',
            'items'   => [
                ['image' => asset_img('china'), 'icon' => 'globe', 'title' => 'Importing from China', 'text' => 'Affordable air and sea freight from China, FCL or LCL, cleared at every major UK port.', 'href' => '/import-from-china/'],
                ['image' => asset_img('air'), 'icon' => 'plane', 'title' => 'Air freight UK – USA', 'text' => 'Fast transatlantic air cargo from Heathrow, Manchester and Birmingham to major US cities.', 'href' => '/air-freight-uk-usa/'],
                ['image' => asset_img('sea'), 'icon' => 'ship', 'title' => 'Sea freight', 'text' => 'FCL and LCL imports and exports through Port of Tyne, Teesport, Felixstowe, Southampton and Liverpool.', 'href' => '/sea-freight-newcastle-upon-tyne/'],
                ['image' => asset_img('worldwide'), 'icon' => 'route', 'title' => 'UK to rest of the world', 'text' => 'Express and consolidated air, plus FCL and LCL sea freight, to destinations worldwide.', 'href' => '/uk-to-restoftheworld-freight/'],
                ['image' => asset_img('cargo'), 'icon' => 'luggage', 'title' => 'Baggage to China', 'text' => 'Door-to-door delivery of personal belongings and commercial items from the UK to China.', 'href' => '/baggage-delivery-to-china/'],
                ['image' => asset_img('airport'), 'icon' => 'send', 'title' => 'UK airports', 'text' => 'Air freight and customs clearance at Heathrow, Manchester, East Midlands and every major UK airport.', 'href' => '/all-airports/'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'complete-solution',
            'eyebrow'    => 'The complete solution',
            'title'      => 'End-to-end logistics, across borders',
            'paragraphs' => [
                'From customs clearance to air, sea and road freight, we make sure your cargo moves smoothly across borders. Our China to UK and global shipping expertise simplifies even the most complex supply chains.',
                'Because the same team handles your freight and your customs, you get one point of contact, consistent advice and fewer hand-offs - so your business can compete confidently in international markets.',
            ],
            'checklist'  => ['Customs clearance', 'Air freight', 'Sea freight - FCL & LCL', 'Road freight UK & EU', 'Door-to-door delivery'],
        ],
        [
            'type'  => 'steps',
            'title' => 'Three steps, handled end to end',
            'items' => [
                ['title' => 'Receive from shipper', 'text' => 'We collect and securely receive your goods from the shipper, ready for onward transport.'],
                ['title' => 'Safe & secure shipment', 'text' => 'Your cargo is handled with care throughout, with customs and documentation taken care of.'],
                ['title' => 'Hand over to receiver', 'text' => 'Timely, secure delivery to the receiver, with updates at every stage.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Global services questions',
            'items' => [
                ['q' => 'Which countries can you ship to and from?', 'a' => 'We move freight worldwide by air and sea, with particular expertise in China to UK imports, UK to USA air freight, and baggage to China and India.'],
                ['q' => 'Do you handle customs clearance as part of international shipping?', 'a' => 'Yes. We submit UK import and export declarations to HMRC through CDS and manage the documentation needed at destination, so customs is handled by the same team as your freight.'],
                ['q' => 'Should I choose air or sea freight?', 'a' => 'Air freight is best for urgent, lightweight or high-value goods. Sea freight is the economical choice for larger or less time-sensitive cargo. We’ll recommend the right option for your shipment.'],
                ['q' => 'Can you collect from and deliver to my door?', 'a' => 'Yes. Most of our global services are available door to door, including collection, customs clearance at both ends and final delivery.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to ship globally?'],
    ],
];
