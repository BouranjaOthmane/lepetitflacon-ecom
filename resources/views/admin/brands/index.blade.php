@extends('admin.layout.master')

@section('title', 'Gestion des marques — Lepetitflacon')

@section('page_title', 'Marques')
@section('page_subtitle', 'Gestion des marques partenaires')

@section('content')
<section class="dashboard-section active">
    <!-- Stats Row for Brands -->
    <div class="stats-grid" style="grid-template-columns: repeat(2, 1fr); margin-bottom: 24px">
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon reviews"><i class="fas fa-certificate"></i></div>
            </div>
            <div class="stat-card__value">{{ $brands->count() }}</div>
            <div class="stat-card__label">Total des marques</div>
        </div>
        <div class="stat-card">
            <div class="stat-card__header">
                <div class="stat-card__icon products"><i class="fas fa-box"></i></div>
            </div>
            <div class="stat-card__value">{{ \App\Models\Product::count() }}</div>
            <div class="stat-card__label">Total des produits</div>
        </div>
    </div>

    <div class="table-card" style="max-width: 900px; margin: 0 auto;">
        <div class="table-card__header">
            <h3>Liste des marques</h3>
            <div class="table-card__actions">
                <a href="{{ route('admin.brands.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus"></i> Ajouter une nouvelle marque
                </a>
            </div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nom de la marque</th>
                    <th>Lien (Slug)</th>
                    <th>Nombre de produits</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($brands as $brand)
                <tr>
                    <td>
                        @if($brand->getFirstMediaUrl('logos'))
                            <img src="{{ $brand->getFirstMediaUrl('logos') }}" alt="" style="width: 50px; height: 50px; object-fit: contain; background: #fff; padding: 5px; border-radius: 4px">
                        @else
                            <div style="width: 50px; height: 50px; background: var(--color-bg-light); border-radius: 4px; display: flex; align-items: center; justify-content: center">
                                <i class="fas fa-image" style="color: var(--color-text-muted)"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight:600">{{ $brand->name }}</td>
                    <td style="color:var(--color-text-muted)">{{ $brand->slug }}</td>
                    <td>
                        <span class="status-badge pending">
                            {{ $brand->products_count ?? $brand->products()->count() }} produit(s)
                        </span>
                    </td>
                    <td>
                        <div style="display:flex;gap:8px;justify-content: center;">
                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-outline btn-sm" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette marque ainsi que tous les produits qui lui sont liés ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color:red" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 40px">Aucune marque ajoutée pour le moment</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection