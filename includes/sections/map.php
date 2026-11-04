<?php $q = $s['query'] ?? 'Airport Freightway, Newcastle upon Tyne ' . ADDRESS['postcode']; ?>
    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6"<?= empty($s['title']) ? ' aria-label="Map"' : '' ?>>
      <?php section_heading($s); ?>
      <div class="<?= empty($s['title']) ? '' : 'mt-10' ?> overflow-hidden rounded-2xl border border-line bg-mist">
        <iframe src="https://www.google.com/maps?q=<?= e(urlencode($q)) ?>&amp;output=embed" title="<?= e($s['label'] ?? 'Map showing our Newcastle office') ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen class="block h-[360px] w-full sm:h-[440px]"></iframe>
      </div>
    </section>
