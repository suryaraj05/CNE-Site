<?php $posts = array_slice(load_posts(), 0, $s['limit'] ?? null, true); ?>
    <section<?= section_id($s) ?> class="mx-auto max-w-7xl scroll-mt-28 px-6 lg:px-10">
      <?php section_heading($s, 'center'); ?>
      <ul class="mt-14 grid items-stretch gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
<?php $i = 0; foreach ($posts as $slug => $post): $time = strtotime($post['date']); ?>
        <li<?= reveal('up', 40 + $i++ * 70) ?> class="group relative flex h-full flex-col rounded-2xl bg-white p-5 ring-1 ring-navy/[0.06] sm:p-6">
<?php if (!empty($post['image'])): ?>
          <div class="overflow-hidden rounded-xl ring-1 ring-navy/[0.05]">
            <?= img_tag($post['image'], 'aspect-[16/10] w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-[1.04]') ?>
          </div>
<?php endif; ?>
          <p class="mt-5 text-[13px] font-medium text-navy/80">
            <time datetime="<?= e($post['date']) ?>"><?= e(date('j M Y', $time)) ?></time>
<?php if (!empty($post['category'])): ?>
            <span aria-hidden="true" class="mx-2 text-line">·</span><span class="text-muted"><?= e($post['category']) ?></span>
<?php endif; ?>
          </p>
          <h3 class="mt-2 text-lg leading-snug font-bold tracking-tight text-ink">
            <a href="/<?= e($slug) ?>/" class="after:absolute after:inset-0 focus-visible:outline-none"><?= e($post['title']) ?></a>
          </h3>
          <p class="mt-2 flex-1 text-[15px] leading-relaxed text-muted"><?= e($post['excerpt']) ?></p>
          <span class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-navy" aria-hidden="true">
            <span class="border-b border-navy/25 transition-[border-color] duration-300 group-hover:border-navy">Read more</span>
            <span class="transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:translate-x-1"><?= icon('arrow-right', 'size-4') ?></span>
          </span>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
