<?php

namespace Database\Factories;

use App\Models\Perfume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Perfume>
 */
class PerfumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
