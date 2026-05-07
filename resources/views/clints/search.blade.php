@extends('clints.layout.master')

@section('title', 'Résultats de recherche — Luxe PARFUM')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/clints/css/shop.css') }}">
@endsection


<style>
    .product-card__btn {
        width: 100%;
        min-height: 46px;
        border-radius: 999px !important;
        border: 0;
        background: linear-gradient(145deg, #fff4c9, #ffe7a5, #d8aa45) !important;
        color: #0B103D !important;
        font-size: 12px !important;
        font-weight: 900 !important;
        letter-spacing: 1.4px !important;
        text-transform: uppercase !important;
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 14px 28px rgba(216, 170, 69, .25);
    }

    .product-card__btn:hover {
        transform: translateY(-3px);
    }
</style>

@section('content')
    <div class="page-spacer"></div>

    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12" style="margin-bottom: 5%">
                <h1 class="h3 mb-2 text-center">Résultats de recherche pour : "{{ $query }}"</h1>
                <p class="text-muted text-center">{{ $products->total() }} produit(s) trouvé(s)</p>
            </div>
        </div>

        <div class="row">

            <!-- Results Grid -->
            <div class="col-lg-9">
                <div id="productResultsContainer" style="margin-bottom: 5%" class="product-grid">
                    @foreach ($products as $product)
                    <a href="{{ route('product', $product->id) }}" class="product-card-link">
                         <div class="product-card">
                            <div class="product-card__image">
                                <img src="{{ $product->getFirstMediaUrl('images') ?: asset('assets/clints/images/mens-perfume.png') }}"
                                    alt="{{ $product->getTranslation('name', 'fr') }}">
                                <div class="product-card__actions">
                                    <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                                    <button onclick="window.location.href='{{ route('product', $product->id) }}'">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="product-card__info">
                                <h4 class="product-card__name">{{ $product->getTranslation('name', 'fr') }}
                                </h4>




                                @php
                                    $hasSizes = $product->sizes && $product->sizes->count() > 0;
                                    $minSizePrice = $hasSizes ? $product->sizes->min('price') : null;
                                    $maxSizePrice = $hasSizes ? $product->sizes->max('price') : null;
                                    $cardPrice = $minSizePrice ?: ($product->sale_price ?: $product->price);
                                @endphp

                                <p class="product-card__price">
                                    @if ($hasSizes)
                                        @if ($minSizePrice == $maxSizePrice)
                                            {{ number_format($minSizePrice, 2, ',', ' ') }} DH
                                        @else
                                            {{ number_format($minSizePrice, 2, ',', ' ') }} DH –
                                            {{ number_format($maxSizePrice, 2, ',', ' ') }} DH
                                        @endif
                                    @else
                                        {{ number_format($product->sale_price ?: $product->price, 2, ',', ' ') }}
                                        DH
                                    @endif
                                </p>

                                @if ($product->stock_quantity <= 0)
                                    <button class="product-card__btn" disabled style="opacity: .6; cursor: not-allowed;">
                                        Rupture de stock
                                    </button>
                                @elseif ($hasSizes)
                                    <span class="product-card__btn">
                                        Découvrir
                                    </span>
                                @else
                                    <button class="product-card__btn add-to-cart-btn">
                                        Ajouter au panier
                                    </button>
                                @endif
                            </div>
                        </div>
                        </a>
                       
                    @endforeach
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('searchFiltersForm');
            if (filterForm) {
                filterForm.querySelectorAll('.filter-trigger').forEach(trigger => {
                    trigger.addEventListener('change', function() {
                        filterForm.submit();
                    });
                });
            }
        });
    </script>
@endsection
