    <section<?= section_id($s) ?> class="mx-auto max-w-3xl scroll-mt-28 px-6">
      <div class="rounded-2xl border border-line bg-white p-6 shadow-[0_24px_48px_-28px_rgba(23,43,117,0.28)] sm:p-8">
        <form x-data="trackForm" @submit.prevent="submit" action="<?= e(API_BASE_URL) ?>/tracking" method="get">
          <label for="track-ref" class="field-label">Tracking, AWB or booking reference</label>
          <div class="flex flex-col gap-3 sm:flex-row">
            <input id="track-ref" name="reference" type="text" required autocomplete="off" placeholder="e.g. 176-12345678" class="field">
            <button type="submit" :disabled="state === 'sending'" class="inline-flex h-11 shrink-0 items-center justify-center gap-2 rounded-lg bg-navy px-6 text-[15px] font-semibold text-white transition-colors hover:bg-navy-700 disabled:opacity-70">
              <?= icon('search', 'size-4') ?> <span x-text="state === 'sending' ? 'Searching…' : 'Track'">Track</span>
            </button>
          </div>

          <p role="status" aria-live="polite" class="mt-4 text-sm empty:hidden"
             :class="state === 'error' || state === 'notfound' ? 'text-red-600' : 'text-muted'"
             x-text="state === 'notfound' ? 'We couldn’t find that reference. Check it and try again, or contact us.' : state === 'error' ? 'Tracking is unavailable right now. Please call or email us.' : ''"></p>

          <div x-show="state === 'found'" x-cloak class="mt-8 border-t border-line pt-6">
            <p class="text-xs font-semibold tracking-[0.14em] text-muted uppercase">Status</p>
            <p class="mt-1 text-xl font-bold text-ink" x-text="result?.status"></p>
            <ol class="mt-6 space-y-5 border-l border-line pl-6">
              <template x-for="ev in (result?.events || [])">
                <li class="relative">
                  <span class="absolute top-1.5 -left-[29px] size-2.5 rounded-full bg-navy ring-4 ring-white"></span>
                  <p class="text-sm font-semibold text-ink" x-text="ev.description"></p>
                  <p class="text-xs text-muted" x-text="[ev.location, ev.date].filter(Boolean).join(' · ')"></p>
                </li>
              </template>
            </ol>
          </div>
        </form>
      </div>
    </section>
