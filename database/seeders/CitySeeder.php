<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ciudad')->insert([
            [
                'ciudad' => 'Bogota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ciudad' => 'Medellin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ciudad' => 'Cali',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
