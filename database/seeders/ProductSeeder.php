<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Seeder;

class  ProductSeeder extends Seeder
{

    public function run() {
        ProductCategory::factory()->count(5)->create();
        Product::factory()->count(10)->create();

    }

}
