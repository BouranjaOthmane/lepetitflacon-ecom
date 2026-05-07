@extends('clints.layout.master')

@section('title', 'Politique de retour et de remboursement — Luxe PARFUM')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/clints/css/shop.css') }}">
@endsection

@section('content')

<style>
.policy-page-lpf {
    position: relative;
    padding: 100px 0;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 20%, rgba(226, 177, 83, 0.15), transparent 30%),
        radial-gradient(circle at 90% 10%, rgba(7, 8, 73, 0.1), transparent 30%),
        linear-gradient(180deg, #fffaf2 0%, #ffffff 50%, #fff7ec 100%);
}

.policy-page-lpf__glow {
    position: absolute;
    border-radius: 999px;
    filter: blur(12px);
    animation: policyFloat 6s ease-in-out infinite;
}

.policy-page-lpf__glow--one {
    width: 240px;
    height: 240px;
    left: -80px;
    bottom: 100px;
    background: rgba(226, 177, 83, 0.3);
}

.policy-page-lpf__glow--two {
    width: 260px;
    height: 260px;
    right: -90px;
    top: 60px;
    background: rgba(7, 8, 73, 0.12);
}

.policy-title-wow {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 26px;
    margin-bottom: 45px;
    text-align: center;
}

.policy-title-wow span {
    width: 85px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #d8a936, transparent);
}

.policy-title-wow h1 {
    position: relative;
    margin: 0;
    color: #070849;
    font-size: 18px;
    font-weight: 900;
    letter-spacing: 9px;
    text-transform: uppercase;
    line-height: 1.7;
}

.policy-title-wow h1::after {
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

.policy-page-lpf__card {
    position: relative;
    z-index: 2;
    max-width: 1000px;
    margin: 0 auto;
    padding: 45px;
    border-radius: 28px;
    background: rgba(255, 255, 255, 0.88);
    border: 1px solid rgba(216, 169, 54, 0.3);
    box-shadow: 0 22px 60px rgba(7, 8, 73, 0.08);
}

.policy-page-lpf__intro {
    margin: 0 0 35px;
    color: #666;
    font-size: 17px;
    line-height: 1.9;
    text-align: center;
}

.policy-block {
    position: relative;
    padding: 26px 0 26px 34px;
    border-left: 2px solid rgba(216, 169, 54, 0.35);
}

.policy-block:not(:last-child) {
    border-bottom: 1px solid rgba(7, 8, 73, 0.06);
}

.policy-block__number {
    position: absolute;
    left: -18px;
    top: 26px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, #070849, #171a78);
    color: #fff;
    font-size: 13px;
    font-weight: 900;
    box-shadow: 0 12px 25px rgba(7, 8, 73, 0.22);
}

.policy-block h2 {
    margin: 0 0 14px;
    color: #070849;
    font-size: 22px;
    font-weight: 900;
}

.policy-block p {
    margin: 0 0 14px;
    color: #666;
    font-size: 16px;
    line-height: 1.85;
}

.policy-block ul {
    margin: 0 0 14px;
    padding-left: 20px;
    color: #666;
    line-height: 1.9;
}

.policy-block li::marker {
    color: #d8a936;
}

.policy-block strong {
    color: #070849;
}

.policy-block a {
    color: #25D366;
    font-weight: 800;
    text-decoration: none;
    border-bottom: 1px dashed #25D366;
}

.policy-block a:hover {
    color: #128C7E;
    border-bottom-style: solid;
}

.policy-page-lpf__note {
    margin-top: 35px;
    padding: 22px 24px;
    border-radius: 20px;
    background: linear-gradient(135deg, #070849, #171a78);
    color: #fff;
    line-height: 1.8;
}

.policy-page-lpf__note strong {
    color: #ffe39a;
}

@keyframes policyFloat {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

@media (max-width: 768px) {
    .policy-page-lpf {
        padding: 70px 0;
    }

    .policy-title-wow {
        gap: 12px;
        margin-bottom: 38px;
    }

    .policy-title-wow span {
        width: 35px;
    }

    .policy-title-wow h1 {
        font-size: 13px;
        letter-spacing: 4px;
    }

    .policy-page-lpf__card {
        padding: 28px 22px;
        border-radius: 22px;
    }

    .policy-page-lpf__intro {
        font-size: 15px;
        text-align: left;
    }

    .policy-block {
        padding-left: 26px;
    }

    .policy-block h2 {
        font-size: 19px;
    }

    .policy-block p,
    .policy-block ul {
        font-size: 15px;
    }
}
</style>

<section class="policy-page-lpf">
    <div class="policy-page-lpf__glow policy-page-lpf__glow--one"></div>
    <div class="policy-page-lpf__glow policy-page-lpf__glow--two"></div>

    <div class="container">

        <div class="policy-title-wow">
            <span></span>
            <h1>Politique de retour et de remboursement</h1>
            <span></span>
        </div>

        <div class="policy-page-lpf__card">

            <p class="policy-page-lpf__intro">
                Chez <strong>Luxe PARFUM</strong>, nous accordons une grande importance à la satisfaction
                de nos clients. Si le produit que vous avez reçu est endommagé ou s’il y a une erreur
                de commande, vous pouvez nous contacter afin de trouver une solution rapide.
            </p>

            <div class="policy-block">
                <div class="policy-block__number">01</div>
                <h2>Conditions de retour</h2>
                <p>Les demandes de retour sont acceptées uniquement dans les cas suivants :</p>
                <ul>
                    <li>Produit reçu cassé ou endommagé</li>
                    <li>Mauvais produit envoyé</li>
                    <li>Produit incomplet à la réception</li>
                </ul>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">02</div>
                <h2>Délai de réclamation</h2>
                <p>
                    Toute réclamation doit être effectuée dans un délai de <strong>48 heures</strong>
                    après réception de la commande. Passé ce délai, aucune réclamation ne pourra être acceptée.
                </p>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">03</div>
                <h2>Conditions d’éligibilité</h2>
                <p>Pour être éligible à un retour :</p>
                <ul>
                    <li>Le produit ne doit pas avoir été utilisé</li>
                    <li>Le flacon doit être dans son état d’origine</li>
                    <li>Une vidéo claire du colis à l’ouverture peut être exigée comme preuve en cas de problème</li>
                </ul>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">04</div>
                <h2>Procédure de retour</h2>
                <p>Pour toute demande, veuillez nous contacter via :</p>
                <ul>
                    <li>
                        WhatsApp :
                        <a href="https://wa.me/212704654736" target="_blank" rel="noopener">
                            +212 704-654736
                        </a>
                    </li>
                    
                </ul>

                <p>Merci d’indiquer :</p>
                <ul>
                    <li>Le problème rencontré</li>
                    <li>Des photos ou vidéos à l’appui</li>
                </ul>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">05</div>
                <h2>Solution proposée</h2>
                <p>Selon la situation, nous proposons :</p>
                <ul>
                    <li>Un remplacement du produit</li>
                    <li>Un remboursement</li>
                    <li>Un avoir sur le site</li>
                </ul>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">06</div>
                <h2>Remboursement</h2>
                <p>
                    Si un remboursement est validé, il sera effectué via le même moyen de paiement utilisé
                    lors de la commande, dans un délai de quelques jours ouvrables.
                </p>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">07</div>
                <h2>Cas non acceptés</h2>
                <p>Les retours ne sont pas acceptés dans les cas suivants :</p>
                <ul>
                    <li>Si le parfum a été utilisé</li>
                    <li>Si le client n’aime pas l’odeur ou le choix effectué</li>
                    <li>Sans preuve photo ou vidéo en cas de produit endommagé</li>
                    <li>Après dépassement du délai de 48 heures</li>
                </ul>
            </div>

            <div class="policy-block">
                <div class="policy-block__number">08</div>
                <h2>Contact</h2>
                <p>
                    Pour toute question :<br>
                    WhatsApp :
                    <a href="https://wa.me/212704654736" target="_blank" rel="noopener">
                        +212 704-654736
                    </a>
                    <br>
                    Instagram :
                    <a href="https://www.instagram.com/lepetit.flacon/" target="_blank" rel="noopener">
                        lepetit.flacon
                    </a>
                </p>
            </div>

            <div class="policy-page-lpf__note">
                <strong>Important :</strong>
                Pour traiter votre demande rapidement, merci de fournir des preuves claires
                comme des photos ou vidéos du produit concerné.
            </div>

        </div>
    </div>
</section>

@endsection