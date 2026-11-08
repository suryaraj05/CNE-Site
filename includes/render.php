<?php
declare(strict_types=1);

const CONTENT_DIR = __DIR__ . '/../content';

/** Sections rendered full-bleed; everything else sits in the padded content column. */
const BAND_SECTIONS = ['hero', 'trust', 'cta', 'features', 'steps', 'testimonials'];

function render_page(array $page): void
{
    $page += [
        'path'        => '/',
        'robots'      => 'index, follow, max-image-preview:large',
        'image'       => null,
        'breadcrumbs' => null,
        'sections'    => [],
    ];
    $page['schema'] = page_schema($page);

    require __DIR__ . '/header.php';

    $inBody = false;
    foreach ($page['sections'] as $s) {
        $band = in_array($s['type'], BAND_SECTIONS, true);
        if (!$band && !$inBody) {
            echo '<div class="space-y-24 pt-16 pb-24 sm:space-y-28 sm:pt-20 sm:pb-28">';
            $inBody = true;
        } elseif ($band && $inBody) {
            echo '</div>';
            $inBody = false;
        }
        require __DIR__ . '/sections/' . $s['type'] . '.php';
    }
    if ($inBody) {
        echo '</div>';
    }

    require __DIR__ . '/footer.php';
}

function page_schema(array $page): array
{
    $graph = [];
    $url = SITE_URL . $page['path'];

    if ($page['breadcrumbs'] !== null) {
        $crumbs = array_merge([['Home', '/']], $page['breadcrumbs'], [[$page['crumb'] ?? hero_title($page), $page['path']]]);
        $graph[] = [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => array_map(fn($c, $i) => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $c[0],
                'item'     => SITE_URL . $c[1],
            ], $crumbs, array_keys($crumbs)),
        ];
    }

    if (!empty($page['service'])) {
        $graph[] = [
            '@type'       => 'Service',
            'name'        => $page['service'],
            'serviceType' => $page['service'],
            'url'         => $url,
            'description' => $page['description'],
            'provider'    => ['@id' => SITE_URL . '/#business'],
            'areaServed'  => ['@type' => 'Country', 'name' => 'United Kingdom'],
        ];
    }

    foreach ($page['sections'] as $s) {
        if ($s['type'] === 'faq' && !empty($s['items'])) {
            $graph[] = [
                '@type'      => 'FAQPage',
                'mainEntity' => array_map(fn($f) => [
                    '@type'          => 'Question',
                    'name'           => $f['q'],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
                ], $s['items']),
            ];
        }
    }

    if (!empty($page['post'])) {
        $graph[] = [
            '@type'         => 'BlogPosting',
            'headline'      => $page['post']['title'],
            'description'   => $page['description'],
            'datePublished' => $page['post']['date'],
            'url'           => $url,
            'author'        => ['@id' => SITE_URL . '/#business'],
            'publisher'     => ['@id' => SITE_URL . '/#business'],
        ] + ($page['image'] ? ['image' => $page['image']] : []);
    }

    return $graph;
}

function hero_title(array $page): string
{
    foreach ($page['sections'] as $s) {
        if ($s['type'] === 'hero') {
            return $s['title'];
        }
    }
    return SITE_NAME;
}

/** All posts, newest first, keyed by slug. */
function load_posts(): array
{
    $posts = [];
    foreach (glob(CONTENT_DIR . '/posts/*.php') as $file) {
        $posts[basename($file, '.php')] = require $file;
    }
    uasort($posts, fn($a, $b) => strcmp($b['date'], $a['date']));
    return $posts;
}

function post_page(array $post, string $slug): array
{
    $img = $post['image'] ?? null;
    $src = is_array($img) ? $img['src'] : $img;
    return [
        'title'       => $post['meta_title'] ?? $post['title'] . ' | ' . SITE_NAME,
        'description' => $post['description'],
        'path'        => "/$slug/",
        'image'       => $src ? SITE_URL . $src : null,
        'breadcrumbs' => [['Blog', '/blog/']],
        'crumb'       => $post['title'],
        'post'        => $post,
        'sections'    => [
            [
                'type'      => 'hero',
                'eyebrow'   => date('j F Y', strtotime($post['date'])),
                'title'     => $post['title'],
                'lead'      => $post['excerpt'],
                'image'     => $img,
                'primary'   => false,
                'secondary' => false,
                'note'      => false,
            ],
            ['type' => 'prose', 'html' => $post['html']],
            ['type' => 'cta'],
        ],
    ];
}
