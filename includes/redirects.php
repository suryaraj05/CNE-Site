<?php
// 301s for legacy WordPress URLs. Returns a resolver: path => target or null.

$exact = [
    '/home/'                 => '/',
    '/index.php'             => '/',
    '/customs-clearance/'    => '/customs-clearance-service-uk/',
    '/ocean-freight-forwarding/' => '/sea-freight-newcastle-upon-tyne/',
    '/amazon-fba-service-newcastle-upon-tyne/' => '/amazon-fba-logistics-solutions/',
    '/customs-clearance-freight-services-newcastle-scotland-uk-2/' => '/',
    '/customs-clearance-freight-services-newcastle-scotland-uk-3/' => '/',
    '/comprehensive-logistics-solutions-scotland-uk-2/' => '/our-services/',
    '/shispment-form/'       => '/shipment-form/',
    '/parcel-delivery-to-india/' => '/baggage-delivery-to-india/',
    '/we-introduce-new-boat-and-flight-service/' => '/blog/',
    '/air-cargo-may-become-short-term-solution/' => '/blog/',
    '/gallery/'              => '/',
    '/feed/'                 => '/blog/',
    '/comments/feed/'        => '/blog/',
    '/service/'              => '/our-services/',
    '/service/air-freight-forwarding/'   => '/services/',
    '/service/ocean-freight-forwarding/' => '/sea-freight-newcastle-upon-tyne/',
    '/service/road-freight-forwarding/'  => '/road-transport-uk-eu/',
    '/service/ground-transport/'         => '/road-transport-uk-eu/',
    '/service/worldwide-transport/'      => '/uk-to-restoftheworld-freight/',
    '/service/packaging-storage/'        => '/safe-storage-newcastle-upon-tyne-northeast/',
    '/service/warehousing/'              => '/safe-storage-newcastle-upon-tyne-northeast/',
    '/service/cargo-service/'            => '/our-services/',
    '/service/door-to-door-delivery/'    => '/our-services/',
    '/wp-login.php'          => '/',
    '/wp-admin/'             => '/',
    '/xmlrpc.php'            => '/',
];

$prefixes = [
    '/project/'          => '/blog/',
    '/category/'         => '/blog/',
    '/tag/'              => '/blog/',
    '/author/'           => '/blog/',
    '/project_category/' => '/blog/',
    '/service/'          => '/our-services/',
    '/wp-content/'       => '/',
    '/wp-json/'          => '/',
];

return function (string $path) use ($exact, $prefixes): ?string {
    $normalised = preg_match('~\.[a-z0-9]+$~i', $path) || str_ends_with($path, '/') ? $path : "$path/";

    if (isset($exact[$normalised])) {
        return $exact[$normalised];
    }
    foreach ($prefixes as $prefix => $target) {
        if (str_starts_with($normalised, $prefix)) {
            return $target;
        }
    }
    // WordPress URLs always end in a slash; keep one canonical form.
    return $normalised !== $path ? $normalised : null;
};
