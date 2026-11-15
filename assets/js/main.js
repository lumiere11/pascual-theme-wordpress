/* Pascual Mejorado — JS sin dependencias */
(function () {
	'use strict';
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* Cabecera pegajosa: sombra al hacer scroll */
	var header = document.querySelector('.site-header');
	if (header) {
		var onScroll = function () { header.classList.toggle('is-stuck', window.scrollY > 8); };
		onScroll();
		window.addEventListener('scroll', onScroll, { passive: true });
	}

	/* Modo claro / oscuro: el <head> ya puso data-theme; aquí va el botón */
	var root = document.documentElement;
	var themeBtn = document.querySelector('[data-theme-toggle]');
	if (themeBtn) {
		var KEY = 'pascual-theme';
		var mq = window.matchMedia('(prefers-color-scheme: dark)');
		var stored = function () { try { return localStorage.getItem(KEY); } catch (e) { return null; } };
		var applyTheme = function (t) {
			root.setAttribute('data-theme', t);
			themeBtn.setAttribute('aria-label', t === 'dark' ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro');
		};
		applyTheme(root.getAttribute('data-theme') === 'dark' ? 'dark' : 'light');
		themeBtn.hidden = false;
		themeBtn.addEventListener('click', function () {
			var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
			applyTheme(next);
			try { localStorage.setItem(KEY, next); } catch (e) { /* sin almacenamiento: dura solo esta página */ }
		});
		/* Sin elección guardada, sigue al dispositivo si cambia */
		var follow = function (e) { if (!stored()) { applyTheme(e.matches ? 'dark' : 'light'); } };
		if (mq.addEventListener) { mq.addEventListener('change', follow); } else if (mq.addListener) { mq.addListener(follow); }
	}

	/* Menú móvil + submenús */
	var toggle = document.querySelector('.nav-toggle');
	var nav = document.getElementById('menu-principal');
	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			var open = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && nav.classList.contains('is-open')) {
				nav.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
				toggle.focus();
			}
		});
		nav.querySelectorAll('.menu-item-has-children').forEach(function (li) {
			var link = li.querySelector(':scope > a');
			var btn = document.createElement('button');
			btn.type = 'button';
			btn.className = 'submenu-toggle';
			btn.setAttribute('aria-expanded', 'false');
			btn.setAttribute('aria-label', 'Abrir submenú de ' + (link ? link.textContent.trim() : ''));
			btn.addEventListener('click', function () {
				var open = li.classList.toggle('is-open');
				btn.setAttribute('aria-expanded', open ? 'true' : 'false');
			});
			if (link) { link.after(btn); }
		});
		nav.addEventListener('click', function (e) {
			if (e.target.closest('a[href^="#"], a[href*="/#"]') && window.innerWidth <= 900) {
				nav.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
			}
		});
	}

	/* Carrusel de marcas */
	var hero = document.querySelector('[data-hero]');
	if (hero) {
		var slides = Array.prototype.slice.call(hero.querySelectorAll('.slide'));
		var dots = Array.prototype.slice.call(hero.querySelectorAll('.dot'));
		var idx = 0, timer = null, paused = reduce, userPaused = reduce;
		var pauseBtn = hero.querySelector('[data-pause]');

		var show = function (n) {
			idx = (n + slides.length) % slides.length;
			slides.forEach(function (s, i) {
				var on = i === idx;
				s.classList.toggle('is-active', on);
				s.setAttribute('aria-hidden', on ? 'false' : 'true');
				var a = s.querySelector('a');
				if (a) { a.tabIndex = on ? 0 : -1; }
			});
			dots.forEach(function (d, i) {
				d.classList.toggle('is-active', i === idx);
				d.setAttribute('aria-selected', i === idx ? 'true' : 'false');
			});
			hero.style.setProperty('--hero-bg', slides[idx].dataset.bg);
			hero.style.setProperty('--hero-fg', slides[idx].dataset.fg);
		};
		var stop = function () { if (timer) { clearInterval(timer); timer = null; } };
		var start = function () {
			stop();
			if (!paused && !userPaused) { timer = setInterval(function () { show(idx + 1); }, 6500); }
		};
		var go = function (n) { show(n); start(); };

		hero.querySelector('[data-prev]').addEventListener('click', function () { go(idx - 1); });
		hero.querySelector('[data-next]').addEventListener('click', function () { go(idx + 1); });
		dots.forEach(function (d, i) { d.addEventListener('click', function () { go(i); }); });
		hero.addEventListener('mouseenter', function () { paused = true; stop(); });
		hero.addEventListener('mouseleave', function () { paused = false; start(); });
		hero.addEventListener('focusin', function () { paused = true; stop(); });
		hero.addEventListener('focusout', function () { paused = false; start(); });
		if (pauseBtn) {
			pauseBtn.setAttribute('aria-pressed', userPaused ? 'true' : 'false');
			pauseBtn.addEventListener('click', function () {
				userPaused = !userPaused;
				pauseBtn.setAttribute('aria-pressed', userPaused ? 'true' : 'false');
				pauseBtn.textContent = userPaused ? '▶' : '❚❚';
				pauseBtn.setAttribute('aria-label', userPaused ? 'Reanudar carrusel' : 'Pausar carrusel');
				start();
			});
		}
		/* Deslizar en pantallas táctiles */
		var x0 = null;
		hero.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
		hero.addEventListener('touchend', function (e) {
			if (x0 === null) { return; }
			var dx = e.changedTouches[0].clientX - x0;
			if (Math.abs(dx) > 50) { go(idx + (dx < 0 ? 1 : -1)); }
			x0 = null;
		}, { passive: true });
		start();
	}

		/* Galería: visor ampliado */
	var box = document.querySelector('[data-lightbox]');
	if (box && typeof box.showModal === 'function') {
		var img = box.querySelector('img');
		document.querySelectorAll('.gallery__item').forEach(function (b) {
			b.addEventListener('click', function () {
				img.src = b.dataset.full;
				img.alt = b.dataset.alt || '';
				box.showModal();
			});
		});
		box.querySelector('[data-close]').addEventListener('click', function () { box.close(); });
		box.addEventListener('click', function (e) { if (e.target === box) { box.close(); } });
	}
})();

/* Páginas de producto: pestañas de presentaciones y selector de sabores */
(function () {
	'use strict';
	var tabs = document.querySelector('[data-tabs]');
	var panels = Array.prototype.slice.call(document.querySelectorAll('[data-panel]'));
	if (tabs && panels.length > 1) {
		var btns = Array.prototype.slice.call(tabs.querySelectorAll('.tab'));
		var select = function (n, focus) {
			btns.forEach(function (b, i) {
				var on = i === n;
				b.classList.toggle('is-active', on);
				b.setAttribute('aria-selected', on ? 'true' : 'false');
				b.tabIndex = on ? 0 : -1;
				panels[i].hidden = !on;
			});
			if (focus) { btns[n].focus(); }
		};
		btns.forEach(function (b, i) {
			b.addEventListener('click', function () { select(i); });
			b.addEventListener('keydown', function (e) {
				if (e.key === 'ArrowRight') { e.preventDefault(); select((i + 1) % btns.length, true); }
				if (e.key === 'ArrowLeft') { e.preventDefault(); select((i - 1 + btns.length) % btns.length, true); }
			});
		});
		select(0);
	}
	panels.forEach(function (panel) {
		var main = panel.querySelector('[data-main]');
		var picks = Array.prototype.slice.call(panel.querySelectorAll('.chip--pick'));
		picks.forEach(function (chip) {
			chip.addEventListener('click', function () {
				var was = chip.getAttribute('aria-pressed') === 'true';
				picks.forEach(function (c) { c.setAttribute('aria-pressed', 'false'); });
				var src = was ? main.dataset.default : chip.dataset.img;
				if (!was) { chip.setAttribute('aria-pressed', 'true'); }
				main.classList.add('is-swap');
				setTimeout(function () {
					main.src = src;
					main.alt = was ? main.alt : chip.dataset.alt;
					main.classList.remove('is-swap');
				}, 180);
			});
		});
	});
})();
