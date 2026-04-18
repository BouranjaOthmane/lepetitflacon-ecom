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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.stripeKey = "{{ config('services.stripe.key') }}";
    </script>
</head>

<body>
    <!-- Navigation simplifiée -->
    @include('clints.layout.nav')

    <div class="page-spacer"></div>

    <!-- Finalisation de commande -->
    <section class="section checkout-section">
        <div class="container">
            <div class="checkout-layout">
                <!-- Formulaires -->
                <div class="checkout-forms">
                    <!-- Étape 1 : livraison -->
                    <div class="checkout-step active" id="step1">
                        <h2>Informations de livraison</h2>
                        <p class="checkout-step__desc">Saisissez votre adresse de livraison</p>

                        <form class="checkout-form" id="shippingForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstName">Prénom *</label>
                                    <input type="text" id="firstName" placeholder="Ahmed" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Nom de famille *</label>
                                    <input type="text" id="lastName" placeholder="Benali" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse e-mail *</label>
                                <input type="email" id="email" placeholder="exemple@mail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Numéro de téléphone *</label>
                                <input type="tel" id="phone" placeholder="+212 6 00 00 00 00" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse *</label>
                                <input type="text" id="address" placeholder="Nom de rue, numéro de bâtiment"
                                    required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">Ville *</label>
                                    <input type="text" id="city" placeholder="Tanger" required>
                                </div>
                                <div class="form-group">
                                    <label for="state">Région / Province</label>
                                    <input type="text" id="state" placeholder="Tanger-Tétouan-Al Hoceïma">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="zip">Code postal *</label>
                                    <input type="text" id="zip" placeholder="90000" required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Pays *</label>
                                    <select id="country" required>
                                        <option value="">Choisir un pays</option>
                                        <option value="SA" selected>Arabie saoudite</option>
                                        <option value="AE">Émirats arabes unis</option>
                                        <option value="KW">Koweït</option>
                                        <option value="QA">Qatar</option>
                                        <option value="OM">Oman</option>
                                        <option value="BH">Bahreïn</option>
                                        <option value="EG">Égypte</option>
                                        <option value="JO">Jordanie</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary checkout-next" onclick="goToStep(2)">Continuer
                                vers le paiement <i class="fas fa-arrow-left"></i></button>
                        </form>
                    </div>

                    <!-- Étape 2 : paiement -->
                    <div class="checkout-step" id="step2">
                        <h2>Mode de paiement</h2>
                        <p class="checkout-step__desc">Choisissez votre mode de paiement préféré</p>

                        <div class="payment-methods">
                            <label class="payment-method active">
                                <input type="radio" name="payment" value="cod" checked>
                                <div class="payment-method__content">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>Paiement à la livraison</span>
                                </div>
                            </label>
                        </div>

                        <div class="checkout-actions">
                            <button type="button" class="btn btn-secondary" onclick="goToStep(1)">
                                <i class="fas fa-arrow-right"></i> Retour
                            </button>
                            <button type="button" class="btn btn-primary" onclick="goToStep(3)">
                                Vérifier la commande <i class="fas fa-arrow-left"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Étape 3 : vérification -->
                    <div class="checkout-step" id="step3">
                        <h2>Vérification de la commande</h2>
                        <p class="checkout-step__desc">Vérifiez vos informations avant de confirmer la commande</p>

                        <div class="review-box">
                            <div class="review-section">
                                <h3>Adresse de livraison</h3>
                                <div id="reviewAddress"></div>
                            </div>

                            <div class="review-section">
                                <h3>Mode de paiement</h3>
                                <div id="reviewPayment"></div>
                            </div>

                            <div class="review-section">
                                <h3>Produits</h3>
                                <div id="reviewItems"></div>
                            </div>
                        </div>

                        <div class="checkout-actions">
                            <button type="button" class="btn btn-secondary" onclick="goToStep(2)">
                                <i class="fas fa-arrow-right"></i> Retour
                            </button>

                            <button type="button" class="btn btn-primary place-order-btn" onclick="placeOrder()">
                                Confirmer la commande <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Succès de la commande -->
                    <div class="checkout-step" id="stepSuccess" style="display:none;">
                        <div class="order-success">
                            <div class="success-icon"><i class="fas fa-check"></i></div>
                            <h2>Commande confirmée avec succès !</h2>
                            <p>Merci pour votre achat. Votre commande <strong>#LP-2026-4281</strong> a bien été
                                confirmée.</p>
                            <p class="success-note">Un e-mail de confirmation a été envoyé à votre adresse.</p>
                            <div id="successActions"
                                style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
                                <a href="{{ route('home') }}" class="btn btn-primary">Continuer vos achats</a>
                                <a href="#" id="downloadInvoiceBtn" class="btn btn-outline"
                                    style="display:none; border: 1px solid var(--color-gold); color: var(--color-gold);">
                                    <i class="fas fa-file-pdf"></i> Télécharger la facture
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Résumé de la commande -->
                <aside class="checkout-summary">
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
                                    <p class="small text-muted mb-2">Vous avez {{ $userPoints }} points (équivalant à
                                        ${{ number_format($discountValue, 2) }})</p>
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
                                    <p class="small text-muted mb-0">Vous n’avez pas encore assez de points</p>
                                @endif
                            </div>
                        </div>
                    @endauth

                    <div class="checkout-summary__rows">
                        <div class="checkout-summary__row"><span>Sous-total</span><span
                                id="checkoutSubtotal">$0.00</span>
                        </div>
                        <div class="checkout-summary__row"><span>Livraison</span><span>Gratuite</span></div>
                        <div class="checkout-summary__row"><span>Taxe</span><span id="checkoutTax">$0.00</span>
                        </div>
                    </div>
                    <div class="checkout-summary__total">
                        <span>Total</span>
                        <span id="checkoutTotal">$0.00</span>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <div class="toast" id="toast"></div>
    <script src="{{ asset('assets/clints/js/app.js') }}"></script>
    <script src="{{ asset('assets/clints/js/checkout.js') }}"></script>
</body>

</html>
