<?php
return [
    'title'       => 'Customs Clearance Service UK & EU | Cargo Northeast',
    'description' => 'UK customs clearance agent for imports and exports. HMRC CDS declarations, post-Brexit UK–EU compliance, first three clearances free, then £25 each. Get a quote.',
    'breadcrumbs' => [['Our expertise', '/our-expertise/']],
    'crumb'       => 'Customs clearance',
    'service'     => 'Customs clearance service in the UK and EU',
    'sections'    => [
        [
            'type'              => 'hero',
            'image'   => asset_img('customs'),
            'quote'             => true,
            'quote_placeholder' => 'e.g. Germany → Newcastle (import)',
            'eyebrow'           => 'Customs clearance agent · UK & EU',
            'title'             => 'Customs clearance service across the UK',
            'lead'              => 'We prepare and submit your import and export declarations, calculate duties and keep you compliant with post-Brexit rules - so your goods clear quickly, wherever they enter the UK.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs clearance for every route into the UK',
            'items'   => [
                ['icon' => 'shield', 'title' => 'UK import & export clearance', 'text' => 'Full declarations for shipments through Newcastle, Heathrow and other major UK airports and seaports.'],
                ['icon' => 'users', 'title' => 'Customs agent representation', 'text' => 'We act on behalf of importers and exporters - managing documentation, duties and compliance with UK law.'],
                ['icon' => 'route', 'title' => 'UK–EU clearance after Brexit', 'text' => 'Goods from Germany, France and the rest of the EU cleared under current post-Brexit requirements.'],
                ['icon' => 'globe', 'title' => 'Global hub shipments', 'text' => 'Cargo routed via hubs such as Frankfurt Airport and Dubai, cleared on arrival so it reaches you without hassle.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'what-is-customs-clearance',
            'eyebrow'    => 'The basics',
            'title'      => 'What is customs clearance?',
            'paragraphs' => [
                'Customs clearance is the process of preparing and submitting the documents that allow goods to enter or leave a country. It covers calculating duties, confirming the goods meet the destination’s rules, and getting the shipment released at the border.',
                'Responsibility usually sits with the importer or the customs agent they appoint. When you appoint us, we manage every step - filing declarations with HMRC through the Customs Declaration Service (CDS) using modern customs software that reduces errors and speeds up processing.',
            ],
            'checklist'  => ['HMRC & CDS declarations', 'Commodity code classification', 'Duty & import VAT calculation', 'EORI number guidance', 'Real-time status updates'],
        ],
        [
            'type'    => 'features',
            'id'      => 'pricing',
            'columns' => 3,
            'eyebrow' => 'Customs clearance charges',
            'title'   => 'Transparent, competitive pricing',
            'intro'   => 'Simple fees for resident and non-resident importers shipping between the UK and EU.',
            'items'   => [
                ['icon' => 'star', 'title' => 'First three clearances free', 'text' => 'New customers get their first three customs clearances free of charge - for resident and non-resident importers alike.'],
                ['icon' => 'pound', 'title' => '£25 per clearance', 'text' => 'After your first three, our standard fee is £25 for each customs clearance.'],
                ['icon' => 'building', 'title' => '£50 non-resident representation', 'text' => 'Businesses based outside the UK, such as in Germany, get full UK customs representation for £50 per shipment.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'brexit',
            'eyebrow'    => 'Post-Brexit customs',
            'title'      => 'Customs clearance after Brexit',
            'paragraphs' => [
                'Brexit introduced customs declarations, checks and duty considerations for goods moving between the UK and the EU. We track the changes to UK customs processes so your shipments stay compliant and avoid delays at the border.',
                'From document preparation to duty calculation and onward logistics, we make sure every consignment meets the requirements on both sides - whether you’re a UK business importing from Europe or an EU business selling into the UK.',
            ],
            'checklist'  => ['Resident & non-resident importers', 'Indirect representation', 'Duty & VAT handled', 'Fewer holds and surprises'],
        ],
        [
            'type'        => 'why',
            'eyebrow'     => 'Why Cargo Northeast',
            'title'       => 'A customs partner you can rely on',
            'items'       => [
                ['title' => 'Experienced agents', 'text' => 'A BIFA member team that handles UK customs declarations every day.'],
                ['title' => 'Fewer delays, lower costs', 'text' => 'Documents checked before filing, so goods clear first time.'],
                ['title' => 'Real-time support', 'text' => 'Straight answers on duties, documents and timings when you need them.'],
            ],
            'testimonial' => [
                'quote' => 'Cargo Northeast made customs clearance a breeze for our business. Their team handled all the paperwork efficiently, saving us time and hassle.',
                'name'  => 'Sarah T.',
                'role'  => 'Newcastle',
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Send details', 'text' => 'Share your invoice, packing list and shipment details.'],
                ['title' => 'We prepare', 'text' => 'We classify the goods and calculate duty and VAT.'],
                ['title' => 'We declare', 'text' => 'Your declaration is filed with HMRC through CDS.'],
                ['title' => 'Goods released', 'text' => 'Your shipment clears and moves on to delivery.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Customs clearance questions',
            'items' => [
                ['q' => 'How long does customs clearance take in the UK?', 'a' => 'It depends on the type of goods, their origin and the quality of the documentation. Most UK clearances take from a few hours to a few days. Standard shipments are usually quickest; specialised goods can take longer.'],
                ['q' => 'Who is responsible for customs clearance?', 'a' => 'The importer is normally responsible, but most appoint a customs agent to act for them. When you appoint Cargo Northeast, we prepare and submit the declarations and handle the process on your behalf.'],
                ['q' => 'How much does customs clearance cost?', 'a' => 'Your first three customs clearances are free. After that, our standard fee is £25 per clearance. Non-resident importers can use our full representation service for £50 per shipment.'],
                ['q' => 'Can you clear goods for a business based outside the UK?', 'a' => 'Yes. We offer indirect representation for non-resident importers - for example, businesses based in Germany or elsewhere in the EU - so goods can be cleared into the UK compliantly.'],
                ['q' => 'How can I check my customs clearance status?', 'a' => 'We provide real-time updates on every shipment. You can check progress online using our shipment tracking page or contact our team directly.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Need goods cleared through UK customs?'],
    ],
];
