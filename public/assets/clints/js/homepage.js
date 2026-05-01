/* ==========================================
   homepage.js — Hero Parallax, Bestsellers Slider
   ========================================== */

// ===== HERO PARALLAX =====
document.addEventListener("DOMContentLoaded", () => {
    const heroImage = document.getElementById("heroImage");
    if (!heroImage) return;

    window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;
        if (scrollY < window.innerHeight) {
            heroImage.style.transform = `translateY(${scrollY * 0.15}px)`;
        }
    });
});

// ===== BESTSELLERS SLIDER =====
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('bestsellersTrack');
    const prevBtn = document.getElementById('bsPrev');
    const nextBtn = document.getElementById('bsNext');
    const dotsContainer = document.getElementById('bsDots');

    if (!track || !prevBtn || !nextBtn) return;

    const cards = [...track.querySelectorAll('.bestseller-lpf-card')];
    const total = cards.length;

    if (total === 0) return;

    let current = 0;

    function perSlide() {
        return window.innerWidth >= 992 ? 2 : 1;
    }

    function totalSlides() {
        return Math.ceil(total / perSlide());
    }

    function goTo(index) {
        const slides = totalSlides();

        if (index < 0) current = slides - 1;
        else if (index >= slides) current = 0;
        else current = index;

        track.style.transform = `translateX(-${current * 100}%)`;

        if (dotsContainer) {
            dotsContainer.querySelectorAll('.dot').forEach((dot, i) => {
                dot.classList.toggle('active', i === current);
                dot.style.display = i < slides ? 'inline-block' : 'none';
            });
        }
    }

    prevBtn.addEventListener('click', () => goTo(current - 1));
    nextBtn.addEventListener('click', () => goTo(current + 1));

    if (dotsContainer) {
        dotsContainer.querySelectorAll('.dot').forEach((dot, i) => {
            dot.addEventListener('click', () => goTo(i));
        });
    }

    window.addEventListener('resize', () => goTo(0));

    let autoplay = setInterval(() => goTo(current + 1), 6000);

    track.addEventListener('mouseenter', () => clearInterval(autoplay));
    track.addEventListener('mouseleave', () => {
        autoplay = setInterval(() => goTo(current + 1), 6000);
    });

    goTo(0);
});

// ===== NEWSLETTER FORM =====
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("newsletterForm");
    if (!form) return;

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const email = form.querySelector('input[type="email"]');
        if (email && email.value) {
            showToast("Welcome to LUXE PARFUM! Check your inbox.");
            email.value = "";
        }
    });
});

// ===== HERO ANIMATION ON LOAD =====
document.addEventListener("DOMContentLoaded", () => {
    const label = document.querySelector(".hero__label");
    const title = document.querySelector(".hero__title");
    const subtitle = document.querySelector(".hero__subtitle");
    const cta = document.querySelector(".hero__cta");

    const elements = [label, title, subtitle, cta].filter(Boolean);

    elements.forEach((el, i) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(30px)";
        el.style.transition = `opacity 0.8s ease ${0.2 + i * 0.2}s, transform 0.8s ease ${0.2 + i * 0.2}s`;

        requestAnimationFrame(() => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
        });
    });
});

// Start cookies
document.addEventListener("DOMContentLoaded", function () {
    const cookieBox = document.getElementById("cookieLpf");
    const acceptBtn = document.getElementById("cookieAccept");
    const rejectBtn = document.getElementById("cookieReject");

    if (!cookieBox) return;

    if (localStorage.getItem("lpf_cookie_choice")) {
        cookieBox.style.display = "none";
        return;
    }

    function closeCookie(choice) {
        localStorage.setItem("lpf_cookie_choice", choice);
        cookieBox.classList.add("hide");

        setTimeout(() => {
            cookieBox.style.display = "none";
        }, 450);
    }

    acceptBtn?.addEventListener("click", function () {
        closeCookie("accepted");
    });

    rejectBtn?.addEventListener("click", function () {
        closeCookie("rejected");
    });
});
// End cookies
