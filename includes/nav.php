<?php
$about = [
    '/customs-clearance-logistics-newcastle-northeast-england/' => 'About us',
    '/cargo-solutions-northeast-uk/'                            => 'Mission, vision & values',
    '/our-services/'                                            => 'Our services',
];
$expertise = [
    '/customs-clearance-service-uk/'               => 'Customs clearance',
    '/amazon-fba-logistics-solutions/'             => 'Amazon FBA',
    '/road-transport-uk-eu/'                       => 'Road transport (UK & EU)',
    '/air-freight-india-uk/'                       => 'Air & sea freight (India–UK)',
    '/baggage-delivery-to-india/'                  => 'Baggage delivery to India',
    '/house-move-service-tyne-and-wear/'           => 'House moves',
    '/safe-storage-newcastle-upon-tyne-northeast/' => 'Safe storage',
];
$global = [
    '/import-from-china/'               => 'Importing from China',
    '/air-freight-uk-usa/'              => 'Air freight (UK–USA)',
    '/sea-freight-newcastle-upon-tyne/' => 'Sea freight',
    '/uk-to-restoftheworld-freight/'    => 'UK to rest of the world',
    '/baggage-delivery-to-china/'       => 'Baggage to China',
];

return [
    'primary' => [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'About us', 'href' => '/customs-clearance-logistics-newcastle-northeast-england/', 'items' => $about],
        ['label' => 'Global services', 'href' => '/services/', 'items' => ['/locations/' => 'Locations'] + $global],
        ['label' => 'Our expertise', 'href' => '/our-expertise/', 'items' => $expertise],
        ['label' => 'Blog', 'href' => '/blog/', 'items' => ['/blog/' => 'Industry updates']],
        ['label' => 'Contact', 'href' => '/contact/'],
    ],
    'expertise' => $expertise,
    'global'    => $global,
    'company'   => [
        '/customs-clearance-logistics-newcastle-northeast-england/' => 'About us',
        '/cargo-solutions-northeast-uk/' => 'Mission, vision & values',
        '/our-services/'        => 'Our services',
        '/our-expertise/'       => 'Our expertise',
        '/services/'            => 'Global services',
        '/locations/'           => 'Locations',
        '/testimonials/'        => 'Testimonials',
        '/faqs/'                => 'FAQs',
        '/blog/'                => 'Industry updates',
        '/track-your-shipment/' => 'Track your shipment',
        '/shipment-form/'       => 'Shipment form',
        '/contact/'             => 'Contact',
    ],
];
