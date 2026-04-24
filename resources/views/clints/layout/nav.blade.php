<nav class="navbar" id="navbar">
  <div class="container">
    <a href="{{ route('home') }}" class="nav-logo">Lepetit <span>flacon</span></a>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Accueil</a></li>
      <li><a href="{{ route('shop') }}" class="{{ request()->is('shop*') ? 'active' : '' }}">Boutique</a></li>
      @isset($parentCategories)
        @foreach($parentCategories as $cat)
          <li><a href="{{ route('shop', ['cat' => $cat->id]) }}" class="{{ request()->get('cat') == $cat->id ? 'active' : '' }}">{{ $cat->getTranslation('name', 'en') }}</a></li>
        @endforeach
      @endisset
      {{-- <li><a href="#footer">Qui sommes-nous ?</a></li> --}}
    </ul>
    <div class="nav-actions">
      <div class="nav-user-dropdown" id="userDropdown">
        <button class="nav-action-btn" id="userBtn" aria-label="Mon compte">
          <i class="far fa-user"></i>
        </button>
        <div class="dropdown-menu">
          @auth
            <span class="dropdown-header">Bonjour, {{ auth()->user()->name }}</span>
            @if(auth()->user()->role === 'Admin')
              <a href="{{ route('admin.analytics.index') }}"><i class="fas fa-cog"></i> Tableau de bord</a>
            @endif
            <a href="{{ route('account.index') }}"><i class="fas fa-user-circle"></i> Mon compte</a>
            <a href="{{ route('loyalty.index') }}"><i class="fas fa-crown"></i> Points de fidélité</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
            <form id="nav-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @else
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Connexion</a>
            {{-- <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Créer un compte</a> --}}
          @endauth
        </div>
      </div>
      {{-- <a href="{{ route('wishlist.index') }}" class="nav-action-btn" aria-label="Favoris">
        <i class="far fa-heart"></i>
        @php $wishlistCount = auth()->check() ? auth()->user()->wishlist()->count() : 0; @endphp
        <span class="badge {{ $wishlistCount > 0 ? '' : 'hide-badge' }}" id="wishlistCount">{{ $wishlistCount }}</span>
      </a> --}}
      <button class="nav-action-btn" id="cartToggle" aria-label="Panier">
        <i class="fas fa-shopping-bag"></i>
        <span class="badge" id="cartCount">0</span>
      </button>
      <div class="nav-hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</nav>

<!-- Menu mobile -->
<div class="mobile-nav" id="mobileNav">
  <a href="{{ route('home') }}">Accueil</a>
  <a href="{{ route('shop') }}">Boutique</a>
  @isset($parentCategories)
    @foreach($parentCategories as $cat)
      <a href="{{ route('shop', ['cat' => $cat->id]) }}" class="{{ request()->get('cat') == $cat->id ? 'active' : '' }}">{{ $cat->getTranslation('name', 'en') }}</a>
    @endforeach
  @endisset
  <a href="#footer">Qui sommes-nous ?</a>
</div>
<div class="nav-overlay" id="navOverlay"></div>

<!-- Mini panier -->
<div class="cart-overlay" id="cartOverlay"></div>
<aside class="mini-cart" id="miniCart">
  <div class="mini-cart__header">
    <h3>Panier</h3>
    <button class="mini-cart__close" id="miniCartClose"><i class="fas fa-times"></i></button>
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
      <span id="miniCartTotal">$0.00</span>
    </div>
    <a href="{{ route('cart') }}" class="btn btn-primary">Voir le panier</a>
  </div>
</aside>