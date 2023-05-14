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
            'primer_nom' => fake()->firstName(),
            'primer_ape' => 'admin',
            'segundo_ape' => fake()->lastName(),
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
        DB::table('users')->insert([
            'cedula' => '987654321',
            'primer_nom' => fake()->firstName(),
            'primer_ape' => 'cajero',
            'segundo_ape' => fake()->lastName(),
            'edad' => '20',
            'fecha_nac' => '01/01/2003',
            'id_rol' => '2',
            'id_genero' => '2',
            'id_pais' => '1',
            'id_ciudad' => '1',
            'id_sede' => '1',
            'email' => 'cajero@email.com',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'cedula' => '192837465',
            'primer_nom' => fake()->firstName(),
            'primer_ape' => 'mesero',
            'segundo_ape' => fake()->lastName(),
            'edad' => '25',
            'fecha_nac' => '01/01/1997',
            'id_rol' => '3',
            'id_genero' => '2',
            'id_pais' => '1',
            'id_ciudad' => '1',
            'id_sede' => '1',
            'email' => 'mesero@email.com',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
