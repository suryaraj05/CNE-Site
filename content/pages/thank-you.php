<?php
return [
    'title'       => 'Thank You - Message Received | Cargo Northeast',
    'description' => 'Thanks for contacting Cargo Northeast. We’ve received your details and will reply within hours on working days. Explore our services while you wait.',
    'robots'      => 'noindex, follow',
    'breadcrumbs' => [],
    'crumb'       => 'Thank you',
    'sections'    => [
        [
            'type'      => 'hero',
            'eyebrow'   => 'Message received',
            'title'     => 'Thanks - we’ll be in touch shortly',
            'lead'      => 'We’ve received your details and will reply within hours on working days. If you submitted a shipment form, we’ll email your tracking number once the booking is confirmed.',
            'primary'   => ['Back to home', '/'],
            'secondary' => ['Explore our services', '/our-services/'],
            'note'      => false,
        ],
        [
            'type'    => 'features',
            'columns' => 3,
            'eyebrow' => 'While you wait',
            'title'   => 'Helpful links',
            'items'   => [
                ['icon' => 'search', 'title' => 'Track your shipment', 'text' => 'Check the latest status of your freight with your tracking, AWB or booking reference.', 'href' => '/track-your-shipment/'],
                ['icon' => 'plane', 'title' => 'UK airports we cover', 'text' => 'Air freight and customs clearance at Heathrow, Manchester, East Midlands and more.', 'href' => '/all-airports/'],
                ['icon' => 'file', 'title' => 'Industry updates', 'text' => 'Guides and news on UK customs, importing and freight from our blog.', 'href' => '/blog/'],
            ],
        ],
    ],
];
