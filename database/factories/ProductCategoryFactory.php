<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'parent_id' => $this->faker->boolean(100) ? ProductCategory::inRandomOrder()->value('id') : null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
