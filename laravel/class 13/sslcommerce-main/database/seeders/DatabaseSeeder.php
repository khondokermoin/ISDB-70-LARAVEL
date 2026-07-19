<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics' => ['Wireless Earbuds', 'Smart Watch', 'Bluetooth Speaker', 'Power Bank 20000mAh'],
            'Fashion'     => ['Cotton T-Shirt', 'Denim Jacket', 'Leather Wallet', 'Sneakers'],
            'Home & Living' => ['Ceramic Mug Set', 'LED Desk Lamp', 'Throw Blanket', 'Wall Clock'],
            'Books'       => ['Laravel Deep Dive', 'Clean Code', 'Design Patterns Explained'],
        ];

        foreach ($categories as $catName => $products) {
            $category = Category::create([
                'name' => $catName,
                'slug' => Str::slug($catName),
                'description' => $catName . ' collection',
            ]);

            foreach ($products as $productName) {
                $price = rand(500, 5000);
                Product::create([
                    'category_id'    => $category->id,
                    'name'           => $productName,
                    'slug'           => Str::slug($productName) . '-' . Str::random(4),
                    'description'    => 'High quality ' . $productName . ' available at CubeGenSoft Shop. Ships nationwide within Bangladesh.',
                    'price'          => $price,
                    'discount_price' => rand(0, 1) ? round($price * 0.85) : null,
                    'stock'          => rand(5, 100),
                    'is_active'      => true,
                ]);
            }
        }
    }
}
