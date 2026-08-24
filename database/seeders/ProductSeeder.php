<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laravel Development',
            'description' => 'Custom Laravel web application development.',
            'price' => 200.00,
            'category' => 'Web Development',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'REST API Development',
            'description' => 'Laravel REST API development and integration.',
            'price' => 150.00,
            'category' => 'API Development',
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'WordPress Development',
            'description' => 'Professional WordPress website development.',
            'price' => 120.00,
            'category' => 'Web Development',
            'is_active' => true,
        ]);
    }
}