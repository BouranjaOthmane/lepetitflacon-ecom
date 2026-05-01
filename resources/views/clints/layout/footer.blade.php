<footer class="footer-lpf" id="footer">
    <div class="footer-lpf__glow footer-lpf__glow--one"></div>
    <div class="footer-lpf__glow footer-lpf__glow--two"></div>

    <div class="container">
        <div class="footer-lpf__top">
            <div class="footer-lpf__brand">
                <a href="{{ route('home') }}" class="footer-lpf__logo">
                    <img src="{{ asset('assets/clints/images/logo-v-13.png') }}" alt="Lepetitflacon">
                </a>

                <p>
                    Accedez aux parfums de niche et best-sellers sans investir dans un flacon complet.
                    Testez, comparez, choisissez votre signature.
                </p>

                <div class="footer-lpf__col">
                    <h4>Suivez nous</h4>
                    <p>
                        Découvrez nos nouveautés, avis clients et offres exclusives.
                    </p>

                </div>

                <div class="footer-lpf__social">
                    <a href="https://www.instagram.com/lepetit.flacon/" target="_blank" rel="noopener"
                        aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://www.tiktok.com/@lepetit.flacon?_r=1&_t=ZS-95xA4EMShyJ" target="_blank"
                        rel="noopener" aria-label="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>

                    <a href="https://wa.me/212704654736" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="footer-lpf__col">
                <h4>Boutique</h4>
                <a href="{{ route('shop') }}">Décants</a>
                <a href="{{ route('shop', ['cat' => 9]) }}">Décants homme</a>
                <a href="{{ route('shop', ['cat' => 8]) }}">Décants femme</a>
                <a href="{{ route('shop', ['cat' => 10]) }}">Pafums complets</a>
                <a href="{{ route('shop', ['cat' => 11]) }}">Univers féminin</a>
                <a href="{{ route('shop', ['cat' => 12]) }}">Univers masculin</a>
            </div>

            <div class="footer-lpf__col footer-lpf__contact">
                <h4>Service client</h4>

                <a href="https://wa.me/212704654736" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>

                <a href="tel:+212704654736" rel="noopener">
                    <i class="fas fa-phone"></i>
                    +212704654736
                </a>

                <a href="mailto:contact.lepetitflacon@gmail.com" target="_blank" rel="noopener">
                    <i class="fas fa-envelope"></i>
                    contact.lepetitflacon@gmail.com
                </a>

                <a href="{{ route('faq') }}" target="_blank" rel="noopener">
                    <i class="fas fa-circle-question"></i>
                    FAQ
                </a>

                <p style="color: rgba(255,255,255,.62)">
                    <i class="fas fa-rotate-left"></i>
                    Retours et échanges
                </p>
            </div>

            <div class="footer-lpf__seo-card">
                <span class="footer-lpf__badge">LPF Premium</span>
                <h4>Livraison offerte</h4>
                <p>Dès 600 DH PAR TOUT AU MAROC.</p>

                <div class="footer-lpf__features">
                    <span>
                        <i class="fas fa-truck-fast"></i>
                        <strong>Expédition rapide 24-48h</strong>
                        <small>Votre colis expédié sous 24h.</small>
                    </span>

                    <span>
                        <i class="fas fa-lock"></i>
                        <strong>Paiement sécurisé</strong>
                        <small>Paiement à la livraison 100% sécurisé.</small>
                    </span>

                    <span>
                        <i class="fas fa-shield-alt"></i>
                        <strong>Produits 100% authentiques</strong>
                        <small>Testés et validés avant expédition.</small>
                    </span>

                    <span>
                        <i class="fas fa-spray-can-sparkles"></i>
                        <strong>Parfums premium</strong>
                        <small>Niche & marques de prestige.</small>
                    </span>
                </div>
            </div>
        </div>

        <div class="footer-lpf__seo-text">
            <strong>Lepetitflacon.shop</strong> — boutique en ligne spécialisée dans les décants de parfums,
            parfums homme, parfums femme et fragrances premium au Maroc.
        </div>

        <div class="footer-lpf__bottom">
            <p class="footer-lpf__copyright">
                &copy; 2026 Lepetitflacon. Tous droits réservés.
            </p>

            <div class="footer-lpf__bottom-right">
                <a href="https://technoproweb.com/" target="_blank" rel="noopener" class="footer-lpf__credit">
                    <i class="fas fa-code"></i>
                    <span><small>Conçu par</small> Techno Pro Web</span>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Notification -->
<div class="toast" id="toast"></div>

<!-- Retour en haut -->
<button class="back-to-top" id="backToTop" aria-label="Retour en haut"><i class="fas fa-chevron-up"></i></button>

<script src="{{ asset('assets/clints/js/app.js') }}"></script>
