<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var StockService
     */
    protected $stockService;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     * @param StockService $stockService
     */
    public function __construct(ProductRepository $productRepository, StockService $stockService)
    {
        $this->productRepository = $productRepository;
        $this->stockService = $stockService;
    }

    /**
     * Get all products with their relationships.
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return $this->productRepository->getActiveWithRelations();
    }

    /**
     * Get paginated products.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedProducts(int $perPage = 10)
    {
        return $this->productRepository->getPaginatedActiveWithRelations($perPage);
    }


    /**
     * Get a product by its ID with relations.
     *
     * @param int $id
     * @return Product
     */
    public function getProductById(int $id): Product
    {
        return $this->productRepository->findWithRelations($id);
    }

    /**
     * Create a new product.
     *
     * @param array $data
     * @return Product
     */


    protected function saveProductSizes(Product $product, array $data): void
    {
        if (empty($data['sizes']) || !is_array($data['sizes'])) {
            return;
        }

        $sizes = collect($data['sizes'])
            ->filter(function ($item) {
                return !empty($item['size'])
                    && isset($item['price'])
                    && $item['price'] !== '';
            })
            ->map(function ($item) {
                return [
                    'size' => trim($item['size']),
                    'price' => (float) $item['price'],
                    'stock_quantity' => (int) ($item['stock_quantity'] ?? 0),
                ];
            })
            ->values()
            ->all();

        if (!empty($sizes)) {
            $product->sizes()->createMany($sizes);
        }
    }

    public function createProduct(array $data)
    {
        if (isset($data['name']['en'])) {
            $slug = \Illuminate\Support\Str::slug($data['name']['en']);
            $originalSlug = $slug;
            $count = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $data['slug'] = $slug;
        }

        // If sizes exist, calculate total stock from sizes
        if (!empty($data['sizes'])) {
            $data['stock_quantity'] = collect($data['sizes'])->sum(function ($size) {
                return (int) ($size['stock_quantity'] ?? 0);
            });
        }

        $product = $this->productRepository->create($data);

        // Sync old stock field
        $product->stock = $data['stock_quantity'] ?? 0;
        $product->save();

        // Initialize stock movement
        if (!empty($data['stock_quantity']) && $data['stock_quantity'] > 0) {
            $this->stockService->increase($product, $data['stock_quantity'], 'الرصيد الافتتاحي');
        }

        $this->syncFragranceNotes($product, $data);
        $this->uploadImage($product, 'image');
        $this->uploadGallery($product);

        // Save sizes with stock_quantity
        $this->saveProductSizes($product, $data);

        return $product;
    }

    /**
     * Update an existing product.
     *
     * @param int $id
     * @param array $data
     * @return Product
     */


    public function updateProduct(int $id, array $data): Product
    {
        return DB::transaction(function () use ($id, $data) {

            if (isset($data['name']['en'])) {
                $slug = \Illuminate\Support\Str::slug($data['name']['en']);
                $originalSlug = $slug;
                $count = 1;

                while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $data['slug'] = $slug;
            }

            $this->productRepository->update($id, $data);

            $product = $this->getProductById($id);

            if (!$product) {
                throw new \Exception('Produit introuvable');
            }

            $this->syncFragranceNotes($product, $data);
            $this->syncProductSizes($product, $data);

            // Important: sync stock AFTER sizes are saved
            if (!empty($data['sizes']) && is_array($data['sizes'])) {
                $totalStock = $product->sizes()->sum('stock_quantity');

                $product->stock_quantity = $totalStock;
                $product->stock = $totalStock;
                $product->is_out_of_stock = $totalStock <= 0;
                $product->save();
            } else {
                $product->stock = $product->stock_quantity;
                $product->is_out_of_stock = $product->stock_quantity <= 0;
                $product->save();
            }

            $this->uploadImage($product, 'image');
            $this->uploadGallery($product);

            return $product;
        });
    }




    protected function syncProductSizes(Product $product, array $data): void
    {
        // Force delete old sizes first
        \App\Models\ProductSize::where('product_id', $product->id)->delete();

        if (empty($data['sizes']) || !is_array($data['sizes'])) {
            return;
        }

        foreach ($data['sizes'] as $item) {
            if (empty($item['size']) || empty($item['price'])) {
                continue;
            }

            \App\Models\ProductSize::create([
                'product_id' => $product->id,
                'size' => trim($item['size']),
                'price' => (float) $item['price'],
                'stock_quantity' => (int) ($item['stock_quantity'] ?? 0),
            ]);
        }

        $totalStock = \App\Models\ProductSize::where('product_id', $product->id)
            ->sum('stock_quantity');

        $product->update([
            'stock_quantity' => $totalStock,
            'stock' => $totalStock,
            'is_out_of_stock' => $totalStock <= 0,
        ]);
    }

    /**
     * Sync fragrance notes for a product.
     *
     * @param Product $product
     * @param array $data
     * @return void
     */
    protected function syncFragranceNotes(Product $product, array $data): void
    {
        $notes = [];

        if (isset($data['top_notes'])) {
            foreach ($data['top_notes'] as $noteId) {
                $notes[$noteId] = ['type' => 'top'];
            }
        }

        if (isset($data['middle_notes'])) {
            foreach ($data['middle_notes'] as $noteId) {
                $notes[$noteId] = ['type' => 'middle'];
            }
        }

        if (isset($data['base_notes'])) {
            foreach ($data['base_notes'] as $noteId) {
                $notes[$noteId] = ['type' => 'base'];
            }
        }

        $product->fragranceNotes()->sync($notes);
    }


    /**
     * Delete a product.
     *
     * @param int $id
     * @return bool
     */
    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->delete($id);
    }


    public function uploadImage(Product $product, $image)
    {
        if (request()->hasFile($image)) {
            $product->clearMediaCollection('images');
            $product->addMediaFromRequest($image)->toMediaCollection('images');
        }
    }

    public function uploadGallery(Product $product, $collection = 'gallery')
    {
        if (request()->hasFile($collection)) {
            foreach (request()->file($collection) as $file) {
                $product->addMedia($file)->toMediaCollection($collection);
            }
        }
    }
}
