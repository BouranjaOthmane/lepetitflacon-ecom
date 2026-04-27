<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lepetitflacon — Parfums d’exception et senteurs raffinées</title>
    <meta name="description"
        content="Achetez en ligne des parfums pour homme et femme chez Lepetitflacon. Découvrez une sélection de fragrances élégantes, raffinées et durables.">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/homepage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- ========== شريط التنقل ========== -->
    @include('clints.layout.nav')



    <!-- ========== قسم البطل ========== -->
    <section class="hero" id="hero">
        <div class="hero__bg">
            <img src="{{ asset('assets/clints/images/hero-perfume-1.png') }}" alt="Parfum de luxe" class="hero__image"
                id="heroImage">
        </div>

        <div class="hero__overlay"></div>

        <div class="container hero__container">
            <div class="hero__content">
                <span class="hero__label">Collection exclusive 2026 · Lepetitflacon shop</span>

                <h1 class="hero__title">
                    Découvrez votre parfum<br><em>d’exception</em>
                </h1>

                <p class="hero__subtitle">
                    Entrez dans l’univers raffiné de <strong>Lepetitflacon shop</strong> et laissez-vous séduire par des
                    parfums élégants, intenses et inoubliables. Chaque flacon révèle une signature unique, pensée pour
                    sublimer votre style et votre personnalité.
                </p>

                <div class="hero__cta">
                    <a href="{{ route('shop') }}" class="btn btn-primary">
                        Acheter maintenant <i class="fas fa-arrow-right"></i>
                    </a>

                    {{-- <a href="#categories" class="btn btn-secondary">
                        Découvrir les collections
                    </a> --}}
                </div>
            </div>
        </div>

        <div class="hero__scroll">
            <span>Faites défiler</span>
            <div class="hero__scroll-line"></div>
        </div>
    </section>

    <!-- ========== التصنيفات ========== -->
    <section class="section categories" id="categories">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-label">Explorer</span>
                <h2>Nos collections</h2>
                <p class="section-subtitle">Découvrez nos familles de parfums soigneusement sélectionnées</p>
                <div class="divider"></div>
            </div>

            <div class="categories__grid reveal">
                @foreach ($categories as $category)
                    <a href="{{ route('shop', ['cat' => $category->id]) }}" class="category-card">
                        <div class="category-card__circle">
                            <img src="{{ $category->getFirstMediaUrl('images') ?: asset('assets/clints/images/perfume-collection.png') }}"
                                alt="{{ $category->getTranslation('name', 'fr') }}">
                        </div>
                        <h4 class="category-card__name">{{ $category->getTranslation('name', 'fr') }}</h4>
                        <span class="category-card__count">{{ $category->products_count }} produit(s)</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== العطور المميزة ========== -->
    <section class="section section--alt featured" id="featured">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-label">Sélection pour vous</span>
                <h2>Parfums d’exception</h2>
                <p class="section-subtitle">Des créations soigneusement sélectionnées par nos experts en parfumerie</p>
                <div class="divider"></div>
            </div>

            <div class="featured__grid reveal" id="featuredGrid">
                @foreach ($featuredProducts as $product)
                    <div class="product-card" data-id="{{ $product->id }}"
                        data-name="{{ $product->getTranslation('name', 'fr') }}" data-price="{{ $product->price }}"
                        data-img="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">

                        <div class="product-card__image">
                            <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                alt="{{ $product->getTranslation('name', 'fr') }}">

                            @if ($product->created_at->gt(now()->subDays(7)))
                                <span class="product-card__badge">Nouveau</span>
                            @endif

                            <div class="product-card__actions">
                                <button aria-label="Aperçu rapide"
                                    onclick="window.location.href='{{ route('product', $product->id) }}'">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="product-card__info">
                            <p class="product-card__brand">{{ $product->brand->name ?? 'LePetitFlacon' }}</p>
                            <h4 class="product-card__name">{{ $product->getTranslation('name', 'fr') }}</h4>


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
        </div>
    </section>

    <!-- ========== الأكثر مبيعاً ========== -->
    @if ($bestsellerProducts->count() > 0)
        <section class="section bestsellers" id="bestsellers">
            <div class="container">
                <div class="section-header reveal">
                    <span class="section-label">Les plus demandés</span>
                    <h2>Meilleures ventes</h2>
                    <p class="section-subtitle">Nos parfums les plus appréciés et adoptés par des milliers de clients
                    </p>
                    <div class="divider"></div>
                </div>
                <div class="bestsellers__slider reveal">
                    <div class="bestsellers__track" id="bestsellersTrack">
                        @foreach ($bestsellerProducts as $product)
                            <div class="bestseller-card">

                                <div class="bestseller-card__image">
                                    <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/arabic-perfume.png') }}"
                                        alt="{{ $product->getTranslation('name', 'fr') }}">
                                </div>
                                <div class="bestseller-card__info">
                                    <span
                                        class="section-label">{{ $product->category->getTranslation('name', 'fr') ?? 'Collection exclusive' }}</span>
                                    <h3>{{ $product->getTranslation('name', 'fr') }}</h3>
                                    <p>{{ $product->getTranslation('description', 'fr') }}</p>
                                    <div class="bestseller-card__meta">
                                        <span
                                            class="bestseller-card__price">${{ $product->sale_price ?: $product->price }}</span>
                                        <div class="bestseller-card__rating">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('product', $product->id) }}"
                                        class="btn btn-outline-gold">Découvrir
                                        <i class="fas fa-arrow-right"></i></a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <div class="bestsellers__nav">
                        <button class="bestsellers__btn" id="bsPrev"><i class="fas fa-arrow-left"></i></button>
                        <div class="bestsellers__dots" id="bsDots">
                            @foreach ($bestsellerProducts as $index => $product)
                                <span class="dot {{ $index === 0 ? 'active' : '' }}"></span>
                            @endforeach
                        </div>
                        <button class="bestsellers__btn" id="bsNext"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ========== Sélection personnalisée ========== -->
    @auth
        @if ($personalizedProducts->count() > 0)
            <section class="section personalized-section" id="recommended">
                <div class="container">
                    <div class="section-header reveal">
                        <span class="section-label">Pour vous</span>
                        <h2>Nos recommandations</h2>
                        <p class="section-subtitle">Des parfums sélectionnés spécialement selon vos goûts</p>
                        <div class="divider"></div>
                    </div>
                    <div class="reveal">
                        <div class="product-grid"
                            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                            @foreach ($personalizedProducts as $product)
                                <div class="product-card" data-id="{{ $product->id }}"
                                    data-name="{{ $product->getTranslation('name', 'fr') }}"
                                    data-price="{{ $product->price }}"
                                    data-img="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">
                                    <div class="product-card__image">
                                        <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                            alt="{{ $product->getTranslation('name', 'fr') }}">
                                        <div class="product-card__actions">
                                            <button
                                                class="wishlist-btn {{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'active' : '' }}">
                                                <i
                                                    class="{{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'fas' : 'far' }} fa-heart"></i>
                                            </button>
                                            <button
                                                onclick="window.location.href='{{ route('product', $product->id) }}'"><i
                                                    class="far fa-eye"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <p class="product-card__brand">{{ $product->brand->name ?? 'LePetitFlacon' }}</p>
                                        <h4 class="product-card__name">{{ $product->getTranslation('name', 'fr') }}</h4>


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
                                                @if ($product->sale_price && $product->price)
                                                    <span
                                                        style="text-decoration: line-through; opacity: 0.6; font-size: 0.85em; margin-right: 8px;">
                                                        {{ number_format($product->price, 2, ',', ' ') }} د.م
                                                    </span>
                                                    <span>
                                                        {{ number_format($product->sale_price, 2, ',', ' ') }} د.م
                                                    </span>
                                                @else
                                                    {{ number_format($product->price, 2, ',', ' ') }} د.م
                                                @endif
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
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- ========== الأكثر تميزاً (Popular) ========== -->
    <section class="section popular-section" id="popular">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-label">Produits populaires</span>
                <h2>Les plus remarquables</h2>
                <p class="section-subtitle">Découvrez les parfums qui séduisent tout le monde</p>
                <div class="divider"></div>
            </div>

            <div class="popular__grid reveal"
                style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                @foreach ($popularProducts as $product)
                    @php
                        $hasSizes = $product->sizes && $product->sizes->count() > 0;
                        $minSizePrice = $hasSizes ? $product->sizes->min('price') : null;
                        $maxSizePrice = $hasSizes ? $product->sizes->max('price') : null;
                        $cardPrice = $minSizePrice ?: ($product->sale_price ?: $product->price);
                    @endphp

                    <div class="product-card" data-id="{{ $product->id }}"
                        data-name="{{ $product->getTranslation('name', 'fr') }}" data-price="{{ $cardPrice }}"
                        data-img="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">

                        <div class="product-card__image">
                            <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                alt="{{ $product->getTranslation('name', 'fr') }}">

                            <div class="product-card__actions">
                                <button onclick="window.location.href='{{ route('product', $product->id) }}'">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="product-card__info">
                            <p class="product-card__brand">{{ $product->brand->name ?? 'LePetitFlacon' }}</p>
                            <h4 class="product-card__name">{{ $product->getTranslation('name', 'fr') }}</h4>

                            <p class="product-card__price">
                                @if ($hasSizes)
                                    @if ($minSizePrice == $maxSizePrice)
                                        {{ number_format($minSizePrice, 2, ',', ' ') }} د.م
                                    @else
                                        {{ number_format($minSizePrice, 2, ',', ' ') }} د.م –
                                        {{ number_format($maxSizePrice, 2, ',', ' ') }} د.م
                                    @endif
                                @else
                                    {{ number_format($product->sale_price ?: $product->price, 2, ',', ' ') }} د.م
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
        </div>
    </section>

    <!-- ========== قصة العلامة ========== -->
    <section class="section section--alt brand-story" id="brandStory">
        <div class="container">
            <div class="brand-story__wrapper reveal">
                <div class="brand-story__image">
                    <img src="{{ asset('assets/clints/images/brand-story.png') }}" alt="Notre savoir-faire">
                    <div class="brand-story__accent"></div>
                </div>
                <div class="brand-story__content">
                    <span class="section-label">Notre philosophie</span>
                    <h2>L’art de la parfumerie</h2>
                    <p class="brand-story__text">
                        Chez LePetitFlacon, chaque parfum est une création d’exception née d’un véritable savoir-faire
                        en parfumerie.
                        Nous sélectionnons avec soin des ingrédients raffinés venus des quatre coins du monde — des
                        champs de roses bulgares
                        aux forêts de santal en Inde — afin de composer des fragrances élégantes, uniques et mémorables.
                    </p>
                    <div class="brand-story__pillars">
                        <div class="pillar">
                            <i class="fas fa-gem"></i>
                            <h4>Ingrédients rares</h4>
                            <p>Sélectionnés avec soin à travers le monde</p>
                        </div>
                        <div class="pillar">
                            <i class="fas fa-flask"></i>
                            <h4>Savoir-faire d’excellence</h4>
                            <p>Des créations inspirées par l’art de la haute parfumerie</p>
                        </div>
                        <div class="pillar">
                            <i class="fas fa-crown"></i>
                            <h4>Univers raffiné</h4>
                            <p>Une expérience placée sous le signe de l’élégance</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- ========== آراء العملاء ========== -->
    <section class="section testimonials" id="testimonials">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-label">Ils en parlent</span>
                <h2>Avis de nos clients</h2>
                <p class="section-subtitle">Découvrez pourquoi nos clients reviennent encore et encore</p>
                <div class="divider"></div>
            </div>

            <div class="testimonials__grid reveal">
                <div class="testimonial-card">
                    <div class="testimonial-card__stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-card__text">
                        "Ambre Oud Royal est un parfum absolument remarquable. Sa tenue est impressionnante et je reçois
                        des compliments chaque fois que je le porte. C’est le vrai luxe dans un flacon."
                    </p>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar">SA</div>
                        <div>
                            <h4>Sarah Ahmed</h4>
                            <span>Acheteuse vérifiée</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-card__stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-card__text">
                        "Le packaging à lui seul reflète la qualité. Rose Mystique est devenu mon parfum préféré —
                        féminin, raffiné et totalement envoûtant. Il vaut chaque centime."
                    </p>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar">MK</div>
                        <div>
                            <h4>Mariam Khaled</h4>
                            <span>Acheteuse vérifiée</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-card__stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-card__text">
                        "Je découvre les parfums de luxe depuis des années, et LePetitFlacon fait partie des plus belles
                        découvertes que j’ai faites. Noir Élégance est le parfum idéal pour le soir — intense,
                        sophistiqué et inoubliable."
                    </p>
                    <div class="testimonial-card__author">
                        <div class="testimonial-card__avatar">OM</div>
                        <div>
                            <h4>Omar Mohammed</h4>
                            <span>Acheteur vérifié</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ========== التذييل ========== -->
    @include('clints.layout.footer')
    <script src="{{ asset('assets/clints/js/homepage.js') }}"></script>
</body>

</html>
