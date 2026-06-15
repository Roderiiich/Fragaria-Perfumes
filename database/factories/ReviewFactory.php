<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'user_id' => \App\Models\User::factory(),
        'perfume_id' => \App\Models\Perfume::factory(),
        'calificacion' => $this->faker->numberBetween(1, 5),
        'comentario' => $this->faker->sentence,
        'duracion' => $this->faker->numberBetween(3, 12), // horas
        'proyeccion' => $this->faker->numberBetween(1, 3),  // 1=Leve, 2=Moderado, 3=Intenso
    ];
}
}
