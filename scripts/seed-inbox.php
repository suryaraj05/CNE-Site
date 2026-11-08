<?php
declare(strict_types=1);

require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../includes/helpers.php';
require __DIR__ . '/../includes/inbox.php';

inbox_ensure();

$samples = [
    ['quotes', [
        'email' => 'sarah.turner@acmelogistics.co.uk',
        'origin' => 'Mumbai',
        'destination' => 'Newcastle',
        'goods' => '3 crates electronics',
        'mode' => 'air',
        'weight_kg' => '85',
        'dimensions_cm' => '120x80x100',
        'page' => '/',
    ]],
    ['quotes', [
        'email' => 'ops@northseaimports.com',
        'origin' => 'Rotterdam',
        'destination' => 'Teesport',
        'goods' => '1x 20ft container - machinery parts',
        'mode' => 'sea',
        'weight_kg' => '4200',
        'page' => '/request-a-quote/',
    ]],
    ['quotes', [
        'email' => 'priya.nair@gmail.com',
        'origin' => 'Delhi',
        'destination' => 'Durham',
        'goods' => 'Personal effects / baggage',
        'mode' => 'air',
        'weight_kg' => '48',
        'page' => '/',
    ]],
    ['enquiries', [
        'name' => 'James Whitfield',
        'email' => 'james@whitfieldtrading.co.uk',
        'phone' => '+44 7700 900123',
        'company' => 'Whitfield Trading Ltd',
        'subject' => 'CDS declaration help',
        'enquiry_type' => 'Customs Clearance',
        'message' => 'Need help clearing a shipment arriving at Heathrow next week. Can you handle duty and VAT?',
        'page' => '/contact/',
    ]],
    ['enquiries', [
        'name' => 'Aisha Khan',
        'email' => 'aisha.khan@example.com',
        'phone' => '+44 191 555 0199',
        'enquiry_type' => 'House Move',
        'subject' => 'House move Newcastle to Durham',
        'message' => 'Looking for a house move quote for a 2-bed flat, preferably next Saturday.',
        'page' => '/house-move-service-tyne-and-wear/',
    ]],
    ['enquiries', [
        'name' => 'Chen Wei',
        'email' => 'chen.wei@shenzhensupply.cn',
        'company' => 'Shenzhen Supply Co',
        'enquiry_type' => 'Import from China',
        'subject' => 'Ongoing FBA restock',
        'message' => 'We ship to Amazon UK FBA monthly. Please advise rates and lead times from Shenzhen.',
        'weight_kg' => '650',
        'sender_city' => 'Shenzhen',
        'receiver_city' => 'Manchester',
        'page' => '/amazon-fba-logistics-solutions/',
    ]],
];

foreach ($samples as [$type, $fields]) {
    $r = inbox_store($type, $fields);
    echo $r['ref'] . " {$type}\n";
}
