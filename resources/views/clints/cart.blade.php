<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier — lepetitflacon
    </title>
    <meta name="description" content="Consultez votre panier et finalisez votre commande sur lepetitflacon.">

    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}?v={{ filemtime(public_path('assets/clints/css/style.css')) }}">

        
    <link rel="stylesheet"
        href="{{ asset('assets/clints/css/cart.css') }}?v={{ filemtime(public_path('assets/clints/css/cart.css')) }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
    /* ================================
   CART HEADER
================================ */
.cart-header-lpf {
    position: relative;
    overflow: hidden;
    padding: 34px 0 30px;
    background:
        radial-gradient(circle at 15% 10%, rgba(255, 231, 165, 0.35), transparent 24%),
        radial-gradient(circle at 85% 0%, rgba(216, 170, 69, 0.14), transparent 25%),
        linear-gradient(180deg, #fffaf4 0%, #ffffff 100%);
    border-bottom: 1px solid rgba(216, 170, 69, 0.22);
}

.cart-header-lpf::before {
    content: "LUX";
    position: absolute;
    right: 5%;
    top: -28px;
    font-family: serif;
    font-size: 120px;
    font-weight: 800;
    color: rgba(11, 16, 61, 0.04);
}

.cart-header-lpf__inner {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.cart-header-lpf__breadcrumb {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 8px;
    font-size: 13px;
}

.cart-header-lpf__breadcrumb a {
    color: rgba(11, 16, 61, 0.52);
    text-decoration: none;
}

.cart-header-lpf__breadcrumb span {
    color: rgba(216, 170, 69, 0.75);
}

.cart-header-lpf__breadcrumb strong {
    color: #0B103D;
    font-weight: 700;
}

.cart-header-lpf h1 {
    margin: 0;
    color: #0B103D;
    font-size: clamp(30px, 4vw, 48px);
    line-height: 1;
    font-weight: 800;
    letter-spacing: -1px;
}

.cart-header-lpf h1 em {
    color: #ffe7a5;
    font-style: italic;
}

.cart-header-lpf p {
    margin: 10px 0 0;
    max-width: 650px;
    color: rgba(11, 16, 61, 0.64);
    font-size: 14px;
    line-height: 1.6;
}

.cart-header-lpf__badge {
    min-width: 142px;
    min-height: 46px;
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
    animation: cartBadgeFloat 3.5s ease-in-out infinite;
}

.cart-header-lpf__badge i {
    font-size: 17px;
}

.cart-header-lpf__badge span {
    color: #0B103D;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.3px;
    text-transform: uppercase;
}

.cart-header-lpf__glow {
    position: absolute;
    left: 8%;
    bottom: -90px;
    width: 190px;
    height: 190px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255, 231, 165, .28), transparent 65%);
    animation: cartMist 6s ease-in-out infinite;
}

@keyframes cartBadgeFloat {
    0%, 100% {
        transform: translateY(0) rotateY(0deg);
    }
    50% {
        transform: translateY(-6px) rotateY(8deg);
    }
}

@keyframes cartMist {
    0%, 100% {
        transform: translateY(0) scale(1);
        opacity: .7;
    }
    50% {
        transform: translateY(-14px) scale(1.12);
        opacity: 1;
    }
}

/* ================================
   CART SECTION
================================ */
.cart-section {
    background:
        radial-gradient(circle at 12% 10%, rgba(224, 177, 86, .14), transparent 28%),
        radial-gradient(circle at 90% 20%, rgba(7, 8, 73, .08), transparent 28%),
        linear-gradient(180deg, #fff 0%, #fbfaf8 100%);
    padding: 70px 0;
}

.cart-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 430px;
    gap: 38px;
    align-items: flex-start;
}

/* ================================
   CART TABLE DESKTOP
================================ */
.cart-table-wrapper {
    width: 100%;
    background: rgba(255, 255, 255, .86);
    border: 1px solid rgba(224, 177, 86, .18);
    border-radius: 30px;
    padding: 22px;
    box-shadow: 0 24px 70px rgba(7, 8, 73, .08);
    position: relative;
    overflow: hidden;
}

.cart-table-wrapper::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(224,177,86,.12), transparent 35%, rgba(7,8,73,.05));
    pointer-events: none;
}

.cart-table {
    width: 100%;
    border-collapse: collapse;
    position: relative;
    z-index: 1;
}

.cart-table thead th {
    padding: 18px 16px;
    text-align: left;
    color: #9c9c9c;
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 700;
    border-bottom: 1px solid #ece9e4;
}

.cart-table tbody tr {
    border-bottom: 1px solid #f0eee9;
    transition: .3s ease;
}

.cart-table tbody tr:hover {
    background: rgba(224, 177, 86, .055);
    transform: translateY(-2px);
}

.cart-table tbody td {
    padding: 24px 16px;
    vertical-align: middle;
    color: #252525;
    font-size: 16px;
}

.cart-table img {
    width: 92px;
    height: 92px;
    object-fit: cover;
    border-radius: 14px;
    box-shadow: 0 12px 24px rgba(0,0,0,.12);
}

.cart-table td:nth-child(4) {
    color: #dca84c;
    font-weight: 800;
    white-space: nowrap;
}

/* Quantity */
.quantity-control,
.qty-control,
.quantity-controls,
.cart-quantity {
    display: inline-flex;
    align-items: center;
    overflow: hidden;
    background: #fff;
    border: 1px solid #ece8df;
    border-radius: 12px;
}

.cart-table button,
.qty-btn,
.quantity-btn {
    border: 0;
    min-width: 46px;
    height: 46px;
    background: #f8f6f2;
    color: #181818;
    font-size: 18px;
    cursor: pointer;
    transition: .25s ease;
}

.cart-table button:hover,
.qty-btn:hover,
.quantity-btn:hover {
    background: #e0b156;
    color: #fff;
}

.quantity-control input,
.qty-control input,
.cart-table input[type="number"] {
    width: 52px;
    height: 46px;
    border: 0;
    text-align: center;
    font-weight: 700;
    outline: none;
}

/* Delete */
.cart-table td:last-child,
.cart-table .remove,
.cart-table .delete,
.cart-table .cart-remove {
    color: #999;
    text-align: center;
}

.cart-table td:last-child i,
.cart-table .remove i,
.cart-table .delete i,
.cart-table .cart-remove i {
    cursor: pointer;
    transition: .25s ease;
}

.cart-table td:last-child i:hover,
.cart-table .remove i:hover,
.cart-table .delete i:hover,
.cart-table .cart-remove i:hover {
    color: #d9534f;
    transform: scale(1.18) rotate(8deg);
}

/* ================================
   CART SUMMARY
================================ */
.cart-summary {
    background:
        linear-gradient(180deg, rgba(255,255,255,.96), rgba(250,247,241,.96)),
        radial-gradient(circle at top right, rgba(224,177,86,.22), transparent 35%);
    border: 1px solid rgba(224, 177, 86, .22);
    border-radius: 30px;
    padding: 38px 34px;
    box-shadow: 0 24px 70px rgba(7, 8, 73, .1);
    position: sticky;
    top: 30px;
    overflow: hidden;
}

.cart-summary::after {
    content: "✦";
    position: absolute;
    right: 28px;
    top: 22px;
    color: rgba(224,177,86,.45);
    font-size: 34px;
    animation: lpfSpark 2.8s infinite ease-in-out;
}

@keyframes lpfSpark {
    0%, 100% {
        transform: scale(.8) rotate(0deg);
        opacity: .45;
    }
    50% {
        transform: scale(1.15) rotate(20deg);
        opacity: 1;
    }
}

.cart-summary h3 {
    font-size: 26px;
    color: #242424;
    margin-bottom: 26px;
    padding-bottom: 22px;
    border-bottom: 1px solid #e9e4dc;
}

.cart-summary__row,
.cart-summary__total {
    display: flex;
    justify-content: space-between;
    gap: 18px;
    padding: 16px 0;
    font-size: 17px;
}

.cart-summary__total {
    margin-top: 18px;
    padding-top: 28px;
    border-top: 1px solid #e9e4dc;
    font-size: 24px;
    font-weight: 800;
}

.cart-summary__total span:last-child {
    color: #dca84c;
}

.cart-checkout-btn {
    width: 100%;
    height: 64px;
    margin-top: 34px;
    border-radius: 10px;
    background: linear-gradient(135deg, #dca84c, #f0c06b, #c89134);
    color: #fff !important;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 700;
    box-shadow: 0 18px 36px rgba(224, 177, 86, .32);
    transition: .3s ease;
}

.cart-checkout-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 24px 48px rgba(224, 177, 86, .42);
}

.cart-summary__guarantees {
    margin-top: 26px;
    display: grid;
    gap: 18px;
    color: #9a9a9a;
    line-height: 1.6;
}

.cart-summary__guarantees i {
    color: #ffe7a5;
    margin-right: 12px;
}

/* ================================
   EMPTY CART
================================ */
.cart-empty {
    position: relative;
    min-height: 620px;
    padding: 90px 25px;
    text-align: center;
    overflow: hidden;
    border-radius: 34px;
    background:
        radial-gradient(circle at 50% 15%, rgba(224,177,86,.18), transparent 26%),
        radial-gradient(circle at 15% 35%, rgba(7,8,73,.08), transparent 28%),
        radial-gradient(circle at 85% 70%, rgba(224,177,86,.13), transparent 26%),
        linear-gradient(180deg, #fff 0%, #fbfaf7 100%);
}

.cart-empty::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    top: 50px;
    left: 50%;
    transform: translateX(-50%);
    background: radial-gradient(circle, rgba(224,177,86,.18), transparent 65%);
    filter: blur(8px);
    z-index: 0;
}

.cart-empty::after {
    content: "LUX";
    position: absolute;
    right: 8%;
    bottom: 8%;
    font-size: 120px;
    font-weight: 900;
    letter-spacing: 10px;
    color: rgba(7,8,73,.035);
    z-index: 0;
}

.cart-empty > * {
    position: relative;
    z-index: 2;
}

.cart-empty i {
    width: 120px;
    height: 120px;
    margin-bottom: 34px;
    border-radius: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 54px;
    color: #fff;
    background: linear-gradient(145deg, #070849, #151765);
    box-shadow:
        0 26px 55px rgba(7,8,73,.22),
        inset 0 0 18px rgba(255,255,255,.16);
    animation: emptyBagFloat 3.2s ease-in-out infinite;
}

@keyframes emptyBagFloat {
    0%, 100% {
        transform: translateY(0) rotate(-2deg);
    }
    50% {
        transform: translateY(-14px) rotate(3deg);
    }
}

.cart-empty h2 {
    max-width: 850px;
    margin: 0 auto 22px;
    font-size: clamp(42px, 6vw, 84px);
    line-height: 1.05;
    font-weight: 800;
    color: #252525;
    letter-spacing: -2px;
}

.cart-empty h2::after {
    content: "";
    display: block;
    width: 96px;
    height: 4px;
    margin: 28px auto 0;
    border-radius: 30px;
    background: linear-gradient(90deg, transparent, #e0b156, transparent);
}

.cart-empty p {
    max-width: 720px;
    margin: 0 auto 46px;
    font-size: clamp(18px, 2.4vw, 30px);
    line-height: 1.55;
    color: #999;
}

.cart-empty .btn {
    min-width: 360px;
    min-height: 66px;
    padding: 20px 34px;
    border-radius: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #dca84c, #f0c06b, #c89134);
    color: #fff !important;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: 800;
    box-shadow:
        0 18px 38px rgba(224,177,86,.36),
        inset 0 1px 0 rgba(255,255,255,.35);
    transition: .3s ease;
    position: relative;
    overflow: hidden;
}

.cart-empty .btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;
    width: 70%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.45), transparent);
    transform: skewX(-20deg);
    transition: .55s ease;
}

.cart-empty .btn:hover::before {
    left: 130%;
}

.cart-empty .btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 26px 55px rgba(224,177,86,.48);
}

.cart-empty .btn::after {
    content: "✦";
    margin-left: 14px;
    font-size: 18px;
}

/* ================================
   TABLET
================================ */
@media (max-width: 950px) {
    .cart-layout {
        grid-template-columns: 1fr;
    }

    .cart-summary {
        position: relative;
        top: auto;
        width: 100%;
    }
}

/* ================================
   MOBILE FINAL FIX
================================ */
@media (max-width: 768px) {
    .cart-header-lpf {
        padding: 28px 0 26px;
    }

    .cart-header-lpf__inner {
        flex-direction: column;
        align-items: flex-start;
        gap: 14px;
    }

    .cart-header-lpf__badge {
        min-height: 42px;
    }

    .cart-header-lpf p {
        font-size: 13px;
    }

    .cart-section {
        padding: 32px 0;
    }

    .cart-layout {
        display: block !important;
    }

    .cart-table-wrapper {
        padding: 0 !important;
        background: transparent !important;
        border: 0 !important;
        box-shadow: none !important;
        overflow: visible !important;
    }

    .cart-table,
    .cart-table tbody,
    .cart-table tr,
    .cart-table td {
        display: block !important;
        width: 100% !important;
    }

    .cart-table {
        border: 0 !important;
        min-width: 0 !important;
    }

    .cart-table thead {
        display: none !important;
    }

    .cart-table tbody tr {
        position: relative !important;
        margin-bottom: 16px !important;
        padding: 14px !important;
        border-radius: 20px !important;
        background: linear-gradient(145deg, #ffffff, #fffaf4) !important;
        border: 1px solid rgba(216, 170, 69, .25) !important;
        box-shadow: 0 14px 34px rgba(11, 16, 61, .08) !important;
    }

    .cart-table tbody tr:hover {
        transform: none !important;
    }

    .cart-table tbody td {
        padding: 9px 0 !important;
        border: 0 !important;
        text-align: right !important;
        font-size: 14px !important;
    }

    .cart-table tbody td:first-child {
        display: grid !important;
        grid-template-columns: 76px 1fr !important;
        gap: 12px !important;
        align-items: center !important;
        text-align: left !important;
        padding-bottom: 14px !important;
        padding-right: 44px !important;
        margin-bottom: 8px !important;
        border-bottom: 1px solid #f0eee9 !important;
    }

    .cart-table tbody td:nth-child(2),
    .cart-table tbody td:nth-child(3),
    .cart-table tbody td:nth-child(4) {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
    }

    .cart-table tbody td:nth-child(2)::before {
        content: "Prix";
    }

    .cart-table tbody td:nth-child(3)::before {
        content: "Quantité";
    }

    .cart-table tbody td:nth-child(4)::before {
        content: "Total";
    }

    .cart-table tbody td:nth-child(2)::before,
    .cart-table tbody td:nth-child(3)::before,
    .cart-table tbody td:nth-child(4)::before {
        color: rgba(11, 16, 61, .48);
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        text-align: left;
    }

    .cart-table img {
        width: 76px !important;
        height: 76px !important;
        border-radius: 14px !important;
        object-fit: cover !important;
    }

    .cart-table tbody td:nth-child(4) {
        color: #d8aa45 !important;
        font-size: 15px !important;
        font-weight: 900 !important;
    }

    .quantity-control,
    .qty-control,
    .quantity-controls,
    .cart-quantity {
        margin-left: auto !important;
        max-width: 126px !important;
        height: 38px !important;
        border-radius: 12px !important;
    }

    .cart-table button,
    .qty-btn,
    .quantity-btn {
        min-width: 38px !important;
        height: 38px !important;
        font-size: 15px !important;
    }

    .quantity-control input,
    .qty-control input,
    .cart-table input[type="number"] {
        width: 42px !important;
        height: 38px !important;
        font-size: 13px !important;
    }

    .cart-table tbody td:last-child {
        position: absolute !important;
        top: 12px !important;
        right: 12px !important;
        width: auto !important;
        padding: 0 !important;
        display: block !important;
    }

    .cart-table tbody td:last-child::before {
        display: none !important;
    }

    .cart-table tbody td:last-child button,
    .cart-table tbody td:last-child i,
    .cart-table .remove,
    .cart-table .delete,
    .cart-table .cart-remove {
        width: 36px !important;
        height: 36px !important;
        border-radius: 50% !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: #fff4f4 !important;
        color: #d9534f !important;
        font-size: 15px !important;
    }

    .cart-summary {
        margin-top: 22px !important;
        width: 100% !important;
        border-radius: 24px !important;
        padding: 26px 20px !important;
    }

    .cart-summary h3 {
        font-size: 22px;
    }

    .cart-summary__row,
    .cart-summary__total {
        font-size: 16px;
    }

    .cart-summary__total {
        font-size: 21px;
    }

    .cart-checkout-btn {
        height: 58px;
        font-size: 14px;
        letter-spacing: 1.4px;
    }

    .cart-empty {
        min-height: 520px;
        padding: 70px 18px;
        border-radius: 26px;
    }

    .cart-empty i {
        width: 92px;
        height: 92px;
        font-size: 42px;
        border-radius: 28px;
        margin-bottom: 28px;
    }

    .cart-empty h2 {
        font-size: 42px;
        letter-spacing: -1px;
    }

    .cart-empty p {
        font-size: 18px;
        margin-bottom: 34px;
    }

    .cart-empty .btn {
        min-width: 100%;
        min-height: 58px;
        font-size: 14px;
        letter-spacing: 2px;
        padding: 18px 20px;
    }

    .cart-empty::after {
        font-size: 70px;
        right: 4%;
        bottom: 4%;
    }
}

/* ================================
   VERY SMALL MOBILE
================================ */
@media (max-width: 380px) {
    .cart-table tbody tr {
        padding: 12px !important;
    }

    .cart-table tbody td:first-child {
        grid-template-columns: 66px 1fr !important;
    }

    .cart-table img {
        width: 66px !important;
        height: 66px !important;
    }

    .cart-table tbody td {
        font-size: 13px !important;
    }

    .cart-table tbody td:nth-child(2)::before,
    .cart-table tbody td:nth-child(3)::before,
    .cart-table tbody td:nth-child(4)::before {
        font-size: 9px;
    }

    .cart-table button,
    .qty-btn,
    .quantity-btn {
        min-width: 34px !important;
        height: 34px !important;
    }

    .quantity-control input,
    .qty-control input,
    .cart-table input[type="number"] {
        width: 36px !important;
        height: 34px !important;
    }
}    
    </style> 

</head>

<body>

    <!-- ========== شريط التنقل ========== -->
    @include('clints.layout.nav')



    <!-- رأس الصفحة -->
    <section class="cart-header-lpf">
        <div class="cart-header-lpf__glow"></div>

        <div class="container">
            <div class="cart-header-lpf__inner">
                <div>
                    <div class="cart-header-lpf__breadcrumb">
                        <a href="{{ route('home') }}">Accueil</a>
                        <span>/</span>
                        <strong>Panier</strong>
                    </div>

                    <h1>Votre <em>panier</em></h1>

                    <p>
                        Retrouvez vos parfums sélectionnés avant de finaliser votre commande.
                    </p>
                </div>

                <div class="cart-header-lpf__badge">
                    <i class="fas fa-shopping-bag"></i>
                    <span>LUX Panier</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu du panier -->
    <section class="section cart-section">
        <div class="container">
            <!-- État vide -->
            <div class="cart-empty" id="cartEmpty" style="display:none;">
                <i class="fas fa-shopping-bag"></i>
                <h2>Votre panier est vide</h2>
                <p>Découvrez nos parfums raffinés et trouvez votre fragrance idéale</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">Commencer vos achats</a>
            </div>

            <!-- Articles du panier -->
            <div class="cart-layout" id="cartLayout">
                <div class="cart-table-wrapper">
                    <table class="cart-table" id="cartTable">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cartBody">
                            <!-- Rempli par JS -->
                        </tbody>
                    </table>
                </div>

                <!-- Résumé du panier -->
                <aside class="cart-summary">
                    <h3>Résumé de la commande</h3>
                    <div class="cart-summary__rows">
                        <div class="cart-summary__row"><span>Sous-total</span><span id="summarySubtotal">35.00 DH</span>
                        </div>
                        <div class="cart-summary__row"><span>Livraison</span><span id="summaryShipping">Calculée au
                                moment du paiement</span></div>

                    </div>
                    <div class="cart-summary__total">
                        <span>Total</span>
                        <span id="summaryTotal">0.00 DH</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary cart-checkout-btn">
                        Acheter maintenant <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="cart-summary__guarantees">
                        <div><i class="fas fa-lock"></i> Paiement 100% sécurisé</div>
                        <div><i class="fas fa-truck"></i> Livraison gratuite pour les commandes de plus de 600 DH</div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- ========== التذييل ========== -->
    @include('clints.layout.footer')

    <script src="{{ asset('assets/clints/js/cart.js') }}"></script>
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
