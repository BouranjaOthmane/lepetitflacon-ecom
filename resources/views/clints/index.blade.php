<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lepetitflacon — Parfums d’exception et senteurs raffinées</title>
    <meta name="description"
        content="Achetez en ligne des parfums pour homme et femme chez Lepetitflacon. Découvrez une sélection de fragrances élégantes, raffinées et durables.">
    <link rel="stylesheet"
        href="{{ asset('assets/clints/css/style.css') }}?v={{ filemtime(public_path('assets/clints/css/style.css')) }}">

    <link rel="stylesheet" href="{{ asset('assets/clints/css/homepage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- Favicons -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

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
            content: "LUX";
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
            background: linear-gradient(115deg,
                    transparent 0%,
                    transparent 44%,
                    rgba(255, 231, 165, 0.16) 50%,
                    transparent 56%,
                    transparent 100%);
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

            0%,
            68% {
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

            0%,
            100% {
                transform: translateY(0) rotateX(0);
            }

            50% {
                transform: translateY(-6px) rotateX(8deg);
            }
        }

        @keyframes bigLogoFloat {

            0%,
            100% {
                transform: translateY(0) rotateY(0deg);
            }

            50% {
                transform: translateY(-16px) rotateY(8deg);
            }
        }

        @keyframes perfumeMist {

            0%,
            100% {
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
                text-align: center;
                margin: auto;
                display: flex;
                justify-content: center;
                text-align: center;
            }

            .hero-lpf__title {
                font-size: 46px;
                letter-spacing: -1px;
                text-align: center;
                line-height: 50px;
            }

            .hero-lpf::before {
                font-size: 150px;
                top: 130px;
            }
        }


        /* bestsellers */
        .bestsellers-lpf {
            position: relative;
            padding: 50px 0;
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
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(216, 170, 69, .22);
            box-shadow:
                0 26px 60px rgba(11, 16, 61, .10),
                inset 0 1px 0 rgba(255, 255, 255, 1);
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
            color: rgba(11, 16, 61, .45);
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
            border: 1px solid rgba(216, 170, 69, .35);
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
            background: rgba(11, 16, 61, .25);
        }

        .bestsellers-lpf__dots .dot.active {
            width: 28px;
            background: #ffe7a5;
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

        .bestsellers-lpf__slider {
            overflow: hidden;
        }

        .bestsellers-lpf__track {
            display: flex;
            width: 100%;
            transition: transform .55s ease;
        }

        .bestseller-lpf-card {
            flex: 0 0 100%;
            min-width: 100%;
        }

        /* feedback */
        .testimonials-lpf {
            position: relative;
            overflow: hidden;
            padding: 95px 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(226, 177, 83, .16), transparent 30%),
                radial-gradient(circle at 90% 15%, rgba(7, 8, 73, .10), transparent 28%),
                linear-gradient(180deg, #fffaf2 0%, #ffffff 50%, #fff8ee 100%);
        }

        .testimonials-lpf__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(12px);
            pointer-events: none;
            animation: testimonialsFloat 7s ease-in-out infinite;
        }

        .testimonials-lpf__glow--one {
            width: 230px;
            height: 230px;
            left: -80px;
            bottom: 90px;
            background: rgba(226, 177, 83, .28);
        }

        .testimonials-lpf__glow--two {
            width: 260px;
            height: 260px;
            right: -90px;
            top: 80px;
            background: rgba(7, 8, 73, .12);
            animation-delay: 1.2s;
        }

        .testimonials-lpf__header {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 55px;
        }

        .testimonials-lpf__label {
            display: inline-block;
            margin-bottom: 16px;
            color: #070849;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 6px;
            text-transform: uppercase;
        }

        .testimonials-lpf__header h2 {
            margin: 0;
            color: #070849;
            font-size: clamp(42px, 6vw, 82px);
            font-weight: 950;
            letter-spacing: -3px;
            line-height: 1;
        }

        .testimonials-lpf__header h2 em {
            color: #d8a936;
            font-style: italic;
        }

        .testimonials-lpf__header p {
            margin: 18px 0 0;
            color: #737489;
            font-size: 17px;
        }

        .testimonials-carousel {
            position: relative;
            z-index: 2;
        }

        .testimonials-carousel .owl-stage {
            display: flex;
            align-items: stretch;
            padding: 20px 0 35px;
        }

        .testimonials-carousel .owl-item {
            display: flex;
        }

        .testimonial-lpf-card {
            position: relative;
            min-height: 310px;
            width: 100%;
            padding: 34px 28px 28px;
            border-radius: 28px;
            background: rgba(255, 255, 255, .88);
            border: 1px solid rgba(216, 169, 54, .32);
            box-shadow: 0 24px 60px rgba(7, 8, 73, .09);
            overflow: hidden;
            transition: .35s ease;
        }

        .testimonial-lpf-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 34px 80px rgba(7, 8, 73, .16);
        }

        .testimonial-lpf-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 25%, rgba(255, 255, 255, .75) 48%, transparent 70%);
            transform: translateX(-120%);
            transition: .7s ease;
            pointer-events: none;
        }

        .testimonial-lpf-card:hover::before {
            transform: translateX(120%);
        }

        .testimonial-lpf-card__quote {
            position: absolute;
            right: 24px;
            top: 8px;
            color: rgba(216, 169, 54, .22);
            font-size: 110px;
            font-family: serif;
            line-height: 1;
        }

        .testimonial-lpf-card p {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #56576b;
            font-size: 18px;
            line-height: 1.8;
        }

        .testimonial-lpf-card__author {
            position: absolute;
            left: 28px;
            right: 28px;
            bottom: 28px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 14px;
            padding-top: 20px;
            border-top: 1px solid rgba(7, 8, 73, .08);
        }

        .testimonial-lpf-card__avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            flex: 0 0 50px;
            color: #070849;
            font-weight: 900;
            background: linear-gradient(135deg, #fff3bd, #e2b153);
            box-shadow: 0 14px 28px rgba(216, 169, 54, .28);
        }

        .testimonial-lpf-card__author h4 {
            margin: 0 0 5px;
            color: #070849;
            font-size: 17px;
            font-weight: 900;
        }

        .testimonial-lpf-card__author span {
            color: #7d7f94;
            font-size: 13px;
            font-weight: 700;
        }

        .testimonial-lpf-card__author span i {
            color: #25D366;
        }

        /* Owl dots */
        .testimonials-carousel .owl-dots {
            text-align: center;
            margin-top: 8px;
        }

        .testimonials-carousel .owl-dot span {
            width: 10px;
            height: 10px;
            margin: 5px 6px;
            background: rgba(7, 8, 73, .18) !important;
            display: block;
            border-radius: 999px;
            transition: .3s ease;
        }

        .testimonials-carousel .owl-dot.active span {
            width: 34px;
            background: linear-gradient(90deg, #070849, #d8a936) !important;
        }

        /* Owl arrows */
        .testimonials-carousel .owl-nav {
            position: absolute;
            inset: 42% -22px auto -22px;
            display: flex;
            justify-content: space-between;
            pointer-events: none;
        }

        .testimonials-carousel .owl-nav button {
            width: 46px;
            height: 46px;
            border-radius: 50% !important;
            background: #fff !important;
            color: #070849 !important;
            box-shadow: 0 14px 35px rgba(7, 8, 73, .15);
            pointer-events: auto;
            transition: .3s ease;
        }

        .testimonials-carousel .owl-nav button:hover {
            background: linear-gradient(135deg, #070849, #171a78) !important;
            color: #fff !important;
        }

        .testimonials-carousel .owl-nav button span {
            font-size: 32px;
            line-height: 1;
        }

        @keyframes testimonialsFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-18px);
            }
        }

        @media (max-width: 768px) {
            .testimonials-lpf {
                padding: 70px 0;
            }

            .testimonials-lpf__header {
                margin-bottom: 32px;
            }

            .testimonials-lpf__label {
                font-size: 11px;
                letter-spacing: 4px;
            }

            .testimonials-lpf__header h2 {
                font-size: 42px;
                letter-spacing: -2px;
            }

            .testimonials-lpf__header p {
                font-size: 15px;
            }

            .testimonial-lpf-card {
                min-height: 330px;
                padding: 30px 22px 26px;
                border-radius: 24px;
            }

            .testimonial-lpf-card p {
                font-size: 15px;
            }

            .testimonials-carousel .owl-nav {
                display: none;
            }
        }

        .bestsellers-lpf__slider {
            overflow: hidden;
        }

        .bestsellers-lpf__track {
            display: flex;
            /* gap: 28px; */
            transition: transform .55s ease;
        }

        .bestseller-lpf-card {
            flex: 0 0 100%;
            min-width: 100%;
        }

        @media (min-width: 992px) {
            .bestseller-lpf-card {
                flex: 0 0 calc(50% - 14px);
                min-width: calc(50% - 14px);
                max-width: calc(50% - 14px);
            }
        }

        @media (min-width: 992px) {
            .bestseller-lpf-card {
                display: flex !important;
                flex-direction: column !important;
                gap: 22px !important;
                padding: 28px !important;
                align-items: stretch !important;
                margin-left: 8px;
            }

            .bestseller-lpf-card__image {
                width: 100% !important;
                height: 430px !important;
            }

            .bestseller-lpf-card__info {
                width: 100%;
                text-align: left;
                padding: 0 12px 8px;
            }

            .bestseller-lpf-card__info h3 {
                font-size: 30px !important;
                line-height: 1.15 !important;
                margin: 10px 0;
            }

            .bestseller-lpf-card__info p {
                display: none;
            }

            .bestseller-lpf-card__meta {
                margin: 18px 0 !important;
                justify-content: space-between;
            }

            .bestseller-lpf-card__price {
                font-size: 26px !important;
            }

            .bestseller-lpf-card__btn {
                width: fit-content;
            }
        }

        .about-lpf {
            position: relative;
            overflow: hidden;
            padding: 40px 0;
            background:
                radial-gradient(circle at 12% 20%, rgba(226, 177, 83, .18), transparent 30%),
                radial-gradient(circle at 90% 15%, rgba(7, 8, 73, .12), transparent 28%),
                linear-gradient(180deg, #fffaf2 0%, #ffffff 52%, #fff8ee 100%);
        }

        .about-lpf__glow {
            position: absolute;
            border-radius: 999px;
            filter: blur(10px);
            pointer-events: none;
            animation: aboutFloat 7s ease-in-out infinite;
        }

        .about-lpf__glow--one {
            width: 230px;
            height: 230px;
            left: -90px;
            bottom: 120px;
            background: rgba(226, 177, 83, .28);
        }

        .about-lpf__glow--two {
            width: 280px;
            height: 280px;
            right: -100px;
            top: 80px;
            background: rgba(7, 8, 73, .12);
            animation-delay: 1.3s;
        }

        .about-lpf__grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 70px;
            align-items: center;
        }

        .about-lpf__label {
            display: inline-flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            color: #070849;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 6px;
            text-transform: uppercase;
        }

        .about-lpf__label::before,
        .about-lpf__label::after {
            content: "";
            width: 42px;
            height: 1px;
            background: linear-gradient(90deg, transparent, #d8a936);
        }

        .about-lpf__label::after {
            background: linear-gradient(90deg, #d8a936, transparent);
        }

        .about-lpf__content h3 {
            margin: 0 0 28px;
            color: #070849;
            font-size: clamp(42px, 5.5vw, 82px);
            font-weight: 600;
            line-height: .95;
            letter-spacing: -3px;
        }

        .about-lpf__content h3 em {
            display: block;
            color: #ffe7a5;
            font-style: italic;
        }

        .about-lpf__intro {
            font-size: 16px !important;
            color: #37384d !important;
        }

        .about-lpf__content p {
            margin: 0 0 18px;
            color: #66677a;
            font-size: 16.5px;
            line-height: 1.85;
        }

        .about-lpf__content strong {
            color: #070849;
        }

        .about-lpf__features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin: 30px 0;
        }

        .about-lpf__features div {
            padding: 10px;
            border-radius: 20px;
            background: rgba(255, 255, 255, .82);
            border: 1px solid rgba(216, 169, 54, .28);
            box-shadow: 0 18px 40px rgba(7, 8, 73, .06);
            text-align: center;
            transition: .3s ease;
        }

        .about-lpf__features div:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 55px rgba(7, 8, 73, .12);
        }

        .about-lpf__features i {
            display: block;
            margin-bottom: 10px;
            color: #ffe7a5;
            font-size: 24px;
        }

        .about-lpf__features span {
            color: #070849;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.4;
        }

        .about-lpf__signature {
            padding-left: 18px;
            border-left: 3px solid #d8a936;
            color: #070849 !important;
            font-weight: 700;
        }

        .about-lpf__final {
            margin-top: 12px !important;
            color: #ffe7a5 !important;
            font-size: 18px !important;
            font-weight: 900;
            font-style: italic;
        }


        .about-lpf__visual {
            position: relative;
        }

        .about-lpf__image-card {
            position: relative;
            overflow: hidden;
            border-radius: 42px;
            padding: 16px;
            background: linear-gradient(135deg, rgba(255, 255, 255, .9), rgba(255, 241, 185, .55));
            border: 1px solid rgba(216, 169, 54, .36);
            box-shadow: 0 35px 90px rgba(7, 8, 73, .16);
            transform: rotate(2deg);
        }

        .about-lpf__image-card::before {
            content: "";
            position: absolute;
            inset: -40%;
            background: linear-gradient(120deg, transparent 35%, rgba(255, 255, 255, .75), transparent 65%);
            transform: translateX(-60%);
            animation: aboutShine 4s ease-in-out infinite;
        }

        .about-lpf__image-card img {
            position: relative;
            z-index: 2;
            width: 100%;
            display: block;
            border-radius: 30px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }

        .about-lpf__floating {
            position: absolute;
            z-index: 3;
            width: 118px;
            height: 118px;
            border-radius: 30px;
            /* display: grid; */
            place-items: center;
            text-align: center;
            background: rgba(255, 255, 255, .88);
            border: 1px solid rgba(216, 169, 54, .38);
            box-shadow: 0 22px 55px rgba(7, 8, 73, .15);
            backdrop-filter: blur(10px);
            animation: aboutFloat 5s ease-in-out infinite;
        }

        .about-lpf__floating strong {
            display: block;
            color: #070849;
            font-size: 21px;
            line-height: 1;
        }

        .about-lpf__floating span {
            color: #d8a936;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .about-lpf__floating--one {
            top: 30px;
            left: -15px;
        }

        .about-lpf__floating--two {
            right: -15px;
            bottom: 45px;
            animation-delay: 1s;
        }

        @keyframes aboutFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-16px);
            }
        }

        @keyframes aboutShine {
            0% {
                transform: translateX(-65%) rotate(15deg);
            }

            55%,
            100% {
                transform: translateX(65%) rotate(15deg);
            }
        }

        @media (max-width: 991px) {
            .about-lpf__grid {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .about-lpf__visual {
                max-width: 560px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .about-lpf {
                padding: 70px 0;
            }

            .about-lpf__content h3 {
                font-size: 44px;
                letter-spacing: -2px;
            }

            .about-lpf__intro {
                font-size: 18px !important;
            }

            .about-lpf__features {
                grid-template-columns: 1fr;
            }

            .about-lpf__label {
                font-size: 11px;
                letter-spacing: 3px;
            }

            .about-lpf__label::before,
            .about-lpf__label::after {
                width: 26px;
            }

            .about-lpf__floating {
                width: 96px;
                height: 96px;
                border-radius: 24px;
            }

            .about-lpf__floating strong {
                font-size: 24px;
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
            <img src="{{ asset('assets/clints/images/image-luxe-here.png') }}" alt="Parfum de luxe">
        </div>

        <div class="hero-lpf__glass"></div>
        <div class="hero-lpf__mist hero-lpf__mist--one"></div>
        <div class="hero-lpf__mist hero-lpf__mist--two"></div>

        <div class="container hero-lpf__container">
            <div class="hero-lpf__content">
                <span class="hero-lpf__badge">
                    Luxe PARFUM
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
                            <span class="category-lpf-card__tag">{{ $category->getTranslation('name', 'fr') }}</span>
                            {{-- <h4>{{ $category->getTranslation('name', 'fr') }}</h4> --}}
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>


    <!-- ========== Parfums en Vedette ========== -->
    <section class="section section--alt featured" id="featured">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-label">Sélection pour vous</span>
                <h2>Parfums en Vedette</h2>
                <p class="section-subtitle">Des collections soigneusement sélectionnées par nos experts en parfumerie
                </p>
                <div class="divider"></div>
            </div>
            <div class="featured__grid reveal" id="featuredGrid">
                @foreach ($featuredProducts as $product)
                    <div class="product-card" data-id="{{ $product->id }}"
                        data-name="{{ $product->getTranslation('name', 'ar') }}" data-price="{{ $product->price }}"
                        data-img="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}">
                        <div class="product-card__image">
                            <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                alt="{{ $product->getTranslation('name', 'ar') }}">
                            @if ($product->created_at->gt(now()->subDays(7)))
                                <span class="product-card__badge">Nouveau</span>
                            @endif
                            <div class="product-card__actions">
                                <button
                                    class="wishlist-btn {{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'active' : '' }}"
                                    aria-label="Ajouter aux favoris">
                                    <i
                                        class="{{ auth()->check() && auth()->user()->wishlist->contains('product_id', $product->id) ? 'fas' : 'far' }} fa-heart"></i>
                                </button>
                                <button aria-label="Aperçu rapide"
                                    onclick="window.location.href='{{ route('product', $product->id) }}'"><i
                                        class="far fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="product-card__info">
                            <p class="product-card__brand">{{ $product->brand->name ?? 'Luxe Parfum' }}</p>
                            <h4 class="product-card__name">{{ $product->getTranslation('name', 'ar') }}</h4>
                            <div class="product-card__rating">
                                <i class="fas fa-star star"></i><i class="fas fa-star star"></i><i
                                    class="fas fa-star star"></i><i class="fas fa-star star"></i><i
                                    class="fas fa-star-half-alt star"></i>
                                <span>(128)</span>
                            </div>
                            @if ($product->sale_price)
                                <p class="product-card__price"><span
                                        style="text-decoration: line-through; opacity: 0.6; font-size: 0.8em; margin-left: 8px">${{ $product->price }}</span>
                                    ${{ $product->sale_price }}</p>
                            @else
                                <p class="product-card__price">${{ $product->price }}</p>
                            @endif
                            <button class="product-card__btn add-to-cart-btn">Ajouter au panier</button>
                        </div>
                    </div>
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
                    <p>Nos produits les plus appréciés et adoptés par nos clients</p>
                </div>

                <div class="bestsellers-lpf__slider ">
                    <div class="bestsellers-lpf__track" id="bestsellersTrack">
                        @foreach ($bestsellerProducts as $product)
                            <a href="{{ route('product', $product->id) }}" class="product-card-link">
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
                                        </div>

                                        <a href="{{ route('product', $product->id) }}"
                                            class="bestseller-lpf-card__btn">
                                            Découvrir
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </a>
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



    <!-- ========== feedback ========== -->
    <section class="testimonials-lpf" id="testimonials">
        <div class="testimonials-lpf__glow testimonials-lpf__glow--one"></div>
        <div class="testimonials-lpf__glow testimonials-lpf__glow--two"></div>

        <div class="container">
            <div class="bestsellers-lpf__header reveal">
                <span class="testimonials-lpf__label">Ils en parlent</span>
                <h2>Avis de nos <em>clients</em></h2>
                <p>Découvrez pourquoi nos clients reviennent encore et encore</p>
            </div>

            <div class="owl-carousel testimonials-carousel reveal">

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        J’ai reçu ma commande très bien emballée, koulchi ghezal l’emballage les détails le service,
                        tbarklah 3likoum. Vous avez toute ma fidélité ❤️
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">M</div>
                        <div>
                            <h4>Mohammed</h4>
                        </div>
                    </div>
                </div>

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        Je viens de recevoir ma commande. Très bon service, et la qualité du parfum
                        est tout simplement magnifique. Merci, à la prochaine !
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">O</div>
                        <div>
                            <h4>Omar</h4>
                        </div>
                    </div>
                </div>

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        Weslatni la commande pour la 3ème fois, les parfums zwinin bhal dima w
                        ta3amol excellent ! choukran 3la l cadeau 🫶🏻.
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">A</div>
                        <div>
                            <h4>Aya</h4>
                        </div>
                    </div>
                </div>

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        J’ai bien reçu la commande shukran bezzaf je suis complètement satisfaite.
                        Saraha très bon service ou ti9a lah ya3tik seha, à recommander !
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">M</div>
                        <div>
                            <h4>Meryam</h4>
                        </div>
                    </div>
                </div>

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        Les décants sentent trop bon et le service ta hwa tbarklah elikom, ca sera
                        pas ma dernière fois certainement.
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">R</div>
                        <div>
                            <h4>Rachid</h4>
                        </div>
                    </div>
                </div>

                <div class="testimonial-lpf-card">
                    <div class="testimonial-lpf-card__quote">“</div>
                    <p>
                        Je tiens a vous remercier pour la qualité de votre service, les parfums sont
                        excellents ! L’emballage aussi et merci pour le petit cadeau. Customer for life 👌🏼
                    </p>
                    <div class="testimonial-lpf-card__author">
                        <div class="testimonial-lpf-card__avatar">L</div>
                        <div>
                            <h4>Lina</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="about-lpf" itemscope itemtype="https://schema.org/Organization">

        <!-- SEO hidden data -->
        <meta itemprop="name" content="Luxe PARFUM">
        <meta itemprop="url" content="https://lepetitflacon.shop">
        <meta itemprop="description"
            content="Décants de parfum 100% originaux au Maroc en formats 5ml et 10ml. Testez votre parfum avant achat avec Luxe PARFUM.">

        <div class="about-lpf__glow about-lpf__glow--one"></div>
        <div class="about-lpf__glow about-lpf__glow--two"></div>

        <div class="container">
            <div class="about-lpf__grid">

                <div class="about-lpf__content" itemprop="description">
                    <span class="about-lpf__label">À propos de nous</span>

                    <!-- ADD keyword in title -->
                    <h3>
                        Le luxe du parfum au Maroc,
                        <em>en toute liberté</em>
                    </h3>

                    <p class="about-lpf__intro">
                        Chez <strong itemprop="brand">Luxe PARFUM</strong>, notre mission est simple :
                        rendre le <strong>parfum de luxe accessible au Maroc</strong>.
                    </p>

                    <p>
                        Aujourd’hui, choisir un <strong>parfum en ligne au Maroc</strong> peut être un véritable défi.
                        Entre les prix élevés des grands formats et l’impossibilité de tester,
                        beaucoup hésitent… ou achètent sans être totalement sûrs de leur choix.
                    </p>

                    <p>
                        C’est pour répondre à ce besoin que <strong>Luxe PARFUM</strong> est né.
                    </p>

                    <p>
                        Nous proposons des <strong>décants de parfums 100% originaux</strong>,
                        disponibles en formats <strong>5 ml</strong> et <strong>10 ml</strong>.
                        Ces formats vous permettent de découvrir un <strong>parfum de luxe</strong> à votre rythme —
                        sur votre peau, dans votre quotidien — avant de vous engager dans un grand format.
                    </p>

                    <p>
                        Mais notre univers ne s’arrête pas là. Nous vous proposons également une
                        sélection de brumes parfumées délicates et de soins personnels soigneusement
                        choisis, pour prolonger l’expérience et intégrer le parfum dans chaque instant
                        de votre quotidien.
                    </p>

                    <p>
                        Tous nos produits sont <strong>100% authentiques</strong>, sélectionnés avec
                        exigence pour vous offrir qualité, élégance et satisfaction. Chez nous, vous
                        ne choisissez pas simplement un parfum. Vous révélez votre signature olfactive
                        avec un service fiable, rapide et professionnel.
                    </p>

                    <p class="about-lpf__signature">
                        Avec Luxe PARFUM, découvrez une nouvelle manière de vivre le parfum :
                        plus libre, plus intelligente, plus personnelle.
                    </p>

                    <p class="about-lpf__final">
                        Luxe PARFUM <strong> là où la fraîcheur et le luxe commencent. </strong> ✨
                    </p>
                </div>

                <div class="about-lpf__visual">
                    <div class="about-lpf__image-card">
                        <img src="{{ asset('assets/clints/images/about-decants.png') }}"
                            alt="Décants parfum 5ml et 10ml Luxe PARFUM Maroc" loading="lazy" decoding="async"
                            width="500" height="500" itemprop="image">
                    </div>

                    <div class="about-lpf__floating about-lpf__floating--one">
                        <strong style="margin-top: 27%">100%</strong>
                        <strong>Original</strong>
                    </div>

                    {{-- <div class="about-lpf__floating about-lpf__floating--two">
                        <strong>5ml</strong>
                        <span>& 10ml</span>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>



    <!-- ========== التذييل ========== -->
    @include('clints.layout.footer')
    <script src="{{ asset('assets/clints/js/homepage.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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

<!-- LUX Cookie Perfume Banner -->
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




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('bestsellersTrack');
        const prevBtn = document.getElementById('bsPrev');
        const nextBtn = document.getElementById('bsNext');
        const dotsWrap = document.getElementById('bsDots');

        if (!track || !prevBtn || !nextBtn || !dotsWrap) return;

        const slides = Array.from(track.querySelectorAll('.bestseller-lpf-card'));
        const dots = Array.from(dotsWrap.querySelectorAll('.dot'));

        let currentIndex = 0;
        let autoPlay;

        function goToSlide(index) {
            if (index < 0) index = slides.length - 1;
            if (index >= slides.length) index = 0;

            currentIndex = index;

            track.style.transform = `translateX(-${currentIndex * 100}%)`;

            dots.forEach(dot => dot.classList.remove('active'));
            if (dots[currentIndex]) {
                dots[currentIndex].classList.add('active');
            }
        }

        function nextSlide() {
            goToSlide(currentIndex + 1);
        }

        function prevSlide() {
            goToSlide(currentIndex - 1);
        }

        function startAutoPlay() {
            autoPlay = setInterval(nextSlide, 5000);
        }

        function resetAutoPlay() {
            clearInterval(autoPlay);
            startAutoPlay();
        }

        nextBtn.addEventListener('click', function() {
            nextSlide();
            resetAutoPlay();
        });

        prevBtn.addEventListener('click', function() {
            prevSlide();
            resetAutoPlay();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                goToSlide(index);
                resetAutoPlay();
            });
        });

        goToSlide(0);
        startAutoPlay();
    });
</script>


<script>
    $(document).ready(function() {
        $('.testimonials-carousel').owlCarousel({
            loop: true,
            margin: 24,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                0: {
                    items: 1,
                    margin: 16
                },
                576: {
                    items: 2,
                    margin: 18
                },
                992: {
                    items: 3,
                    margin: 24
                }
            }
        });
    });
</script>

</html>
