<!-- Top bars -->

<style>
    /* =========================
   MOBILE NAVBAR ORDER ONLY
   ========================= */
    @media (max-width: 768px) {

        .navbar-v3__inner {
            display: grid;
            grid-template-columns: 48px 48px 1fr 48px;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            min-height: 72px;
        }

        /* Hide desktop menu on mobile */
        .navbar-v3__menu {
            display: none;
        }

        /* Actions container becomes contents so icons can be ordered */
        .navbar-v3__actions {
            display: contents;
        }

        /* 1. Menu icon left */
        .navbar-v3__hamburger {
            grid-column: 1;
            grid-row: 1;
            display: flex;
            justify-self: start;
        }

        /* 2. Login icon */
        .navbar-v3__actions>a.navbar-v3__icon {
            grid-column: 2;
            grid-row: 1;
            justify-self: start;
        }

        /* 3. Logo center */
        .navbar-v3__logo {
            grid-column: 3;
            grid-row: 1;
            justify-self: center;
        }

        .navbar-v3__logo img {
            max-width: 145px;
            height: auto;
        }

        /* 4. Panier right */
        .cart-icon-btn {
            grid-column: 4;
            grid-row: 1;
            justify-self: end;
        }

        .navbar-v3__icon,
        .navbar-v3__hamburger {
            width: 42px;
            height: 42px;
        }
    }



    /* aside code design */
    .mini-cart {
    width: min(430px, 100%);
    background:
        radial-gradient(circle at 12% 8%, rgba(255, 231, 165, .28), transparent 28%),
        linear-gradient(180deg, #fffaf4 0%, #ffffff 45%, #fffaf4 100%);
    border-left: 1px solid rgba(216, 170, 69, .25);
    box-shadow: -28px 0 70px rgba(11, 16, 61, .18);
    overflow: hidden;
}

.mini-cart::before {
    content: "LPF";
    position: absolute;
    right: -18px;
    top: 95px;
    font-family: serif;
    font-size: 120px;
    font-weight: 800;
    color: rgba(11, 16, 61, .035);
    pointer-events: none;
}

.mini-cart__header {
    position: relative;
    padding: 28px 28px 22px;
    background: rgba(255,255,255,.55);
    border-bottom: 1px solid rgba(216, 170, 69, .18);
}

.mini-cart__header h3 {
    margin: 0;
    color: #0B103D;
    font-size: 34px;
    font-weight: 900;
    letter-spacing: -1px;
}

.mini-cart__header h3::after {
    content: "Votre sélection parfumée";
    display: block;
    margin-top: 6px;
    color: #d8aa45;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.mini-cart__close {
    width: 42px;
    height: 42px;
    border-radius: 14px;
    border: 1px solid rgba(216, 170, 69, .28);
    background: #ffffff;
    color: #0B103D;
    box-shadow: 0 12px 24px rgba(11, 16, 61, .08);
    transition: .3s ease;
}

.mini-cart__close:hover {
    transform: rotate(90deg) translateY(-2px);
    color: #d8aa45;
}

.mini-cart__items {
    position: relative;
    z-index: 2;
    padding: 24px;
}

.mini-cart__items > *:not(.mini-cart__empty) {
    position: relative;
    padding: 16px;
    margin-bottom: 16px;
    border-radius: 24px;
    background: rgba(255,255,255,.82);
    border: 1px solid rgba(216, 170, 69, .18);
    box-shadow: 0 16px 34px rgba(11, 16, 61, .07);
    transition: .35s ease;
}

.mini-cart__items > *:not(.mini-cart__empty):hover {
    transform: translateY(-4px);
    box-shadow: 0 24px 44px rgba(11, 16, 61, .11);
}

.mini-cart__items img {
    width: 88px !important;
    height: 88px !important;
    border-radius: 18px !important;
    object-fit: cover;
    box-shadow: 0 12px 24px rgba(11, 16, 61, .14);
}

.mini-cart__items h4,
.mini-cart__items .name,
.mini-cart__items .title {
    color: #0B103D !important;
    font-size: 17px !important;
    font-weight: 800 !important;
}

.mini-cart__items .price,
.mini-cart__items [class*="price"] {
    color: #d8aa45 !important;
    font-weight: 900 !important;
}

.mini-cart__items button {
    border-radius: 12px !important;
    border: 1px solid rgba(216, 170, 69, .24) !important;
    background: #fffaf4 !important;
    color: #0B103D !important;
    transition: .25s ease;
}

.mini-cart__items button:hover {
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45) !important;
}

.mini-cart__empty {
    text-align: center;
    padding: 70px 25px;
    border-radius: 28px;
    background: rgba(255,255,255,.72);
    border: 1px solid rgba(216, 170, 69, .18);
}

.mini-cart__empty i {
    width: 76px;
    height: 76px;
    border-radius: 24px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #0B103D;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    font-size: 30px;
    box-shadow: 0 18px 36px rgba(216, 170, 69, .28);
    margin-bottom: 20px;
    animation: miniBagFloat 3s ease-in-out infinite;
}

.mini-cart__empty p {
    color: rgba(11, 16, 61, .65);
    font-size: 16px;
    margin-bottom: 18px;
}

.mini-cart__footer {
    padding: 22px 28px 28px;
    background: rgba(255,255,255,.86);
    border-top: 1px solid rgba(216, 170, 69, .18);
    box-shadow: 0 -18px 40px rgba(11, 16, 61, .06);
}

.mini-cart__total {
    padding: 18px 0 24px;
}

.mini-cart__total span:first-child {
    color: #0B103D;
    font-size: 20px;
    font-weight: 800;
}

.mini-cart__total span:last-child {
    color: #d8aa45;
    font-size: 30px;
    font-weight: 900;
}

.mini-cart__footer .btn,
.mini-cart__empty .btn {
    width: 100%;
    min-height: 54px;
    border-radius: 18px !important;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45) !important;
    color: #0B103D !important;
    border: 0 !important;
    font-size: 13px;
    font-weight: 900;
    letter-spacing: 2px;
    text-transform: uppercase;
    box-shadow: 0 18px 36px rgba(216, 170, 69, .28);
    transition: .35s ease;
}

.mini-cart__footer .btn:hover,
.mini-cart__empty .btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 24px 46px rgba(216, 170, 69, .38);
}

@keyframes miniBagFloat {
    0%, 100% {
        transform: translateY(0) rotateY(0);
    }
    50% {
        transform: translateY(-8px) rotateY(12deg);
    }
}

@media (max-width: 576px) {
    .mini-cart {
        width: 100%;
    }

    .mini-cart__header {
        padding: 24px 22px 18px;
    }

    .mini-cart__header h3 {
        font-size: 28px;
    }

    .mini-cart__items {
        padding: 18px;
    }

    .mini-cart__footer {
        padding: 18px 22px 22px;
    }

    .mini-cart__total span:last-child {
        font-size: 25px;
    }
}

.mini-cart__items a,
.mini-cart__items .remove,
.mini-cart__items .remove-item,
.mini-cart__items .delete,
.mini-cart__items [class*="remove"] {
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    margin-top: 14px !important;
    padding: 9px 18px !important;
    border-radius: 999px !important;
    border: 1px solid rgba(216, 170, 69, .28) !important;
    background: rgba(255, 250, 244, .85) !important;
    color: #0B103D !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    line-height: 1.2 !important;
}

.mini-cart__items a:hover,
.mini-cart__items .remove:hover,
.mini-cart__items .remove-item:hover,
.mini-cart__items .delete:hover,
.mini-cart__items [class*="remove"]:hover {
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45) !important;
    transform: translateY(-2px);
}

</style>
<div class="top-promo-bar">
    <div class="promo-orbit">
        <span class="drop"></span>
        <span class="drop"></span>
        <span class="drop"></span>
    </div>

    <div class="promo-marquee">
        <div class="promo-line">
            <span>Livraison gratuite à partir de 600 DH</span>
        </div>
    </div>
</div>

<nav class="navbar-v3" id="navbar">
    <div class="navbar-v3__inner">

        <!-- Logo Left -->
        <a href="{{ route('home') }}" class="navbar-v3__logo">
            <img src="{{ asset('assets/clints/images/logo-v-13.png') }}" alt="Lepetitflacon">
        </a>

        <!-- Menu Center -->
        <div class="navbar-v3__menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('shop') }}" class="{{ request()->is('shop*') ? 'active' : '' }}">Décants</a>

            @isset($parentCategories)
                @foreach ($parentCategories as $cat)
                    <a href="{{ route('shop', ['cat' => $cat->id]) }}"
                        class="{{ request()->get('cat') == $cat->id ? 'active' : '' }}">
                        {{ $cat->getTranslation('name', 'fr') ?: $cat->getTranslation('name', 'en') }}
                    </a>
                @endforeach
            @endisset
        </div>

        <!-- Icons Right -->
        <div class="navbar-v3__actions">
            <a href="{{ auth()->check() && auth()->user()->role === 'Admin' ? route('admin.analytics.index') : route('login') }}"
                class="navbar-v3__icon" aria-label="Mon compte">
                <i class="far fa-user"></i>
            </a>

            <button class="navbar-v3__icon cart-icon-btn" id="cartToggle"
                aria-label="Panier">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-badge" id="cartCount">0</span>
            </button>

            {{-- <button class="navbar-v3__icon cart-icon-btn" id="cartToggle" aria-label="سلة التسوق">
                <i class="fas fa-shopping-bag"></i>
                <span class="badge" id="cartCount">0</span>
            </button> --}}

            <button class="navbar-v3__hamburger" id="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </div>
</nav>

<!-- Menu mobile -->
<div class="mobile-nav-v2" id="mobileNav">
    <a href="{{ route('home') }}">Accueil</a>
    <a href="{{ route('shop') }}">Décants</a>

    @isset($parentCategories)
        @foreach ($parentCategories as $cat)
            <a href="{{ route('shop', ['cat' => $cat->id]) }}"
                class="{{ request()->get('cat') == $cat->id ? 'active' : '' }}">
                {{ $cat->getTranslation('name', 'fr') ?: $cat->getTranslation('name', 'en') }}
            </a>
        @endforeach
    @endisset

    <a href="#footer">À propos des décants</a>
</div>

<div class="nav-overlay" id="navOverlay"></div>

<!-- Mini panier -->
<div class="cart-overlay" id="cartOverlay"></div>
<aside class="mini-cart" id="miniCart">
    <div class="mini-cart__header">
        <h3>Panier</h3>
        <button class="mini-cart__close" id="miniCartClose">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="mini-cart__items" id="miniCartItems">
        <div class="mini-cart__empty" id="miniCartEmpty">
            <i class="fas fa-shopping-bag"></i>
            <p>Votre panier est vide</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Acheter maintenant</a>
        </div>
    </div>

    <div class="mini-cart__footer" id="miniCartFooter" style="display:none;">
        <div class="mini-cart__total">
            <span>Total</span>
            <span id="miniCartTotal">0.00 DH</span>
        </div>
        <a href="{{ route('cart') }}" class="btn btn-primary">Voir le panier</a>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        if (hamburger && navMenu) {
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                navMenu.classList.toggle('show');
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 40) {
                navbar.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('is-scrolled');
            }
        });

        if (hamburger && navMenu) {
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                navMenu.classList.toggle('show');
            });
        }
    });
</script>
