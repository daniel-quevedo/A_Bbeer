<?php

namespace App\Imports;

use App\Models\TypeProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class TypeProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TypeProduct([
            //
        ]);
    }
}
