/* Asplund Eltjänst — progressive enhancement only; the site works without JS. */
(function () {
  'use strict';
  var d = document;

  /* ---- mobile nav ---- */
  var toggle = d.querySelector('.nav-toggle');
  if (toggle) {
    toggle.addEventListener('click', function () {
      var open = d.body.classList.toggle('nav-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Stäng menyn' : 'Öppna menyn');
    });
  }

  /* ---- dropdowns (click/tap; hover handled in CSS on desktop) ---- */
  var triggers = d.querySelectorAll('.nav-trigger');
  triggers.forEach(function (btn) {
    btn.addEventListener('click', function (ev) {
      ev.stopPropagation();
      var item = btn.parentElement;
      var open = !item.classList.contains('is-open');
      d.querySelectorAll('.nav-item.is-open').forEach(function (i) {
        i.classList.remove('is-open');
        var b = i.querySelector('.nav-trigger');
        if (b) b.setAttribute('aria-expanded', 'false');
      });
      item.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });
  d.addEventListener('click', function (ev) {
    if (!ev.target.closest('.nav-item')) {
      d.querySelectorAll('.nav-item.is-open').forEach(function (i) {
        i.classList.remove('is-open');
        var b = i.querySelector('.nav-trigger');
        if (b) b.setAttribute('aria-expanded', 'false');
      });
    }
  });
  d.addEventListener('keydown', function (ev) {
    if (ev.key === 'Escape') {
      d.querySelectorAll('.nav-item.is-open').forEach(function (i) { i.classList.remove('is-open'); });
      if (d.body.classList.contains('nav-open') && toggle) toggle.click();
    }
  });

  /* ---- header shadow on scroll ---- */
  var hdr = d.querySelector('.hdr');
  var onScroll = function () { if (hdr) hdr.classList.toggle('is-scrolled', window.scrollY > 8); };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---- attribution: first touch kept 90 days ---- */
  var KEY = 'ae_attr';
  var params = new URLSearchParams(location.search);
  var fields = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid'];
  var attr = null;
  try { attr = JSON.parse(localStorage.getItem(KEY) || 'null'); } catch (e) { attr = null; }
  if (attr && attr.exp < Date.now()) attr = null;
  var fresh = {};
  fields.forEach(function (f) { if (params.get(f)) fresh[f] = params.get(f).slice(0, 200); });
  if (!attr && (Object.keys(fresh).length || (d.referrer && d.referrer.indexOf(location.host) === -1))) {
    attr = { v: fresh, ref: d.referrer ? d.referrer.slice(0, 500) : '', exp: Date.now() + 90 * 864e5 };
    try { localStorage.setItem(KEY, JSON.stringify(attr)); } catch (e) { /* private mode */ }
  }

  /* ---- lead forms ---- */
  var loaded = Date.now();
  d.querySelectorAll('form[data-lead]').forEach(function (form) {
    var set = function (name, val) { var el = form.elements[name]; if (el && val) el.value = val; };
    if (attr) {
      fields.forEach(function (f) { set(f, attr.v[f]); });
      set('referrer', attr.ref);
    }
    fields.forEach(function (f) { set(f, fresh[f]); });
    var started = false;
    form.addEventListener('input', function () {
      if (!started) { started = true; track('form_start'); }
    });
    form.addEventListener('submit', function () {
      set('t', String(loaded));
      var btn = form.querySelector('button[type=submit]');
      if (btn) { btn.disabled = true; btn.classList.add('is-loading'); }
      track('form_submit');
    });
  });

  /* ---- analytics (only after consent, only when GA4_ID is configured) ---- */
  function track(name, params) {
    if (window.gtag) window.gtag('event', name, params || {});
  }
  d.addEventListener('click', function (ev) {
    var a = ev.target.closest('[data-ev]');
    if (a) track(a.getAttribute('data-ev'), { link_url: a.getAttribute('href') });
  });

  function loadGA() {
    if (!window.GA4_ID || window.gtag) return;
    var s = d.createElement('script');
    s.async = true;
    s.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(window.GA4_ID);
    d.head.appendChild(s);
    window.dataLayer = window.dataLayer || [];
    window.gtag = function () { window.dataLayer.push(arguments); };
    window.gtag('js', new Date());
    window.gtag('config', window.GA4_ID);
    if (d.body.classList.contains('is-thanks')) {
      window.gtag('event', 'generate_lead');
      if (window.ADS_SEND_TO) window.gtag('event', 'conversion', { send_to: window.ADS_SEND_TO });
    }
  }
  var banner = d.getElementById('consent');
  if (banner && window.GA4_ID) {
    var choice = null;
    try { choice = localStorage.getItem('ae_consent'); } catch (e) { choice = null; }
    if (choice === 'grant') loadGA();
    else if (choice !== 'deny') banner.hidden = false;
    banner.addEventListener('click', function (ev) {
      var b = ev.target.closest('[data-consent]');
      if (!b) return;
      var v = b.getAttribute('data-consent');
      try { localStorage.setItem('ae_consent', v); } catch (e) { /* ignore */ }
      banner.hidden = true;
      if (v === 'grant') loadGA();
    });
  }
})();
