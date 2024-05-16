<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Inventary;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'cod_producto' => 'required|unique:producto',
            'tipo_producto' => 'required'
        ]);
        if ($validator->fails()) {
            throw new \Exception('true');
        }

        $product = Product::create([
            'cod_producto' => $row['cod_producto'],
            'producto' => $row['producto'],
            'costo_venta_producto' => $row['costo_venta_producto'],
            'costo_producto' => $row['costo_producto'],
            'id_tipoProducto' => $row['tipo_producto']
        ]);
        Inventary::create([
            'cantidad' => 1,
            'id_producto' => $product->getKey(),
            'estado' => 1,
        ]);
        return $product;
    }
}
