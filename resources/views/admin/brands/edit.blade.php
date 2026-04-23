@extends('admin.layout.master')

@section('title', 'Modifier la marque — Lepetitflacon')

@section('page_title', 'Modifier une marque')
@section('page_subtitle', 'Modifier les informations de la marque')

@section('content')
<section class="dashboard-section active">
    <div class="table-card" style="max-width: 600px; margin: 0 auto;">
        <div class="table-card__header">
            <h3>Informations de la marque</h3>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline btn-sm">
                <i class="fas fa-arrow-right"></i> Retour à la liste
            </a>
        </div>
        
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="modal__body" style="padding: 24px">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nom de la marque</label>
                <input type="text" name="name" value="{{ old('name', $brand->name) }}" required>
                @error('name') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label>Mettre à jour le logo</label>
                @if($brand->getFirstMediaUrl('logos'))
                    <div style="margin-bottom: 10px">
                        <img src="{{ $brand->getFirstMediaUrl('logos') }}" alt="" style="width: 100px; height: 100px; object-fit: contain; background: #fff; padding: 10px; border-radius: 8px">
                    </div>
                @endif
                <input type="file" name="logo" accept="image/*">
                @error('logo') <span style="color:red; font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>

            <div style="margin-top: 32px; display: flex; gap: 12px">
                <button type="submit" class="btn btn-gold">
                    <i class="fas fa-save"></i> Mettre à jour la marque
                </button>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-outline">Annuler</a>
            </div>
        </form>
    </div>
</section>
@endsection