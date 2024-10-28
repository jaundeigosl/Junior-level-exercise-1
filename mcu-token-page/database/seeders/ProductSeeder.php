<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use URL;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Product::factory()->create([
            'product_name'=>'team t-shirt',
            'price' => 25.5,
            'image' => 'storage/images/shirts/shirt5.jpg',
            'product_type' => 1,
        ]);

        Product::factory()->create([
            'product_name'=>'Match Ticket',
            'price' => 50,
            'product_type' => 0,
        ]);

        Product::factory(5)->create();
    }
}
