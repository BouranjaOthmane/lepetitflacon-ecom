<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Facture n° {{ $order->invoice_number }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            text-align: left;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .invoice-box {
            padding: 20px;
            font-size: 12px;
        }
        .header { width: 100%; margin-bottom: 20px; }
        .logo { font-size: 24px; color: #c9a84c; font-weight: bold; }
        .invoice-title { font-size: 20px; font-weight: bold; }
        .section-title { font-weight: bold; color: #c9a84c; border-bottom: 1px solid #c9a84c; margin-bottom: 10px; }
        .items-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .items-table th { background: #f8f9fa; padding: 8px; border: 1px solid #ddd; }
        .items-table td { padding: 8px; border: 1px solid #ddd; }
        .summary-table { width: 250px; margin-left: auto; margin-top: 20px; }
        .total-row { font-weight: bold; color: #c9a84c; font-size: 16px; }
        .footer { margin-top: 40px; text-align: center; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div class="header-left">
                <div class="logo">Lepetitflacon</div>
                <div>{{ $store_slogan }}</div>
            </div>
            <div class="header-right">
                <div class="invoice-title">Facture</div>
                <div>N° facture : <strong>{{ $order->invoice_number }}</strong></div>
                <div>Date : {{ $date }}</div>
                <div>N° commande : #{{ $order->order_number }}</div>
            </div>
        </div>

        <table class="details-table">
            <tr>
                <td width="50%">
                    <div class="section-title">Informations client</div>
                    <div>{{ $customer_name }}</div>
                    <div>{{ $order->address_details['email'] }}</div>
                    <div>{{ $order->address_details['phone'] }}</div>
                </td>
                <td width="50%">
                    <div class="section-title">Adresse de livraison</div>
                    <div>{{ $shipping_address }}</div>
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->reshaped_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2, ',', ' ') }} DH</td>
                    <td>{{ number_format($item->price * $item->quantity, 2, ',', ' ') }} DH</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="summary-table">
            <tr>
                <td>Sous-total :</td>
                <td align="left">{{ number_format($order->total - $order->shipping_cost, 2, ',', ' ') }} DH</td>
            </tr>
            <tr>
                <td>Livraison :</td>
                <td align="left">{{ number_format($order->shipping_cost, 2, ',', ' ') }} DH</td>
            </tr>
            <tr class="total-row">
                <td>Total :</td>
                <td align="left">{{ number_format($order->total, 2, ',', ' ') }} DH</td>
            </tr>
        </table>

        <div class="footer">
            <p>Merci pour votre achat chez Lepetitflacon.</p>
            <p>Tous droits réservés &copy; {{ date('Y') }} Lepetitflacon</p>
            <p>Cette facture a été générée automatiquement et ne nécessite pas de signature.</p>
        </div>
    </div>
</body>
</html>