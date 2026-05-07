<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Finalisation de commande — Lepetitflacon</title>
    <meta name="description" content="Finalisez votre commande en toute sécurité chez Lepetitflacon.">

    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/checkout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* ==========================
   CHECKOUT LUX PREMIUM
========================== */

        .checkout-lpf {
            position: relative;
            padding: 90px 0;
            overflow: hidden;
            background:
                radial-gradient(circle at 12% 12%, rgba(226, 177, 83, .18), transparent 28%),
                radial-gradient(circle at 88% 18%, rgba(7, 8, 73, .10), transparent 30%),
                linear-gradient(180deg, #fffaf2 0%, #ffffff 48%, #fff8ee 100%);
        }

        .checkout-lpf__glow {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(8px);
            animation: checkoutFloat 6s ease-in-out infinite;
        }

        .checkout-lpf__glow--one {
            width: 220px;
            height: 220px;
            left: -80px;
            bottom: 120px;
            background: rgba(226, 177, 83, .25);
        }

        .checkout-lpf__glow--two {
            width: 260px;
            height: 260px;
            right: -100px;
            top: 80px;
            background: rgba(7, 8, 73, .14);
            animation-delay: 1.4s;
        }

        .checkout-lpf__header {
            text-align: center;
            margin-bottom: 55px;
        }

        .checkout-lpf__header span {
            display: inline-block;
            margin-bottom: 14px;
            color: #070849;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 7px;
            text-transform: uppercase;
        }

        .checkout-lpf__header h3 {
            margin: 0;
            color: #070849;
            font-size: 50px;
            font-weight: 950;
            line-height: .95;
        }

        .checkout-lpf__header h3 em {
            color: #ffe7a5;
            font-style: italic;
        }

        .checkout-lpf__header p {
            margin: 20px 0 0;
            color: #70718a;
            font-size: 19px;
        }

        .checkout-lpf__layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 420px;
            gap: 34px;
            align-items: start;
        }

        .checkout-lpf__form-card,
        .checkout-lpf__summary {
            background: rgba(255, 255, 255, .86);
            border: 1px solid rgba(226, 177, 83, .28);
            border-radius: 30px;
            box-shadow: 0 28px 70px rgba(7, 8, 73, .08);
            backdrop-filter: blur(12px);
        }

        .checkout-lpf__form-card {
            padding: 42px;
        }

        .checkout-lpf__step-title {
            display: flex;
            gap: 18px;
            align-items: center;
            margin-bottom: 34px;
        }

        .checkout-lpf__icon {
            width: 62px;
            height: 62px;
            flex: 0 0 62px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            color: #070849;
            font-size: 24px;
            background: linear-gradient(135deg, #fff3bd, #e3b44d);
            box-shadow: 0 18px 35px rgba(226, 177, 83, .28);
        }

        .checkout-lpf__step-title h2 {
            margin: 0 0 8px;
            color: #262626;
            font-size: 30px;
        }

        .checkout-step__desc {
            margin: 0;
            color: #999;
            font-size: 16px;
        }

        .checkout-lpf__form {
            display: grid;
            gap: 22px;
        }

        .checkout-lpf__field {
            margin: 0;
        }

        .checkout-lpf__field label {
            display: block;
            margin-bottom: 10px;
            color: #222;
            font-weight: 800;
            font-size: 14px;
        }

        .checkout-lpf__field label span {
            color: #d93025;
        }

        .checkout-lpf__input-wrap {
            position: relative;
        }

        .checkout-lpf__input-wrap i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #d8a936;
            font-size: 16px;
            pointer-events: none;
        }

        .checkout-lpf__input-wrap input {
            width: 100%;
            height: 64px;
            padding: 0 20px 0 52px;
            border: 1px solid rgba(7, 8, 73, .12);
            border-radius: 17px;
            background: #fff;
            color: #222;
            font-size: 16px;
            outline: none;
            transition: .3s ease;
        }

        .checkout-lpf__input-wrap input:focus {
            border-color: #d8a936;
            box-shadow: 0 0 0 5px rgba(216, 169, 54, .13);
            transform: translateY(-2px);
        }

        .checkout-lpf__submit {
            margin-top: 10px;
            width: 100%;
            height: 64px;
            border: 0;
            border-radius: 18px;
            background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45);
            color: #fff;
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
            box-shadow: 0 20px 45px rgba(7, 8, 73, .25);
            transition: .35s ease;
        }

        .checkout-lpf__submit:hover {
            transform: translateY(-4px);
            box-shadow: 0 28px 60px rgba(7, 8, 73, .32);
        }

        .checkout-lpf__submit i {
            margin-left: 8px;
        }

        /* Summary */
        .checkout-lpf__summary {
            position: sticky;
            top: 25px;
            padding: 32px;
        }

        .checkout-lpf__summary-top {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: center;
            padding-bottom: 22px;
            border-bottom: 1px solid rgba(7, 8, 73, .08);
        }

        .checkout-lpf__summary-top span {
            color: #d8a936;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .checkout-lpf__summary-top h3 {
            margin: 8px 0 0;
            color: #242424;
            font-size: 24px;
        }

        .checkout-lpf__bag {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            color: #070849;
            background: linear-gradient(135deg, #fff3bd, #e3b44d);
            box-shadow: 0 16px 32px rgba(226, 177, 83, .25);
        }

        .checkout-summary__items {
            padding: 26px 0;
            border-bottom: 1px solid rgba(7, 8, 73, .08);
        }

        .checkout-lpf__rows {
            padding: 22px 0;
        }

        .checkout-summary__row,
        .checkout-lpf__total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .checkout-summary__row {
            margin-bottom: 18px;
            color: #242424;
            font-size: 16px;
        }

        .checkout-summary__row:last-child {
            margin-bottom: 0;
        }

        .checkout-lpf__total {
            padding-top: 24px;
            color: #202020;
            font-size: 19px;
            font-weight: 900;
        }

        .checkout-lpf__total #checkoutTotal {
            color: #d8a936;
            font-size: 25px;
        }

        .checkout-lpf__secure {
            margin-top: 22px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 16px;
            background: rgba(7, 8, 73, .05);
            color: #070849;
            font-size: 13px;
            font-weight: 800;
        }

        /* Success */
        .checkout-lpf__success {
            text-align: center;
            padding: 30px 10px;
        }

        .checkout-lpf__success .success-icon {
            margin: 0 auto 22px;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #070849;
            font-size: 34px;
            background: linear-gradient(135deg, #fff3bd, #e3b44d);
            box-shadow: 0 20px 45px rgba(226, 177, 83, .28);
        }

        /* Animation */
        @keyframes checkoutFloat {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-22px) scale(1.05);
            }
        }

        /* Responsive */
        @media (max-width: 991px) {
            .checkout-lpf__layout {
                grid-template-columns: 1fr;
            }

            .checkout-lpf__summary {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 768px) {
            .checkout-lpf {
                padding: 55px 0;
            }

            .checkout-lpf__header {
                margin-bottom: 32px;
            }

            .checkout-lpf__header span {
                font-size: 10px;
                letter-spacing: 4px;
            }

            .checkout-lpf__header h1 {
                font-size: 42px;
            }

            .checkout-lpf__header p {
                font-size: 15px;
            }

            .checkout-lpf__form-card,
            .checkout-lpf__summary {
                padding: 24px;
                border-radius: 22px;
            }

            .checkout-lpf__step-title {
                align-items: flex-start;
                gap: 14px;
            }

            .checkout-lpf__icon {
                width: 50px;
                height: 50px;
                flex-basis: 50px;
                border-radius: 16px;
                font-size: 19px;
            }

            .checkout-lpf__step-title h2 {
                font-size: 23px;
            }

            .checkout-lpf__input-wrap input {
                height: 58px;
                border-radius: 15px;
            }

            .checkout-lpf__submit {
                height: 58px;
                font-size: 12px;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>
    @include('clints.layout.nav')

    <section class="section checkout-section checkout-lpf">
        <div class="checkout-lpf__glow checkout-lpf__glow--one"></div>
        <div class="checkout-lpf__glow checkout-lpf__glow--two"></div>

        <div class="container">
            <div class="checkout-lpf__header">
                <span>Finaliser votre achat</span>
                <h3>Commande <em>sécurisée</em></h3>
                <p>Remplissez vos informations et recevez votre parfum rapidement.</p>
            </div>

            <div class="checkout-layout checkout-lpf__layout">
                <div class="checkout-forms checkout-lpf__form-card">

                    <div class="checkout-step active" id="step1">
                        <div class="checkout-lpf__step-title">
                            <div class="checkout-lpf__icon">
                                <i class="fas fa-truck-fast"></i>
                            </div>
                            <div>
                                <h2>Informations de livraison</h2>
                                <p class="checkout-step__desc">Saisissez votre adresse de livraison</p>
                            </div>
                        </div>

                        <form class="checkout-form checkout-lpf__form" id="shippingForm">
                            <input type="radio" name="payment" value="cod" checked style="display:none;">

                            <div class="form-group checkout-lpf__field">
                                <label for="firstName">Nom et prénom <span>*</span></label>
                                <div class="checkout-lpf__input-wrap">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="firstName" placeholder="Ahmed" required>
                                </div>
                            </div>

                            <div class="form-group checkout-lpf__field">
                                <label for="phone">Numéro de téléphone <span>*</span></label>
                                <div class="checkout-lpf__input-wrap">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" id="phone" placeholder="+212 6 00 00 00 00" required>
                                </div>
                            </div>

                            <div class="form-group checkout-lpf__field">
                                <label for="address">Adresse <span>*</span></label>
                                <div class="checkout-lpf__input-wrap">
                                    <i class="fas fa-location-dot"></i>
                                    <input type="text" id="address" placeholder="Nom de rue, numéro de bâtiment"
                                        required>
                                </div>
                            </div>

                            <div class="form-group checkout-lpf__field">
                                <label for="email">Adresse e-mail</label>
                                <div class="checkout-lpf__input-wrap">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="email" placeholder="exemple@mail.com">
                                </div>
                            </div>

                            <button type="button"
                                class="btn btn-primary checkout-next place-order-btn checkout-lpf__submit"
                                onclick="placeOrder()">
                                <span>Confirmer la commande</span>
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </div>

                    <div class="checkout-step" id="stepSuccess" style="display:none;">
                        <div class="order-success checkout-lpf__success">
                            <div class="success-icon"><i class="fas fa-check"></i></div>

                            <h2>Commande confirmée avec succès !</h2>

                            <p>
                                Merci pour votre achat. Votre commande
                                <strong>#LP-2026-4281</strong>
                                a bien été confirmée.
                            </p>

                            <p class="success-note">
                                Un e-mail de confirmation a été envoyé à votre adresse.
                            </p>

                            <div id="successActions" class="success-actions">
                                <a href="{{ route('home') }}" class="btn btn-primary">Continuer vos achats</a>

                                <a href="#" id="downloadInvoiceBtn" class="btn btn-outline">
                                    <i class="fas fa-file-pdf"></i> Télécharger la facture
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout-summary checkout-lpf__summary">
                    <div class="checkout-lpf__summary-top">
                        <div>
                            <span>Votre panier</span>
                            <h3>Résumé de la commande</h3>
                        </div>
                        <div class="checkout-lpf__bag">
                            <i class="fas fa-bag-shopping"></i>
                        </div>
                    </div>

                    <div class="checkout-summary__items" id="checkoutItems">
                        <!-- Rempli par JS -->
                    </div>

                    <div class="checkout-summary__rows checkout-lpf__rows">
                        <div class="checkout-summary__row">
                            <span>Sous-total</span>
                            <span id="checkoutSubtotal">0.00 DH</span>
                        </div>

                        <div class="checkout-summary__row">
                            <span>Livraison</span>
                            <span id="checkoutShipping">35.00 DH</span>
                        </div>
                    </div>

                    <div class="checkout-summary__total checkout-lpf__total">
                        <span>Total</span>
                        <span id="checkoutTotal">0.00 DH</span>
                    </div>

                    <div class="checkout-lpf__secure">
                        <i class="fas fa-shield-heart"></i>
                        <span>Paiement à la livraison sécurisé</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="toast" id="toast"></div>

    <script>
        window.cartUrl = "{{ route('cart') }}";
    </script>
    <script src="{{ asset('assets/clints/js/app.js') }}"></script>
    <script src="{{ asset('assets/clints/js/checkout.js') }}"></script>
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
<!-- ========== Pied de page ========== -->
@include('clints.layout.footer')

</html>
