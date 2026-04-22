@extends('admin.layout.master')

@section('title', 'Ajouter une catégorie — Lepetitflacon')

@section('page_title', 'Ajouter une catégorie')
@section('page_subtitle', 'Créer une nouvelle catégorie de produits')

@section('content')
<section class="dashboard-section active">
    <div class="table-card" style="max-width: 800px; margin: 0 auto;">
        <div class="table-card__header">
            <h3>Informations de la nouvelle catégorie</h3>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-right"></i> Retour à la liste
            </a>
        </div>
        
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="modal__body" style="padding: 24px">
            @csrf
            
            <div class="form-group" style="margin-bottom: 20px">
                <label>Image de la catégorie</label>
                <input type="file" name="image" accept="image/*">
                @error('image') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label>Nom en arabe</label>
                    <input type="text" name="name[ar]" value="{{ old('name.ar') }}" placeholder="Exemple : Parfums pour homme" required>
                    @error('name.ar') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Nom en anglais</label>
                    <input type="text" name="name[en]" value="{{ old('name.en') }}" placeholder="Example: Men Perfumes" required>
                    @error('name.en') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Catégorie parente</label>
                <select name="parent_id">
                    <option value="">Catégorie principale (sans parent)</option>
                    @foreach($parentCategories as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div style="margin-top: 32px; display: flex; gap: 12px">
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save"></i> Enregistrer la catégorie
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">Annuler</a>
            </div>
        </form>
    </div>
</section>
@endsection