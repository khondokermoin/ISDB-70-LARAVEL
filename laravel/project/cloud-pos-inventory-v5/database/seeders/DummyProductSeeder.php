<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $companies = Company::query()->get();

        foreach ($companies as $company) {
            $businessType = $company->businessType()->first();
            $productCatalog = $this->catalogForBusinessType($businessType);

            $categoryNames = $productCatalog['categories'];
            $productNames = $productCatalog['products'];

            foreach ($categoryNames as $categoryName) {
                $category = Category::firstOrCreate(
                    [
                        'company_id' => $company->id,
                        'name' => $categoryName,
                    ],
                    [
                        'slug' => Str::slug($categoryName),
                        'is_active' => true,
                    ]
                );

                $productCount = $faker->numberBetween(3, 5);

                for ($i = 0; $i < $productCount; $i++) {
                    $productName = $faker->randomElement($productNames) . ' ' . $faker->randomElement(['Pro', 'Lite', 'Max', 'Plus', 'X']);

                    Product::firstOrCreate(
                        [
                            'company_id' => $company->id,
                            'name' => $productName,
                        ],
                        [
                            'category_id' => $category->id,
                            'description' => $faker->sentence(8),
                            'image' => null,
                            'has_variants' => $faker->boolean(30),
                            'is_bulk' => $faker->boolean(20),
                            'is_active' => true,
                        ]
                    );
                }
            }
        }
    }

    protected function catalogForBusinessType(?BusinessType $businessType): array
    {
        $slug = $businessType?->slug ?? 'general-retail';

        return match ($slug) {
            'fashion-clothing' => [
                'categories' => ['Men Wear', 'Women Wear', 'Accessories'],
                'products' => ['Shirt', 'T-Shirt', 'Jeans', 'Dress', 'Bag', 'Watch', 'Sunglass'],
            ],
            'pharmacy' => [
                'categories' => ['Medicine', 'Supplements', 'Personal Care'],
                'products' => ['Tablet', 'Syrup', 'Vitamin', 'Soap', 'Mask', 'Sanitizer'],
            ],
            'restaurant-cafe' => [
                'categories' => ['Beverages', 'Fast Food', 'Desserts'],
                'products' => ['Coffee', 'Tea', 'Burger', 'Pizza', 'Cake', 'Sandwich'],
            ],
            'electronics' => [
                'categories' => ['Mobile', 'Laptop', 'Accessories'],
                'products' => ['Phone', 'Laptop', 'Charger', 'Headphone', 'Keyboard', 'Mouse'],
            ],
            default => [
                'categories' => ['Groceries', 'Stationery', 'Household'],
                'products' => ['Basic Item', 'Daily Essential', 'Starter Pack', 'Premium Item'],
            ],
        };
    }
}
