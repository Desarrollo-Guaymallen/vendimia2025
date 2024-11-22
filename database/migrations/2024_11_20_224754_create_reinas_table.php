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
        Schema::create('reinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('frase', 1000)->nullable();
            $table->string('foto', 500)->nullable();
            $table->string('distrito')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('miniatura')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reinas');
    }
};
