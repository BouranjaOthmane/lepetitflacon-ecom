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
</head>

<body>
    @include('clints.layout.nav')

    <div class="page-spacer"></div>

    <section class="section checkout-section">
        <div class="container">
            <div class="checkout-layout">
                <div class="checkout-forms">

                    <!-- Étape unique : livraison + confirmation -->
                    <div class="checkout-step active" id="step1">
                        <h2>Informations de livraison</h2>
                        <p class="checkout-step__desc">Saisissez votre adresse de livraison</p>

                        <form class="checkout-form" id="shippingForm">
                            <input type="radio" name="payment" value="cod" checked style="display:none;">

                            
                                <div class="form-group">
                                    <label for="firstName">Nom et prenom <span style="color: red">*</span></label>
                                    <input type="text" id="firstName" placeholder="Ahmed" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="lastName">Nom de famille <span style="color: red">*</span></label>
                                    <input type="text" id="lastName" placeholder="Benali" required>
                                </div> --}}
                            

                            <div class="form-group">
                                <label for="phone">Numéro de téléphone <span style="color: red">*</span></label>
                                <input type="tel" id="phone" placeholder="+212 6 00 00 00 00" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Adresse <span style="color: red">*</span></label>
                                <input type="text" id="address" placeholder="Nom de rue, numéro de bâtiment"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" id="email" placeholder="exemple@mail.com">
                            </div>

                            <button type="button" class="btn btn-primary checkout-next place-order-btn"
                                onclick="placeOrder()">
                                Confirmer la commande <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Succès de la commande -->
                    <div class="checkout-step" id="stepSuccess" style="display:none;">
                        <div class="order-success">
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

                <!-- Résumé de la commande -->
                <div class="checkout-summary">
                    <h3>Résumé de la commande</h3>

                    <div class="checkout-summary__items" id="checkoutItems">
                        <!-- Rempli par JS -->
                    </div>

                    @auth
                        <div class="loyalty-box mt-4 p-3 border rounded">
                            <h5>Points de fidélité</h5>

                            <div id="loyaltyPointsInfo">
                                @php
                                    $loyaltyService = app(\App\Services\LoyaltyService::class);
                                    $userPoints = $loyaltyService->getUserPoints(auth()->user());
                                    $discountValue = $loyaltyService->calculateDiscountValue($userPoints);
                                @endphp

                                @if ($userPoints > 0)
                                    <p class="small text-muted mb-2">
                                        Vous avez {{ $userPoints }} points
                                        (équivalant à {{ number_format($discountValue, 2, ',', ' ') }} DH)
                                    </p>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="usePointsCheckbox">
                                        <label class="form-check-label" for="usePointsCheckbox">
                                            Utiliser mes points pour une réduction
                                        </label>
                                    </div>

                                    <div id="pointsInputWrapper" style="display:none;">
                                        <input type="number" id="pointsToRedeem" class="form-control form-control-sm"
                                            placeholder="Points" max="{{ $userPoints }}">
                                    </div>
                                @else
                                    <p class="small text-muted mb-0">
                                        Vous n’avez pas encore assez de points
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endauth

                    <div class="checkout-summary__rows">
                        <div class="checkout-summary__row">
                            <span>Sous-total</span>
                            <span id="checkoutSubtotal">0.00 DH</span>
                        </div>

                        <div class="checkout-summary__row">
                            <span>Livraison</span>
                            <span id="checkoutShipping">35.00 DH</span>
                        </div>
                    </div>

                    <div class="checkout-summary__total">
                        <span>Total</span>
                        <span id="checkoutTotal">0.00 DH</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="toast" id="toast"></div>

    <script src="{{ asset('assets/clints/js/app.js') }}"></script>
    <script src="{{ asset('assets/clints/js/checkout.js') }}"></script>
</body>
<a href="https://wa.me/212704654736" 
   class="whatsapp-floating" 
   target="_blank" 
   rel="noopener"
   aria-label="Contactez-nous sur WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

</html>
