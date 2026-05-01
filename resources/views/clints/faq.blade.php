@extends('clints.layout.master')

@section('title', 'FAQ — Le Petit Flacon')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/clints/css/shop.css')}}">
@endsection

@section('content')
<section class="faq-lpf">
    <div class="faq-lpf__glow faq-lpf__glow--one"></div>
    <div class="faq-lpf__glow faq-lpf__glow--two"></div>

    <div class="container">

<div class="faq-title-wow">
    <span></span>
    <h2>Questions fréquentes</h2>
    <span></span>
</div>

        <div class="faq-lpf__list">

            <!-- ITEM -->
            <div class="faq-item active">
                <button class="faq-question">
                    <span>Qu’est-ce qu’un décant de parfum ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                        Un décant est une petite quantité de parfum original que nous transférons
                        dans un flacon plus petit (5ml, 10ml ou plus). Cela vous permet de tester
                        un parfum ou de le porter facilement à un prix plus accessible.
                    </p>
                </div>
            </div>

            <!-- ITEM -->
            <div class="faq-item">
                <button class="faq-question">
                    <span>Vos parfums sont-ils authentiques ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                        Oui, tous nos parfums sont <strong>100% originaux</strong>, issus des grandes maisons
                        de parfumerie. Nous ne vendons jamais de copies ou de contrefaçons.
                    </p>
                </div>
            </div>

            <!-- ITEM -->
            <div class="faq-item">
                <button class="faq-question">
                    <span>Comment sont préparées les commandes ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                        Chaque commande est préparée avec soin. Le parfum est décanté dans un flacon
                        propre, sécurisé et hermétique afin de garantir une qualité optimale.
                    </p>
                </div>
            </div>

            <!-- ITEM -->
            <div class="faq-item">
                <button class="faq-question">
                    <span>Quels sont les délais de livraison ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                        Nous assurons une livraison rapide dans tout le Maroc. En général,
                        les délais sont entre <strong>24h et 72h</strong> selon votre ville.
                    </p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Quelle est la différence entre un décant et un parfum original ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                        Le parfum est exactement le même. La seule différence est le flacon : le décant est une petite quantité transférée dans un format plus pratique et économique.
                    </p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Pourquoi acheter un décant ?</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                       * Tester un parfum avant d’acheter le flacon complet <br>
* Varier les parfums sans trop dépenser <br>
* Voyager léger avec plusieurs fragrances <br>
* Découvrir des parfums de luxe à petit prix <br>
                    </p>
                </div>
            </div>

             <div class="faq-item">
                <button class="faq-question">
                    <span>Est-il possible de retourner un produit ?
</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
                       Oui, si le produit est endommagé ou s’il y a une erreur de commande, vous pouvez nous contacter pour une solution rapide.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Comment vous contacter ?

</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                   <p>
    Vous pouvez nous contacter directement via WhatsApp 
    <a href="https://wa.me/212704654736" target="_blank" rel="noopener" class="whatsapp-link">
        +212 704 654 736
    </a>
    pour toute question ou commande.
</p>
                </div>
            </div>

                  <div class="faq-item">
                <button class="faq-question">
                    <span>Quelle est la différence entre un décant et un parfum original ?
</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>Il n’y a aucune différence sur le parfum lui-même. Le décant contient exactement le même parfum original, seule la quantité et le flacon changent. Cela permet de tester des parfums de luxe au Maroc à moindre coût.</p>
                </div>
            </div>

                <div class="faq-item">
                <button class="faq-question">
                    <span>Proposez-vous des nouveautés ou recommandations ?

</span>
                    <i class="fas fa-plus"></i>
                </button>

                <div class="faq-answer">
                    <p>
Oui, nous ajoutons régulièrement de nouveaux parfums et nous pouvons vous conseiller selon vos préférences (boisé, sucré, frais, oriental, etc.).</p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // FAQ DESIGN
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.parentElement;

        document.querySelectorAll('.faq-item').forEach(i => {
            if(i !== item) i.classList.remove('active');
        });

        item.classList.toggle('active');
    });
});
</script>
@endsection
