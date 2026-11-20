    <section<?= section_id($s) ?> class="shell max-w-3xl scroll-mt-28">
      <div<?= reveal('up') ?> class="card-surface p-6 sm:p-8">
        <form x-data="trackForm" @submit.prevent="submit" action="<?= e(API_BASE_URL) ?>/tracking" method="get">
          <label for="track-ref" class="field-label">Tracking, AWB or booking reference</label>
          <div class="flex flex-col gap-3 sm:flex-row">
            <input id="track-ref" name="reference" type="text" required autocomplete="off" placeholder="e.g. 176-12345678" class="field">
            <button type="submit" :disabled="state === 'sending'" class="btn btn-primary btn-sm shrink-0 sm:h-12 sm:px-6">
              <?= icon('search', 'size-4') ?> <span x-text="state === 'sending' ? 'Searching…' : 'Track'">Track</span>
            </button>
          </div>

          <p role="status" aria-live="polite" class="mt-4 text-sm empty:hidden"
             :class="state === 'error' || state === 'notfound' ? 'text-navy-700' : 'text-muted'"
             x-text="state === 'notfound' ? 'We couldn’t find that reference. Check it and try again, or contact us.' : state === 'error' ? 'Tracking is unavailable right now. Please call or email us.' : ''"></p>

          <div x-show="state === 'found'" x-cloak class="mt-8 border-t border-line pt-6">
            <p class="text-xs font-semibold tracking-[0.14em] text-muted uppercase">Status</p>
            <p class="mt-1 text-xl font-bold text-ink" x-text="result?.status"></p>
            <ol class="mt-6 space-y-5 border-l border-line pl-6">
              <template x-for="ev in (result?.events || [])">
                <li class="relative">
                  <span class="absolute top-1.5 -left-[29px] size-2.5 rounded-full bg-lime ring-4 ring-white"></span>
                  <p class="text-sm font-semibold text-ink" x-text="ev.description"></p>
                  <p class="text-xs text-muted" x-text="[ev.location, ev.date].filter(Boolean).join(' · ')"></p>
                </li>
              </template>
            </ol>
          </div>
        </form>
      </div>
    </section>
