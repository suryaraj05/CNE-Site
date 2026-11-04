<?php $posts = array_slice(load_posts(), 0, $s['limit'] ?? null, true); ?>
    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <?php section_heading($s); ?>
      <ul class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
<?php foreach ($posts as $slug => $post): $time = strtotime($post['date']); ?>
        <li class="group relative flex flex-col overflow-hidden rounded-2xl border border-line bg-white transition-[border-color,box-shadow] duration-200 hover:border-navy/25 hover:shadow-[0_16px_40px_-24px_rgba(23,43,117,0.35)]">
<?php if (!empty($post['image'])): ?>
          <div class="relative">
            <?= img_tag($post['image'], 'aspect-[16/10] w-full object-cover') ?>
            <span class="absolute top-4 left-4 flex flex-col items-center rounded-lg bg-navy px-2.5 py-1.5 text-white" aria-hidden="true"><span class="text-lg leading-none font-bold"><?= date('d', $time) ?></span><span class="mt-0.5 text-[10px] font-semibold tracking-widest uppercase"><?= date('M', $time) ?></span></span>
          </div>
<?php endif; ?>
          <div class="flex flex-1 flex-col p-7">
            <p class="flex flex-wrap items-center gap-x-2 text-xs font-semibold tracking-[0.14em] text-navy uppercase">
              <time datetime="<?= e($post['date']) ?>"><?= e(date('j M Y', $time)) ?></time>
<?php if (!empty($post['category'])): ?>
              <span aria-hidden="true" class="text-slate-300">/</span><span class="text-muted"><?= e($post['category']) ?></span>
<?php endif; ?>
            </p>
            <h3 class="mt-3 text-lg leading-snug font-bold tracking-tight text-ink">
              <a href="/<?= e($slug) ?>/" class="after:absolute after:inset-0 after:rounded-2xl"><?= e($post['title']) ?></a>
            </h3>
            <p class="mt-2 text-sm leading-relaxed text-muted"><?= e($post['excerpt']) ?></p>
            <span class="mt-auto flex items-center gap-1.5 pt-5 text-sm font-semibold text-navy" aria-hidden="true">Read more <span class="transition-transform duration-200 group-hover:translate-x-0.5"><?= icon('arrow-right', 'size-4') ?></span></span>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
    </section>
