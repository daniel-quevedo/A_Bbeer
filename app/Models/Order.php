<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'pedido';

    protected $primaryKey = 'idPedido';

    protected $fillable = [
        'cod_pedido',
        'cantidad',
        'pagado',
        'estado',
        'total',
        'id_producto',
        'id_mesa',
    ];
}
