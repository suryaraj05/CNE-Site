<?php $posts = array_slice(load_posts(), 0, $s['limit'] ?? null, true); ?>
    <section<?= section_id($s) ?> class="section-y scroll-mt-28 bg-white">
      <div class="shell">
      <?php section_heading($s, 'center'); ?>
      <ul class="mt-8 grid items-stretch gap-5 sm:mt-10 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
<?php $i = 0; foreach ($posts as $slug => $post): $time = strtotime($post['date']); ?>
        <li<?= reveal('up', 40 + $i++ * 70) ?> class="card-surface group relative flex h-full flex-col overflow-hidden">
<?php if (!empty($post['image'])): ?>
          <div class="overflow-hidden">
            <?= img_tag(
                is_string($post['image'])
                    ? ['src' => $post['image'], 'alt' => $post['image_alt'] ?? $post['title']]
                    : ($post['image'] + ['alt' => $post['image']['alt'] ?? $post['image_alt'] ?? $post['title']]),
                'aspect-[16/10] w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-[1.04]'
            ) ?>
          </div>
<?php endif; ?>
          <div class="flex flex-1 flex-col p-5">
            <p class="flex flex-wrap items-center gap-2 text-[12px] font-medium text-muted">
<?php if (!empty($post['category'])): ?>
              <span class="rounded-full bg-lime/80 px-2.5 py-0.5 font-semibold text-ink"><?= e($post['category']) ?></span>
<?php endif; ?>
              <time datetime="<?= e($post['date']) ?>"><?= e(date('j M Y', $time)) ?></time>
            </p>
            <h3 class="heading-card mt-3 text-lg">
              <a href="/<?= e($slug) ?>/" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($post['title']) ?></a>
            </h3>
            <p class="lede mt-2 flex-1 text-[15px]"><?= e($post['excerpt']) ?></p>
            <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-navy" aria-hidden="true">
              Read more
              <span class="transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
            </span>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
<?php if (!empty($s['more'])): ?>
      <div class="mt-10 text-center">
        <a href="<?= e($s['more'][1] ?? '/blog/') ?>" class="btn btn-secondary"><?= e($s['more'][0] ?? 'View all articles') ?></a>
      </div>
<?php endif; ?>
      </div>
    </section>
