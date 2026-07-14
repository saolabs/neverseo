document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.site-header');
    const hero = document.querySelector('.hero-studio');

    /* ---------------------------------------------------------------
       Header trong suốt khi ở đỉnh trang (chỉ áp dụng ở trang có hero)
    --------------------------------------------------------------- */
    if (hero && header) {
        const applyScrollState = function () {
            if (window.scrollY > 50) {
                header.classList.remove('header-transparent');
                header.classList.add('header-scrolled');
            } else {
                header.classList.add('header-transparent');
                header.classList.remove('header-scrolled');
            }
        };
        applyScrollState();
        window.addEventListener('scroll', applyScrollState, { passive: true });
    } else if (header) {
        header.classList.add('header-scrolled');
    }

    /* ---------------------------------------------------------------
       Menu mobile — panel trượt từ phải + backdrop + khóa scroll
    --------------------------------------------------------------- */
    const toggle = document.querySelector('.site-mobile-toggle');
    const menu = document.getElementById('site-menu');
    const backdrop = document.querySelector('.site-menu-backdrop');
    const closeBtn = document.querySelector('.site-menu-close');

    if (toggle && header && menu) {
        const toggleIcon = toggle.querySelector('i');

        const closeMenu = function () {
            header.classList.remove('menu-open');
            document.body.classList.remove('menu-locked');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Mở menu');
            if (toggleIcon) { toggleIcon.classList.remove('ph-x'); toggleIcon.classList.add('ph-list'); }
            if (backdrop) {
                backdrop.classList.remove('is-visible');
                // ẩn hẳn sau khi hết animation để không chặn click
                window.setTimeout(function () {
                    if (!header.classList.contains('menu-open')) backdrop.hidden = true;
                }, 300);
            }
        };

        const openMenu = function () {
            header.classList.add('menu-open');
            document.body.classList.add('menu-locked');
            toggle.setAttribute('aria-expanded', 'true');
            toggle.setAttribute('aria-label', 'Đóng menu');
            if (toggleIcon) { toggleIcon.classList.remove('ph-list'); toggleIcon.classList.add('ph-x'); }
            if (backdrop) {
                backdrop.hidden = false;
                // ép reflow để transition chạy
                void backdrop.offsetWidth;
                backdrop.classList.add('is-visible');
            }
        };

        toggle.addEventListener('click', function () {
            if (header.classList.contains('menu-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        if (backdrop) backdrop.addEventListener('click', closeMenu);

        // Bấm vào liên kết trong menu -> đóng
        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        // Esc -> đóng
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && header.classList.contains('menu-open')) closeMenu();
        });

        // Phóng to qua breakpoint desktop -> đảm bảo đóng
        window.addEventListener('resize', function () {
            if (window.innerWidth > 1080 && header.classList.contains('menu-open')) closeMenu();
        });
    }

    /* ---------------------------------------------------------------
       Đánh dấu mục nav đang xem (scroll spy)
    --------------------------------------------------------------- */
    const navLinks = Array.prototype.slice.call(document.querySelectorAll('.site-nav a[href*="#"], .site-header-row a.site-logo[href*="#"]'));
    const sections = navLinks
        .map(function (link) {
            const id = link.getAttribute('href').split('#')[1];
            return id ? document.getElementById(id) : null;
        })
        .filter(Boolean);

    if (sections.length && 'IntersectionObserver' in window) {
        const spy = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    navLinks.forEach(function (link) {
                        link.classList.toggle('is-active', link.getAttribute('href').indexOf('#' + id) !== -1);
                    });
                }
            });
        }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });

        sections.forEach(function (section) { spy.observe(section); });
    }

    /* ---------------------------------------------------------------
       Form Liên hệ — gửi qua API mail
    --------------------------------------------------------------- */
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        const submitBtn = document.getElementById('contactSubmit');
        const errorEl = document.getElementById('contactError');
        const successEl = document.getElementById('contactSuccess');
        const el = contactForm.elements;
        const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const showError = function (msg) {
            if (!errorEl) return;
            errorEl.textContent = msg;
            errorEl.hidden = false;
        };

        contactForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            if (errorEl) errorEl.hidden = true;

            const name = el['name'].value.trim();
            const email = el['email'].value.trim();
            const company = el['company'].value.trim();
            const message = el['message'].value.trim();

            if (!name || !email || !message) { showError('Vui lòng điền đầy đủ Họ tên, Email và Nội dung.'); return; }
            if (!emailRe.test(email)) { showError('Email chưa hợp lệ, vui lòng kiểm tra lại.'); return; }

            const originalHTML = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Đang gửi...';

            try {
                const res = await fetch('https://m-ai.vcc.vn/api/mail/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: 'support@neverseo.com',
                        subject: 'Liên hệ từ website NeverSEO — ' + name,
                        message: 'Một khách hàng vừa gửi liên hệ qua website NeverSEO:\n\n{data}',
                        labels: { name: 'Họ và tên', email: 'Email', company: 'Công ty / Website', message: 'Nội dung' },
                        data: { name: name, email: email, company: company || 'Không có', message: message }
                    })
                });
                const result = await res.json();
                if (result.status === true || result.success === true) {
                    contactForm.hidden = true;
                    if (successEl) successEl.hidden = false;
                } else {
                    showError('Có lỗi xảy ra khi gửi. Vui lòng thử lại hoặc gọi 0946 786 960.');
                }
            } catch (_err) {
                showError('Không thể kết nối máy chủ. Vui lòng thử lại hoặc gọi 0946 786 960.');
            }

            submitBtn.disabled = false;
            submitBtn.innerHTML = originalHTML;
        });
    }

    /* ---------------------------------------------------------------
       Slider bảng giá — nút điều hướng + hỗ trợ vuốt/snap tự nhiên
    --------------------------------------------------------------- */
    document.querySelectorAll('[data-pricing-slider]').forEach(function (slider) {
        const track = slider.querySelector('[data-pricing-track]');
        const prevBtn = slider.querySelector('[data-pricing-prev]');
        const nextBtn = slider.querySelector('[data-pricing-next]');
        if (!track || !prevBtn || !nextBtn) return;

        const getStep = function () {
            const card = track.querySelector('.price-card');
            if (!card) return track.clientWidth;
            const styles = window.getComputedStyle(track);
            const gap = parseFloat(styles.columnGap || styles.gap || '0') || 0;
            return card.getBoundingClientRect().width + gap;
        };

        const updateNav = function () {
            const maxScroll = track.scrollWidth - track.clientWidth;
            const canScroll = maxScroll > 2;
            prevBtn.disabled = !canScroll || track.scrollLeft <= 2;
            nextBtn.disabled = !canScroll || track.scrollLeft >= maxScroll - 2;
        };

        const scrollByStep = function (direction) {
            track.scrollBy({ left: getStep() * direction, behavior: 'smooth' });
        };

        prevBtn.addEventListener('click', function () { scrollByStep(-1); });
        nextBtn.addEventListener('click', function () { scrollByStep(1); });

        let scrollFrame = null;
        track.addEventListener('scroll', function () {
            if (scrollFrame) return;
            scrollFrame = window.requestAnimationFrame(function () {
                scrollFrame = null;
                updateNav();
            });
        }, { passive: true });

        window.addEventListener('resize', updateNav);
        updateNav();
        window.setTimeout(updateNav, 250);
    });

    /* ---------------------------------------------------------------
       Cuộn mượt cho liên kết neo trong trang (menu, nút, footer)
    --------------------------------------------------------------- */
    const HEADER_OFFSET = 84;
    document.querySelectorAll('a[href*="#"]').forEach(function (link) {
        const raw = link.getAttribute('href') || '';
        const hashIndex = raw.indexOf('#');
        const id = hashIndex >= 0 ? raw.slice(hashIndex + 1) : '';
        if (!id) return;
        link.addEventListener('click', function (e) {
            const target = document.getElementById(id);
            if (!target) return; // khác trang -> để trình duyệt điều hướng
            e.preventDefault();
            const y = target.getBoundingClientRect().top + window.pageYOffset - HEADER_OFFSET;
            window.scrollTo({ top: y, behavior: 'smooth' });
            if (history.pushState) history.pushState(null, '', '#' + id);
        });
    });

    /* ---------------------------------------------------------------
       Form đăng ký bản tin — cùng endpoint với form liên hệ, khác data
    --------------------------------------------------------------- */
    const subEmailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    document.querySelectorAll('.footer-subscribe-form').forEach(function (form) {
        const input = form.querySelector('input[type="email"]');
        const btn = form.querySelector('button');
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const email = (input ? input.value : '').trim();
            if (!subEmailRe.test(email)) { if (input) input.focus(); return; }

            const original = btn ? btn.innerHTML : '';
            if (btn) { btn.disabled = true; btn.innerHTML = 'Đang gửi...'; }

            try {
                const res = await fetch('https://m-ai.vcc.vn/api/mail/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: 'support@neverseo.com',
                        subject: 'Đăng ký nhận bản tin NeverSEO — ' + email,
                        message: 'Một người vừa đăng ký nhận bản tin qua website NeverSEO:\n\n{data}',
                        labels: { email: 'Email đăng ký' },
                        data: { email: email }
                    })
                });
                const result = await res.json();
                if (result.status === true || result.success === true) {
                    form.innerHTML = '<p class="subscribe-done"><i class="ph-fill ph-check-circle" aria-hidden="true"></i> Đã đăng ký! Cảm ơn bạn.</p>';
                } else {
                    if (btn) { btn.disabled = false; btn.innerHTML = original; }
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            } catch (_e) {
                if (btn) { btn.disabled = false; btn.innerHTML = original; }
                alert('Không thể kết nối máy chủ, vui lòng thử lại.');
            }
        });
    });
});
