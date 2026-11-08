<?php
return [
    'title'       => 'About Us - Customs & Logistics in Newcastle | Cargo Northeast',
    'description' => 'Cargo Northeast is a Newcastle-based customs broker and freight forwarder handling HMRC clearance plus air, sea and road freight across North East England.',
    'breadcrumbs' => [],
    'crumb'       => 'About us',
    'sections'    => [
        [
            'type'    => 'hero',
            'image'   => asset_img('about'),
            'eyebrow' => 'About Cargo Northeast',
            'title'   => 'Customs clearance and logistics, based in Newcastle',
            'lead'    => 'We’re a Newcastle upon Tyne customs broker and freight forwarder, helping businesses across North East England and the UK move goods by air, sea and road - with the customs paperwork handled properly.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'prose',
            'id'      => 'introduction',
            'image'   => asset_img('cargo'),
            'image_alt'=> 'Containers ready for shipment',
            'eyebrow' => 'Introduction',
            'title'   => 'A local team with global reach',
            'html'    => '<p>Cargo Northeast Ltd specialises in customs clearance and logistics for businesses in Newcastle and North East England. From our office at Freight Village, Newcastle Airport, we arrange <a href="/sea-freight-newcastle-upon-tyne/">sea freight</a>, <a href="/all-airports/">air freight</a> and <a href="/road-transport-uk-eu/">road transport</a>, and serve the region’s key ports - including the Port of Tyne, Sunderland and Teesport.</p>
<p>Our personalised logistics solutions are designed to give reliable, efficient service to businesses trading locally and internationally. With a network of trusted partners, we’re your go-to provider for logistics in North East England and beyond - and a second office in Mumbai supports customers shipping between the UK and India.</p>',
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs clearance',
            'title'      => 'Customs clearance in the UK and North East England',
            'paragraphs' => [
                'We provide customs clearance in Newcastle, across North East England and throughout the UK, making sure every shipment meets regulatory requirements so you avoid unnecessary delays and costs.',
                'Our experience at the Port of Tyne, Sunderland and Teesport means we can clear goods quickly for businesses in the region. We prepare the documentation and liaise directly with the customs authorities, so your imports and exports keep moving.',
            ],
            'checklist'  => ['Import & export declarations', 'HMRC & CDS submissions', 'Documentation prepared for you', 'Port of Tyne, Sunderland & Teesport'],
        ],
        [
            'type'    => 'prose',
            'id'      => 'approach',
            'image'   => asset_img('expertise'),
            'image_alt'=> 'Planning customs and freight documentation',
            'reverse' => true,
            'eyebrow' => 'Our holistic approach',
            'title'   => 'Logistics is more than moving goods',
            'html'    => '<p>At Cargo Northeast, logistics is about offering a complete solution. From <a href="/customs-clearance-service-uk/">customs clearance</a> to final delivery, every part of your shipment’s journey is handled with precision and care.</p>
<p>By combining local expertise in North East England with international freight capability, we tailor our services to the specific needs of each client - so businesses across Newcastle and the UK can rely on us for seamless, dependable service.</p>
<h3>Beyond conventional logistics</h3>
<p>When you choose Cargo Northeast, you gain more than a logistics provider: you gain a partner committed to helping your business succeed. With access to key ports and transport hubs across North East England, we offer a strategic advantage for local and international trade.</p>
<p>From customs clearance in the UK to managing global freight, we simplify the logistics process. Let us take care of your logistics so you can focus on driving your business forward.</p>',
        ],
        [
            'type'    => 'features',
            'id'      => 'mission',
            'dark'    => true,
            'columns' => 3,
            'eyebrow' => 'What drives us',
            'title'   => 'Our mission, vision and slogans',
            'intro'   => 'The principles behind every shipment we handle.',
            'items'   => [
                ['icon' => 'target', 'title' => 'Our mission', 'text' => 'To revolutionise the cargo industry in North East England by delivering exceptional services.'],
                ['icon' => 'eye', 'title' => 'Our vision', 'text' => 'To be the foremost provider of cargo solutions in North East England and the UK, redefining excellence through affordability, efficiency, accessibility and sustainability.'],
                ['icon' => 'flag', 'title' => 'Our slogans', 'text' => 'Beyond cargo, beyond excellence: navigating the North East’s future. Respect, integrity.'],
            ],
        ],
        [
            'type'    => 'features',
            'id'      => 'why-us',
            'columns' => 5,
            'eyebrow' => 'Why choose us',
            'title'   => 'Why choose us for customs clearance and logistics',
            'items'   => [
                ['icon' => 'map-pin', 'title' => 'Local expertise', 'text' => 'As a Newcastle-based company, we know the customs rules and logistics challenges of North East England and the wider UK.'],
                ['icon' => 'headset', 'title' => 'Responsive support', 'text' => 'Reliable help when you need it, from people who know your shipment. Your cargo is our priority.'],
                ['icon' => 'star', 'title' => 'Personalised solutions', 'text' => 'Logistics tailored to your business, with efficiency and compliance at every stage.'],
                ['icon' => 'route', 'title' => 'Comprehensive services', 'text' => 'From customs clearance in Newcastle to international freight, we manage every aspect of logistics.'],
                ['icon' => 'users', 'title' => 'Experienced team', 'text' => 'Logistics professionals with hands-on experience and local expertise, delivering reliable, timely service.'],
            ],
        ],
        [
            'type'    => 'features',
            'columns' => 3,
            'eyebrow' => 'What we do',
            'title'   => 'Our services include',
            'intro'   => 'We’re committed to making logistics easy for businesses in Newcastle, North East England and beyond - whether you need customs clearance, international freight or local road transport.',
            'items'   => [
                ['icon' => 'shield', 'title' => 'Customs clearance', 'text' => 'Simpler imports and exports, with declarations handled in Newcastle and across the UK.', 'href' => '/customs-clearance-service-uk/'],
                ['icon' => 'ship', 'title' => 'Sea freight', 'text' => 'Cost-effective shipping for large and small consignments on global routes.', 'href' => '/sea-freight-newcastle-upon-tyne/'],
                ['icon' => 'send', 'title' => 'Air freight', 'text' => 'Reliable, timely air freight for urgent shipments through major UK airports.', 'href' => '/all-airports/'],
                ['icon' => 'truck', 'title' => 'Road transport', 'text' => 'Secure, efficient road freight across North East England, the UK and the EU.', 'href' => '/road-transport-uk-eu/'],
                ['icon' => 'globe', 'title' => 'China to UK freight', 'text' => 'Shipping goods from China to the UK, with customs and delivery arranged for you.', 'href' => '/import-from-china/'],
                ['icon' => 'warehouse', 'title' => 'Safe storage', 'text' => 'Flexible storage in Newcastle for businesses and individuals.', 'href' => '/safe-storage-newcastle-upon-tyne-northeast/'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Let’s simplify your logistics', 'text' => 'Contact us today to discuss how we can support your business’s logistics and customs clearance needs.'],
    ],
];
