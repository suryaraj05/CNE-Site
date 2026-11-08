import '../css/app.css';
import Alpine from 'alpinejs';

// Forms post to the API URL in their `action` attribute, so the same markup
// still submits as a plain POST if JavaScript fails to load.
Alpine.data('apiForm', () => ({
  state: 'idle', // idle | sending | sent | error

  async submit() {
    const form = this.$root;
    this.state = 'sending';

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify({ ...Object.fromEntries(new FormData(form)), page: location.pathname }),
      });
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      if (form.dataset.success) {
        location.assign(form.dataset.success);
        return;
      }
      form.reset();
      this.state = 'sent';
    } catch {
      this.state = 'error';
    }
  },
}));

// Expects GET {action}/{reference} → { status, events: [{ date, location, description }] }.
Alpine.data('trackForm', () => ({
  state: 'idle', // idle | sending | found | notfound | error
  result: null,

  async submit() {
    const form = this.$root;
    const ref = String(new FormData(form).get('reference') ?? '').trim();
    this.state = 'sending';
    this.result = null;

    try {
      const res = await fetch(`${form.action}/${encodeURIComponent(ref)}`, { headers: { Accept: 'application/json' } });
      if (res.status === 404) {
        this.state = 'notfound';
        return;
      }
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      this.result = await res.json();
      this.state = 'found';
    } catch {
      this.state = 'error';
    }
  },
}));

window.Alpine = Alpine;
Alpine.start();

// Soft scroll reveals via [data-reveal].
(() => {
  document.documentElement.classList.add('js');
  const nodes = document.querySelectorAll('[data-reveal]');
  if (!nodes.length) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    nodes.forEach((el) => el.classList.add('is-visible'));
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    },
    { threshold: 0.08, rootMargin: '0px 0px -4% 0px' },
  );

  nodes.forEach((el) => io.observe(el));
})();
