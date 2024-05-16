<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'cedula' => 'unique:users',
            'email' => 'unique:users',
        ]);
        if ($validator->fails()) {
            throw new \Exception('true');
        }

        return new User([
            'primer_nom' => $row['primer_nom'],
            'segundo_nom' => $row['segundo_nom'],
            'primer_ape' => $row['primer_ape'],
            'segundo_ape' => $row['segundo_ape'],
            'cedula' => $row['cedula'],
            'email' => $row['email'],
            'edad' => $row['edad'],
            'fecha_nac' => Carbon::createFromFormat('d/m/Y', $row['fecha_nac'])->toDateString(),
            'id_rol' => $row['id_rol'],
            'id_genero' => $row['id_genero'],
            'id_pais' => $row['id_pais'],
            'id_ciudad' => $row['id_ciudad'],
            'id_sede' => $row['id_sede'],
            'foto_perfil' => '',
            'password' => Hash::make('123456'),
            'remember_token' => ''
        ]);
    }
}
