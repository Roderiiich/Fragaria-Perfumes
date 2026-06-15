<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('perfume_id')->constrained()->onDelete('cascade');
        $table->integer('calificacion'); // 1 a 5 estrellas
        $table->text('comentario');
        $table->integer('duracion'); // Guardaremos horas enteras
        $table->integer('proyeccion'); // Restricción: 1 = Leve, 2 = Moderado, 3 = Intenso
        $table->timestamps();

        // Restricción: Un usuario solo puede publicar una reseña por cada perfume
        $table->unique(['user_id', 'perfume_id']);
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
