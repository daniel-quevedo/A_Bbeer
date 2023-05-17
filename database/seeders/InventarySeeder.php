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
            ],
            [
                'cantidad' => '100',
                'id_producto' => '2',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '3',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '4',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '5',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '6',
            ],
            [
                'cantidad' => '100',
                'id_producto' => '7',
            ],
        ]);
    }
}
