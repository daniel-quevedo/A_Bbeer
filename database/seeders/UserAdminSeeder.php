<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'cedula' => '123456789',
            'primer_nom' => 'super',
            'primer_ape' => 'admin',
            'segundo_ape' => 'admin',
            'edad' => '23',
            'fecha_nac' => '01/01/2000',
            'id_rol' => '1',
            'id_genero' => '1',
            'id_pais' => '1',
            'id_ciudad' => '1',
            'id_sede' => '1',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
