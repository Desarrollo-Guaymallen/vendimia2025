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
        Schema::create('distrital', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('frase', 1000)->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('distrito')->nullable();
            $table->foreign('distrito')->references('id')->on('distritos')->cascadeOnUpdate();
            $table->string('unico')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distritals');
    }
};
