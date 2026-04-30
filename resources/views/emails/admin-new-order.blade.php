<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle commande</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f6f6f6; padding:20px;">

    <table width="100%" cellpadding="0" cellspacing="0" style="max-width:700px; margin:auto; background:#ffffff; padding:30px; border-radius:8px;">
        
        <!-- Header -->
        <tr>
            <td>
                <h1 style="color:#c9a24a; margin:0;">Lepetitflacon - SHOP</h1>
                <p style="color:#666;">Parfums de luxe avec une touche moderne</p>
            </td>
        </tr>

        <!-- Title -->
        <tr>
            <td style="padding-top:20px;">
                <h2 style="margin:0;">Nouvelle commande reçue</h2>
                <p><strong>N° commande :</strong> #{{ $order->order_number }}</p>
                <p><strong>Date :</strong> {{ now()->format('Y-m-d') }}</p>
                <p><strong>Paiement :</strong> {{ $order->payment_method }}</p>
            </td>
        </tr>

        <!-- Client -->
        <tr>
            <td style="padding-top:20px;">
                <h3 style="color:#c9a24a; border-bottom:1px solid #eee; padding-bottom:5px;">Informations client</h3>
                <p>
                    {{ $order->address_details['first_name'] ?? '' }} {{ $order->address_details['last_name'] ?? '' }}<br>
                    Email : {{ $order->address_details['email'] ?? '-' }}<br>
                    Téléphone : {{ $order->address_details['phone'] ?? '-' }}<br>
                    Adresse : {{ $order->address_details['address'] ?? '-' }}
                </p>
            </td>
        </tr>

        <!-- Table -->
        <tr>
            <td style="padding-top:20px;">
                <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f2f2f2;">
                            <th align="left">Produit</th>
                            <th align="center">Quantité</th>
                            <th align="right">Prix</th>
                            <th align="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr style="border-bottom:1px solid #eee;">
                            <td>
                                {{ $item->product->getTranslation('name', 'fr') ?? $item->product->name ?? 'Produit supprimé' }}
                            </td>
                            <td align="center">{{ $item->quantity }}</td>
                            <td align="right">{{ number_format($item->price, 2, ',', ' ') }} DH</td>
                            <td align="right">
                                {{ number_format($item->price * $item->quantity, 2, ',', ' ') }} DH
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>

        <!-- Totals -->
        <tr>
            <td align="right" style="padding-top:20px;">
                <p>Sous-total : <strong>{{ number_format($order->subtotal, 2, ',', ' ') }} DH</strong></p>
                <p>Livraison : <strong>{{ number_format($order->shipping, 2, ',', ' ') }} DH</strong></p>
                <h2 style="color:#c9a24a;">Total : {{ number_format($order->total, 2, ',', ' ') }} DH</h2>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="text-align:center; padding-top:30px; color:#888; font-size:12px;">
                Merci pour votre commande chez Lepetitflacon.<br><br>
                © {{ date('Y') }} Lepetitflacon — Tous droits réservés
            </td>
        </tr>

    </table>

</body>
</html>