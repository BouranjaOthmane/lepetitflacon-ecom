@extends('admin.layout.master')

@section('title', 'Modifier la catégorie — Lux Parfum')

@section('page_title', 'Modifier la catégorie')
@section('page_subtitle', 'Modifier les informations de la catégorie : ' . $category->getTranslation('name', 'fr', false))

@section('content')
<section class="dashboard-section active">
    <div class="table-card" style="max-width: 800px; margin: 0 auto;">
        <div class="table-card__header">
            <h3>Modifier les informations de la catégorie</h3>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="modal__body" style="padding: 24px">
            @csrf
            @method('PUT')
            
            <div class="form-group" style="margin-bottom: 20px">
                <label>Image actuelle de la catégorie</label>

                @if($category->getFirstMediaUrl('images'))
                    <div style="margin-bottom: 10px">
                        <img src="{{ $category->getFirstMediaUrl('images') }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px">
                    </div>
                @endif

                <input type="file" name="image" accept="image/*">

                @error('image')
                    <span style="color:red; font-size: 0.8rem">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nom en arabe</label>
                    <input type="text" name="name[ar]" value="{{ old('name.ar', $category->getTranslation('name', 'ar')) }}" placeholder="Exemple : عطور رجالية" required>

                    @error('name.ar')
                        <span style="color:red; font-size: 0.8rem">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nom en anglais</label>
                    <input type="text" name="name[en]" value="{{ old('name.en', $category->getTranslation('name', 'en')) }}" placeholder="Example: Men Perfumes" required>

                    @error('name.en')
                        <span style="color:red; font-size: 0.8rem">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Catégorie parente</label>
                <select name="parent_id">
                    <option value="">Catégorie principale</option>

                    @foreach($parentCategories as $parent)
                        @if($parent->id != $category->id)
                            <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                {{ $parent->getTranslation('name', 'fr') ?: $parent->getTranslation('name', 'en') }}
                            </option>
                        @endif
                    @endforeach
                </select>

                @error('parent_id')
                    <span style="color:red; font-size: 0.8rem">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Afficher dans le menu ?</label>
                <select name="show_in_menu">
                    <option value="1" {{ old('show_in_menu', $category->show_in_menu) == 1 ? 'selected' : '' }}>
                        Oui
                    </option>
                    <option value="0" {{ old('show_in_menu', $category->show_in_menu) == 0 ? 'selected' : '' }}>
                        Non
                    </option>
                </select>

                @error('show_in_menu')
                    <span style="color:red; font-size: 0.8rem">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-top: 32px; display: flex; gap: 12px">
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save"></i> Mettre à jour la catégorie
                </button>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</section>
@endsection