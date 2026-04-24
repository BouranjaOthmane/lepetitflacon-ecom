@extends('admin.layout.master')

@section('title', 'Modifier un produit — Lepetitflacon')

@section('page_title', 'Modifier un produit')
@section('page_subtitle', 'Modification des données du produit : ' . $product->name)

@section('content')
    <section class="dashboard-section active">
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
                        <label>Nom (Arabe)</label>
                        <input type="text" name="name[ar]"
                            value="{{ old('name.ar', $product->getTranslation('name', 'ar')) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nom (Anglais)</label>
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
                    <div class="form-group">
                        <label>Marque</label>
                        <select name="brand_id" required>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Prix d’achat ($)</label>
                        <input type="number" step="0.01" name="purchase_price"
                            value="{{ old('purchase_price', $product->purchase_price) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Prix de vente ($)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Prix promotionnel ($) - optionnel</label>
                        <input type="number" step="0.01" name="sale_price"
                            value="{{ old('sale_price', $product->sale_price) }}">
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
                        Exemple : Nishane Ani X - 5ML = 165.00 $ / 10ML = 299.00 $
                    </p>

                    <div id="sizesWrapper" style="display:flex; flex-direction:column; gap:14px;">
                        @php
                            $oldSizes = old('sizes');
                            $sizes =
                                $oldSizes ??
                                $product->sizes
                                    ->map(function ($size) {
                                        return [
                                            'id' => $size->id,
                                            'size' => $size->size,
                                            'price' => $size->price,
                                        ];
                                    })
                                    ->toArray();

                            if (empty($sizes)) {
                                $sizes = [['id' => null, 'size' => '', 'price' => '']];
                            }
                        @endphp

                        @foreach ($sizes as $index => $size)
                            <div class="size-row"
                                style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                                <input type="hidden" name="sizes[{{ $index }}][id]"
                                    value="{{ $size['id'] ?? '' }}">

                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Taille</label>
                                        <input type="text" name="sizes[{{ $index }}][size]"
                                            value="{{ $size['size'] ?? '' }}" placeholder="Ex : 5ML">
                                    </div>

                                    <div class="form-group">
                                        <label>Prix ($)</label>
                                        <input type="number" step="0.01" name="sizes[{{ $index }}][price]"
                                            value="{{ $size['price'] ?? '' }}" placeholder="0.00">
                                    </div>

                                    <div class="form-group" style="display:flex; align-items:end;">
                                        <button type="button" class="btn btn-outline btn-sm remove-size-btn"
                                            style="color:red; width:100%;">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" required>
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
                    <textarea name="short_description[ar]" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label>Description complète</label>
                    <textarea name="description[ar]" rows="4"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label><input type="checkbox" name="is_featured"> Produit mis en avant</label>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="is_bestseller"> Meilleure vente</label>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="status"> Actif</label>
                    </div>
                </div>

                <div style="margin-top: 32px; display: flex; gap: 12px">
                    <button type="submit" class="btn btn-gold">
                        <i class="fas fa-save"></i> Mettre à jour le produit
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Annuler</a>
                </div>
            </form>
        </div>

        <div class="table-card" style="max-width: 1000px; margin: 30px auto;">
            <div class="badge">
                Disponible
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Quantité</th>
                        <th>Référence</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" style="text-align: center;">Aucun mouvement de stock</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


    <script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('sizesWrapper');
    const addBtn = document.getElementById('addSizeBtn');

    if (!wrapper || !addBtn) return;

    let sizeIndex = wrapper.querySelectorAll('.size-row').length;

    function buildSizeRow(index) {
        return `
            <div class="size-row"
                style="padding:16px; border:1px solid var(--color-border); border-radius:12px; background:rgba(255,255,255,0.02);">
                <input type="hidden" name="sizes[${index}][id]" value="">

                <div class="form-row">
                    <div class="form-group">
                        <label>Taille</label>
                        <input type="text" name="sizes[${index}][size]" placeholder="Ex : 10ML">
                    </div>

                    <div class="form-group">
                        <label>Prix ($)</label>
                        <input type="number" step="0.01" name="sizes[${index}][price]" placeholder="0.00">
                    </div>

                    <div class="form-group" style="display:flex; align-items:end;">
                        <button type="button" class="btn btn-outline btn-sm remove-size-btn"
                            style="color:red; width:100%;">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    addBtn.addEventListener('click', function () {
        wrapper.insertAdjacentHTML('beforeend', buildSizeRow(sizeIndex));
        sizeIndex++;
    });

    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.remove-size-btn');
        if (!btn) return;

        btn.closest('.size-row').remove();
    });
});
</script>
@endsection
