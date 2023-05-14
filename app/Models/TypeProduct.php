<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'tipo_producto';

    protected $primaryKey = 'idTipoProducto';

    protected $fillable = [
        'tipo_producto',
    ];
}
