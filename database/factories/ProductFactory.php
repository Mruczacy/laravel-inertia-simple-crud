<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'base_price' => $this->faker->randomFloat(2, 0, 100),
            'discount_price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->text(),
        ];
    }
}
