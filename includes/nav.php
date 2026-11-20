<?php
$about = [
    '/customs-clearance-logistics-newcastle-northeast-england/' => 'About Us',
    '/cargo-solutions-northeast-uk/'                            => 'Mission, Vision & Values',
    '/our-services/'                                            => 'Our Services',
];
$expertise = [
    '/customs-clearance-service-uk/'               => 'Customs Clearance',
    '/amazon-fba-logistics-solutions/'             => 'Amazon FBA',
    '/road-transport-uk-eu/'                       => 'Road Transport (UK & EU)',
    '/air-freight-india-uk/'                       => 'Air & Sea Freight (India–UK)',
    '/baggage-delivery-to-india/'                  => 'Baggage Delivery to India',
    '/house-move-service-tyne-and-wear/'           => 'House Moves',
    '/safe-storage-newcastle-upon-tyne-northeast/' => 'Safe Storage',
];
$global = [
    '/import-from-china/'               => 'Importing from China',
    '/air-freight-uk-usa/'              => 'Air Freight (UK–USA)',
    '/sea-freight-newcastle-upon-tyne/' => 'Sea Freight',
    '/uk-to-restoftheworld-freight/'    => 'UK to Rest of the World',
    '/baggage-delivery-to-china/'       => 'Baggage to China',
];

$airports = [
    '/air-freight-london-heathrow/'                          => 'London Heathrow (LHR)',
    '/air-freight-customs-clearance-at-gatwick/'             => 'London Gatwick (LGW)',
    '/customs-clearance-at-london-stansted-airport/'         => 'London Stansted (STN)',
    '/customs-clearances-luton/'                             => 'London Luton (LTN)',
    '/air-freight-services-at-london-city-airport-lcy/'      => 'London City (LCY)',
    '/customs-clearance-east-midlands-airport/'              => 'East Midlands (EMA)',
    '/customs-clearance-at-bhx/'                             => 'Birmingham (BHX)',
    '/customs-clearances-in-manchester/'                     => 'Manchester (MAN)',
    '/customs-clearance-exports-from-liverpool-airport/'     => 'Liverpool (LPL)',
    '/customs-clearance-exports-from-leeds/'                 => 'Leeds Bradford (LBA)',
    '/customs-clearance-in-humberside-international-airport/' => 'Humberside (HUY)',
    '/customs-clearance-services-in-newcastle/'              => 'Newcastle (NCL)',
    '/custom-clearance-exports-from-cardiff-airport/'        => 'Cardiff (CWL)',
    '/customs-clearance-services-aberdeen/'                  => 'Aberdeen (ABZ)',
    '/cargo-customs-clearance-edinburgh-airport/'            => 'Edinburgh (EDI)',
    '/customs-clearance-exports-from-glasgow-airport/'       => 'Glasgow (GLA)',
];

$seaports = [
    '/customs-clearance-port-of-tyne/'                    => 'Port of Tyne',
    '/customs-clearance-at-teesport-port/'                => 'Teesport',
    '/felixstowe-customs-clearance/'                      => 'Felixstowe',
    '/customs-clearance-at-london-gateway-port/'          => 'London Gateway',
    '/customs-clearance-at-the-port-of-southampton/'      => 'Southampton',
    '/customs-clearance-at-liverpool-port/'               => 'Liverpool',
    '/customs-clearance-at-dover-port/'                   => 'Dover',
    '/customs-clearance-at-port-of-tilbury/'              => 'Tilbury',
    '/hull-customs-clearance/'                            => 'Hull',
    '/customs-clearance-grimsby/'                         => 'Grimsby',
    '/customs-clearance-immingham-port/'                  => 'Immingham',
    '/customs-clearance-at-harwich-port/'                 => 'Harwich',
    '/customs-clearance-at-portsmouth-international-port/' => 'Portsmouth',
    '/customs-clearance-at-plymouth-docks/'               => 'Plymouth',
    '/poole-ferry-terminal-customs-clearance/'            => 'Poole',
    '/thames-europort-customs-clearance/'                 => 'Thames Europort',
    '/sea-freight-newcastle-upon-tyne/'                   => 'Sea freight (UK ports)',
];

$locationsGroups = [
    [
        'label' => 'All Airports',
        'href'  => '/all-airports/',
        'items' => $airports,
    ],
    [
        'label' => 'All Seaports',
        'href'  => '/all-seaports/',
        'items' => $seaports,
    ],
];

return [
    'primary' => [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'About Us', 'href' => '/customs-clearance-logistics-newcastle-northeast-england/', 'items' => $about],
        ['label' => 'Global Services', 'href' => '/services/', 'items' => $global],
        [
            'label'  => 'Locations',
            'href'   => '/locations/',
            'groups' => $locationsGroups,
        ],
        ['label' => 'Our Expertise', 'href' => '/our-expertise/', 'items' => $expertise],
        ['label' => 'Blog', 'href' => '/blog/', 'items' => ['/blog/' => 'Industry Updates']],
        ['label' => 'Contact', 'href' => '/contact/'],
    ],
    'airports'  => $airports,
    'seaports'  => $seaports,
    'expertise' => $expertise,
    'global'    => $global,
    'company'   => [
        '/customs-clearance-logistics-newcastle-northeast-england/' => 'About Us',
        '/cargo-solutions-northeast-uk/' => 'Mission, Vision & Values',
        '/our-services/'        => 'Our Services',
        '/our-expertise/'       => 'Our Expertise',
        '/services/'            => 'Global Services',
        '/locations/'           => 'Locations',
        '/testimonials/'        => 'Testimonials',
        '/faqs/'                => 'FAQs',
        '/blog/'                => 'Industry Updates',
        '/track-your-shipment/' => 'Track Your Shipment',
        '/contact/'             => 'Contact',
    ],
];
