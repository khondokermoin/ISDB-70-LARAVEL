/* ==========================================================================
   THE SIGNAL — main.js
   Vanilla JS only. No frameworks, no build step.
   ========================================================================== */
(function () {
  "use strict";

  /* ---------------------------------------------------------------------
     0. Utility helpers
  --------------------------------------------------------------------- */
  const $  = (sel, ctx) => (ctx || document).querySelector(sel);
  const $$ = (sel, ctx) => Array.from((ctx || document).querySelectorAll(sel));

  document.addEventListener("DOMContentLoaded", () => {
    initClock();
    initDarkMode();
    initScrollProgress();
    initStickyNavShadow();
    initBackToTop();
    initTickerClone();
    initBookmarksAndLikes();
    initShareButtons();
    initCopyLink();
    initPrintArticle();
    initToastDemoTriggers();
    initTrendingTabs();
    initCounters();
    initPollWidget();
    initNewsletterForms();
    initSearchToggle();
    initLoadMore();
    initRevealOnScroll();
    initReadingProgress();
    initRipple();
    initSkeletonSwap();
  });

  /* ---------------------------------------------------------------------
     1. Live date & time in top bar
  --------------------------------------------------------------------- */
  function initClock() {
    const el = $("#liveDateTime");
    if (!el) return;
    const fmt = () => {
      const now = new Date();
      const opts = { weekday: "short", year: "numeric", month: "short", day: "numeric" };
      const time = now.toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit" });
      el.textContent = `${now.toLocaleDateString("en-US", opts)} · ${time}`;
    };
    fmt();
    setInterval(fmt, 30000);
  }

  /* ---------------------------------------------------------------------
     2. Dark mode toggle (persisted)
  --------------------------------------------------------------------- */
  function initDarkMode() {
    const root = document.documentElement;
    const saved = localStorage.getItem("signal-theme");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    if (saved) root.setAttribute("data-theme", saved);
    else if (prefersDark) root.setAttribute("data-theme", "dark");

    $$(".dark-toggle").forEach((btn) => {
      btn.addEventListener("click", () => {
        const isDark = root.getAttribute("data-theme") === "dark";
        root.setAttribute("data-theme", isDark ? "light" : "dark");
        localStorage.setItem("signal-theme", isDark ? "light" : "dark");
      });
    });
  }

  /* ---------------------------------------------------------------------
     3. Scroll progress bar
  --------------------------------------------------------------------- */
  function initScrollProgress() {
    const bar = $("#scrollProgress");
    if (!bar) return;
    window.addEventListener("scroll", () => {
      const h = document.documentElement;
      const scrolled = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
      bar.style.width = scrolled + "%";
    }, { passive: true });
  }

  /* ---------------------------------------------------------------------
     4. Sticky nav shadow on scroll
  --------------------------------------------------------------------- */
  function initStickyNavShadow() {
    const nav = $(".main-nav");
    if (!nav) return;
    window.addEventListener("scroll", () => {
      nav.style.boxShadow = window.scrollY > 10 ? "var(--shadow-md)" : "var(--shadow-sm)";
    }, { passive: true });
  }

  /* ---------------------------------------------------------------------
     5. Back to top button
  --------------------------------------------------------------------- */
  function initBackToTop() {
    const btn = $("#backToTop");
    if (!btn) return;
    window.addEventListener("scroll", () => {
      btn.classList.toggle("show", window.scrollY > 500);
    }, { passive: true });
    btn.addEventListener("click", () => window.scrollTo({ top: 0, behavior: "smooth" }));
  }

  /* ---------------------------------------------------------------------
     6. Duplicate ticker content for a seamless infinite scroll loop
  --------------------------------------------------------------------- */
  function initTickerClone() {
    $$(".ticker-track, .breaking-marquee .track").forEach((track) => {
      track.innerHTML += track.innerHTML;
    });
  }

  /* ---------------------------------------------------------------------
     7. Bookmark & like toggle buttons
  --------------------------------------------------------------------- */
  function initBookmarksAndLikes() {
    $$(".bookmark-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        btn.classList.toggle("active");
        const icon = btn.querySelector("i");
        if (icon) icon.className = btn.classList.contains("active") ? "fa-solid fa-bookmark" : "fa-regular fa-bookmark";
        showToast(btn.classList.contains("active") ? "Saved to your reading list" : "Removed from reading list", "fa-bookmark");
      });
    });
    $$(".like-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        btn.classList.toggle("active");
        const icon = btn.querySelector("i");
        if (icon) icon.className = btn.classList.contains("active") ? "fa-solid fa-heart" : "fa-regular fa-heart";
        const countEl = btn.querySelector(".like-count");
        if (countEl) {
          let n = parseInt(countEl.textContent.replace(/[^\d]/g, ""), 10) || 0;
          n = btn.classList.contains("active") ? n + 1 : n - 1;
          countEl.textContent = n;
        }
      });
    });
  }

  /* ---------------------------------------------------------------------
     8. Share buttons — open share dialog (fallback: copy + toast)
  --------------------------------------------------------------------- */
  function initShareButtons() {
    $$(".share-btn").forEach((btn) => {
      btn.addEventListener("click", async (e) => {
        e.preventDefault();
        const url = window.location.href;
        if (navigator.share) {
          try { await navigator.share({ title: document.title, url }); } catch (err) { /* cancelled */ }
        } else {
          showToast("Share link copied to clipboard", "fa-share-nodes");
        }
      });
    });
  }

  /* ---------------------------------------------------------------------
     9. Copy link buttons
  --------------------------------------------------------------------- */
  function initCopyLink() {
    $$(".copy-link-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        navigator.clipboard?.writeText(window.location.href).catch(() => {});
        showToast("Link copied to clipboard", "fa-link");
      });
    });
  }

  /* ---------------------------------------------------------------------
     10. Print article
  --------------------------------------------------------------------- */
  function initPrintArticle() {
    $$(".print-btn").forEach((btn) => btn.addEventListener("click", (e) => { e.preventDefault(); window.print(); }));
  }

  /* ---------------------------------------------------------------------
     11. Toast notification system
  --------------------------------------------------------------------- */
  function showToast(message, icon) {
    let toast = $("#globalToast");
    if (!toast) {
      toast = document.createElement("div");
      toast.id = "globalToast";
      toast.className = "toast-custom";
      document.body.appendChild(toast);
    }
    toast.innerHTML = `<i class="fa-solid ${icon || 'fa-circle-check'}"></i><span>${message}</span>`;
    requestAnimationFrame(() => toast.classList.add("show"));
    clearTimeout(toast._timer);
    toast._timer = setTimeout(() => toast.classList.remove("show"), 2800);
  }
  window.showToast = showToast;

  function initToastDemoTriggers() {
    $$("[data-toast]").forEach((el) => {
      el.addEventListener("click", (e) => {
        e.preventDefault();
        showToast(el.getAttribute("data-toast"), el.getAttribute("data-toast-icon"));
      });
    });
  }

  /* ---------------------------------------------------------------------
     12. Trending / Most Read / Most Shared / Most Commented tabs
  --------------------------------------------------------------------- */
  function initTrendingTabs() {
    $$(".section-tabs").forEach((tabGroup) => {
      const buttons = $$("button", tabGroup);
      const panelWrap = tabGroup.closest(".section-head")?.parentElement;
      if (!panelWrap) return;
      const panels = $$("[data-tab-panel]", panelWrap);
      buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
          buttons.forEach((b) => b.classList.remove("active"));
          btn.classList.add("active");
          const target = btn.getAttribute("data-tab-target");
          panels.forEach((p) => p.classList.toggle("d-none", p.getAttribute("data-tab-panel") !== target));
        });
      });
    });
  }

  /* ---------------------------------------------------------------------
     13. Animated counters (IntersectionObserver)
  --------------------------------------------------------------------- */
  function initCounters() {
    const counters = $$("[data-count-to]");
    if (!counters.length) return;
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.getAttribute("data-count-to"), 10);
        const suffix = el.getAttribute("data-suffix") || "";
        let cur = 0;
        const step = Math.max(1, Math.ceil(target / 60));
        const tick = () => {
          cur = Math.min(target, cur + step);
          el.textContent = cur.toLocaleString() + suffix;
          if (cur < target) requestAnimationFrame(tick);
        };
        tick();
        io.unobserve(el);
      });
    }, { threshold: 0.4 });
    counters.forEach((c) => io.observe(c));
  }

  /* ---------------------------------------------------------------------
     14. Poll widget — click to vote (client-side demo only)
  --------------------------------------------------------------------- */
  function initPollWidget() {
    const poll = $(".poll-widget");
    if (!poll) return;
    const options = $$(".poll-option-btn", poll);
    let voted = false;
    options.forEach((btn) => {
      btn.addEventListener("click", () => {
        if (voted) return;
        voted = true;
        options.forEach((b) => b.setAttribute("disabled", "true"));
        showToast("Thanks — your vote has been counted", "fa-square-poll-vertical");
      });
    });
  }

  /* ---------------------------------------------------------------------
     15. Newsletter forms — fake submit + toast
  --------------------------------------------------------------------- */
  function initNewsletterForms() {
    $$(".newsletter-form").forEach((form) => {
      form.addEventListener("submit", (e) => {
        e.preventDefault();
        const input = $("input[type=email]", form);
        if (input && input.value) {
          showToast("Subscribed! Check your inbox to confirm.", "fa-envelope-circle-check");
          form.reset();
        }
      });
    });
  }

  /* ---------------------------------------------------------------------
     16. Search box expand (mobile icon trigger)
  --------------------------------------------------------------------- */
  function initSearchToggle() {
    const trigger = $("#searchToggle");
    const box = $(".masthead-search");
    if (!trigger || !box) return;
    trigger.addEventListener("click", () => {
      box.classList.toggle("d-none");
      if (!box.classList.contains("d-none")) $("input", box)?.focus();
    });
  }

  /* ---------------------------------------------------------------------
     17. Load more / infinite-scroll-style button with skeleton preview
  --------------------------------------------------------------------- */
  function initLoadMore() {
    $$(".load-more-btn").forEach((btn) => {
      btn.addEventListener("click", () => {
        const grid = document.querySelector(btn.getAttribute("data-target"));
        if (!grid) return;
        btn.disabled = true;
        btn.textContent = "Loading…";
        setTimeout(() => {
          const clones = $$(".news-card", grid).slice(0, 3);
          clones.forEach((c) => {
            const clone = c.cloneNode(true);
            clone.classList.add("fade-up");
            grid.appendChild(clone.closest(".col") || clone);
          });
          initBookmarksAndLikes();
          initShareButtons();
          initRevealOnScroll();
          btn.disabled = false;
          btn.textContent = "Load more stories";
        }, 700);
      });
    });
  }

  /* ---------------------------------------------------------------------
     18. Scroll-reveal for cards/sections
  --------------------------------------------------------------------- */
  function initRevealOnScroll() {
    const items = $$(".fade-up:not(.in-view)");
    if (!items.length) return;
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("in-view");
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    items.forEach((i) => io.observe(i));
  }

  /* ---------------------------------------------------------------------
     19. Article reading progress bar (single.html)
  --------------------------------------------------------------------- */
  function initReadingProgress() {
    const bar = $("#readingProgressBar");
    const article = $(".article-body");
    if (!bar || !article) return;
    window.addEventListener("scroll", () => {
      const rect = article.getBoundingClientRect();
      const total = rect.height - window.innerHeight;
      const scrolled = Math.min(Math.max(-rect.top, 0), total);
      bar.style.width = (total > 0 ? (scrolled / total) * 100 : 0) + "%";
    }, { passive: true });
  }

  /* ---------------------------------------------------------------------
     20. Ripple effect on .ripple buttons
  --------------------------------------------------------------------- */
  function initRipple() {
    $$(".ripple").forEach((el) => {
      el.addEventListener("click", function (e) {
        const rect = this.getBoundingClientRect();
        const circle = document.createElement("span");
        const size = Math.max(rect.width, rect.height);
        circle.className = "ripple-circle";
        circle.style.width = circle.style.height = size + "px";
        circle.style.left = (e.clientX - rect.left - size / 2) + "px";
        circle.style.top = (e.clientY - rect.top - size / 2) + "px";
        this.appendChild(circle);
        setTimeout(() => circle.remove(), 650);
      });
    });
  }

  /* ---------------------------------------------------------------------
     21. Skeleton loading swap on first paint (simulated fetch)
  --------------------------------------------------------------------- */
  function initSkeletonSwap() {
    const skeletons = $$(".skeleton-wrap");
    if (!skeletons.length) return;
    setTimeout(() => {
      skeletons.forEach((s) => {
        s.querySelector(".skeleton-state")?.classList.add("d-none");
        s.querySelector(".content-state")?.classList.remove("d-none");
      });
    }, 900);
  }
})();
