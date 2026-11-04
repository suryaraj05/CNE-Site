<?php
declare(strict_types=1);

const SITE_NAME       = 'Cargo Northeast';
const SITE_LEGAL_NAME = 'Cargo Northeast Ltd';
const SITE_URL        = 'https://cargonortheast.com';
const PHONE_DISPLAY   = '+44 7354 595649';
const PHONE_E164      = '+447354595649';
const EMAIL           = 'opsuk@cargonortheast.com';
const COMPANY_NO      = '13485807';
const ADDRESS = [
    'street'   => 'Unit 13–16, Airport Freightway, Freight Village, Newcastle International Airport',
    'short'    => 'Freight Village, Newcastle Airport',
    'locality' => 'Newcastle upon Tyne',
    'postcode' => 'NE13 8BH',
    'country'  => 'GB',
];
const INDIA_OFFICE = [
    'name'          => 'Cargo Northeast (India) Private Limited',
    'address'       => 'Borivali (West), Mumbai 400092, India',
    'phone_display' => '+91 99203 60122',
    'phone_e164'    => '+919920360122',
];
const OPENING_HOURS = [
    'Monday to Saturday' => '9:00am – 5:00pm',
    'Sunday'             => 'Closed',
];
const SOCIAL = [
    'facebook'  => ['Facebook', 'https://www.facebook.com/p/Cargo-North-East-61558445017694/'],
    'linkedin'  => ['LinkedIn', 'https://www.linkedin.com/company/cargo-northeast'],
    'youtube'   => ['YouTube', 'https://www.youtube.com/@CargoNortheast'],
    'instagram' => ['Instagram', 'https://www.instagram.com/cargo.northeast/'],
];

// Backend API is owned by another team; point CNE_API_BASE at it per environment.
define('API_BASE_URL', rtrim(getenv('CNE_API_BASE') ?: '/api', '/'));
