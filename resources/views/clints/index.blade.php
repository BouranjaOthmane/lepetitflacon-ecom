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

    <style>
        :root {
    --hero-dark: #0B103D;
    --hero-gold: #ffe7a5;
    --hero-gold-deep: #d8aa45;
    --hero-white: #ffffff;
}

.hero-lpf {
    position: relative;
    min-height: 720px;
    overflow: hidden;
    background: var(--hero-dark);
    border-top: 1px solid rgba(255, 231, 165, 0.45);
}

.hero-lpf__bg {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.hero-lpf__bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.06);
    animation: heroZoom 14s ease-in-out infinite alternate;
}

.hero-lpf__glass {
    position: absolute;
    inset: 0;
    z-index: 2;
    background:
        linear-gradient(90deg, rgba(11, 16, 61, 0.92) 0%, rgba(11, 16, 61, 0.62) 42%, rgba(11, 16, 61, 0.10) 100%),
        radial-gradient(circle at 25% 45%, rgba(255, 231, 165, 0.18), transparent 35%);
}

.hero-lpf::before {
    content: "LPF";
    position: absolute;
    left: -35px;
    top: 120px;
    z-index: 3;
    font-size: 250px;
    font-family: serif;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.055);
    line-height: 1;
    pointer-events: none;
    animation: bigLogoFloat 6s ease-in-out infinite;
}

.hero-lpf::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 4;
    background: linear-gradient(
        115deg,
        transparent 0%,
        transparent 44%,
        rgba(255, 231, 165, 0.16) 50%,
        transparent 56%,
        transparent 100%
    );
    transform: translateX(-120%);
    animation: heroShine 7s ease-in-out infinite;
    pointer-events: none;
}

.hero-lpf__container {
    position: relative;
    z-index: 6;
    min-height: 720px;
    display: flex;
    align-items: center;
}

.hero-lpf__content {
    max-width: 820px;
    animation: heroContentUp 1s ease forwards;
}

.hero-lpf__badge {
    display: inline-flex;
    align-items: center;
    padding: 12px 28px;
    border-radius: 999px;
    background: rgba(255, 231, 165, 0.12);
    border: 1px solid rgba(255, 231, 165, 0.55);
    backdrop-filter: blur(16px);
    color: var(--hero-gold);
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 4px;
    text-transform: uppercase;
    box-shadow:
        0 18px 35px rgba(0, 0, 0, 0.20),
        inset 0 1px 0 rgba(255, 255, 255, 0.16);
    animation: badgeFloat 3.5s ease-in-out infinite;
}

.hero-lpf__title {
    margin: 30px 0 0;
    color: var(--hero-white);
    font-size: clamp(50px, 7vw, 104px);
    line-height: 0.95;
    font-weight: 800;
    letter-spacing: -3px;
    text-shadow: 0 18px 45px rgba(0, 0, 0, 0.38);
}

.hero-lpf__title em {
    color: var(--hero-gold);
    font-style: italic;
    font-weight: 700;
    text-shadow:
        0 0 22px rgba(255, 231, 165, 0.35),
        0 12px 35px rgba(0, 0, 0, 0.35);
}

.hero-lpf__mist {
    position: absolute;
    z-index: 5;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
}

.hero-lpf__mist--one {
    width: 220px;
    height: 220px;
    left: 9%;
    bottom: 12%;
    background: radial-gradient(circle, rgba(255, 231, 165, 0.20), transparent 65%);
    animation: perfumeMist 7s ease-in-out infinite;
}

.hero-lpf__mist--two {
    width: 320px;
    height: 320px;
    right: 12%;
    top: 15%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.12), transparent 65%);
    animation: perfumeMist 9s ease-in-out infinite reverse;
}

.hero-lpf__scroll {
    position: absolute;
    left: 50%;
    bottom: 28px;
    z-index: 8;
    width: 26px;
    height: 42px;
    border: 1px solid rgba(255, 231, 165, 0.55);
    border-radius: 999px;
    transform: translateX(-50%);
}

.hero-lpf__scroll span {
    position: absolute;
    top: 8px;
    left: 50%;
    width: 4px;
    height: 8px;
    border-radius: 999px;
    background: var(--hero-gold);
    transform: translateX(-50%);
    animation: scrollDot 1.6s infinite;
}

@keyframes heroZoom {
    from {
        transform: scale(1.06) translateX(0);
    }
    to {
        transform: scale(1.13) translateX(18px);
    }
}

@keyframes heroShine {
    0%, 68% {
        transform: translateX(-120%);
    }
    100% {
        transform: translateX(120%);
    }
}

@keyframes heroContentUp {
    from {
        opacity: 0;
        transform: translateY(38px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes badgeFloat {
    0%, 100% {
        transform: translateY(0) rotateX(0);
    }
    50% {
        transform: translateY(-6px) rotateX(8deg);
    }
}

@keyframes bigLogoFloat {
    0%, 100% {
        transform: translateY(0) rotateY(0deg);
    }
    50% {
        transform: translateY(-16px) rotateY(8deg);
    }
}

@keyframes perfumeMist {
    0%, 100% {
        transform: translateY(0) scale(1);
        opacity: 0.7;
    }
    50% {
        transform: translateY(-28px) scale(1.18);
        opacity: 1;
    }
}

@keyframes scrollDot {
    0% {
        transform: translate(-50%, 0);
        opacity: 1;
    }
    100% {
        transform: translate(-50%, 18px);
        opacity: 0;
    }
}

@media (max-width: 768px) {
    .hero-lpf,
    .hero-lpf__container {
        min-height: 620px;
    }

    .hero-lpf__glass {
        background: linear-gradient(90deg, rgba(11, 16, 61, 0.94), rgba(11, 16, 61, 0.58));
    }

    .hero-lpf__badge {
        font-size: 10px;
        letter-spacing: 2px;
        padding: 10px 16px;
    }

    .hero-lpf__title {
        font-size: 46px;
        letter-spacing: -1px;
    }

    .hero-lpf::before {
        font-size: 150px;
        top: 130px;
    }
}


/* bestsellers */
.bestsellers-lpf {
    position: relative;
    padding: 100px 0;
    background:
        radial-gradient(circle at 12% 14%, rgba(255, 231, 165, .22), transparent 28%),
        linear-gradient(180deg, #ffffff 0%, #fffaf4 100%);
    overflow: hidden;
}

.bestsellers-lpf::before {
    content: "BEST";
    position: absolute;
    right: -40px;
    top: 70px;
    font-size: 150px;
    font-family: serif;
    font-weight: 800;
    color: rgba(11, 16, 61, .035);
}

.bestsellers-lpf__header {
    text-align: center;
    margin-bottom: 58px;
}

.bestsellers-lpf__label {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #0B103D;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 5px;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.bestsellers-lpf__label::before,
.bestsellers-lpf__label::after {
    content: "";
    width: 34px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #d8aa45);
}

.bestsellers-lpf__label::after {
    background: linear-gradient(90deg, #d8aa45, transparent);
}

.bestsellers-lpf__header h2 {
    margin: 0;
    color: #0B103D;
    font-size: clamp(38px, 5vw, 58px);
    font-weight: 800;
    letter-spacing: -1px;
}

.bestsellers-lpf__header h2 em {
    color: #ffe7a5;
    font-style: italic;
}

.bestsellers-lpf__header p {
    margin: 16px auto 0;
    color: rgba(11, 16, 61, .65);
    font-size: 16px;
}

.bestsellers-lpf__slider {
    overflow: hidden;
}

.bestsellers-lpf__track {
    display: flex;
    transition: transform .55s ease;
}

.bestseller-lpf-card {
    min-width: 100%;
    display: grid;
    grid-template-columns: 420px 1fr;
    align-items: center;
    gap: 55px;
    padding: 34px;
    border-radius: 34px;
    background: rgba(255,255,255,.82);
    border: 1px solid rgba(216, 170, 69, .22);
    box-shadow:
        0 26px 60px rgba(11, 16, 61, .10),
        inset 0 1px 0 rgba(255,255,255,1);
}

.bestseller-lpf-card__image {
    position: relative;
    height: 430px;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 25px 55px rgba(11, 16, 61, .18);
}

.bestseller-lpf-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .7s ease;
}

.bestseller-lpf-card:hover .bestseller-lpf-card__image img {
    transform: scale(1.08);
}

.bestseller-lpf-card__badge {
    position: absolute;
    left: 20px;
    top: 20px;
    padding: 9px 16px;
    border-radius: 999px;
    color: #0B103D;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.bestseller-lpf-card__category {
    color: #0B103D;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 4px;
    text-transform: uppercase;
}

.bestseller-lpf-card__info h3 {
    margin: 14px 0 14px;
    color: #2b2b2b;
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.1;
}

.bestseller-lpf-card__info p {
    max-width: 520px;
    color: rgba(11, 16, 61, .60);
    font-size: 16px;
    line-height: 1.8;
}

.bestseller-lpf-card__meta {
    display: flex;
    align-items: center;
    gap: 26px;
    margin: 28px 0;
}

.bestseller-lpf-card__price {
    color: #d8aa45;
    font-size: 26px;
    font-weight: 900;
}

.bestseller-lpf-card__rating {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #f7a51b;
    font-size: 15px;
}

.bestseller-lpf-card__rating span {
    margin-left: 6px;
    color: rgba(11,16,61,.45);
}

.bestseller-lpf-card__btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    min-height: 48px;
    padding: 0 26px;
    border-radius: 999px;
    color: #0B103D;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    box-shadow: 0 16px 32px rgba(216, 170, 69, .25);
    transition: .35s ease;
}

.bestseller-lpf-card__btn:hover {
    transform: translateY(-5px);
}

.bestsellers-lpf__nav {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 18px;
    margin-top: 34px;
}

.bestsellers-lpf__btn {
    width: 42px;
    height: 42px;
    border-radius: 14px;
    border: 1px solid rgba(216,170,69,.35);
    background: #fff;
    color: #0B103D;
    cursor: pointer;
}

.bestsellers-lpf__dots {
    display: flex;
    gap: 8px;
}

.bestsellers-lpf__dots .dot {
    width: 8px;
    height: 8px;
    border-radius: 999px;
    background: rgba(11,16,61,.25);
}

.bestsellers-lpf__dots .dot.active {
    width: 28px;
    background: #d8aa45;
}

@media (max-width: 992px) {
    .bestseller-lpf-card {
        grid-template-columns: 1fr;
        gap: 28px;
    }

    .bestseller-lpf-card__image {
        height: 360px;
    }
}

@media (max-width: 576px) {
    .bestsellers-lpf {
        padding: 70px 0;
    }

    .bestseller-lpf-card {
        padding: 18px;
        border-radius: 24px;
    }

    .bestseller-lpf-card__image {
        height: 260px;
        border-radius: 20px;
    }

    .bestseller-lpf-card__info h3 {
        font-size: 28px;
    }

    .bestseller-lpf-card__meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}


/* feedback */
.testimonials-lpf {
    position: relative;
    overflow: hidden;
    padding: 105px 0;
    background:
        radial-gradient(circle at 12% 18%, rgba(255, 231, 165, 0.18), transparent 28%),
        radial-gradient(circle at 88% 8%, rgba(216, 170, 69, 0.10), transparent 26%),
        linear-gradient(180deg, #fffaf4 0%, #ffffff 100%);
}

.testimonials-lpf::before {
    content: "AVIS";
    position: absolute;
    left: -35px;
    top: 60px;
    font-family: serif;
    font-size: 190px;
    font-weight: 800;
    color: rgba(11, 16, 61, 0.035);
    pointer-events: none;
}

.testimonials-lpf__header {
    text-align: center;
    margin-bottom: 65px;
    position: relative;
    z-index: 2;
}

.testimonials-lpf__label {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #0B103D;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 5px;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.testimonials-lpf__label::before,
.testimonials-lpf__label::after {
    content: "";
    width: 34px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #d8aa45);
}

.testimonials-lpf__label::after {
    background: linear-gradient(90deg, #d8aa45, transparent);
}

.testimonials-lpf__header h2 {
    margin: 0;
    color: #0B103D;
    font-size: clamp(38px, 5vw, 58px);
    font-weight: 800;
    letter-spacing: -1px;
}

.testimonials-lpf__header h2 em {
    color: #d8aa45;
    font-style: italic;
}

.testimonials-lpf__header p {
    margin: 16px auto 0;
    color: rgba(11, 16, 61, 0.65);
    font-size: 16px;
}

.testimonials-lpf__grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
}

.testimonial-lpf-card {
    position: relative;
    min-height: 390px;
    padding: 34px;
    border-radius: 30px;
    background:
        linear-gradient(145deg, rgba(255,255,255,1), rgba(255,250,244,.92));
    border: 1px solid rgba(216, 170, 69, 0.24);
    box-shadow:
        0 24px 55px rgba(11, 16, 61, 0.10),
        inset 0 1px 0 rgba(255,255,255,1);
    overflow: hidden;
    transform-style: preserve-3d;
    transition: 0.45s ease;
}

.testimonial-lpf-card::before {
    content: "";
    position: absolute;
    inset: 14px;
    border-radius: 24px;
    border: 1px solid rgba(216, 170, 69, 0.20);
    pointer-events: none;
    transition: 0.4s ease;
}

.testimonial-lpf-card::after {
    content: "";
    position: absolute;
    right: -55px;
    top: -55px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255, 231, 165, 0.55), transparent 66%);
}

.testimonial-lpf-card:hover {
    transform: translateY(-12px) rotateX(5deg);
    box-shadow:
        0 34px 75px rgba(11, 16, 61, 0.16),
        0 0 0 1px rgba(255, 231, 165, 0.32);
}

.testimonial-lpf-card:hover::before {
    inset: 10px;
    border-color: rgba(216, 170, 69, 0.50);
}

.testimonial-lpf-card--featured {
    transform: translateY(-18px);
    background:
        radial-gradient(circle at 85% 12%, rgba(255, 231, 165, 0.36), transparent 28%),
        linear-gradient(145deg, #ffffff, #fff8ed);
}

.testimonial-lpf-card--featured:hover {
    transform: translateY(-28px) rotateX(5deg);
}

.testimonial-lpf-card__quote {
    position: absolute;
    right: 28px;
    top: 18px;
    font-family: serif;
    font-size: 110px;
    line-height: 1;
    color: rgba(216, 170, 69, 0.18);
}

.testimonial-lpf-card__stars {
    position: relative;
    z-index: 2;
    display: flex;
    gap: 5px;
    color: #f6a51a;
    font-size: 16px;
    margin-bottom: 28px;
}

.testimonial-lpf-card p {
    position: relative;
    z-index: 2;
    color: rgba(11, 16, 61, 0.68);
    font-size: 16px;
    line-height: 1.9;
    font-style: italic;
    margin: 0 0 34px;
}

.testimonial-lpf-card__author {
    position: absolute;
    left: 34px;
    right: 34px;
    bottom: 34px;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 16px;
}

.testimonial-lpf-card__avatar {
    width: 58px;
    height: 58px;
    border-radius: 18px;
    background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
    color: #0B103D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    box-shadow: 0 14px 26px rgba(216, 170, 69, 0.26);
}

.testimonial-lpf-card__author h4 {
    margin: 0 0 5px;
    color: #0B103D;
    font-size: 17px;
}

.testimonial-lpf-card__author span {
    color: rgba(11, 16, 61, 0.52);
    font-size: 14px;
}

.testimonial-lpf-card__author span i {
    color: #d8aa45;
    margin-right: 5px;
}

.testimonials-lpf__glow {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
}

.testimonials-lpf__glow--one {
    width: 220px;
    height: 220px;
    left: 7%;
    bottom: 12%;
    background: radial-gradient(circle, rgba(255, 231, 165, .22), transparent 65%);
    animation: reviewMist 7s ease-in-out infinite;
}

.testimonials-lpf__glow--two {
    width: 320px;
    height: 320px;
    right: 7%;
    top: 22%;
    background: radial-gradient(circle, rgba(216, 170, 69, .12), transparent 65%);
    animation: reviewMist 9s ease-in-out infinite reverse;
}

@keyframes reviewMist {
    0%, 100% {
        transform: translateY(0) scale(1);
        opacity: .75;
    }
    50% {
        transform: translateY(-24px) scale(1.15);
        opacity: 1;
    }
}

@media (max-width: 992px) {
    .testimonials-lpf__grid {
        grid-template-columns: 1fr;
    }

    .testimonial-lpf-card--featured {
        transform: none;
    }

    .testimonial-lpf-card--featured:hover {
        transform: translateY(-12px) rotateX(5deg);
    }
}

@media (max-width: 576px) {
    .testimonials-lpf {
        padding: 70px 0;
    }

    .testimonial-lpf-card {
        min-height: 420px;
        padding: 26px;
        border-radius: 24px;
    }

    .testimonial-lpf-card__author {
        left: 26px;
        right: 26px;
        bottom: 26px;
    }

    .testimonial-lpf-card p {
        font-size: 14px;
    }
}
    </style>
</head>

<body>

    <!-- ========== شريط التنقل ========== -->
    @include('clints.layout.nav')



    <!-- ========== hero section ========== -->
<section class="hero-lpf" id="hero">
    <div class="hero-lpf__bg">
        <img src="{{ asset('assets/clints/images/hero-perfume-1.png') }}" alt="Parfum de luxe">
    </div>

    <div class="hero-lpf__glass"></div>
    <div class="hero-lpf__mist hero-lpf__mist--one"></div>
    <div class="hero-lpf__mist hero-lpf__mist--two"></div>

    <div class="container hero-lpf__container">
        <div class="hero-lpf__content">
            <span class="hero-lpf__badge">
                Collection exclusive 2026 · Lepetitflacon SHOP
            </span>

            <h1 class="hero-lpf__title">
                Découvrez votre parfum<br>
                <em>d’exception</em>
            </h1>
        </div>
    </div>

    <div class="hero-lpf__scroll">
        <span></span>
    </div>
</section>

    <!-- ========== categories ========== -->
<section class="categories-lpf" id="categories">
    <div class="container">

        <div class="categories-lpf__header reveal">
            <span class="categories-lpf__label">Explorer</span>

            <h2>
                Nos <em>collections</em>
            </h2>

            <p>
                Découvrez nos familles de parfums soigneusement sélectionnées
            </p>
        </div>

        <div class="categories-lpf__grid reveal">
            @foreach ($categories as $category)
                <a href="{{ route('shop', ['cat' => $category->id]) }}" class="category-lpf-card">
                    <div class="category-lpf-card__shine"></div>

                    <div class="category-lpf-card__image">
                        <img src="{{ $category->getFirstMediaUrl('images') ?: asset('assets/clints/images/perfume-collection.png') }}"
                            alt="{{ $category->getTranslation('name', 'fr') }}">
                    </div>

                    <div class="category-lpf-card__content">
                        <span class="category-lpf-card__tag">Collection</span>
                        <h4>{{ $category->getTranslation('name', 'fr') }}</h4>
                        <p>{{ $category->products_count }} produit(s)</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>



    <!-- ========== bestsellers section ========== -->
   @if ($bestsellerProducts->count() > 0)
<section class="bestsellers-lpf" id="bestsellers">
    <div class="container">

        <div class="bestsellers-lpf__header reveal">
            <span class="bestsellers-lpf__label">Les plus demandés</span>
            <h2>Meilleures <em>ventes</em></h2>
            <p>Nos parfums les plus appréciés et adoptés par nos clients</p>
        </div>

        <div class="bestsellers-lpf__slider reveal">
            <div class="bestsellers-lpf__track" id="bestsellersTrack">
                @foreach ($bestsellerProducts as $product)
                    <div class="bestseller-lpf-card">

                        <div class="bestseller-lpf-card__image">
                            <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/arabic-perfume.png') }}"
                                alt="{{ $product->getTranslation('name', 'fr') }}">

                            <span class="bestseller-lpf-card__badge">
                                Best seller
                            </span>
                        </div>

                        <div class="bestseller-lpf-card__info">
                            <span class="bestseller-lpf-card__category">
                                {{ $product->category->getTranslation('name', 'fr') ?? 'Collection exclusive' }}
                            </span>

                            <h3>{{ $product->getTranslation('name', 'fr') }}</h3>

                            <p>
                                {{ Str::limit(strip_tags($product->getTranslation('description', 'fr')), 95) }}
                            </p>

                            <div class="bestseller-lpf-card__meta">
                                <span class="bestseller-lpf-card__price">
                                    {{ $product->sale_price ?: $product->price }} DH
                                </span>

                                <div class="bestseller-lpf-card__rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </div>
                            </div>

                            <a href="{{ route('product', $product->id) }}" class="bestseller-lpf-card__btn">
                                Découvrir
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="bestsellers-lpf__nav">
                <button class="bestsellers-lpf__btn" id="bsPrev">
                    <i class="fas fa-arrow-left"></i>
                </button>

                <div class="bestsellers-lpf__dots" id="bsDots">
                    @foreach ($bestsellerProducts as $index => $product)
                        <span class="dot {{ $index === 0 ? 'active' : '' }}"></span>
                    @endforeach
                </div>

                <button class="bestsellers-lpf__btn" id="bsNext">
                    <i class="fas fa-arrow-right"></i>
                </button>
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
                    </div>
                </div>
            </section>
        @endif
    @endauth


    <!-- ========== feedback ========== -->
<section class="testimonials-lpf" id="testimonials">
    <div class="testimonials-lpf__glow testimonials-lpf__glow--one"></div>
    <div class="testimonials-lpf__glow testimonials-lpf__glow--two"></div>

    <div class="container">
        <div class="testimonials-lpf__header reveal">
            <span class="testimonials-lpf__label">Ils en parlent</span>
            <h2>Avis de nos <em>clients</em></h2>
            <p>Découvrez pourquoi nos clients reviennent encore et encore</p>
        </div>

        <div class="testimonials-lpf__grid reveal">

            <div class="testimonial-lpf-card">
                <div class="testimonial-lpf-card__quote">“</div>

                <div class="testimonial-lpf-card__stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>

                <p>
                    Ambre Oud Royal est un parfum absolument remarquable. Sa tenue est impressionnante et je reçois des
                    compliments chaque fois que je le porte. C’est le vrai luxe dans un flacon.
                </p>

                <div class="testimonial-lpf-card__author">
                    <div class="testimonial-lpf-card__avatar">SA</div>
                    <div>
                        <h4>Sarah Ahmed</h4>
                        <span><i class="fas fa-check-circle"></i> Acheteuse vérifiée</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-lpf-card testimonial-lpf-card--featured">
                <div class="testimonial-lpf-card__quote">“</div>

                <div class="testimonial-lpf-card__stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>

                <p>
                    Le packaging à lui seul reflète la qualité. Rose Mystique est devenu mon parfum préféré — féminin,
                    raffiné et totalement envoûtant. Il vaut chaque centime.
                </p>

                <div class="testimonial-lpf-card__author">
                    <div class="testimonial-lpf-card__avatar">MK</div>
                    <div>
                        <h4>Mariam Khaled</h4>
                        <span><i class="fas fa-check-circle"></i> Acheteuse vérifiée</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-lpf-card">
                <div class="testimonial-lpf-card__quote">“</div>

                <div class="testimonial-lpf-card__stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>

                <p>
                    Je découvre les parfums de luxe depuis des années, et LePetitFlacon fait partie des plus belles
                    découvertes que j’ai faites. Noir Élégance est idéal pour le soir — intense et inoubliable.
                </p>

                <div class="testimonial-lpf-card__author">
                    <div class="testimonial-lpf-card__avatar">OM</div>
                    <div>
                        <h4>Omar Mohammed</h4>
                        <span><i class="fas fa-check-circle"></i> Acheteur vérifié</span>
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

<!-- LPF Cookie Perfume Banner -->
<div class="cookie-lpf" id="cookieLpf">
    <div class="cookie-lpf__bottle">
        <span class="cookie-lpf__spray"></span>
        <i class="fas fa-spray-can-sparkles"></i>
    </div>

    <div class="cookie-lpf__content">
        <span class="cookie-lpf__label">Votre expérience parfumée</span>
        <h3>Cookies & notes olfactives</h3>
        <p>
            Nous utilisons quelques cookies pour rendre votre visite plus douce :
            navigation fluide, panier mémorisé et expérience boutique améliorée.
        </p>
    </div>

    <div class="cookie-lpf__actions">
        <button class="cookie-lpf__btn cookie-lpf__btn--ghost" id="cookieReject">
            Refuser
        </button>
        <button class="cookie-lpf__btn cookie-lpf__btn--gold" id="cookieAccept">
            J’accepte
        </button>
    </div>
</div>

</html>
