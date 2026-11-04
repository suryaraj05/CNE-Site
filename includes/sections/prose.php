    <section<?= section_id($s) ?> class="mx-auto max-w-6xl scroll-mt-28 px-6">
      <div class="max-w-3xl">
        <?php section_heading($s); ?>
        <div class="prose-cne <?= !empty($s['title']) ? 'mt-6' : '' ?>">
<?= $s['html'] ?>
        </div>
      </div>
    </section>
