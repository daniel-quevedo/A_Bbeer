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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_rol')->references('idRol')->on('rol');
            $table->foreign('id_genero')->references('idGenero')->on('genero');
            $table->foreign('id_pais')->references('idPais')->on('pais');
            $table->foreign('id_ciudad')->references('idCiudad')->on('ciudad');
            $table->foreign('id_sede')->references('idSede')->on('sede');
        });

        Schema::table('mesa', function (Blueprint $table) {
            $table->foreign('id_sede')->references('idSede')->on('sede');
            $table->foreign('id_pais')->references('idPais')->on('pais');
            $table->foreign('id_ciudad')->references('idCiudad')->on('ciudad');
        });

        Schema::table('pedido', function (Blueprint $table) {
            $table->foreign('id_mesa')->references('idMesa')->on('mesa');
            $table->foreign('id_inventario')->references('idInventario')->on('inventario');
        });

        Schema::table('producto', function (Blueprint $table) {
            $table->foreign('id_tipoProducto')->references('idTipoProducto')->on('tipo_producto');
        });

        Schema::table('inventario', function (Blueprint $table) {
            $table->foreign('id_producto')->references('idProducto')->on('producto');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
