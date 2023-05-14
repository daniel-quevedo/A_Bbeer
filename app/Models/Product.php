<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $primaryKey = 'idProducto';

    protected $fillable = [
        'cod_producto',
        'producto',
        'costo_venta_producto',
        'costo_producto',
        'id_tipoProducto',
    ];
}
