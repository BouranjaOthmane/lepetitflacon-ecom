@extends('admin.layout.master')

@section('title', 'Gestion des catégories — Lepetitflacon')

@section('page_title', 'Catégories')
@section('page_subtitle', 'Gérer les catégories de produits')

@section('content')
<section class="dashboard-section active">
    <div class="table-card">
        <div class="table-card__header">
            <h3>Liste des catégories <span style="color:black ;font-weight:400">({{ $categories->count() }})</span></h3>
            <div class="table-card__actions">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-gold">
                    <i class="fas fa-plus"></i> Ajouter une catégorie
                </a>
            </div>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    {{-- <th>Nom (EN)</th> --}}
                    <th>Catégorie parente</th>
                    {{-- <th>Nombre de produits</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>
                        @if($category->getFirstMediaUrl('images'))
                            <img src="{{ $category->getFirstMediaUrl('images') }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px">
                        @else
                            <div style="width: 40px; height: 40px; background: var(--color-bg-light); border-radius: 4px; display: flex; align-items: center; justify-content: center">
                                <i class="fas fa-image" style="color: var(--color-text-muted)"></i>
                            </div>
                        @endif
                    </td>
                    {{-- <td style="font-weight:600">{{ $category->getTranslation('name', 'ar') }}</td> --}}

                    <td>{{ $category->getTranslation('name', 'en') }}</td>
                    <td>
                        @if($category->parent)
                            <span class="status-badge shipped">{{ $category->parent->name }}</span>
                        @else
                            <span class="status-badge pending">Principale</span>
                        @endif
                    </td>
                    {{-- <td style="font-weight:600">{{ $category->products_count ?? 0 }}</td> --}}
                    <td>
                        <div style="display:flex;gap:8px;justify-content: center;">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline btn-sm" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color: red " title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 40px">Aucune catégorie ajoutée pour le moment</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection