<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
   
    public function definition(): array
{
    return ['nombre' => $this->faker->unique()->randomElement(['Amaderado', 'Oriental', 'Cítrico', 'Dulce', 'Floral'])];
}
}
