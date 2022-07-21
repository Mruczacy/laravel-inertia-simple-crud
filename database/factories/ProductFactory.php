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
        $base_price = $this->faker->randomFloat(2, 0, 100);
        $discount_price = $this->faker->randomFloat(2, 0, $base_price - 1);
        return [
            'name' => $this->faker->name(),
            'base_price' => $base_price,
            'discount_price' => $discount_price,
            'description' => $this->faker->text(),
        ];
    }
}
