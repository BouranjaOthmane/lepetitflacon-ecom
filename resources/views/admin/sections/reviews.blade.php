<!-- ===== REVIEWS SECTION ===== -->
<section class="dashboard-section {{ ($isActive ?? false) ? 'active' : '' }}" id="reviews">
    <div class="table-card">
        <div class="table-card__header">
            <h3>Avis <span style="color:var(--color-text-muted);font-weight:400">({{ $reviews->total() }})</span></h3>
            <div class="table-card__actions" style="display: flex; gap: 10px">
                <select id="filterReviewRating" class="form-input" style="padding: 4px 8px; font-size: 0.85rem" onchange="filterReviews()">
                    <option value="">Tous les avis</option>
                    <option value="5">5 étoiles</option>
                    <option value="4">4 étoiles</option>
                    <option value="3">3 étoiles</option>
                    <option value="1-2">1 à 2 étoiles</option>
                </select>
                <select id="filterReviewStatus" class="form-input" style="padding: 4px 8px; font-size: 0.85rem" onchange="filterReviews()">
                    <option value="">Tous les statuts</option>
                    <option value="approved">Approuvé</option>
                    <option value="pending">En attente de validation</option>
                </select>
            </div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Client</th>
                    <th>Note</th>
                    <th>Titre et commentaire</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="reviewsTableBody">
                @foreach($reviews as $review)
                <tr>
                    <td style="font-weight:600">
                        {{ $review->product->name ?? 'Produit supprimé' }}
                        @if($review->is_verified_purchase)
                            <div class="badge badge--success" style="font-size: 0.65rem; padding: 2px 6px; margin-top: 4px">
                                <i class="fas fa-check-circle"></i> Achat vérifié
                            </div>
                        @endif
                    </td>
                    <td>{{ $review->user->name ?? 'Anonyme' }}</td>
                    <td>
                        <div class="stars">
                            @for($i=1; $i<=5; $i++)
                                <i class="fas fa-star {{ $i <= $review->rating ? '' : 'far' }}" style="{{ $i <= $review->rating ? '' : 'color:var(--color-text-dim)' }}"></i>
                            @endfor
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600">{{ $review->title }}</div>
                        <div style="font-size: 0.85rem; color: var(--color-text-muted); max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $review->comment }}">
                            {{ $review->comment }}
                        </div>
                    </td>
                    <td>
                        <span class="badge {{ $review->is_approved ? 'badge--success' : 'badge--warning' }}">
                            {{ $review->is_approved ? 'Approuvé' : 'En attente' }}
                        </span>
                    </td>
                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                    <td>
                        <div class="table-actions">
                            @if(!$review->is_approved)
                                <button class="btn-icon" style="color: var(--color-success)" title="Approuver" onclick="approveReview({{ $review->id }})">
                                    <i class="fas fa-check"></i>
                                </button>
                            @else
                                <button class="btn-icon" style="color: var(--color-warning)" title="Rejeter" onclick="rejectReview({{ $review->id }})">
                                    <i class="fas fa-undo"></i>
                                </button>
                            @endif
                            <button class="btn-icon" style="color: var(--color-gold)" title="Vérifier l'achat" onclick="toggleVerifiedReview({{ $review->id }})">
                                <i class="fas fa-certificate"></i>
                            </button>
                            <button class="btn-icon" style="color: var(--color-danger)" title="Supprimer" onclick="deleteReview({{ $review->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <span>Affichage de {{ $reviews->count() }} sur {{ $reviews->total() }} résultat(s)</span>
            <div class="pagination">
                {{ $reviews->links('admin.layout.pagination') }}
            </div>
        </div>
    </div>
</section>