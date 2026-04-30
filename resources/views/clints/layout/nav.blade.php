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
    .navbar-v3__actions > a.navbar-v3__icon {
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

            <button class="navbar-v3__icon cart-icon-btn" onclick="window.location.href='{{ route('cart') }}'"
                aria-label="Panier">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-badge" id="cartCount">0</span>
            </button>

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
            <a href="{{ route('shop') }}" class="btn btn-primary">Acheter maintenant mmm</a>
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

    document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 40) {
            navbar.classList.add('is-scrolled');
        } else {
            navbar.classList.remove('is-scrolled');
        }
    });

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function () {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('show');
        });
    }
});
</script>
