<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق — لوكس بارفيوم</title>
    <meta name="description" content="راجع سلة تسوقك وتابع لإتمام الشراء في لوكس بارفيوم.">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clints/css/cart.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- ========== شريط التنقل ========== -->
    @include('clints.layout.nav')



    <!-- رأس الصفحة -->
    <div class="page-spacer"></div>
    <section class="cart-header">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Accueil</a><span class="separator">/</span><span
                    class="current">Panier</span>
            </div>
            <h1>Panier</h1>
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
                        <div class="cart-summary__row"><span>Sous-total</span><span id="summarySubtotal">$0.00</span>
                        </div>
                        <div class="cart-summary__row"><span>Livraison</span><span id="summaryShipping">Calculée au
                                moment du paiement</span></div>
                        {{-- <div class="cart-summary__row"><span>Taxe estimée</span><span id="summaryTax">$0.00</span></div> --}}
                    </div>
                    <div class="cart-summary__total">
                        <span>Total</span>
                        <span id="summaryTotal">$0.00</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="btn btn-primary cart-checkout-btn">
                        Passer au paiement <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="cart-summary__guarantees">
                        <div><i class="fas fa-lock"></i> Paiement 100% sécurisé</div>
                        <div><i class="fas fa-truck"></i> Livraison gratuite pour les commandes de plus de 200 $</div>
                        <div><i class="fas fa-undo"></i> Politique de retour sous 30 jours</div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- ========== التذييل ========== -->
    @include('clints.layout.footer')

    <script src="{{ asset('assets/clints/js/cart.js') }}"></script>
</body>

</html>
