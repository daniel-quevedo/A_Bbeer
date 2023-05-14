<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mesa')->insert([
            [
                'mesa' => 'Mesa bg 1',
                'id_sede' => '1',
                'id_pais' => '1',
                'id_ciudad' => '1',
            ],
            [
                'mesa' => 'Mesa bg 2',
                'id_sede' => '1',
                'id_pais' => '1',
                'id_ciudad' => '1',
            ],
            [
                'mesa' => 'Mesa bg 3',
                'id_sede' => '1',
                'id_pais' => '1',
                'id_ciudad' => '1',
            ],
            [
                'mesa' => 'Mesa md 1',
                'id_sede' => '2',
                'id_pais' => '1',
                'id_ciudad' => '2',
            ],
            [
                'mesa' => 'Mesa md 2',
                'id_sede' => '2',
                'id_pais' => '1',
                'id_ciudad' => '2',
            ],
            [
                'mesa' => 'Mesa md 3',
                'id_sede' => '2',
                'id_pais' => '1',
                'id_ciudad' => '2',
            ],
            [
                'mesa' => 'Mesa cl 1',
                'id_sede' => '3',
                'id_pais' => '1',
                'id_ciudad' => '3',
            ],
            [
                'mesa' => 'Mesa cl 2',
                'id_sede' => '3',
                'id_pais' => '1',
                'id_ciudad' => '3',
            ],
            [
                'mesa' => 'Mesa cl 3',
                'id_sede' => '3',
                'id_pais' => '1',
                'id_ciudad' => '3',
            ],
        ]);
    }
}
