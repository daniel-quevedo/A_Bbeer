<?php

namespace App\Imports;

use App\Models\Mesa;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MesaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'mesa' => 'required|unique:mesa'
        ]);
        if ($validator->fails()) {
            throw new \Exception('true');
        }
        return new Mesa([
            'mesa' => $row['mesa'],
            'id_sede' => $row['id_sede'],
            'id_pais' => $row['id_pais'],
            'id_ciudad' => $row['id_ciudad']
        ]);
    }
}
