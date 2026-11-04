    <section class="mx-auto max-w-6xl px-6">
      <div class="rounded-2xl bg-navy px-7 py-14 text-center sm:px-12 sm:py-16">
        <h2 class="text-3xl font-bold tracking-[-0.025em] text-balance text-white sm:text-4xl"><?= e($s['title'] ?? 'Ready to move your cargo?') ?></h2>
        <p class="mx-auto mt-4 max-w-xl text-[17px] leading-relaxed text-blue-100"><?= e($s['text'] ?? 'Send us your shipment details and we’ll come back with a clear, no-obligation quote.') ?></p>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
          <a href="/request-a-quote/" class="inline-flex h-12 items-center rounded-lg bg-white px-6 text-[15px] font-semibold text-navy transition-colors hover:bg-blue-50">Get a quote</a>
          <a href="tel:<?= e(PHONE_E164) ?>" class="inline-flex h-12 items-center rounded-lg border border-white/30 px-6 text-[15px] font-semibold text-white transition-colors hover:bg-white/10">Call <?= e(PHONE_DISPLAY) ?></a>
        </div>
      </div>
    </section>
