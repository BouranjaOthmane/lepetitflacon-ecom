<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->getTranslation('name', 'ar') }} — Lepetitflacon</title>
    <meta name="description"
        content="Ambre Oud Royal — un mélange raffiné d’oud cambodgien rare et d’ambre chaleureux. Un parfum d’exception signé Lepetitflacon.">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/product.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .product-breadcrumb-lpf {
    position: relative;
    overflow: hidden;
    padding: 24px 0;
    background:
        radial-gradient(circle at 15% 10%, rgba(255, 231, 165, 0.34), transparent 24%),
        radial-gradient(circle at 85% 0%, rgba(216, 170, 69, 0.13), transparent 25%),
        linear-gradient(180deg, #fffaf4 0%, #ffffff 100%);
    border-bottom: 1px solid rgba(216, 170, 69, 0.22);
}

.product-breadcrumb-lpf::before {
    content: "LPF";
    position: absolute;
    right: 5%;
    top: -36px;
    font-family: serif;
    font-size: 110px;
    font-weight: 800;
    color: rgba(11, 16, 61, 0.04);
}

.product-breadcrumb-lpf__inner {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.product-breadcrumb-lpf__breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 9px;
    font-size: 13px;
}

.product-breadcrumb-lpf__breadcrumb a {
    color: rgba(11, 16, 61, 0.52);
    text-decoration: none;
}

.product-breadcrumb-lpf__breadcrumb span {
    color: rgba(216, 170, 69, 0.75);
}

.product-breadcrumb-lpf__breadcrumb strong {
    color: #0B103D;
    font-weight: 800;
}

.product-breadcrumb-lpf__badge {
    min-width: 142px;
    min-height: 42px;
    padding: 0 15px;
    border-radius: 999px;
    background: rgba(255,255,255,.78);
    border: 1px solid rgba(216, 170, 69, .28);
    color: #d8aa45;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    box-shadow: 0 14px 30px rgba(11,16,61,.08);
    animation: productBadgeFloat 3.5s ease-in-out infinite;
}

.product-breadcrumb-lpf__badge span {
    color: #0B103D;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.3px;
    text-transform: uppercase;
}

.product-breadcrumb-lpf__glow {
    position: absolute;
    left: 8%;
    bottom: -90px;
    width: 170px;
    height: 170px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255, 231, 165, .28), transparent 65%);
}

@keyframes productBadgeFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
}

@media (max-width: 768px) {
    .product-breadcrumb-lpf {
        padding: 20px 0;
    }

    .product-breadcrumb-lpf__inner {
        flex-direction: column;
        align-items: flex-start;
    }

    .product-breadcrumb-lpf__badge {
        min-height: 40px;
    }
}




/* second section */

.product-detail {
    position: relative;
    padding: 50px 0;
    background:
        radial-gradient(circle at 12% 10%, rgba(255, 231, 165, .22), transparent 28%),
        linear-gradient(180deg, #fffaf4 0%, #ffffff 100%);
    overflow: hidden;
}

.product-detail::before {
    content: "LPF";
    position: absolute;
    right: 4%;
    top: 35px;
    font-family: serif;
    font-size: 140px;
    font-weight: 800;
    color: rgba(11, 16, 61, .035);
    pointer-events: none;
}

.product-detail__layout {
    position: relative;
    z-index: 2;
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
    align-items: stretch;
}

/* LEFT IMAGE CARD */
.product-gallery {
    display: flex;
    flex-direction: column;
}

.product-gallery__main {
    position: relative;
    width: 100%;
    aspect-ratio: 1 / 1;
    min-height: 480px;
    border-radius: 26px;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid rgba(216, 170, 69, .26);
    box-shadow:
        0 22px 48px rgba(11, 16, 61, .12),
        inset 0 1px 0 rgba(255,255,255,1);
    transition: .4s ease;
}

.product-gallery__main:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 65px rgba(11, 16, 61, .16);
}

.product-gallery__main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .65s ease;
}

.product-gallery__main:hover img {
    transform: scale(1.05);
}

.product-gallery__main::after {
    content: "";
    position: absolute;
    inset: 12px;
    border-radius: 20px;
    border: 1px solid rgba(255, 231, 165, .42);
    pointer-events: none;
}

.product-gallery__zoom-hint {
    position: absolute;
    left: 50%;
    bottom: 18px;
    transform: translateX(-50%);
    padding: 8px 14px;
    border-radius: 999px;
    background: rgba(11, 16, 61, .58);
    color: #ffffff;
    font-size: 11px;
    backdrop-filter: blur(10px);
}

.product-gallery__thumbs {
    display: flex;
    gap: 10px;
    margin-top: 14px;
}

.thumb {
    width: 68px;
    height: 68px;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(216, 170, 69, .28);
    background: #ffffff;
    cursor: pointer;
    opacity: .72;
    transition: .3s ease;
}

.thumb.active,
.thumb:hover {
    opacity: 1;
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(216, 170, 69, .22);
}

.thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* RIGHT INFO CARD */
.product-info {
    position: relative;
    min-height: 480px;
    padding: 26px;
    border-radius: 26px;
    background:
        radial-gradient(circle at 90% 0%, rgba(255, 231, 165, .25), transparent 28%),
        linear-gradient(145deg, #ffffff, #fffaf4);
    border: 1px solid rgba(216, 170, 69, .22);
    box-shadow: 0 22px 48px rgba(11, 16, 61, .08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.product-info::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        115deg,
        transparent 0%,
        transparent 42%,
        rgba(255, 231, 165, .22) 50%,
        transparent 58%,
        transparent 100%
    );
    transform: translateX(-130%);
    animation: productInfoShine 7s ease-in-out infinite;
    pointer-events: none;
}

.product-info > * {
    position: relative;
    z-index: 2;
}

.product-info__badge {
    display: inline-flex;
    width: fit-content;
    padding: 7px 13px;
    border-radius: 999px;
    color: #0B103D;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.product-info__brand {
    color: #d8aa45;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 2.3px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.product-info__name {
    color: #0B103D;
    font-size: clamp(26px, 2.8vw, 38px);
    line-height: 1.08;
    font-weight: 800;
    letter-spacing: -1px;
    margin: 0 0 14px;
}

.product-info__rating {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #f6a51a;
    margin-bottom: 20px;
    font-size: 14px;
}

.product-info__rating span {
    color: rgba(11, 16, 61, .48);
}

.price-current {
    color: #d8aa45;
    font-size: 28px;
    font-weight: 900;
}

.product-info__sizes h4,
.fragrance-notes h4 {
    color: #0B103D;
    font-size: 14px;
    font-weight: 800;
    margin: 22px 0 12px;
}

.size-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.size-btn {
    min-width: 88px;
    min-height: 58px;
    border-radius: 15px;
    background: #ffffff;
    border: 1px solid rgba(216, 170, 69, .25);
    color: #0B103D;
    cursor: pointer;
    transition: .35s ease;
    font-weight: 700;
}

.size-btn span {
    display: block;
    margin-top: 6px;
    color: rgba(11,16,61,.45);
    font-size: 11px;
}

.size-btn.active,
.size-btn:hover {
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    transform: translateY(-3px);
    box-shadow: 0 12px 24px rgba(216,170,69,.24);
}

.product-info__desc {
    color: rgba(11, 16, 61, .62);
    font-size: 14px;
    line-height: 1.7;
    margin: 20px 0;
}

/* Fragrance notes */
.fragrance-notes {
    padding: 18px;
    border-radius: 20px;
    background: rgba(255, 231, 165, .12);
    border: 1px solid rgba(216, 170, 69, .18);
    margin-top: 16px;
}

.note-row {
    margin-bottom: 14px;
}

.note-row:last-child {
    margin-bottom: 0;
}

.note-label {
    color: #0B103D;
    font-size: 12px;
    font-weight: 800;
}

.note-items span {
    display: inline-flex;
    margin: 6px 5px 0 0;
    padding: 7px 11px;
    border-radius: 999px;
    background: #ffffff;
    color: #0B103D;
    font-size: 12px;
    border: 1px solid rgba(216, 170, 69, .18);
}

/* Actions */
.product-info__actions {
    display: grid;
    grid-template-columns: 125px 1fr;
    gap: 12px;
    margin-top: 20px;
}

.qty-selector {
    height: 46px;
    display: grid;
    grid-template-columns: 38px 1fr 38px;
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid rgba(216, 170, 69, .24);
    background: #ffffff;
}

.qty-selector button {
    border: 0;
    background: #fffaf4;
    color: #0B103D;
    font-size: 18px;
    cursor: pointer;
    transition: .25s ease;
}

.qty-selector button:hover {
    background: #ffe7a5;
}

.qty-selector input {
    border: 0;
    text-align: center;
    font-size: 16px;
    font-weight: 900;
    color: #0B103D;
    background: #ffffff;
}

.product-add-btn {
    height: 46px;
    border-radius: 15px !important;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45) !important;
    color: #0B103D !important;
    font-size: 12px !important;
    font-weight: 900 !important;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    box-shadow: 0 14px 28px rgba(216,170,69,.26);
    transition: .35s ease;
}

.product-add-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 36px rgba(216,170,69,.36);
}

/* Meta box */
.product-info__meta {
    margin-top: 20px;
    padding: 16px;
    border-radius: 18px;
    background: rgba(255,255,255,.72);
    border: 1px solid rgba(216, 170, 69, .18);
}

.product-info__meta div {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(11,16,61,.62);
    font-size: 13px;
    margin-bottom: 10px;
}

.product-info__meta div:last-child {
    margin-bottom: 0;
}

.product-info__meta i {
    color: #d8aa45;
}

@keyframes productInfoShine {
    0%, 70% {
        transform: translateX(-130%);
    }
    100% {
        transform: translateX(130%);
    }
}

/* Tablet */
@media (max-width: 992px) {
    .product-detail {
        padding: 44px 0;
    }

    .product-detail__layout {
        max-width: 680px;
        grid-template-columns: 1fr;
        gap: 22px;
    }

    .product-gallery__main {
        min-height: auto;
        aspect-ratio: 1 / 1;
    }

    .product-info {
        min-height: auto;
        justify-content: flex-start;
    }
}

/* Mobile */
@media (max-width: 576px) {
    .product-detail {
        padding: 34px 0;
    }

    .product-gallery__main {
        border-radius: 22px;
    }

    .product-gallery__main::after {
        inset: 9px;
        border-radius: 16px;
    }

    .product-gallery__zoom-hint {
        font-size: 10px;
        padding: 7px 11px;
    }

    .product-info {
        padding: 20px;
        border-radius: 22px;
    }

    .product-info__name {
        font-size: 28px;
    }

    .price-current {
        font-size: 25px;
    }

    .product-info__actions {
        grid-template-columns: 1fr;
    }

    .qty-selector {
        max-width: 150px;
    }

    .size-btn {
        min-width: 84px;
        min-height: 56px;
    }

    .product-info__meta {
        padding: 14px;
    }

    .product-info__meta div {
        font-size: 12px;
    }
}



/* ==============================
   RELATED PRODUCTS PREMIUM SMALL
================================ */

.related-products-premium {
    position: relative;
    padding: 65px 0;
    background: linear-gradient(180deg, #fffaf2 0%, #ffffff 45%, #fffaf2 100%);
    overflow: hidden;
}

.related-title-pro {
    text-align: center;
    margin-bottom: 40px;
}

.related-label-line {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 18px;
    margin-bottom: 18px;
}

.related-label-line span {
    width: 58px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #d8a936, transparent);
}

.related-label-line p {
    margin: 0;
    color: #070849;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: 8px;
    text-transform: uppercase;
}

.related-title-pro h2 {
    margin: 0;
    color: #070849;
    font-size: clamp(38px, 5vw, 72px);
    font-weight: 900;
    letter-spacing: -2px;
    line-height: 1;
}

.related-title-pro h2 em {
    font-style: italic;
    font-weight: 800;
    color: #ffe29a;
    text-shadow: 0 10px 30px rgba(218, 169, 54, .22);
}

/* Grid */
.related-grid-pro {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

/* Card */
.related-card-pro {
    overflow: hidden;
    background: #fff;
    border: 1px solid rgba(218, 169, 54, .32);
    border-radius: 22px;
    box-shadow: 0 18px 45px rgba(7, 8, 73, .08);
    transition: .35s ease;
    animation: relatedFadeUp .7s ease both;
}

.related-card-pro:hover {
    transform: translateY(-8px);
    box-shadow: 0 28px 65px rgba(7, 8, 73, .15);
}

.related-card-pro__image {
    display: block;
    width: 100%;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    border-radius: 22px 22px 0 0;
    background: #f7f2e8;
}

.related-card-pro__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: .6s ease;
}

.related-card-pro:hover .related-card-pro__image img {
    transform: scale(1.06);
}

.related-card-pro__content {
    text-align: center;
    padding: 22px 18px 24px;
}

.related-card-pro__brand {
    margin: 0 0 10px;
    color: #070849;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 4px;
    text-transform: uppercase;
}

.related-card-pro__name {
    margin: 0;
    color: #292929;
    font-size: 19px;
    font-weight: 800;
    line-height: 1.25;
}

.related-card-pro__rating {
    margin: 14px 0 16px;
    color: #f5a019;
    font-size: 15px;
}

.related-card-pro__rating span {
    color: #8d90a8;
    font-size: 14px;
    margin-left: 5px;
}

.related-card-pro__price {
    margin: 0 0 20px;
    color: #d8a936;
    font-size: 20px;
    font-weight: 900;
}

.related-card-pro__btn {
    width: 100%;
    min-height: 48px;
    border: 0;
    border-radius: 999px;
    background: linear-gradient(135deg, #fff1b9 0%, #e6b946 100%);
    color: #070849;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    cursor: pointer;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 2px;
    text-transform: uppercase;
    box-shadow: 0 12px 28px rgba(218, 169, 54, .25);
    transition: .3s ease;
}

.related-card-pro__btn:hover {
    transform: translateY(-3px);
    color: #070849;
    box-shadow: 0 18px 35px rgba(218, 169, 54, .35);
}

.related-card-pro__btn:disabled {
    opacity: .55;
    cursor: not-allowed;
}

/* Animation */
@keyframes relatedFadeUp {
    from {
        opacity: 0;
        transform: translateY(26px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.related-card-pro:nth-child(2) {
    animation-delay: .08s;
}

.related-card-pro:nth-child(3) {
    animation-delay: .16s;
}

.related-card-pro:nth-child(4) {
    animation-delay: .24s;
}

/* Tablet */
@media (max-width: 991px) {
    .related-grid-pro {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
}

/* Mobile = 2 cards */
@media (max-width: 768px) {
    .related-products-premium {
        padding: 50px 0;
    }

    .related-title-pro {
        margin-bottom: 30px;
    }

    .related-label-line {
        gap: 10px;
        margin-bottom: 14px;
    }

    .related-label-line span {
        width: 28px;
    }

    .related-label-line p {
        font-size: 10px;
        letter-spacing: 3px;
    }

    .related-title-pro h2 {
        font-size: 38px;
        letter-spacing: -1px;
    }

    .related-grid-pro {
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .related-card-pro {
        border-radius: 16px;
    }

    .related-card-pro__image {
        border-radius: 16px 16px 0 0;
    }

    .related-card-pro__content {
        padding: 14px 9px 16px;
    }

    .related-card-pro__brand {
        margin-bottom: 7px;
        font-size: 8px;
        letter-spacing: 2px;
    }

    .related-card-pro__name {
        font-size: 14px;
    }

    .related-card-pro__rating {
        margin: 9px 0 10px;
        font-size: 11px;
    }

    .related-card-pro__rating span {
        font-size: 10px;
        margin-left: 3px;
    }

    .related-card-pro__price {
        margin-bottom: 12px;
        font-size: 14px;
    }

    .related-card-pro__btn {
        min-height: 38px;
        padding: 0 7px;
        font-size: 8px;
        letter-spacing: 1px;
    }
}

/* Very small phones */
@media (max-width: 380px) {
    .related-grid-pro {
        gap: 10px;
    }

    .related-title-pro h2 {
        font-size: 34px;
    }

    .related-card-pro__name {
        font-size: 13px;
    }

    .related-card-pro__price {
        font-size: 13px;
    }

    .related-card-pro__btn {
        font-size: 7.5px;
    }
}
    </style>
</head>

<body data-product-id="{{ $product->id }}">

    <!-- ========== Barre de navigation ========== -->
    @include('clints.layout.nav')

    <!-- Fil d’Ariane -->
<section class="product-breadcrumb-lpf">
    <div class="product-breadcrumb-lpf__glow"></div>

    <div class="container">
        <div class="product-breadcrumb-lpf__inner">
            <div class="product-breadcrumb-lpf__breadcrumb">
                <a href="{{ route('home') }}">Accueil</a>
                <span>/</span>
                <a href="{{ route('shop') }}">Boutique</a>
                <span>/</span>
                <strong>{{ $product->getTranslation('name', 'fr') }}</strong>
            </div>

            <div class="product-breadcrumb-lpf__badge">
                <i class="fas fa-spray-can-sparkles"></i>
                <span>LPF Produit</span>
            </div>
        </div>
    </div>
</section>

    <!-- Détails du produit -->
    <section class="section product-detail">
        <div class="container">
            <div class="product-detail__layout">

                <!-- Galerie -->
                <div class="product-gallery">
                    <div class="product-gallery__main" id="mainImage">
                        <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/arabic-perfume.png') }}"
                            alt="{{ $product->getTranslation('name', 'ar') }}" id="galleryMain">
                        <div class="product-gallery__zoom-hint"><i class="fas fa-search-plus"></i> Faites défiler pour
                            zoomer</div>
                    </div>
                    <div class="product-gallery__thumbs">
                        @foreach ($product->getMedia('gallery') as $media)
                            <button class="thumb {{ $loop->first ? 'active' : '' }}"
                                onclick="changeImage(this, '{{ $media->getUrl() }}')">
                                <img src="{{ $media->getUrl() }}" alt="Vue {{ $loop->iteration }}">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Informations -->
                <div class="product-info">
                    @if ($product->is_bestseller)
                        <span class="product-info__badge">Meilleure vente</span>
                    @endif
                    <p class="product-info__brand">{{ $product->brand->name ?? 'Lepetitflacon' }}</p>
                    <h1 class="product-info__name">{{ $product->getTranslation('name', 'ar') }}</h1>

                    <div class="product-info__rating">
                        <div class="stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <span>{{ number_format($product->average_rating ?? 5.0, 1) }} ({{ $product->reviews_count }}
                            avis)</span>
                    </div>

                    @php
                        $sizes = $product->sizes->sortBy('price')->values();
                        $firstSize = $sizes->first();
                    @endphp

                    <div class="product-info__price">
                        @if ($firstSize)
                            <span class="price-current" id="productCurrentPrice">
                                {{ number_format($firstSize->price, 2) }} DH
                            </span>
                        @else
                            <span class="price-current" id="productCurrentPrice">Prix indisponible</span>
                        @endif
                    </div>

                    <div class="product-info__sizes">
                        <h4>Contenance</h4>
                        <div class="size-options" id="sizeOptions">
                            @forelse($sizes as $index => $size)
                                <button type="button" class="size-btn {{ $index === 0 ? 'active' : '' }}"
                                    data-size-id="{{ $size->id }}" data-size="{{ $size->size }}"
                                    data-price="{{ $size->price }}" onclick="selectProductSize(this)">
                                    {{ $size->size }} <span>{{ number_format($size->price, 2) }} DH</span>
                                </button>
                            @empty
                                <p>Aucune taille disponible</p>
                            @endforelse
                        </div>
                    </div>

                    <p class="product-info__desc">
                        {{ $product->description }}
                    </p>

                    <!-- Notes olfactives -->
                    @if ($product->fragranceNotes->count() > 0)
                        <div class="fragrance-notes">
                            <h4>Notes du parfum</h4>
                            <div class="fragrance-notes__pyramid">
                                @if ($product->topNotes->count() > 0)
                                    <div class="note-row">
                                        <div class="note-level">
                                            <span class="note-label">Notes de tête</span>
                                            <div class="note-bar top"></div>
                                        </div>
                                        <div class="note-items">
                                            @foreach ($product->topNotes as $note)
                                                <span>{{ $note->getTranslation('name', 'ar') }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($product->heartNotes->count() > 0)
                                    <div class="note-row">
                                        <div class="note-level">
                                            <span class="note-label">Notes de cœur</span>
                                            <div class="note-bar heart"></div>
                                        </div>
                                        <div class="note-items">
                                            @foreach ($product->heartNotes as $note)
                                                <span>{{ $note->getTranslation('name', 'ar') }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($product->baseNotes->count() > 0)
                                    <div class="note-row">
                                        <div class="note-level">
                                            <span class="note-label">Notes de fond</span>
                                            <div class="note-bar base"></div>
                                        </div>
                                        <div class="note-items">
                                            @foreach ($product->baseNotes as $note)
                                                <span>{{ $note->getTranslation('name', 'ar') }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Ajouter au panier -->
                    <div class="product-info__actions">
                        <div class="qty-selector">
                            <button id="qtyMinus">−</button>
                            <input type="number" value="1" min="1" max="10" id="qtyInput" readonly>
                            <button id="qtyPlus">+</button>
                        </div>

                        <button class="btn btn-primary product-add-btn" id="addToCartBtn"
                            data-stock="{{ $product->stock_quantity }}"
                            {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>

                            @if ($product->stock_quantity <= 0)
                                <i class="fas fa-times-circle"></i> Rupture de stock
                            @else
                                <i class="fas fa-shopping-bag"></i> Ajouter au panier
                            @endif
                        </button>
                        {{-- <button
                            class="btn-icon wishlist-btn {{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'active' : '' }}"
                            id="wishlistBtn" data-product-id="{{ $product->id }}">
                            <i
                                class="{{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'fas' : 'far' }} fa-heart"></i>
                        </button> --}}
                    </div>

                    <!-- Informations supplémentaires -->
                    <div class="product-info__meta">
                        <div><i class="fas fa-truck"></i> Livraison gratuite pour les commandes supérieures à 600 DH
                        </div>
                        <div><i class="fas fa-undo"></i> Politique de retour de 30 jours</div>
                        <div><i class="fas fa-shield-alt"></i> Garantie d’authenticité du produit à 100%</div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Avis -->
    {{-- <section class="section section--alt reviews-section">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Avis clients</span>
                <h2>Ce que disent nos clients</h2>
                <div class="divider"></div>
            </div>

            <div class="reviews-summary">
                <div class="reviews-summary__score">
                    <span class="big-score">5.0</span>
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <span>Basé sur 312 avis</span>
                </div>
                <div class="reviews-summary__bars">
                    <div class="bar-row"><span>5 ★</span>
                        <div class="bar">
                            <div class="bar-fill" style="width:85%"></div>
                        </div><span>265</span>
                    </div>
                    <div class="bar-row"><span>4 ★</span>
                        <div class="bar">
                            <div class="bar-fill" style="width:10%"></div>
                        </div><span>31</span>
                    </div>
                    <div class="bar-row"><span>3 ★</span>
                        <div class="bar">
                            <div class="bar-fill" style="width:3%"></div>
                        </div><span>10</span>
                    </div>
                    <div class="bar-row"><span>2 ★</span>
                        <div class="bar">
                            <div class="bar-fill" style="width:1%"></div>
                        </div><span>4</span>
                    </div>
                    <div class="bar-row"><span>1 ★</span>
                        <div class="bar">
                            <div class="bar-fill" style="width:0.5%"></div>
                        </div><span>2</span>
                    </div>
                </div>
                <!-- Add Review Form -->
                <div class="add-review-form"
                    style="margin-bottom: 40px; background: var(--bg-card); padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    @auth
                        <h3 style="margin-bottom: 20px;">Ajouter votre avis</h3>
                        <form id="reviewForm" data-product-id="{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="rating-input"
                                style="margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                                <span>Votre note :</span>
                                <div class="star-rating"
                                    style="display: flex; flex-direction: row-reverse; gap: 5px; font-size: 1.5rem;">
                                    <input type="radio" name="rating" value="5" id="r5"
                                        style="display:none;"><label for="r5"
                                        style="cursor:pointer; color: var(--color-text-dim);">★</label>
                                    <input type="radio" name="rating" value="4" id="r4"
                                        style="display:none;"><label for="r4"
                                        style="cursor:pointer; color: var(--color-text-dim);">★</label>
                                    <input type="radio" name="rating" value="3" id="r3"
                                        style="display:none;"><label for="r3"
                                        style="cursor:pointer; color: var(--color-text-dim);">★</label>
                                    <input type="radio" name="rating" value="2" id="r2"
                                        style="display:none;"><label for="r2"
                                        style="cursor:pointer; color: var(--color-text-dim);">★</label>
                                    <input type="radio" name="rating" value="1" id="r1"
                                        style="display:none;"><label for="r1"
                                        style="cursor:pointer; color: var(--color-text-dim);">★</label>
                                </div>
                            </div>
                            <style>
                                .star-rating label:hover,
                                .star-rating label:hover~label,
                                .star-rating input:checked~label {
                                    color: var(--color-gold) !important;
                                }
                            </style>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <textarea id="reviewComment" name="comment" placeholder="Entrez votre commentaire ici..." required
                                    style="width: 100%; padding: 15px; background: var(--bg-input); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: var(--color-text); min-height: 120px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitReviewBtn">Envoyer l’avis</button>
                        </form>
                    @else
                        <div style="text-align: center; padding: 20px;">
                            <i class="fas fa-lock"
                                style="font-size: 2rem; color: var(--color-gold); margin-bottom: 15px; display: block;"></i>
                            <p style="margin-bottom: 20px; color: var(--color-text-dim);">Veuillez vous connecter pour
                                pouvoir ajouter un avis sur ce produit.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                        </div>
                    @endauth
                </div>

                <div class="reviews-list">
                    @forelse($product->reviews as $review)
                        <div class="review-card">
                            <div class="review-card__header">
                                <div class="review-card__author">
                                    <div class="review-avatar">{{ mb_substr($review->user->name, 0, 2) }}</div>
                                    <div>
                                        <h4>{{ $review->user->name }}</h4><span
                                            class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"
                                            style="color: {{ $i <= $review->rating ? 'var(--color-gold)' : 'var(--color-text-dim)' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <p>{{ $review->comment }}</p>
                            @if ($review->is_verified_purchase)
                                <span class="review-verified"><i class="fas fa-check-circle"></i> Achat vérifié</span>
                            @endif
                        </div>
                    @empty
                        <div class="mini-cart__empty">
                            <i class="fas fa-comment-slash"></i>
                            <p>Aucun avis pour ce produit pour le moment. Soyez le premier à le noter !</p>
                        </div>
                    @endforelse
                </div>
            </div>
    </section> --}}

<!-- Produits similaires -->
<section class="section related-products-premium">
    <div class="container">

        <div class="related-title-pro">
            <div class="related-label-line">
                <span></span>
                <p>Vous pourriez aussi aimer</p>
                <span></span>
            </div>

            <h2>
                Produits <em>similaires</em>
            </h2>
        </div>

        <div class="related-grid-pro">
            @foreach ($relatedProducts as $item)
                @php
                    $hasSizes = $item->sizes && $item->sizes->count() > 0;
                    $minSizePrice = $hasSizes ? $item->sizes->min('price') : null;
                    $maxSizePrice = $hasSizes ? $item->sizes->max('price') : null;
                @endphp

                <div class="related-card-pro"
                    data-id="{{ $item->id }}"
                    data-name="{{ $item->getTranslation('name', 'ar') }}"
                    data-price="{{ $item->price }}"
                    data-img="{{ $item->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">

                    <a href="{{ route('product', $item->id) }}" class="related-card-pro__image">
                        <img src="{{ $item->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                            alt="{{ $item->getTranslation('name', 'ar') }}">
                    </a>

                    <div class="related-card-pro__content">
                        <p class="related-card-pro__brand">
                            {{ $item->brand->name ?? 'LePetitFlacon' }}
                        </p>

                        <h3 class="related-card-pro__name">
                            {{ $item->getTranslation('name', 'fr') }}
                        </h3>

                        <div class="related-card-pro__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(128)</span>
                        </div>

                        <p class="related-card-pro__price">
                            @if ($hasSizes)
                                @if ($minSizePrice == $maxSizePrice)
                                    {{ number_format($minSizePrice, 2, ',', ' ') }} DH
                                @else
                                    {{ number_format($minSizePrice, 2, ',', ' ') }} DH –
                                    {{ number_format($maxSizePrice, 2, ',', ' ') }} DH
                                @endif
                            @else
                                {{ number_format($item->sale_price ?: $item->price, 2, ',', ' ') }} DH
                            @endif
                        </p>

                        @if ($item->stock_quantity <= 0)
                            <button class="related-card-pro__btn" disabled>
                                Rupture de stock
                            </button>
                        @elseif ($hasSizes)
                            <a href="{{ route('product', $item->id) }}" class="related-card-pro__btn">
                                Commander maintenant
                            </a>
                        @else
                            <button class="related-card-pro__btn add-to-cart-btn">
                                Ajouter au panier
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

    <!-- ========== Pied de page ========== -->
    @include('clints.layout.footer')

    <script src="{{ asset('assets/clints/js/product.js') }}"></script>
</body>

<a href="https://wa.me/212704654736"
   class="wa-perfume-magic"
   target="_blank"
   rel="noopener"
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
