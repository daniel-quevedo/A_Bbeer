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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',30);
            $table->string('primer_nom', 30);
            $table->string('segundo_nom', 30)->nullable();
            $table->string('primer_ape', 30);
            $table->string('segundo_ape', 30);
            $table->string('email')->unique();
            $table->tinyInteger('edad');
            $table->date('fecha_nac');
            $table->integer('id_rol');
            $table->integer('id_genero')->nullable();
            $table->integer('id_pais')->nullable();
            $table->integer('id_ciudad')->nullable();
            $table->integer('id_sede')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
