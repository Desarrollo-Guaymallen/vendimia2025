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
        Schema::create('administracion', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->nullable();
            $table->string('clave')->nullable();
            $table->string('rol')->nullable();
            $table->string('escribania')->nullable();
            $table->string('habilitado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administracion');
    }
};
