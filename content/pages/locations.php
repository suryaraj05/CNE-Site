<?php
return [
    'title'       => 'Locations: Newcastle, UK-Wide & India | Cargo Northeast',
    'description' => 'Cargo Northeast operates from Newcastle Airport with an office in Mumbai, India, providing customs clearance and freight across North East England and the UK.',
    'breadcrumbs' => [],
    'crumb'       => 'Locations',
    'sections'    => [
        [
            'type'    => 'hero',
            'image'   => asset_img('about'),
            'quote'   => false,
            'eyebrow' => 'Where we work',
            'title'   => 'Our locations',
            'lead'    => 'Based at Newcastle Airport, with a second office in Mumbai. We clear customs and move freight for customers across North East England, Scotland and the whole of the UK.',
            'primary' => ['Get a quote', '/request-a-quote/'],
        ],
        [
            'type'    => 'features',
            'id'      => 'coverage',
            'columns' => 3,
            'eyebrow' => 'Coverage',
            'title'   => 'From the North East to the world',
            'items'   => [
                ['icon' => 'plane', 'title' => 'UK airports', 'text' => 'Air freight and customs clearance at Heathrow, Manchester, East Midlands, Gatwick and twelve more UK airports.', 'href' => '/all-airports/'],
                ['icon' => 'anchor', 'title' => 'UK seaports', 'text' => 'Import customs clearance for sea freight arriving at London Gateway.', 'href' => '/all-seaports/'],
                ['icon' => 'map-pin', 'title' => 'Newcastle', 'text' => 'Import and export clearance from our base at Freight Village, Newcastle Airport.', 'href' => '/customs-clearance-services-in-newcastle/'],
                ['icon' => 'building', 'title' => 'North East England', 'text' => 'A Newcastle-based customs and logistics company serving businesses across the region.', 'href' => '/customs-clearance-logistics-newcastle-northeast-england/'],
                ['icon' => 'truck', 'title' => 'Scotland, the UK & EU', 'text' => 'Road transport connecting the UK and EU, with goods delivered securely and on time.', 'href' => '/road-transport-uk-eu/'],
                ['icon' => 'home', 'title' => 'Tyne and Wear & Durham', 'text' => 'Affordable house moves and secure storage for local residents, students and businesses.', 'href' => '/house-move-service-tyne-and-wear/'],
                ['icon' => 'globe', 'title' => 'India', 'text' => 'Air and sea freight between India and the UK, supported by our Mumbai office.', 'href' => '/air-freight-india-uk/'],
            ],
        ],
        [
            'type'    => 'features',
            'id'      => 'offices',
            'eyebrow' => 'Our offices',
            'title'   => 'Talk to the team',
            'items'   => [
                ['icon' => 'building', 'title' => 'UK office - Newcastle', 'text' => 'Cargo Northeast Ltd, Freight Village, Newcastle Airport, NE13 8BH. Phone +44 7354 595649 · opsuk@cargonortheast.com'],
                ['icon' => 'globe', 'title' => 'India office - Mumbai', 'text' => 'Borivali (West), Mumbai 400092. Phone +91 99203 60122'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Location questions',
            'items' => [
                ['q' => 'Do you only work in the North East?', 'a' => 'No. We’re based at Newcastle Airport but serve customers across North East England, Scotland and the whole of the UK. Customs declarations are filed electronically, so we can clear goods at any UK airport or port.'],
                ['q' => 'Can I visit your Newcastle office?', 'a' => 'Our UK office is at Freight Village, Newcastle Airport, NE13 8BH. Please call +44 7354 595649 or email opsuk@cargonortheast.com before visiting so the right person is available.'],
                ['q' => 'What does your India office do?', 'a' => 'Our Mumbai office supports freight between India and the UK, including air and sea freight and baggage and parcel delivery to India.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Wherever your goods are going, let’s talk'],
    ],
];
