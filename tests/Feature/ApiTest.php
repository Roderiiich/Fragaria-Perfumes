<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Perfume;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    // =========================================================
    // ENDPOINT: POST /api/login
    // =========================================================

    public function test_login_retorna_token_con_credenciales_validas(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['token', 'user' => ['nickname', 'email']]);
    }

    public function test_login_falla_con_credenciales_invalidas(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email'    => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }

    public function test_login_falla_sin_campos_requeridos(): void
    {
        $response = $this->postJson('/api/login', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email', 'password']);
    }

    // =========================================================
    // aqui está el ENDPOINT: GET /api/perfumes
    // =========================================================

    public function test_perfumes_requiere_autenticacion(): void
    {
        $response = $this->getJson('/api/perfumes');

        $response->assertStatus(401);
    }

    public function test_perfumes_retorna_listado_autenticado(): void
    {
        $user    = User::factory()->create();
        $brand   = Brand::factory()->create();
        $category = Category::factory()->create();
        Perfume::factory()->count(3)->create([
            'brand_id'    => $brand->id,
            'category_id' => $category->id,
        ]);

        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withToken($token)->getJson('/api/perfumes');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [['nombre', 'descripcion', 'marca', 'familia_olfativa', 'duracion', 'proyeccion']]
                 ]);

        $this->assertCount(3, $response->json('data'));
    }

    public function test_perfumes_filtra_por_nombre_con_search(): void
    {
        $user    = User::factory()->create();
        $brand   = Brand::factory()->create();
        $category = Category::factory()->create();

        Perfume::factory()->create([
            'nombre'      => 'Aqua di Gio',
            'brand_id'    => $brand->id,
            'category_id' => $category->id,
        ]);
        Perfume::factory()->create([
            'nombre'      => 'Black Opium',
            'brand_id'    => $brand->id,
            'category_id' => $category->id,
        ]);

        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withToken($token)->getJson('/api/perfumes?search=Aqua');

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
        $this->assertEquals('Aqua di Gio', $response->json('data.0.nombre'));
    }
}