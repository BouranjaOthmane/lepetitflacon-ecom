<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Boutique — Lepetitflacon</title>
    <meta name="description"
        content="Parcourez notre collection de parfums raffinés. Filtrez par marque, catégorie, genre et gamme de prix.">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/shop.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- ========== Barre de navigation ========== -->
    @include('clints.layout.nav')


    <!-- En-tête de page -->
    <div class="page-spacer"></div>
    <section class="shop-header">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Accueil</a>
                <span class="separator">/</span>
                <span class="current">Boutique</span>
            </div>
            <h1>Notre collection</h1>
            <p class="section-subtitle">Découvrez notre collection de parfums raffinés — des classiques intemporels aux
                nouveautés</p>
        </div>
    </section>

    <!-- Mise en page Boutique -->
    <section class="section shop-section">
        <div class="container">
            <div class="shop-layout">
                <!-- Filtres latéraux -->
                <aside class="filters" id="filtersPanel">
                    <div class="filters__header">
                        <h3>Filtres</h3>
                        <button class="filters__close" id="filtersClose"><i class="fas fa-times"></i></button>
                    </div>

                    <!-- Gamme de prix -->
                    {{-- <div class="filter-group">
                        <h4 class="filter-group__title">Gamme de prix <i class="fas fa-chevron-down"></i></h4>
                        <div class="filter-group__content">
                            <div class="price-range">
                                <input type="range" min="0" max="500"
                                    value="{{ request('max_price', 500) }}" id="priceRange" onchange="applyFilters()">
                                <div class="price-range__labels">
                                    <span>0 DH</span>
                                    <span id="priceValue">{{ request('max_price', 500) }} DH</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Catégories -->
                    <div class="filter-group">
                        <h4 class="filter-group__title">Catégories <i class="fas fa-chevron-down"></i></h4>
                        <div class="filter-group__content">
                            @php $selectedCats = explode(',', request('cat', '')); @endphp
                            @foreach ($categories as $category)
                                <label class="filter-check">
                                    <input type="checkbox" name="cat" value="{{ $category->id }}"
                                        {{ in_array($category->id, $selectedCats) ? 'checked' : '' }}
                                        onchange="applyFilters()"> {{ $category->getTranslation('name', 'fr') }}
                                    <span>({{ $category->products_count }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Marques -->
                    <div class="filter-group">
                        <h4 class="filter-group__title">Marque <i class="fas fa-chevron-down"></i></h4>
                        <div class="filter-group__content">
                            @php $selectedBrands = explode(',', request('brand', '')); @endphp
                            @foreach ($brands as $brand)
                                <label class="filter-check">
                                    <input type="checkbox" name="brand" value="{{ $brand->id }}"
                                        {{ in_array($brand->id, $selectedBrands) ? 'checked' : '' }}
                                        onchange="applyFilters()"> {{ $brand->name }}
                                    <span>({{ $brand->products_count }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Genre -->
                    <div class="filter-group">
                        <h4 class="filter-group__title">Genre <i class="fas fa-chevron-down"></i></h4>
                        <div class="filter-group__content">
                            @php $selectedGenders = explode(',', request('gender', '')); @endphp
                            <label class="filter-check">
                                <input type="checkbox" name="gender" value="Men"
                                    {{ in_array('Men', $selectedGenders) ? 'checked' : '' }} onchange="applyFilters()">
                                Homme
                            </label>
                            <label class="filter-check">
                                <input type="checkbox" name="gender" value="Women"
                                    {{ in_array('Women', $selectedGenders) ? 'checked' : '' }}
                                    onchange="applyFilters()"> Femme
                            </label>
                            <label class="filter-check">
                                <input type="checkbox" name="gender" value="Unisex"
                                    {{ in_array('Unisex', $selectedGenders) ? 'checked' : '' }}
                                    onchange="applyFilters()"> Mixte
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary filters__apply" onclick="applyFilters()">Appliquer
                        les filtres</button>
                </aside>
                <div class="filters-overlay" id="filtersOverlay"></div>

                <!-- Produits -->
                <div class="shop-main">
                    <div class="shop-toolbar">
                        <div class="shop-toolbar__info">
                            <p>Affichage de <strong>{{ $products->count() }}</strong> sur
                                <strong>{{ $products->total() }}</strong> résultats
                            </p>
                        </div>
                        <div class="shop-toolbar__controls">
                            <button class="shop-toolbar__filter-btn" id="filterToggle"><i class="fas fa-sliders-h"></i>
                                Filtres</button>
                            <select class="shop-toolbar__sort" id="sortSelect" onchange="applyFilters()">
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Les plus
                                    populaires</option>
                                <option value="latest"
                                    {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>Nouveautés
                                </option>
                                <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Prix :
                                    croissant</option>
                                <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Prix
                                    : décroissant</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Les mieux
                                    notés</option>
                            </select>
                            {{-- <div class="shop-toolbar__view">
                                <button class="view-btn active" data-view="grid"><i class="fas fa-th"></i></button>
                                <button class="view-btn" data-view="list"><i class="fas fa-list"></i></button>
                            </div> --}}
                        </div>
                    </div>




                    <div class="product-grid" id="productGrid">
                        @foreach ($products as $product)
                            @php
                                $minSizePrice = $product->sizes->min('price');
                                $cardPrice = $minSizePrice ?: $product->sale_price ?: $product->price;
                            @endphp

                            <div class="product-card" data-id="{{ $product->id }}"
                                data-name="{{ $product->getTranslation('name', 'fr') }}"
                                data-price="{{ $cardPrice }}"
                                data-img="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">

                                <div class="product-card__image">
                                    <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                        alt="{{ $product->getTranslation('name', 'fr') }}">

                                    @if ($product->created_at->gt(now()->subDays(7)))
                                        <span class="product-card__badge">Nouveau</span>
                                    @endif

                                    <div class="product-card__actions">
                                        {{-- <button
                                            class="wishlist-btn {{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'active' : '' }}">
                                            <i
                                                class="{{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'fas' : 'far' }} fa-heart"></i>
                                        </button> --}}
                                        <button onclick="window.location.href='{{ route('product', $product->id) }}'">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="product-card__info">
                                    <p class="product-card__brand">{{ $product->brand->name ?? 'Lepetitflacon' }}</p>
                                    <h4 class="product-card__name">{{ $product->getTranslation('name', 'fr') }}</h4>

                                    <div class="product-card__rating">
                                        <i class="fas fa-star star"></i><i class="fas fa-star star"></i><i
                                            class="fas fa-star star"></i><i class="fas fa-star star"></i><i
                                            class="fas fa-star-half-alt star"></i><span>(128)</span>
                                    </div>


                                    @php
                                        $hasSizes = $product->sizes && $product->sizes->count() > 0;
                                        $minSizePrice = $hasSizes ? $product->sizes->min('price') : null;
                                        $maxSizePrice = $hasSizes ? $product->sizes->max('price') : null;
                                        $cardPrice = $minSizePrice ?: ($product->sale_price ?: $product->price);
                                    @endphp

                                    <p class="product-card__price">
                                        @if ($hasSizes)
                                            @if ($minSizePrice == $maxSizePrice)
                                                {{ number_format($minSizePrice, 2, ',', ' ') }} د.م
                                            @else
                                                {{ number_format($minSizePrice, 2, ',', ' ') }} د.م –
                                                {{ number_format($maxSizePrice, 2, ',', ' ') }} د.م
                                            @endif
                                        @else
                                            {{ number_format($product->sale_price ?: $product->price, 2, ',', ' ') }}
                                            د.م
                                        @endif
                                    </p>

                                    @if ($hasSizes)
                                        <a href="{{ route('product', $product->id) }}" class="product-card__btn">
                                            Commander maintenant
                                        </a>
                                    @else
                                        <button class="product-card__btn add-to-cart-btn">
                                            Ajouter au panier
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination">
                        {{ $products->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== Pied de page ========== -->
    @include('clints.layout.footer')

    <script src="{{ asset('assets/clints/js/shop.js') }}"></script>
</body>

</html>
