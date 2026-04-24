<footer class="footer" id="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand">
        <a href="{{ route('home') }}" class="nav-logo">Lepetit <span>flacon</span></a>
        <p>Nous créons des parfums d’exception qui racontent votre histoire unique. Chaque fragrance est un voyage entre élégance et découverte.</p>
        <div class="footer__social">
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
        </div>
      </div>

      <div class="footer__col">
        <h4>Boutique</h4>
        <a href="{{ route('shop') }}">Tous les parfums</a>
        <a href="{{ route('shop', ['cat' => 'men']) }}">Collection homme</a>
        <a href="{{ route('shop', ['cat' => 'women']) }}">Collection femme</a>
        <a href="{{ route('shop', ['cat' => 'new']) }}">Nouveautés</a>
        <a href="{{ route('shop', ['cat' => 'gifts']) }}">Coffrets cadeaux</a>
      </div>

      <div class="footer__col">
        <h4>Service client</h4>
        <a href="#">Contactez-nous</a>
        <a href="#">Livraison et retours</a>
        <a href="#">FAQ</a>
        <a href="#">Suivre ma commande</a>
        <a href="#">Guide des tailles</a>
      </div>

      <div class="footer__col">
        <h4>Qui sommes-nous ?</h4>
        <a href="#">Notre histoire</a>
        <a href="#">Savoir-faire</a>
        <a href="#">Durabilité</a>
        <a href="#">Carrières</a>
        <a href="#">Presse</a>
      </div>
    </div>

    <div class="footer__bottom">
      <p>&copy; 2026 Lepetitflacon. Tous droits réservés.</p>
      <div class="footer__payments">
        <i class="fab fa-cc-visa"></i>
        <i class="fab fa-cc-mastercard"></i>
        <i class="fab fa-cc-amex"></i>
        <i class="fab fa-cc-paypal"></i>
      </div>
    </div>
  </div>
</footer>

<!-- Notification -->
<div class="toast" id="toast"></div>

<!-- Retour en haut -->
<button class="back-to-top" id="backToTop" aria-label="Retour en haut"><i class="fas fa-chevron-up"></i></button>

<script src="{{asset('assets/clints/js/app.js')}}"></script>