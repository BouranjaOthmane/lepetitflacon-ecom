<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        $brandIds = Brand::pluck('id')->toArray();

        if (empty($categoryIds) || empty($brandIds)) {
            $this->command->warn('Please create categories and brands first.');
            return;
        }

        $products = [
            'Nishane Ani X',
            'Dior Homme Intense',
            'Baccarat Rouge 540',
            'Tom Ford Oud Wood',
            'Bleu de Chanel',
            'Creed Aventus',
            'Yves Saint Laurent Y',
            'Armani Stronger With You',
            'Jean Paul Gaultier Le Male',
            'Valentino Uomo Born in Roma',
            'Sauvage Elixir',
            'Givenchy Gentleman',
            'Prada Luna Rossa',
            'Terre d’Hermès',
            'Versace Eros',
            'Invictus Victory',
            'One Million Royal',
            'Acqua di Gio Profumo',
            'Azzaro The Most Wanted',
            'Montale Arabians Tonka',
            'Mancera Cedrat Boise',
            'Initio Oud For Greatness',
            'Parfums de Marly Layton',
            'Parfums de Marly Herod',
            'Amouage Reflection Man',
            'Xerjoff Naxos',
            'Xerjoff Erba Pura',
            'Kilian Angels Share',
            'Maison Margiela Jazz Club',
            'Le Labo Santal 33',
            'Byredo Bal d’Afrique',
            'Chanel Coco Mademoiselle',
            'Dior J’adore',
            'Lancôme La Vie Est Belle',
            'YSL Libre',
            'Gucci Bloom',
            'Armani Si',
            'Good Girl Carolina Herrera',
            'Black Opium YSL',
            'Delina Parfums de Marly',
        ];

        foreach ($products as $index => $name) {
            $sku = 'PRD-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);
            $stock = rand(10, 100);
            $slug = Str::slug($name);

            $product = Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'sku' => $sku,
                    'category_id' => $categoryIds[array_rand($categoryIds)],
                    'brand_id' => $brandIds[array_rand($brandIds)],
                    'name' => [
                        'en' => $name,
                        'ar' => $name,
                    ],
                    'slug' => Str::slug($name),
                    'description' => [
                        'en' => 'A refined perfume with elegant and long-lasting notes.',
                        'ar' => 'Parfum raffiné aux notes élégantes et longue tenue.',
                    ],
                    'short_description' => [
                        'en' => 'Elegant perfume, perfect for daily use or special occasions.',
                        'ar' => 'Parfum élégant, idéal au quotidien ou pour les occasions spéciales.',
                    ],
                    'price' => null,
                    'sale_price' => null,
                    'purchase_price' => rand(40, 120),
                    'stock_quantity' => $stock,
                    'stock' => $stock,
                    'low_stock_threshold' => 5,
                    'gender' => collect(['Men', 'Women', 'Unisex'])->random(),
                    'is_featured' => rand(0, 1),
                    'is_bestseller' => rand(0, 1),
                    'status' => true,
                    'is_out_of_stock' => false,
                ]
            );

            $product->sizes()->delete();

            $sizes = [
                ['size' => '5ML', 'price' => rand(70, 180)],
                ['size' => '10ML', 'price' => rand(120, 320)],
            ];

            if (rand(0, 1)) {
                $sizes[] = ['size' => '30ML', 'price' => rand(300, 650)];
            }

            foreach ($sizes as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size['size'],
                    'price' => $size['price'],
                ]);
            }
        }
    }
}