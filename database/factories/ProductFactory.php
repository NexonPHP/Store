<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category_id' => $this->faker->randomNumber(),
            'is_subscription' => $this->faker->boolean(),
            'duration_days' => $this->faker->randomNumber(),
            'is_active' => $this->faker->boolean(),
            'image_url' => $this->faker->imageUrl(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
