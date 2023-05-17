<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto')->insert([
            [
                'cod_producto' => '0001',
                'producto' => 'Águila',
                'costo_venta_producto' => '6100',
                'costo_producto' => '3500',
                'id_tipoProducto' => '1',
            ],
            [
                'cod_producto' => '0002',
                'producto' => 'Poker',
                'costo_venta_producto' => '6200',
                'costo_producto' => '3500',
                'id_tipoProducto' => '1',
            ],
            [
                'cod_producto' => '0003',
                'producto' => 'Costeña',
                'costo_venta_producto' => '6300',
                'costo_producto' => '3500',
                'id_tipoProducto' => '1',
            ],
            [
                'cod_producto' => '0004',
                'producto' => 'Corona',
                'costo_venta_producto' => '6400',
                'costo_producto' => '3500',
                'id_tipoProducto' => '1',
            ],
            [
                'cod_producto' => '0005',
                'producto' => 'Artesanal',
                'costo_venta_producto' => '6500',
                'costo_producto' => '3500',
                'id_tipoProducto' => '1',
            ],
            [
                'cod_producto' => '0006',
                'producto' => 'Smirnoff',
                'costo_venta_producto' => '6600',
                'costo_producto' => '3500',
                'id_tipoProducto' => '3',
            ]
            ,
            [
                'cod_producto' => '0007',
                'producto' => 'Ron caldas',
                'costo_venta_producto' => '6700',
                'costo_producto' => '3500',
                'id_tipoProducto' => '5',
            ]
        ]);
    }
}
