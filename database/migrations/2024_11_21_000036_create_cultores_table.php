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
        Schema::create('cultores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->integer('categoria')->nullable();
            $table->integer('categoria_gral')->nullable();
            $table->string('descripcion', 3000)->nullable();
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultores');
    }
};
