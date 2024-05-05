<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventario')->insert([
            [
                'cantidad' => '100',
                'id_producto' => '1',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '2',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '3',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '4',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '5',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '6',
                'estado' => '1',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '7',
                'estado' => '1',
            ],
        ]);
    }
}
