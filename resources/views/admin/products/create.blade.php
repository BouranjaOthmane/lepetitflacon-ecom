@extends('admin.layout.master')

@section('title', 'Ajouter un produit — Lepetitflacon')

@section('page_title', 'Ajouter un produit')
@section('page_subtitle', 'Ajouter un nouveau produit au stock')

@section('content')
    <section class="dashboard-section active">
        @if ($errors->any())
            <div
                style="background: rgba(255, 77, 77, 0.1); border: 1px solid  red ; color: #fff; padding: 16px; border-radius: 10px; margin-bottom: 20px;">
                <strong>Veuillez corriger les erreurs suivantes :</strong>
                <ul style="margin: 10px 0 0 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-card" style="max-width: 1000px; margin: 0 auto;">
            <div class="table-card__header">
                <h3>Détails du nouveau produit</h3>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-sm">
                    <i class="fas fa-arrow-right"></i> Retour à la liste
                </a>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                class="modal__body" style="padding: 24px">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>Nom en arabe</label>
                        <input type="text" name="name[ar]" value="{{ old('name.ar') }}"
                            placeholder="Exemple : Parfum Ambre Oud" required>
                        @error('name.ar')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom en anglais</label>
                        <input type="text" name="name[en]" value="{{ old('name.en') }}" placeholder="Example: Amber Oud"
                            required>
                        @error('name.en')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="category_id" required>
                            <option value="">Choisir une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Marque</label>
                        <select name="brand_id" required>
                            <option value="">Choisir une marque</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Prix d’achat ($)</label>
                        <input type="number" step="0.01" name="purchase_price" id="purchase_price"
                            value="{{ old('purchase_price') }}" placeholder="0.00" required>
                        @error('purchase_price')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Prix de vente ($)</label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                            placeholder="0.00" required>
                        @error('price')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Prix promotionnel ($) - optionnel</label>
                        <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price') }}"
                            placeholder="0.00">
                        @error('sale_price')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div
                    style="margin-top: 24px; margin-bottom: 30px; padding: 20px; background: rgba(255, 255, 255, 0.02); border-radius: 12px; border: 1px solid var(--color-border)">
                    <div
                        style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; gap:12px; flex-wrap:wrap;">
                        <h4 style="margin:0; color: var(--color-gold); display:flex; align-items:center; gap:10px;">
                            <i class="fas fa-vial"></i> Formats du parfum
                        </h4>

                        <button type="button" class="btn btn-gold btn-sm" id="addSizeBtn">
                            <i class="fas fa-plus"></i> Ajouter un format
                        </button>
                    </div>

                    <p style="margin-bottom:16px; color: black ; font-size:0.9rem;">
                        Exemple : Dior Homme Intense - 5ML = 85.00 $ / 10ML = 125.00 $
                    </p>

                    <div id="sizesWrapper" style="display:flex; flex-direction:column; gap:14px;">
                        <div class="size-row"
                            style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Taille</label>
                                    <input type="text" name="sizes[0][size]" placeholder="Ex : 5ML" required>
                                </div>

                                <div class="form-group">
                                    <label>Prix ($)</label>
                                    <input type="number" step="0.01" name="sizes[0][price]" placeholder="0.00" required>
                                </div>

                                <div class="form-group" style="display:flex; align-items:end;">
                                    <button type="button" class="btn btn-outline btn-sm remove-size-btn"
                                        style="color: red ; width:100%;">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Référence produit (SKU)</label>
                        <input type="text" name="sku" value="{{ old('sku') }}" placeholder="Ex. : PRD-001"
                            required>
                        @error('sku')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Stock disponible</label>
                        <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}"
                            min="0" required>
                        @error('stock_quantity')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Seuil d’alerte (stock faible)</label>
                        <input type="number" name="low_stock_threshold" value="{{ old('low_stock_threshold', 10) }}"
                            min="0" required>
                        @error('low_stock_threshold')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Public cible</label>
                        <select name="gender" required>
                            <option value="Men" {{ old('gender') == 'Men' ? 'selected' : '' }}>Homme</option>
                            <option value="Women" {{ old('gender') == 'Women' ? 'selected' : '' }}>Femme</option>
                            <option value="Unisex" {{ old('gender') == 'Unisex' ? 'selected' : '' }}>Mixte</option>
                            <option value="Kids" {{ old('gender') == 'Kids' ? 'selected' : '' }}>Enfant</option>
                        </select>
                        @error('gender')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image principale du produit</label>
                        <input type="file" name="image" accept="image/*">
                        @error('image')
                            <span style="color: red ; font-size: 0.8rem">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Galerie d’images</label>
                        <input type="file" name="gallery[]" accept="image/*" multiple>
                        <small style="color:var(--color-text-muted)">Vous pouvez sélectionner plusieurs images</small>
                    </div>
                </div>


                <div
                    style="margin-top: 24px; padding: 20px; background: rgba(255, 255, 255, 0.02); border-radius: 12px; border: 1px solid var(--color-border)">
                    <h4
                        style="margin-bottom: 20px; color: var(--color-gold); display: flex; align-items: center; gap: 10px">
                        <i class="fas fa-layer-group"></i> Pyramide olfactive (notes du parfum)
                    </h4>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Notes de tête (Top Notes)</label>
                            <select name="top_notes[]" multiple class="form-input" style="height: 120px">
                                @foreach ($notes as $note)
                                    <option value="{{ $note->id }}">{{ $note->getTranslation('name', 'ar') }}
                                        ({{ $note->getTranslation('name', 'en') }})
                                    </option>
                                @endforeach
                            </select>
                            <small style="color:var(--color-text-muted)">Vous pouvez choisir plusieurs notes (Ctrl +
                                clic)</small>
                        </div>
                        <div class="form-group">
                            <label>Notes de cœur (Middle Notes)</label>
                            <select name="middle_notes[]" multiple class="form-input" style="height: 120px">
                                @foreach ($notes as $note)
                                    <option value="{{ $note->id }}">{{ $note->getTranslation('name', 'ar') }}
                                        ({{ $note->getTranslation('name', 'en') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row" style="margin-top: 16px">
                        <div class="form-group">
                            <label>Notes de fond (Base Notes)</label>
                            <select name="base_notes[]" multiple class="form-input" style="height: 120px">
                                @foreach ($notes as $note)
                                    <option value="{{ $note->id }}">{{ $note->getTranslation('name', 'ar') }}
                                        ({{ $note->getTranslation('name', 'en') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"
                            style="display: flex; align-items: center; justify-content: center; opacity: 0.5">
                            <div style="text-align: center">
                                <i class="fas fa-info-circle fa-2x"
                                    style="margin-bottom: 10px; color: var(--color-gold)"></i>
                                <p style="font-size: 0.8rem">Ces notes seront affichées sur la page produit dans la
                                    boutique afin d’aider le client à comprendre la composition du parfum.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <label>Description courte (AR)</label>
                    <textarea name="short_description[ar]" rows="2">{{ old('short_description.ar') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Description complète (AR)</label>
                    <textarea name="description[ar]" rows="4">{{ old('description.ar') }}</textarea>
                </div>

                <div class="form-row" style="margin-top:20px">
                    <div class="form-group" style="display:flex; align-items:center; gap:10px; cursor:pointer">
                        <input type="checkbox" name="is_featured" value="1" id="is_featured"
                            {{ old('is_featured') ? 'checked' : '' }}>
                        <label for="is_featured" style="margin:0">Produit mis en avant (Featured)</label>
                    </div>
                    <div class="form-group" style="display:flex; align-items:center; gap:10px; cursor:pointer">
                        <input type="checkbox" name="is_bestseller" value="1" id="is_bestseller"
                            {{ old('is_bestseller') ? 'checked' : '' }}>
                        <label for="is_bestseller" style="margin:0">Meilleure vente (Bestseller)</label>
                    </div>
                    <div class="form-group" style="display:flex; align-items:center; gap:10px; cursor:pointer">
                        <input type="checkbox" name="status" value="1" id="status"
                            {{ old('status', 1) ? 'checked' : '' }}>
                        <label for="status" style="margin:0">Actif (publier immédiatement)</label>
                    </div>
                </div>

                <div style="margin-top: 32px; display: flex; gap: 12px">
                    <button type="submit" class="btn btn-gold">
                        <i class="fas fa-save"></i> Enregistrer le produit
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Annuler</a>
                </div>
            </form>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('sizesWrapper');
            const addBtn = document.getElementById('addSizeBtn');
            let sizeIndex = 1;

            function buildSizeRow(index) {
                return `
            <div class="size-row" style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                <div class="form-row">
                    <div class="form-group">
                        <label>Taille</label>
                        <input type="text" name="sizes[${index}][size]" placeholder="Ex : 10ML" required>
                    </div>

                    <div class="form-group">
                        <label>Prix ($)</label>
                        <input type="number" step="0.01" name="sizes[${index}][price]" placeholder="0.00" required>
                    </div>

                    <div class="form-group" style="display:flex; align-items:end;">
                        <button type="button" class="btn btn-outline btn-sm remove-size-btn" style="color: red ; width:100%;">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        `;
            }

            addBtn.addEventListener('click', function() {
                wrapper.insertAdjacentHTML('beforeend', buildSizeRow(sizeIndex));
                sizeIndex++;
            });

            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.remove-size-btn');
                if (!btn) return;

                const rows = document.querySelectorAll('.size-row');
                if (rows.length === 1) {
                    alert('Vous devez garder au moins un format.');
                    return;
                }

                btn.closest('.size-row').remove();
            });
        });
    </script>
@endsection
