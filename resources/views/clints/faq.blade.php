@extends('clints.layout.master')

@section('title', 'FAQ — Luxe PARFUM')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/clints/css/shop.css')}}">
@endsection

@section('content')


<style>
    .faq-lpf {
    position: relative;
    padding: 100px 0;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 10% 20%,
            rgba(226, 177, 83, 0.15),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 10%,
            rgba(7, 8, 73, 0.1),
            transparent 30%
        ),
        linear-gradient(180deg, #fffaf2 0%, #ffffff 50%, #fff7ec 100%);
}

/* Glow */
.faq-lpf__glow {
    position: absolute;
    border-radius: 999px;
    filter: blur(12px);
    animation: floatFaq 6s ease-in-out infinite;
}

.faq-lpf__glow--one {
    width: 240px;
    height: 240px;
    left: -80px;
    bottom: 100px;
    background: rgba(226, 177, 83, 0.3);
}

.faq-lpf__glow--two {
    width: 260px;
    height: 260px;
    right: -90px;
    top: 60px;
    background: rgba(7, 8, 73, 0.12);
}

/* Header */
.faq-lpf__header {
    text-align: center;
    margin-bottom: 60px;
}

.faq-lpf__header span {
    display: block;
    color: #070849;
    font-size: 13px;
    font-weight: 900;
    letter-spacing: 6px;
    text-transform: uppercase;
    margin-bottom: 16px;
}

/* List */
.faq-lpf__list {
    max-width: 800px;
    margin: auto;
    display: grid;
    gap: 18px;
}

/* Item */
.faq-item {
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid rgba(216, 169, 54, 0.3);
    box-shadow: 0 18px 45px rgba(7, 8, 73, 0.08);
    overflow: hidden;
    transition: 0.3s;
}

.faq-item:hover {
    transform: translateY(-4px);
}

/* Question */
.faq-question {
    width: 100%;
    padding: 22px 24px;
    border: none;
    background: transparent;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 17px;
    font-weight: 800;
    color: #070849;
    cursor: pointer;
}

.faq-question i {
    transition: 0.3s;
}

/* Answer */
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: 0.4s ease;
    padding: 0 24px;
}

.faq-answer p {
    padding-bottom: 20px;
    color: #666;
    line-height: 1.7;
}

/* Active */
.faq-item.active .faq-answer {
    max-height: 200px;
}

.faq-item.active .faq-question i {
    transform: rotate(45deg);
    color: #d8a936;
}

/* Animation */
@keyframes floatFaq {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Mobile */
@media (max-width: 768px) {
    .faq-lpf {
        padding: 70px 0;
    }

    .faq-question {
        font-size: 15px;
    }
}

.faq-title-wow {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 26px;
    margin-bottom: 45px;
}

.faq-title-wow span {
    width: 85px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #d8a936, transparent);
}

.faq-title-wow h2 {
    position: relative;
    margin: 0;
    color: #070849;
    font-size: 18px;
    font-weight: 900;
    letter-spacing: 14px;
    text-transform: uppercase;
}

.faq-title-wow h2::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -18px;
    width: 52px;
    height: 4px;
    border-radius: 999px;
    background: linear-gradient(90deg, #d8a936, #fff1b9, #d8a936);
    transform: translateX(-50%);
    box-shadow: 0 8px 20px rgba(216, 169, 54, 0.35);
}

@media (max-width: 768px) {
    .faq-title-wow {
        gap: 12px;
    }

    .faq-title-wow span {
        width: 35px;
    }

    .faq-title-wow h2 {
        font-size: 13px;
        letter-spacing: 6px;
    }
}

</style>

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
