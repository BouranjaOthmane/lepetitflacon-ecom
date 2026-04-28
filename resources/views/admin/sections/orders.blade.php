<!-- ===== ORDERS SECTION ===== -->
<section class="dashboard-section {{ $isActive ?? false ? 'active' : '' }}" id="orders">
    <div class="stats-grid" style="grid-template-columns: repeat(4,1fr); margin-bottom:24px">
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon orders"><i class="fas fa-clock"></i></div>
            </div>
            <div class="stat-card__value" style="font-size:1.4rem">{{ $orderStats['pending'] ?? 0 }}</div>
            <div class="stat-card__label">En attente</div>
        </div>
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon" style="background:rgba(96,165,250,0.15);color:var(--color-info)"><i
                        class="fas fa-shipping-fast"></i></div>
            </div>
            <div class="stat-card__value" style="font-size:1.4rem">{{ $orderStats['shipped'] ?? 0 }}</div>
            <div class="stat-card__label">Expédiée</div>
        </div>
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon products"><i class="fas fa-check-circle"></i></div>
            </div>
            <div class="stat-card__value" style="font-size:1.4rem">{{ $orderStats['completed'] ?? 0 }}</div>
            <div class="stat-card__label">Terminée</div>
        </div>
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon customers"><i class="fas fa-times-circle"></i></div>
            </div>
            <div class="stat-card__value" style="font-size:1.4rem">{{ $orderStats['cancelled'] ?? 0 }}</div>
            <div class="stat-card__label">Annulée</div>
        </div>
    </div>
    <div class="table-card">
        <div class="table-card__header">
            <h3>Toutes les commandes</h3>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>N° commande</th>
                    <th>Client</th>
                    <th>Produits</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ordersTableBody">
                @foreach ($orders as $order)
                    <tr>
                        <td style="font-weight:600;color:var(--color-gold)">#{{ $order->order_number }}</td>
                        <td>
                            <div class="table-product__name">{{ $order->user->name ?? 'Client inconnu' }}</div>
                            <div class="table-product__brand">{{ $order->user->email ?? '' }}</div>
                        </td>
                        <td>
                            <div style="font-weight:600">
                                {{ $order->items_count ?? $order->items->count() }} produit(s)
                            </div>

                            @foreach ($order->items as $item)
                                <div style="font-size: 13px; color: black; margin-top: 4px;">
                                    {{ $item->product->getTranslation('name', 'fr') ?? ($item->product->name ?? 'Produit supprimé') }}

                                    @if (!empty($item->size))
                                        - {{ $item->size }}
                                    @endif

                                    <span style="color: black;font-size: 16px">
                                        × {{ $item->quantity ?? ($item->qty ?? 1) }}
                                    </span>
                                </div>
                            @endforeach
                        </td>
                        <td style="font-weight:600">{{ number_format($order->total) }} DH</td>
                        <td>
                            @php $status = strtolower($order->status); @endphp
                            <span class="status-badge {{ $status }}">
                                @if ($status == 'completed')
                                    Terminée
                                @elseif($status == 'pending')
                                    En attente
                                @elseif($status == 'shipped')
                                    Expédiée
                                @elseif($status == 'processing')
                                    En cours de traitement
                                @elseif($status == 'delivered')
                                    Livrée
                                @elseif($status == 'cancelled' || $status == 'canceled')
                                    Annulée
                                @elseif($status == 'paid')
                                    Payée
                                @else
                                    {{ $order->status }}
                                @endif
                            </span>
                            @if (strtolower($order->payment_status) == 'paid')
                                <div style="font-size: 0.7rem; color: var(--color-success); margin-top: 2px">
                                    <i class="fas fa-check-double"></i> Payée
                                </div>
                            @endif
                            @if ($order->tracking_number)
                                <div style="font-size: 0.75rem; color: black ; margin-top: 5px">
                                    <i class="fas fa-truck"></i> {{ $order->shipping_company }}:
                                    {{ $order->tracking_number }}
                                </div>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="table-actions">
                                <button title="Voir" onclick="viewOrder({{ $order->id }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button title="Informations de livraison"
                                    onclick="editShipping({{ $order->id }}, '{{ $order->shipping_company }}', '{{ $order->tracking_number }}')">
                                    <i class="fas fa-shipping-fast"></i>
                                </button>
                                <button title="Changer le statut"
                                    onclick="editOrderStatus({{ $order->id }}, '{{ $order->status }}')">
                                    <i class="fas fa-tasks"></i>
                                </button>
                                @if (in_array(strtolower($order->status), ['processing', 'shipped', 'delivered', 'completed']))
                                    <a href="{{ route('orders.invoice.download', $order->id) }}" target="_blank"
                                        title="Télécharger la facture" class="btn-icon"
                                        style="color:red; display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: rgba(239, 68, 68, 0.1);">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <span>Affichage de {{ $orders->count() }} sur {{ $orders->total() }} résultat(s)</span>
            <div class="pagination">
                {{ $orders->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</section>



<!-- ===== EDIT STATUS MODAL ===== -->
<div class="modal-overlay" id="editStatusModal">
    <div class="modal">
        <div class="modal__header">
            <h3>Changer le statut de la commande</h3>
            <button class="modal__close" onclick="closeModal('editStatusModal')"><i class="fas fa-times"></i></button>
        </div>
        <form id="statusForm">
            @csrf
            @method('PATCH')
            <input type="hidden" name="order_id" id="statusOrderId">
            <div class="modal__body">
                <div class="form-group">
                    <label>Nouveau statut</label>
                    <select name="status" id="orderStatusSelect">
                        <option value="pending">En attente</option>
                        <option value="processing">En cours de traitement</option>
                        <option value="shipped">Expédiée</option>
                        <option value="delivered">Livrée</option>
                        <option value="canceled">Annulée</option>
                    </select>
                </div>
            </div>
            <div class="modal__footer">
                <button type="submit" class="btn btn-gold"><i class="fas fa-save"></i> Mettre à jour</button>
                <button type="button" class="btn btn-outline" onclick="closeModal('editStatusModal')">Annuler</button>
            </div>
        </form>
    </div>
</div>

<!-- ===== EDIT SHIPPING MODAL ===== -->
<div class="modal-overlay" id="editShippingModal">
    <div class="modal">
        <div class="modal__header">
            <h3>Mettre à jour les informations de livraison</h3>
            <button class="modal__close" onclick="closeModal('editShippingModal')"><i
                    class="fas fa-times"></i></button>
        </div>
        <form id="shippingForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="order_id" id="shippingOrderId">
            <div class="modal__body">
                <div class="form-group">
                    <label>Société de livraison</label>
                    <input type="text" name="shipping_company" id="shippingCompany"
                        placeholder="Exemple : Aramex, DHL" required>
                </div>
                <div class="form-group">
                    <label>Numéro de suivi</label>
                    <input type="text" name="tracking_number" id="trackingNumber"
                        placeholder="Exemple : AWB123456789" required>
                </div>
            </div>
            <div class="modal__footer">
                <button type="submit" class="btn btn-gold"><i class="fas fa-save"></i> Enregistrer et passer à
                    expédiée</button>
                <button type="button" class="btn btn-outline"
                    onclick="closeModal('editShippingModal')">Annuler</button>
            </div>
        </form>
    </div>
</div>


<!-- ===== MODAL Détails Commande===== -->
<div class="modal-overlay" id="viewOrderModal">
    <div class="modal" style="max-width: 900px;">
        <div class="modal__header">
            <h3>Détails de la commande</h3>
            <button class="modal__close" onclick="closeModal('viewOrderModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="modal__body" id="viewOrderContent">
            <div style="padding:20px;text-align:center">
                <i class="fas fa-spinner fa-spin"></i> Chargement...
            </div>
        </div>

        <div class="modal__footer">
            <button type="button" class="btn btn-outline" onclick="closeModal('viewOrderModal')">
                Fermer
            </button>
        </div>
    </div>
</div>