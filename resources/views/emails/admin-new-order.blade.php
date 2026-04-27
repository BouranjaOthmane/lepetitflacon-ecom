<h2>Nouvelle commande reçue</h2>

<p><strong>Commande :</strong> #{{ $order->order_number }}</p>
<p><strong>Total :</strong> {{ number_format($order->total, 2, ',', ' ') }} DH</p>
<p><strong>Paiement :</strong> {{ $order->payment_method }}</p>

<h3>Client</h3>
<p>{{ $order->address_details['first_name'] ?? '' }} {{ $order->address_details['last_name'] ?? '' }}</p>
<p>Email : {{ $order->address_details['email'] ?? '-' }}</p>
<p>Téléphone : {{ $order->address_details['phone'] ?? '-' }}</p>
<p>Adresse : {{ $order->address_details['address'] ?? '-' }}</p>

<h3>Produits</h3>
<ul>
@foreach($order->items as $item)
    <li>
        {{ $item->product->getTranslation('name', 'fr') ?? $item->product->name ?? 'Produit supprimé' }}
        — Quantité : {{ $item->quantity }}
        — Prix : {{ number_format($item->price, 2, ',', ' ') }} DH
    </li>
@endforeach
</ul>