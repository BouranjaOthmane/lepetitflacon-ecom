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

    <style>
        .shop-header-lpf {
            position: relative;
            overflow: hidden;
            padding: 34px 0 30px;
            background:
                radial-gradient(circle at 15% 10%, rgba(255, 231, 165, 0.35), transparent 24%),
                radial-gradient(circle at 85% 0%, rgba(216, 170, 69, 0.14), transparent 25%),
                linear-gradient(180deg, #fffaf4 0%, #ffffff 100%);
            border-bottom: 1px solid rgba(216, 170, 69, 0.22);
        }

        .shop-header-lpf::before {
            content: "LPF";
            position: absolute;
            right: 5%;
            top: -28px;
            font-family: serif;
            font-size: 120px;
            font-weight: 800;
            color: rgba(11, 16, 61, 0.04);
        }

        .shop-header-lpf__inner {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .shop-header-lpf__breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .shop-header-lpf__breadcrumb a {
            color: rgba(11, 16, 61, 0.52);
            text-decoration: none;
        }

        .shop-header-lpf__breadcrumb span {
            color: rgba(216, 170, 69, 0.75);
        }

        .shop-header-lpf__breadcrumb strong {
            color: #0B103D;
            font-weight: 700;
        }

        .shop-header-lpf h1 {
            margin: 0;
            color: #0B103D;
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .shop-header-lpf h1 em {
            color: #ffe7a5;
            font-style: italic;
        }

        .shop-header-lpf p {
            margin: 10px 0 0;
            max-width: 650px;
            color: rgba(11, 16, 61, 0.64);
            font-size: 14px;
            line-height: 1.6;
        }

        .shop-header-lpf__badge {
            min-width: 142px;
            min-height: 46px;
            padding: 0 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .78);
            border: 1px solid rgba(216, 170, 69, .28);
            color: #d8aa45;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            box-shadow: 0 14px 30px rgba(11, 16, 61, .08);
            animation: shopBadgeFloat 3.5s ease-in-out infinite;
        }

        .shop-header-lpf__badge i {
            font-size: 17px;
        }

        .shop-header-lpf__badge span {
            color: #0B103D;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .shop-header-lpf__glow {
            position: absolute;
            left: 8%;
            bottom: -90px;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 231, 165, .28), transparent 65%);
            animation: shopMist 6s ease-in-out infinite;
        }

        @keyframes shopBadgeFloat {

            0%,
            100% {
                transform: translateY(0) rotateY(0deg);
            }

            50% {
                transform: translateY(-6px) rotateY(8deg);
            }
        }

        @keyframes shopMist {

            0%,
            100% {
                transform: translateY(0) scale(1);
                opacity: .7;
            }

            50% {
                transform: translateY(-14px) scale(1.12);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .shop-header-lpf {
                padding: 28px 0 26px;
            }

            .shop-header-lpf__inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .shop-header-lpf__badge {
                min-height: 42px;
            }

            .shop-header-lpf p {
                font-size: 13px;
            }
        }


        /* aside filter */




        @keyframes filterMist {

            0%,
            100% {
                transform: translateY(0) scale(1);
                opacity: .75;
            }

            50% {
                transform: translateY(-16px) scale(1.15);
                opacity: 1;
            }
        }

        @media (max-width: 992px) {
            .filters-lpf__close {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }



        .shop-toolbar__sort-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
            min-width: 260px;
            height: 52px;
            border-radius: 999px;
            background:
                radial-gradient(circle at 15% 20%, rgba(255, 231, 165, .35), transparent 30%),
                linear-gradient(145deg, #ffffff, #fffaf4);
            border: 1px solid rgba(216, 170, 69, .28);
            box-shadow:
                0 14px 32px rgba(11, 16, 61, .08),
                inset 0 1px 0 rgba(255, 255, 255, 1);
            overflow: hidden;
            transition: .35s ease;
        }

        .shop-toolbar__sort-wrap:hover {
            transform: translateY(-3px);
            border-color: rgba(216, 170, 69, .48);
            box-shadow:
                0 20px 42px rgba(11, 16, 61, .12),
                0 0 0 1px rgba(255, 231, 165, .25);
        }

        .shop-toolbar__sort-wrap::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(115deg,
                    transparent 0%,
                    transparent 42%,
                    rgba(255, 231, 165, .38) 50%,
                    transparent 58%,
                    transparent 100%);
            transform: translateX(-130%);
            transition: .7s ease;
            pointer-events: none;
        }

        .shop-toolbar__sort-wrap:hover::before {
            transform: translateX(130%);
        }

        .shop-toolbar__sort-wrap i:first-child {
            position: absolute;
            left: 18px;
            color: #d8aa45;
            font-size: 14px;
            pointer-events: none;
            z-index: 2;
        }

        .shop-toolbar__sort-wrap i:last-child {
            position: absolute;
            right: 18px;
            color: #0B103D;
            font-size: 12px;
            pointer-events: none;
            z-index: 2;
        }

        .shop-toolbar__sort {
            width: 100%;
            height: 100%;
            border: 0;
            outline: 0;
            appearance: none;
            background: transparent;
            color: #0B103D;
            padding: 0 46px;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            z-index: 2;
        }

        .shop-toolbar__sort option {
            color: #0B103D;
            background: #ffffff;
            font-weight: 600;
        }

        @media (max-width: 576px) {
            .shop-toolbar__sort-wrap {
                width: 100%;
                min-width: 100%;
                height: 48px;
            }

            .shop-toolbar__sort {
                font-size: 11px;
                padding: 0 42px;
            }
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .product-card {
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid rgba(216, 170, 69, .22);
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(11, 16, 61, .08);
            transition: .35s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 28px 55px rgba(11, 16, 61, .14);
        }

        .product-card__image {
            height: 285px;
            overflow: hidden;
        }

        .product-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-card__info {
            padding: 18px 20px 22px;
            text-align: center;
        }

        .product-card__brand {
            color: #0B103D;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .product-card__name {
            color: #292929;
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0;
        }

        .product-card__rating {
            color: #f6a51a;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .product-card__rating span {
            color: rgba(11, 16, 61, .45);
            margin-left: 4px;
        }

        .product-card__price {
            color: #d8aa45;
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .product-card__btn {
            width: 100%;
            min-height: 46px;
            border-radius: 999px;
            border: 0;
            background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
            color: #0B103D;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 14px 28px rgba(216, 170, 69, .25);
        }

        .product-card__btn:hover {
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .product-card {
                border-radius: 18px;
            }

            .product-card__image {
                height: 185px;
           
            }

            .product-card__info {
                padding: 12px;
            }

            .product-card__brand {
                font-size: 9px;
                letter-spacing: 1.4px;
            }

            .product-card__name {
                font-size: 14px;
            }

            .product-card__price {
                font-size: 13px;
            }

            .product-card__btn {
                min-height: 38px;
                font-size: 9px;
                letter-spacing: .8px;
            }
        }
    </style>
</head>

<body>

    <!-- ========== Barre de navigation ========== -->
    @include('clints.layout.nav')

    <section class="shop-header-lpf">
        <div class="shop-header-lpf__glow"></div>

        <div class="container">
            <div class="shop-header-lpf__inner">
                <div>
                    <div class="shop-header-lpf__breadcrumb">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>/</span>
                        <strong>Boutique</strong>
                    </div>

                    <h1>Notre <em>collection</em></h1>
                    <p>
                        Découvrez notre collection de parfums raffinés — des classiques intemporels aux nouveautés.
                    </p>
                </div>

                <div class="shop-header-lpf__badge">
                    <i class="fas fa-spray-can-sparkles"></i>
                    <span>LPF Boutique</span>
                </div>
            </div>
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

                                    {{-- @if ($product->created_at->gt(now()->subDays(7)))
                                        <span class="product-card__badge">Nouveau</span>
                                    @endif --}}

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
                                                {{ number_format($minSizePrice, 2, ',', ' ') }} DH
                                            @else
                                                {{ number_format($minSizePrice, 2, ',', ' ') }} DH –
                                                {{ number_format($maxSizePrice, 2, ',', ' ') }} DH
                                            @endif
                                        @else
                                            {{ number_format($product->sale_price ?: $product->price, 2, ',', ' ') }}
                                            د.م
                                        @endif
                                    </p>

                                    @if ($product->stock_quantity <= 0)
                                        <button class="product-card__btn" disabled
                                            style="opacity: .6; cursor: not-allowed;">
                                            Rupture de stock
                                        </button>
                                    @elseif ($hasSizes)
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
<a href="https://wa.me/212704654736" class="wa-perfume-magic" target="_blank" rel="noopener"
    aria-label="Commander sur WhatsApp">

    <span class="magic-glow"></span>

    <span class="perfume-3d">
        <span class="cap"></span>
        <span class="neck"></span>
        <span class="bottle-glass">
            <span class="shine"></span>
            <span class="liquid"></span>
            <i class="fab fa-whatsapp"></i>
        </span>
        <span class="mist mist-1"></span>
        <span class="mist mist-2"></span>
        <span class="mist mist-3"></span>
    </span>

</a>

</html>
