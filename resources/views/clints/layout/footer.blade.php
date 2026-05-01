<footer class="footer-lpf" id="footer">
    <div class="footer-lpf__glow footer-lpf__glow--one"></div>
    <div class="footer-lpf__glow footer-lpf__glow--two"></div>

    <div class="container">
        <div class="footer-lpf__top">
            <div class="footer-lpf__brand">
                <a href="{{ route('home') }}" class="footer-lpf__logo"
                    title="Lepetitflacon.shop - Boutique de décants de parfums au Maroc">
                    <img src="{{ asset('assets/clints/images/logo-v-13.png') }}"
                        alt="Lepetitflacon.shop - Décants de parfums originaux au Maroc">
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
                    <a href="https://www.instagram.com/lepetit.flacon/" target="_blank" rel="noopener noreferrer"
                        aria-label="Suivez Lepetitflacon sur Instagram" title="Instagram Lepetitflacon">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://www.tiktok.com/@lepetit.flacon?_r=1&_t=ZS-95xA4EMShyJ" target="_blank"
                        rel="noopener noreferrer" aria-label="Suivez Lepetitflacon sur TikTok"
                        title="TikTok Lepetitflacon">
                        <i class="fab fa-tiktok"></i>
                    </a>

                    <a href="https://wa.me/212704654736" target="_blank" rel="noopener noreferrer"
                        aria-label="Contacter Lepetitflacon sur WhatsApp"
                        title="Commander vos décants de parfums sur WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="footer-lpf__col">
                <h4>Boutique</h4>
                <a href="{{ route('shop') }}" title="Acheter des décants de parfums au Maroc">Décants</a>
                <a href="{{ route('shop', ['cat' => 9]) }}" title="Décants de parfums homme au Maroc">Décants homme</a>
                <a href="{{ route('shop', ['cat' => 8]) }}" title="Décants de parfums femme au Maroc">Décants femme</a>
                <a href="{{ route('shop', ['cat' => 10]) }}" title="Acheter des parfums complets originaux">Pafums
                    complets</a>
                <a href="{{ route('shop', ['cat' => 11]) }}" title="Univers féminin parfums et soins">Univers
                    féminin</a>
                <a href="{{ route('shop', ['cat' => 12]) }}" title="Univers masculin parfums et soins">Univers
                    masculin</a>
            </div>

            <div class="footer-lpf__col footer-lpf__contact">
                <h4>Service client</h4>

                <a href="https://wa.me/212704654736" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>

                <a href="tel:+212704654736" aria-label="Appeler Lepetitflacon"
                    title="Appeler Lepetitflacon au +212704654736">
                    <i class="fas fa-phone"></i>
                    +212704654736
                </a>

                <a href="mailto:contact.lepetitflacon@gmail.com" title="Envoyer un email à Lepetitflacon">
                    <i class="fas fa-envelope"></i>
                    contact.lepetitflacon@gmail.com
                </a>

                <a href="{{ route('faq') }}" target="_blank" rel="noopener noreferrer"
                    title="FAQ Lepetitflacon - Questions fréquentes sur les décants de parfums">
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
    <style>
        .footer-lpf__contact i {
            width: 18px !important;
            color: #ffe7a5 !important;
            font-size: 14px !important;
        }
    </style>

</footer>


<!-- Notification -->
<div class="toast" id="toast"></div>

<!-- Retour en haut -->
<button class="back-to-top" id="backToTop" aria-label="Retour en haut"><i class="fas fa-chevron-up"></i></button>

<script src="{{ asset('assets/clints/js/app.js') }}"></script>
