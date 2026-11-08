<?php
return [
    'title'       => 'Road Transport & Freight UK to EU | Cargo Northeast',
    'description' => 'UK–EU road freight with post-Brexit customs clearance handled on both sides. FTL and LTL transport to France, Germany, Spain, the Netherlands and across the UK.',
    'breadcrumbs' => [['Our expertise', '/our-expertise/']],
    'crumb'       => 'Road transport (UK & EU)',
    'service'     => 'Road transport between the UK and EU',
    'sections'    => [
        [
            'type'              => 'hero',
            'image'   => asset_img('road'),
            'quote'             => true,
            'quote_placeholder' => 'e.g. Newcastle → Rotterdam',
            'eyebrow'           => 'Road freight · UK & EU',
            'title'             => 'Road transport between the UK and EU',
            'lead'              => 'Cross-border road freight with the post-Brexit customs paperwork handled for you - for UK businesses and EU-based companies moving goods in either direction.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'A complete UK and EU road network',
            'items'   => [
                ['icon' => 'truck', 'title' => 'UK road transport', 'text' => 'Domestic deliveries across the UK, including major hubs such as London, Manchester, Birmingham and Newcastle.'],
                ['icon' => 'route', 'title' => 'EU road freight', 'text' => 'Cross-border transport to and from France, Germany, Spain, the Netherlands and other EU countries.'],
                ['icon' => 'box', 'title' => 'FTL & LTL options', 'text' => 'Full truckload or less-than-truckload - regular runs or one-off deliveries, scheduled around your timeline.'],
                ['icon' => 'shield', 'title' => 'Customs on both sides', 'text' => 'Customs documentation for UK and EU borders, including indirect clearance for non-UK residents.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Post-Brexit expertise',
            'title'      => 'Customs clearance built into every journey',
            'paragraphs' => [
                'Since Brexit, goods moving by road between the UK and Europe need customs declarations and supporting paperwork. Our road transport service is designed around these requirements, so your shipments keep moving at the border.',
                'If you’re not a UK resident, we provide indirect customs clearance so your goods from Europe can still pass through UK customs efficiently. We manage the documents, you focus on your business.',
            ],
            'checklist'  => ['UK & EU customs documents', 'Indirect clearance for non-residents', 'Duty & VAT handled', 'Real-time shipment tracking'],
        ],
        [
            'type'    => 'features',
            'columns' => 4,
            'eyebrow' => 'Industries we serve',
            'title'   => 'Road freight for every sector',
            'items'   => [
                ['icon' => 'building', 'title' => 'Manufacturing & industrial', 'text' => 'Machinery, components and raw materials moved safely between the UK and EU.'],
                ['icon' => 'cart', 'title' => 'Retail & e-commerce', 'text' => 'Retail stock, consumer products and e-commerce shipments across borders.'],
                ['icon' => 'clock', 'title' => 'Food & beverage', 'text' => 'Temperature-controlled transport for the safe delivery of perishable goods.'],
                ['icon' => 'lock', 'title' => 'Technology & electronics', 'text' => 'Careful handling for high-value technology products and electronic goods.'],
            ],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Road freight without the border headaches',
            'items'   => [
                ['title' => 'UK–EU trade specialists', 'text' => 'We focus on post-Brexit trade, so your shipments meet every regulatory requirement.'],
                ['title' => 'Seamless customs clearance', 'text' => 'Customs for both UK and EU borders, managed by the same team that moves your freight.'],
                ['title' => 'Safe, secure transport', 'text' => 'Experienced drivers and well-maintained vehicles, with warehousing available when you need it.'],
                ['title' => 'Personal service', 'text' => 'Flexible scheduling and solutions tailored to your logistics needs, with full support throughout.'],
            ],
        ],
        [
            'type'  => 'steps',
            'items' => [
                ['title' => 'Quote', 'text' => 'Tell us the route, goods and timings - FTL or LTL.'],
                ['title' => 'Collect', 'text' => 'We collect your goods on a schedule that suits you.'],
                ['title' => 'Clear customs', 'text' => 'We file the UK and EU paperwork for the border crossing.'],
                ['title' => 'Deliver', 'text' => 'Your goods arrive on time, tracked all the way.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'UK–EU road transport questions',
            'items' => [
                ['q' => 'Do goods moving by road between the UK and EU need customs declarations?', 'a' => 'Yes. Since Brexit, goods moving between Great Britain and the EU generally need export and import declarations. We prepare and submit the paperwork as part of the road transport service.'],
                ['q' => 'I’m not based in the UK. Can you still clear my goods?', 'a' => 'Yes. We specialise in indirect customs clearance for non-UK residents, so EU-based businesses can move goods into the UK compliantly.'],
                ['q' => 'Do you offer part loads?', 'a' => 'Yes. We offer both full truckload (FTL) and less-than-truckload (LTL) transport, for regular shipments or one-off deliveries.'],
                ['q' => 'Which countries do you cover?', 'a' => 'We run road freight across the UK and to and from major EU countries including France, Germany, Spain and the Netherlands. Contact us for other European destinations.'],
                ['q' => 'Can I track my shipment?', 'a' => 'Yes. Shipments can be tracked in real time from departure to delivery, giving you full visibility.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Ready to move goods between the UK and EU?'],
    ],
];
