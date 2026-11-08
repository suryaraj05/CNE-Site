<?php
return [
    'title'       => 'Track Your Shipment | Cargo Northeast',
    'description' => 'Track your Cargo Northeast air, sea or road shipment using your AWB, tracking or booking reference, or contact our team for a status update on your cargo.',
    'breadcrumbs' => [],
    'crumb'       => 'Track your shipment',
    'sections'    => [
        [
            'type'    => 'hero',
            'eyebrow' => 'Shipment tracking',
            'title'   => 'Track your shipment',
            'lead'    => 'Enter your tracking, AWB or booking reference to see the latest status of your freight. Need more detail? Our team is happy to help.',
            'primary' => false,
            'note'    => false,
        ],
        ['type' => 'track'],
        [
            'type'  => 'faq',
            'title' => 'Tracking help',
            'items' => [
                ['q' => 'Where do I find my tracking reference?', 'a' => 'For air freight, use the air waybill (AWB) number shown on your air waybill. For other shipments, use the tracking or booking reference we sent you when your shipment was booked.'],
                ['q' => 'Why can’t I find my shipment?', 'a' => 'Check the reference for typos and enter it without spaces. Newly booked shipments can take a little time to appear. If it still isn’t found, contact us with your reference and we’ll check for you.'],
                ['q' => 'My shipment hasn’t updated. What should I do?', 'a' => 'Call +44 7354 595649 or email opsuk@cargonortheast.com with your reference, and our team will give you an update - including the status of any customs clearance.'],
                ['q' => 'Haven’t received a tracking number yet?', 'a' => 'If you’ve submitted a shipment form, we’ll email your tracking number once the booking is confirmed.'],
            ],
        ],
        ['type' => 'cta', 'title' => 'Shipping something new?'],
    ],
];
