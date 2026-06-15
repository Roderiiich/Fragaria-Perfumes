<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Perfume;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear usuarios de prueba
        $users = User::factory(10)->create();

        // 2. Crear Marcas específicas
        $brands = collect(['Dior', 'Chanel', 'Versace', 'Carolina Herrera', 'Yves Saint Laurent'])
            ->map(fn($name) => Brand::create(['nombre' => $name]));

        // 3. Crear Categorías específicas
        $categories = collect(['Amaderado', 'Oriental', 'Cítrico', 'Dulce'])
            ->map(fn($name) => Category::create(['nombre' => $name]));

        // 4. Crear Perfumes asignándoles marcas y categorías aleatorias
        Perfume::factory(15)->create([
            'brand_id' => fn() => $brands->random()->id,
            'category_id' => fn() => $categories->random()->id,
        ])->each(function ($perfume) use ($users) {
            
            // 5. Añadir entre 2 y 5 reseñas aleatorias a cada perfume sin repetir usuario
            $shuffledUsers = $users->shuffle();
            $reviewCount = rand(2, 5);

            for ($i = 0; $i < $reviewCount; $i++) {
                Review::factory()->create([
                    'user_id' => $shuffledUsers[$i]->id,
                    'perfume_id' => $perfume->id,
                ]);
            }
        });
    }
}