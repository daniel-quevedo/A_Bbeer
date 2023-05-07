<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol')->insert([
            [
                'rol' => 'Administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rol' => 'Cajero',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rol' => 'Mesero',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
