<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'code' => 'P001',
                'name' => 'Laptop',
                'quantity' => 10,
                'price' => 999.99,
                'description' => 'High-performance laptop with latest processor'
            ],
            [
                'code' => 'P002',
                'name' => 'Smartphone',
                'quantity' => 20,
                'price' => 699.99,
                'description' => 'Latest smartphone with advanced camera'
            ],
            [
                'code' => 'P003',
                'name' => 'Headphones',
                'quantity' => 30,
                'price' => 199.99,
                'description' => 'Wireless noise-cancelling headphones'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 