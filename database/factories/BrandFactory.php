<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;


class BrandFactory extends Factory
{
    
    public function definition(): array
{
    return ['nombre' => $this->faker->unique()->company];
}
}
