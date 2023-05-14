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
        Schema::create('mesa', function (Blueprint $table) {
            $table->id('idMesa');
            $table->string('mesa',30);
            $table->integer('id_sede')->nullable();
            $table->integer('id_pais')->nullable();
            $table->integer('id_ciudad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesa');
    }
};
