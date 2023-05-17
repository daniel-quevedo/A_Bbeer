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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id('idPedido');
            $table->string('cod_pedido');
            $table->integer('cantidad');
            $table->boolean('pagado')->nullable();
            $table->boolean('estado')->nullable();
            $table->integer('total')->nullable();
            $table->integer('id_producto')->nullable();
            $table->integer('id_mesa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
