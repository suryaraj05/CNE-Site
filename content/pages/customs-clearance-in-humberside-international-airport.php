<?php
return [
    'title'       => 'Customs Clearance at Humberside Airport | Cargo Northeast',
    'description' => 'Customs clearance and freight courier support at Humberside International Airport (HUY). Import and export declarations via HMRC CDS for urgent consignments.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'Humberside',
    'service'     => 'Customs clearance at Humberside International Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Amsterdam → Humberside (HUY)',
            'eyebrow'           => 'Humberside import clearance & freight courier',
            'title'             => 'Customs clearance at Humberside International Airport',
            'lead'              => 'Customs declarations and courier coordination for goods moving through Humberside - so urgent, valuable and time-sensitive consignments stay on schedule.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'eyebrow' => 'What we handle',
            'title'   => 'Customs and courier support at Humberside',
            'items'   => [
                ['icon' => 'box', 'title' => 'Humberside import clearance', 'text' => 'Import declarations and document checks for goods arriving from overseas, with help on onward delivery.'],
                ['icon' => 'send', 'title' => 'Export declarations', 'text' => 'Export customs prepared and submitted through CDS before your goods depart.'],
                ['icon' => 'route', 'title' => 'Airport freight courier', 'text' => 'Urgent, small and high-value consignments, B2B deliveries and onward domestic or international transport.'],
                ['icon' => 'users', 'title' => 'Airline & handler coordination', 'text' => 'We liaise with airlines, handlers and freight providers so customs and transport work together.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs at Humberside',
            'title'      => 'Accurate and compliant from the start',
            'paragraphs' => [
                'Customs clearance involves more than moving cargo to or from the airport. Goods need correct documentation, accurate shipment details and declarations that meet HMRC requirements, submitted through the Customs Declaration Service (CDS).',
                'We check your EORI number, prepare the import or export declaration, advise on duty and VAT, and deal with HMRC if a query comes up - so your consignment isn’t held while questions go unanswered.',
            ],
            'checklist'  => ['Import & export declarations', 'EORI number checks', 'Duty & VAT guidance', 'Commodity & shipment data', 'HMRC query handling'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Why Cargo Northeast',
            'title'   => 'Courier speed with customs know-how',
            'items'   => [
                ['title' => 'Experienced customs support', 'text' => 'We understand how much accurate documentation matters for both imports and exports.'],
                ['title' => 'Freight coordinated with customs', 'text' => 'Courier, freight and declarations arranged together, with fewer interruptions.'],
                ['title' => 'Tailored to your shipment', 'text' => 'Support shaped around your goods, origin or destination, and delivery requirements.'],
                ['title' => 'Clear communication', 'text' => 'Kept informed throughout, with customs queries resolved as quickly as possible.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'How we clear goods at Humberside',
            'items' => [
                ['title' => 'Share the details', 'text' => 'Your goods, origin or destination, timescales and documents.'],
                ['title' => 'Check and prepare', 'text' => 'We verify the paperwork, commodity data and EORI before filing.'],
                ['title' => 'Declare via CDS', 'text' => 'Your import or export declaration is submitted to HMRC.'],
                ['title' => 'Courier onward', 'text' => 'Cleared goods are delivered onward, domestically or internationally.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'Humberside Airport customs questions',
            'items' => [
                ['q' => 'What does Humberside import clearance involve?', 'a' => 'Submitting the correct customs declaration and supporting documents for goods arriving from overseas so they can be released. We coordinate this alongside communication with the relevant parties.'],
                ['q' => 'Can you arrange a freight courier for urgent shipments?', 'a' => 'Yes. We coordinate urgent, high-value and time-sensitive consignments, arranging customs clearance alongside the courier and freight arrangements.'],
                ['q' => 'What documents are usually needed?', 'a' => 'Commonly a commercial invoice, a packing list, an air waybill and a customs declaration. Some shipments need extra paperwork such as licences or certificates of origin - we’ll advise on yours.'],
                ['q' => 'How can I avoid customs delays?', 'a' => 'Delays are usually caused by incomplete or inaccurate paperwork. Provide correct commodity descriptions, values and consignee details, and send documents in good time.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Need customs clearance at Humberside?'],
    ],
];
