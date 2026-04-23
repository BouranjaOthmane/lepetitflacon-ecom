@extends('admin.layout.master')

@section('title', 'Ajouter une nouvelle marque — Lepetitflacon')

@section('page_title', 'Ajouter une marque')
@section('page_subtitle', 'Créer une nouvelle marque')

@section('content')
<section class="dashboard-section active">
    <div class="table-card" style="max-width: 600px; margin: 0 auto;">
        <div class="table-card__header">
            <h3>Informations de la nouvelle marque</h3>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-right"></i> Retour à la liste
            </a>
        </div>
        
        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="modal__body" style="padding: 24px">
            @csrf
            
            <div class="form-group">
                <label>Nom de la marque</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Exemple : Chanel" required>
                @error('name') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label>Logo de la marque</label>
                <input type="file" name="logo" accept="image/*">
                @error('logo') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div style="margin-top: 32px; display: flex; gap: 12px">
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save"></i> Enregistrer la marque
                </button>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-outline">Annuler</a>
            </div>
        </form>
    </div>
</section>
@endsection