<?php
return [
    'title'       => 'Air Freight at London City Airport (LCY) | Cargo Northeast',
    'description' => 'Urgent air freight and customs clearance at London City Airport (LCY), plus London Gateway port clearance. CDS declarations, duty, VAT and London delivery.',
    'breadcrumbs' => [['Airports', '/all-airports/']],
    'crumb'       => 'London City (LCY)',
    'service'     => 'Air freight and customs clearance at London City Airport',
    'sections'    => [
        [
            'type'              => 'hero',
            'quote'             => true,
            'quote_placeholder' => 'e.g. Zurich → London City (LCY)',
            'eyebrow'           => 'Air freight services, London City Airport',
            'title'             => 'Air freight services at London City Airport (LCY)',
            'lead'              => 'For urgent, high-value and time-critical consignments that need to reach central London fast — handled from booking to customs release and final delivery.',
        ],
        ['type' => 'trust'],
        [
            'type'    => 'features',
            'id'      => 'services',
            'columns' => 3,
            'eyebrow' => 'What we handle',
            'title'   => 'Built for time-critical London freight',
            'intro'   => 'London City Airport sits close to the City of London, Canary Wharf and the Docklands, making it a practical gateway for small-to-medium consignments that can’t wait.',
            'items'   => [
                ['icon' => 'plane', 'title' => 'LCY imports & exports', 'text' => 'Air freight handling in both directions, tailored to the size, urgency and nature of your shipment.'],
                ['icon' => 'clock', 'title' => 'Same-day delivery', 'text' => 'Time-critical and same-day deliveries across London and the South East.'],
                ['icon' => 'shield', 'title' => 'Import & export declarations', 'text' => 'Declarations prepared and submitted accurately to HMRC through CDS.'],
                ['icon' => 'pound', 'title' => 'Landed-cost guidance', 'text' => 'Duty and VAT worked out in advance, so you know your costs before the goods arrive.'],
                ['icon' => 'ship', 'title' => 'London Gateway clearance', 'text' => 'Customs for the deep-sea container port, including classification, CDS entries and release.'],
                ['icon' => 'truck', 'title' => 'Collection & delivery', 'text' => 'Onward transport to your premises or straight to your end customer.'],
            ],
        ],
        [
            'type'       => 'panel',
            'id'         => 'customs',
            'eyebrow'    => 'Customs clearance imports to London City Airport',
            'title'      => 'Cleared fast, with no surprises on cost',
            'paragraphs' => [
                'Cargo flown into LCY must clear customs before release. We confirm commodity codes, customs value and country of origin, then submit the import declaration to HMRC through CDS using your EORI number.',
                'Customs duty depends on the commodity code, customs value, origin and any trade agreement; import VAT is generally charged on the customs value plus duty and certain costs. We calculate charges in advance wherever possible and advise on postponed VAT accounting where you’re eligible. The same service covers sea freight through London Gateway, including any licences or certificates your goods need.',
            ],
            'checklist'  => ['Commodity code classification', 'Customs value & origin', 'CDS declarations', 'Duty & VAT calculated upfront', 'Licences & certificates'],
        ],
        [
            'type'    => 'why',
            'eyebrow' => 'Who we work with',
            'title'   => 'Trusted with urgent, high-value cargo',
            'items'   => [
                ['title' => 'Importers, exporters & manufacturers', 'text' => 'One-off consignments or regular, repeat shipping planned around your deadlines.'],
                ['title' => 'E-commerce sellers', 'text' => 'Stock cleared and delivered quickly to keep orders moving.'],
                ['title' => 'Medical & healthcare suppliers', 'text' => 'Time-sensitive supplies handled with care and urgency.'],
                ['title' => 'Finance, legal & professional services', 'text' => 'Urgent documents and parcels delivered to City and Canary Wharf offices.'],
            ],
        ],
        [
            'type'  => 'steps',
            'title' => 'How LCY import clearance works',
            'items' => [
                ['title' => 'Share your documents', 'text' => 'Commercial invoice, packing list, air waybill and any licences or certificates.'],
                ['title' => 'Classify and value', 'text' => 'We confirm commodity codes, customs value and country of origin.'],
                ['title' => 'Declare and calculate', 'text' => 'Declaration filed via CDS; duty and VAT confirmed, including postponed VAT accounting options.'],
                ['title' => 'Release and deliver', 'text' => 'Once cleared, we arrange collection and delivery across London.'],
            ],
        ],
        [
            'type'  => 'faq',
            'title' => 'London City Airport freight questions',
            'items' => [
                ['q' => 'Why use London City Airport for air freight?', 'a' => 'LCY is close to central London and Canary Wharf, which can shorten the final leg for urgent consignments. It suits time-sensitive, high-value and smaller shipments that need to reach London businesses quickly.'],
                ['q' => 'Do you provide customs clearance at London Gateway?', 'a' => 'Yes. We handle customs clearance at London Gateway, including classification, CDS declarations, duty and VAT calculations, and onward delivery from the port.'],
                ['q' => 'What is CDS?', 'a' => 'The Customs Declaration Service is HMRC’s system for import and export declarations, which has replaced the older CHIEF system. We submit declarations on your behalf.'],
                ['q' => 'Do I need an EORI number?', 'a' => 'In most cases, yes, if you move goods between Great Britain and non-UK countries. Businesses moving goods to or from Northern Ireland may need an XI EORI number. We can advise on whether you need one and how to apply.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Urgent freight into London City?', 'text' => 'Send us the origin, destination, weight, dimensions, goods description and timeline — we’ll respond with a tailored quote.'],
    ],
];
