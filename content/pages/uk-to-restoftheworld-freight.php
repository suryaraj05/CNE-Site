<?php
return [
    'title'       => 'UK to Rest of the World Freight — Air & Sea | Cargo Northeast',
    'description' => 'International air and sea freight from the UK to the rest of the world: express and consolidated air, FCL and LCL sea, customs and insurance handled.',
    'breadcrumbs' => [['Global services', '/services/']],
    'crumb'       => 'UK to rest of the world',
    'service'     => 'International air and sea freight from the UK',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Newcastle → Sydney',
            'eyebrow'           => 'Global air & sea freight',
            'title'             => 'Freight from the UK to the rest of the world',
            'lead'              => 'Air and sea freight across continents for businesses and individuals — every shipment handled with precision and care, with customs taken care of at both ends.',
        ],
        ['type' => 'trust'],
        [
            'type'       => 'panel',
            'id'         => 'global-reach',
            'eyebrow'    => 'Global reach, local expertise',
            'title'      => 'One partner for every global route',
            'paragraphs' => [
                'Every international shipment has its own requirements. Our freight solutions are backed by an extensive network of trusted partners, so you get the same reliability worldwide as you do in the UK and Europe.',
                'Whether your cargo is crossing the Atlantic, the Pacific or any other global route, our team adapts to the demands of your goods and their destination — choosing air or sea for the right balance of speed and cost.',
            ],
            'checklist'  => ['Air and sea freight', 'Export customs clearance', 'Destination documentation', 'Cargo insurance', 'Tracking and updates'],
        ],
        [
            'type'    => 'features',
            'id'      => 'air',
            'columns' => 3,
            'eyebrow' => 'Air freight',
            'title'   => 'Rapid, dependable air freight',
            'intro'   => 'Through our network of established airline partners, we meet tight timelines without cutting corners.',
            'items'   => [
                ['icon' => 'plane', 'title' => 'Express air freight', 'text' => 'Secure, priority handling for time-sensitive cargo.'],
                ['icon' => 'box', 'title' => 'Consolidated air freight', 'text' => 'Cost-effective shared capacity for shipments with flexible timelines.'],
                ['icon' => 'search', 'title' => 'End-to-end tracking', 'text' => 'Visibility of your shipment from departure through to delivery.'],
            ],
        ],
        [
            'type'    => 'features',
            'id'      => 'sea',
            'columns' => 3,
            'eyebrow' => 'Sea freight',
            'title'   => 'Economical sea freight for larger loads',
            'intro'   => 'For bigger or less urgent shipments, sea freight is dependable and cost-effective.',
            'items'   => [
                ['icon' => 'ship', 'title' => 'Full Container Load (FCL)', 'text' => 'A dedicated container for high-volume cargo, shipped direct.'],
                ['icon' => 'warehouse', 'title' => 'Less than Container Load (LCL)', 'text' => 'Consolidated shipments that cut costs for smaller loads.'],
                ['icon' => 'route', 'title' => 'Port-to-port or door-to-door', 'text' => 'Flexible delivery options to match your exact requirements.'],
            ],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'A commitment beyond borders',
            'items'   => [
                ['title' => 'Cost-effective solutions', 'text' => 'Streamlined processes and global partnerships keep your logistics budget under control.'],
                ['title' => 'Seamless customs clearance', 'text' => 'Documentation, compliance and regulatory requirements covered for destinations worldwide.'],
                ['title' => 'Insurance and security', 'text' => 'Insurance options to protect your goods from departure to delivery.'],
                ['title' => 'Dedicated support', 'text' => 'Clear communication and timely status updates from first enquiry to final delivery.'],
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Quote', 'text' => 'Tell us what you’re sending and where, and we recommend air or sea.'],
                ['title' => 'Collect & clear', 'text' => 'We collect your goods and file the UK export declaration.'],
                ['title' => 'Ship', 'text' => 'Your cargo travels by air or sea with trusted partners, tracked throughout.'],
                ['title' => 'Deliver', 'text' => 'Destination customs handled and delivery to port or door.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'International freight questions',
            'items' => [
                ['q' => 'Where can you ship to from the UK?', 'a' => 'We ship worldwide by air and sea through our network of international partners — across the Atlantic, the Pacific and every other major trade route.'],
                ['q' => 'What is the difference between express and consolidated air freight?', 'a' => 'Express air freight gives time-sensitive cargo priority handling. Consolidated air freight groups your goods with other shipments to lower the cost when your timeline is flexible.'],
                ['q' => 'Do you handle customs in the destination country?', 'a' => 'Yes. We file the UK export declaration and manage the documentation and compliance requirements for the destination, so your shipment clears efficiently.'],
                ['q' => 'Is my shipment insured?', 'a' => 'We offer insurance options that cover your goods throughout their journey. Let us know the value of your cargo when you request a quote.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to ship worldwide?'],
    ],
];
