<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventary extends Model
{
    use HasFactory;

    protected $table = 'inventario';

    protected $primaryKey = 'idInventario';

    protected $fillable = [
        'cantidad',
        'id_producto',
        'estado',
    ];
}
