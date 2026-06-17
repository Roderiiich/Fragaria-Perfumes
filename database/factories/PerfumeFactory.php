<?php

namespace Database\Factories;

use App\Models\Perfume;
use Illuminate\Database\Eloquent\Factories\Factory;


class PerfumeFactory extends Factory
{
    
   public function definition(): array
{
    return [
        'nombre' => $this->faker->words(2, true),
        'descripcion' => $this->faker->paragraph,
        'imagen' => 'perfume_default.jpg',
        'brand_id' => \App\Models\Brand::factory(),
        'category_id' => \App\Models\Category::factory(),
    ];
}
}
