@extends('admin.layout.master')

@section('title', 'Modifier un produit — Lepetitflacon')

@section('page_title', 'Modifier un produit')
@section('page_subtitle', 'Modification des données du produit : ' . $product->name)

@section('content')
    <section class="dashboard-section active">
        @if ($errors->any())
            <div
                style="background: rgba(255, 77, 77, 0.1); border: 1px solid  red ; color: #black; padding: 16px; border-radius: 10px; margin-bottom: 20px;">
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
                <h3>Données du produit</h3>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-sm">
                    <i class="fas fa-arrow-right"></i> Retour à la liste
                </a>
            </div>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="modal__body" style="padding: 24px">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label>Nom de produit</label>
                        <input type="text" name="name[en]"
                            value="{{ old('name.en', $product->getTranslation('name', 'en')) }}" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
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

                    <p style="margin-bottom:16px; color: black; font-size:0.9rem;">
                        Exemple : Nishane Ani X - 5ML = 165.00 DH / 10ML = 299.00 DH
                    </p>

                    <div id="sizesWrapper" style="display:flex; flex-direction:column; gap:14px;">
                        @forelse($product->sizes as $index => $size)
                            <div class="size-row"
                                style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Taille <span style="color:red">*</span></label>
                                        <input type="text" name="sizes[{{ $index }}][size]"
                                            value="{{ old("sizes.$index.size", $size->size) }}" placeholder="Ex : 5ML">
                                    </div>

                                    <div class="form-group">
                                        <label>Prix <span style="color:red">*</span></label>
                                        <input type="number" step="0.01" name="sizes[{{ $index }}][price]"
                                            value="{{ old("sizes.$index.price", $size->price) }}" placeholder="0.00">
                                    </div>

                                    <div class="form-group">
                                        <label>Stock <span style="color:red">*</span></label>
                                        <input type="number" name="sizes[{{ $index }}][stock_quantity]"
                                            min="0"
                                            value="{{ old("sizes.$index.stock_quantity", $size->stock_quantity ?? 0) }}"
                                            placeholder="0">
                                    </div>

                                    <div class="form-group" style="display:flex; align-items:end;">
                                        <button type="button" class="btn btn-outline btn-sm remove-size-btn"
                                            style="color:red; width:100%;">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="size-row"
                                style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Taille <span style="color:red">*</span></label>
                                        <input type="text" name="sizes[0][size]" placeholder="Ex : 5ML">
                                    </div>

                                    <div class="form-group">
                                        <label>Prix <span style="color:red">*</span></label>
                                        <input type="number" step="0.01" name="sizes[0][price]" placeholder="0.00">
                                    </div>

                                    <div class="form-group">
                                        <label>Stock <span style="color:red">*</span></label>
                                        <input type="number" name="sizes[0][stock_quantity]" min="0" value="0"
                                            placeholder="0">
                                    </div>

                                    <div class="form-group" style="display:flex; align-items:end;">
                                        <button type="button" class="btn btn-outline btn-sm remove-size-btn"
                                            style="color:red; width:100%;">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}">
                    </div>
                    <div class="form-group">
                        <label>Stock disponible</label>
                        <input type="number" name="stock_quantity"
                            value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Seuil d’alerte</label>
                        <input type="number" name="low_stock_threshold"
                            value="{{ old('low_stock_threshold', $product->low_stock_threshold) }}" min="0"
                            required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Public cible</label>
                        <select name="gender" required>
                            <option value="Men">Homme</option>
                            <option value="Women">Femme</option>
                            <option value="Unisex">Unisexe</option>
                            <option value="Kids">Enfants</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mettre à jour l’image principale</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <label>Galerie actuelle</label>
                    <label>Ajouter des images</label>
                    <input type="file" name="gallery[]" accept="image/*" multiple>
                </div>

                <div style="margin-top: 24px;">
                    <h4>Notes du parfum</h4>
                </div>

                <div class="form-group">
                    <label>Description courte</label>
                    <textarea name="short_description" rows="2">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Description complète</label>
                    <textarea name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                </div>

                <div class="form-row">
                    <input type="hidden" name="is_featured" value="0">
                    <label>
                        <input type="checkbox" name="is_featured" value="1"
                            {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                        Produit mis en avant
                    </label>

                    <input type="hidden" name="is_bestseller" value="0">
                    <label>
                        <input type="checkbox" name="is_bestseller" value="1"
                            {{ old('is_bestseller', $product->is_bestseller) ? 'checked' : '' }}>
                        Meilleure vente
                    </label>

                    <input type="hidden" name="status" value="0">
                    <label>
                        <input type="checkbox" name="status" value="1"
                            {{ old('status', $product->status) ? 'checked' : '' }}>
                        Actif
                    </label>
                </div>

                <div style="margin-top: 32px; display: flex; gap: 12px">
                    <button type="submit" class="btn btn-gold">
                        <i class="fas fa-save"></i> Mettre à jour le produit
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
            let sizeIndex = {{ $product->sizes->count() > 0 ? $product->sizes->count() : 1 }};

            function buildSizeRow(index) {
                return `
                        <div class="size-row" style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Taille <span style="color:red">*</span></label>
                                    <input type="text" name="sizes[${index}][size]" placeholder="Ex : 10ML" required>
                                </div>

                                <div class="form-group">
                                    <label>Prix <span style="color:red">*</span></label>
                                    <input type="number" step="0.01" name="sizes[${index}][price]" placeholder="0.00" required>
                                </div>

                                <div class="form-group">
                                    <label>Stock <span style="color:red">*</span></label>
                                    <input type="number" name="sizes[${index}][stock_quantity]" min="0" value="0" placeholder="0" required>
                                </div>

                                <div class="form-group" style="display:flex; align-items:end;">
                                    <button type="button" class="btn btn-outline btn-sm remove-size-btn" style="color:red; width:100%;">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
            }

            addBtn?.addEventListener('click', function() {
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
