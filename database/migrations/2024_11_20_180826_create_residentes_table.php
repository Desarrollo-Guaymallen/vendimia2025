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
        Schema::create('residentes', function (Blueprint $table) {
            $table->id();
            $table->integer('dni')->nullable();
            $table->string('apellido', 300)->nullable();
            $table->string('nombre', 300)->nullable();
            $table->year('anio')->nullable();
            $table->string('domicilio', 500)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('clave', 200)->nullable();
            $table->integer('distrital')->nullable();
            $table->string('habilitado')->default("si");
            $table->string('observaciones', 5000)->nullable();
            $table->integer('artes')->nullable();
            $table->integer('educacion')->nullable();
            $table->integer('salud')->nullable();
            $table->integer('deportes')->nullable();
            $table->integer('laborsocial')->nullable();
            $table->integer('economia')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('vendimia')->nullable();
            $table->integer('artes_gral')->nullable();
            $table->integer('educacion_gral')->nullable();
            $table->integer('salud_gral')->nullable();
            $table->integer('deportes_gral')->nullable();
            $table->integer('laborsocial_gral')->nullable();
            $table->integer('economia_gral')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentes');
    }
};
