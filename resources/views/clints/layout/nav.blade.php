<!-- Top bars -->
<div class="top-promo-bar">
    🚨 LIVRAISON GRATUITE à partir de 600 🚨
</div>

<nav class="navbar-v2" id="navbar">
    <div class="navbar-v2__inner">

        <div class="navbar-v2__top">
            <div></div>

            <a href="{{ route('home') }}" class="navbar-v2__logo">
                {{-- Replace with image if you have logo --}}
                {{-- <span class="logo-box">LF</span> --}}
                <img src="{{ asset('assets/clints/images/logo-v-13.png') }}" alt="Lepetitflacon"
                    class="navbar-v2__logo-img">
            </a>

            <div class="navbar-v2__actions">
                <div class="nav-user-dropdown" id="userDropdown">
                    <button class="navbar-v2__icon" id="userBtn" aria-label="Mon compte">
                        <i class="far fa-user"></i>
                    </button>

                    <div class="dropdown-menu">
                        @auth
                            <span class="dropdown-header">Bonjour, {{ auth()->user()->name }}</span>

                            @if (auth()->user()->role === 'Admin')
                                <a href="{{ route('admin.analytics.index') }}">
                                    <i class="fas fa-cog"></i> Tableau de bord
                                </a>
                            @endif

                        
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>

                            <form id="nav-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Connexion
                            </a>
                        @endauth
                    </div>
                </div>

                <button class="navbar-v2__icon cart-icon-btn" onclick="window.location.href='{{ route('cart') }}'"
                    aria-label="Panier">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="cart-badge" id="cartCount">0</span>
                </button>

                <button class="navbar-v2__hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <div class="navbar-v2__menu">
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

            {{-- <a href="#footer">À propos des décants</a> --}}
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
