<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_producto')->insert([
            [
                'tipo_producto' => 'Cerveza',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_producto' => 'Vino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_producto' => 'Vodka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_producto' => 'Wisky',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_producto' => 'Ron',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_producto' => 'Tequila',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
