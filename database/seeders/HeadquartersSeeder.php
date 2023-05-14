<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadquartersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sede')->insert([
            [
                'sede' => '1ra sede Bogota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sede' => '1ra sede Medellin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sede' => '1ra sede Cali',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
