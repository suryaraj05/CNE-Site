<?php
return [
    'title'       => 'Page not found | Cargo Northeast',
    'description' => 'The page you were looking for could not be found.',
    'path'        => '/404/',
    'robots'      => 'noindex, follow',
    'sections'    => [
        [
            'type'      => 'hero',
            'eyebrow'   => 'Error 404',
            'title'     => 'We couldn’t find that page',
            'lead'      => 'The page may have moved during our website update. Try one of the links below, or get in touch and we’ll help.',
            'primary'   => ['Back to home', '/'],
            'secondary' => ['Contact us', '/contact/'],
            'note'      => false,
        ],
        [
            'type'    => 'features',
            'columns' => 3,
            'title'   => 'Popular pages',
            'items'   => [
                ['icon' => 'shield', 'title' => 'Customs clearance', 'text' => 'UK import and export declarations through HMRC CDS.', 'href' => '/customs-clearance-service-uk/'],
                ['icon' => 'plane', 'title' => 'UK airports', 'text' => 'Air freight and customs clearance at every major UK airport.', 'href' => '/all-airports/'],
                ['icon' => 'clipboard', 'title' => 'Request a quote', 'text' => 'Tell us about your shipment for a no-obligation quote.', 'href' => '/request-a-quote/'],
            ],
        ],
    ],
];
