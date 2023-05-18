<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $mesa = Mesa::all();
        return view('report_index',compact('products','mesa'));
    }

    public function show(Request $request)
    {
        $fecha_ini = $request->fecha_ini;
        $fecha_ini = date("Y-m-d H:i:s", strtotime($fecha_ini));
        $fecha_fin = $request->fecha_fin;
        $fecha_fin = date("Y-m-d H:i:s", strtotime($fecha_fin));
        if (Auth::user()->id == 1) {
            $reports = Order::select('pedido.cantidad','pedido.pagado','pedido.total','p.producto','m.mesa')
            ->join('producto as p','p.idProducto','pedido.id_producto')
            ->join('mesa as m','m.idMesa','pedido.id_mesa')
            ->where('pedido.id_producto',$request->id_producto)
            ->whereBetween('pedido.created_at',[$fecha_ini,$fecha_fin])
            ->get();
        }else{
            $reports = Order::select('pedido.cantidad','pedido.pagado','pedido.total','p.producto','m.mesa')
            ->join('producto as p','p.idProducto','pedido.id_producto')
            ->join('mesa as m','m.idMesa','pedido.id_mesa')
            ->where('pedido.id_producto',$request->id_producto)
            ->where('m.id_sede',Auth::user()->id_sede)
            ->whereBetween('pedido.created_at',[$fecha_ini,$fecha_fin])
            ->get();
        }
        // dd($request);

        return view('report_show',compact('reports'));
    }
}
