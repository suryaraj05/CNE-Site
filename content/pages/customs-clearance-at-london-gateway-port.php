<?php
return [
    'title'       => 'Customs Clearance at London Gateway Port | Cargo Northeast',
    'description' => 'Customs clearance and freight forwarding for containers at London Gateway port. HMRC CDS import and export declarations, EORI, duty and VAT. Get a quote.',
    'breadcrumbs' => [['UK seaports', '/all-seaports/']],
    'crumb'       => 'London Gateway',
    'service'     => 'Customs clearance at London Gateway Port',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Shanghai → London Gateway',
            'eyebrow'           => 'Sea freight & customs clearance',
            'title'             => 'Customs clearance at London Gateway Port',
            'lead'              => 'Containers declared correctly, released quickly and delivered on time — with customs and onward transport from London Gateway handled by one team.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Everything your container needs at London Gateway',
            'intro'   => 'At a major container port every hour counts. Incorrect paperwork, a wrong commodity code or a missing EORI number can hold your containers, trigger storage charges and delay delivery to your customers.',
            'items'   => [
                ['icon' => 'shield', 'title' => 'Import & export declarations', 'text' => 'Declarations prepared and submitted to HMRC through the Customs Declaration Service (CDS).'],
                ['icon' => 'clipboard', 'title' => 'Commodity classification', 'text' => 'The right commodity codes assigned — they affect duty rates, licensing and the accuracy of your declaration.'],
                ['icon' => 'ship', 'title' => 'Shipping line & terminal liaison', 'text' => 'We coordinate with shipping lines, hauliers and the terminal so documents and containers are ready together.'],
                ['icon' => 'truck', 'title' => 'Freight forwarding & delivery', 'text' => 'Clearance and onward transport brought together, so your cargo is easier to track from booking to delivery.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Why customs clearance matters',
            'title'      => 'Keep your containers moving through the port',
            'paragraphs' => [
                'Every commercial shipment entering or leaving the UK by sea must be declared to HMRC. The declaration records what the goods are, their value, their commodity code and their origin or destination. If any detail is wrong, containers can be held, costs build up and penalties can follow.',
                'We check your GB EORI number before your shipment arrives or departs, flag goods that need a licence or extra checks, and explain how duty and import VAT apply and what records you need to keep. Declarations are filed electronically through CDS, so we clear London Gateway cargo from our office at Newcastle Airport.',
            ],
            'checklist'  => ['Import & export declarations via CDS', 'EORI number checks', 'Commodity codes', 'Licences & restricted goods', 'Duty & import VAT'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Your London Gateway customs clearance agent',
            'items'   => [
                ['title' => 'One point of contact', 'text' => 'The same team handles your clearance and forwarding, so there are fewer handovers.'],
                ['title' => 'HMRC and CDS know-how', 'text' => 'Up-to-date knowledge of HMRC requirements and CDS processes as customs rules change.'],
                ['title' => 'Fewer errors', 'text' => 'Accurate declarations mean fewer delays, queries, storage charges and penalties.'],
                ['title' => 'One-off or regular', 'text' => 'Whether you ship occasionally or every week, we support single clearances and ongoing arrangements.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'Clearing cargo at London Gateway',
            'items' => [
                ['title' => 'Send your details', 'text' => 'Share your shipment and container details, commercial invoice and packing list.'],
                ['title' => 'We check the detail', 'text' => 'We confirm your EORI number, commodity codes and any licence requirements.'],
                ['title' => 'Declare to HMRC', 'text' => 'We submit the declaration through CDS and keep you updated until it clears.'],
                ['title' => 'Deliver', 'text' => 'Cleared containers move on by road, and you receive the customs documentation for your records.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'London Gateway customs questions',
            'items' => [
                ['q' => 'What does customs clearance at London Gateway involve?', 'a' => 'Declaring your goods to HMRC so they can legally enter or leave the UK. It covers preparing the declaration, confirming commodity codes, calculating duty and VAT where it applies and making sure your paperwork matches the shipment.'],
                ['q' => 'Do I need an EORI number?', 'a' => 'In most cases, yes. A GB EORI number is generally required to make customs declarations to HMRC. If you don’t have one, we can guide you through registering before your first shipment.'],
                ['q' => 'How are duty and VAT handled?', 'a' => 'Imports may attract duty and import VAT depending on the goods, their origin and value. UK exports are generally zero-rated for VAT if you hold valid proof of export, though duty may apply in the destination country.'],
                ['q' => 'Can you provide freight forwarding as well as customs clearance?', 'a' => 'Yes. We offer London Gateway freight forwarding alongside customs clearance, so your documents, carriers and onward delivery are coordinated by one team.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Shipping through London Gateway?'],
    ],
];
