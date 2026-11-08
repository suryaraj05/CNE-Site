    <section class="relative overflow-hidden bg-ink">
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_80%_70%_at_85%_110%,rgba(58,86,176,0.55),transparent_55%),radial-gradient(ellipse_60%_50%_at_0%_-10%,rgba(255,255,255,0.12),transparent_50%),linear-gradient(160deg,rgba(26,31,46,1)_0%,rgba(26,45,110,0.95)_55%,rgba(36,62,149,0.9)_100%)]"></div>
      <div<?= reveal('up') ?> class="relative mx-auto max-w-3xl px-6 py-20 text-center sm:py-24 lg:px-10">
        <h2 class="font-serif text-[2.1rem] leading-tight tracking-[-0.02em] text-balance text-white sm:text-5xl"><?= e($s['title'] ?? 'Ready to move your cargo?') ?></h2>
        <p class="mx-auto mt-5 max-w-xl text-lg leading-relaxed text-white/85"><?= e($s['text'] ?? 'Send us your shipment details and we’ll come back with a clear, no-obligation quote.') ?></p>
        <div class="mt-9 flex flex-wrap items-center justify-center gap-3">
          <a href="/request-a-quote/" class="btn btn-on-dark">Get a quote</a>
          <a href="tel:<?= e(PHONE_E164) ?>" class="btn btn-ghost">Call <?= e(PHONE_DISPLAY) ?></a>
        </div>
      </div>
    </section>
