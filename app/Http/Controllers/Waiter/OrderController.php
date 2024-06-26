<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Models\Inventary;
use App\Models\Mesa;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('cod_pedido','m.mesa','pagado',DB::raw('sum(cantidad) as cantidad , sum(total) as total'))
        ->join('mesa as m','m.idMesa','pedido.id_mesa')
        ->join('users as u','u.id_sede','m.id_sede')
        ->where('estado',true)
        ->where('u.id',Auth::id())
        ->groupBy('cod_pedido','m.mesa','pagado')
        ->get();
        return view('waiter.order_index',compact('orders'));
    }
    public function store(Request $request)
    {
        $products = Product::select('producto.*')
        ->join('inventario as inv','inv.id_producto','producto.idProducto')
        ->where('inv.estado', 1)->get();
        $mesa = Mesa::where('id_sede',Auth::user()->id_sede)->get();
        if ($request->cod_pedido) {
            $order = Order::select('pedido.cantidad','p.producto','pedido.total')
            ->join('producto as p','p.idProducto','pedido.id_producto')
            ->where('cod_pedido',$request->cod_pedido)
            ->get();
        }else $order = null;
        return view('waiter.order_add',compact('products','mesa','order'));
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $existProduct = Order::select('idPedido','cantidad')
            ->where('id_producto',$request->id_producto)
            ->where('id_mesa',$request->id_mesa)
            ->where('pagado',false)
            ->first();
            $valueProduct = Product::select('costo_venta_producto')->where('idProducto',$request->id_producto)->first();
            $valueProduct = $valueProduct->costo_venta_producto;
            $stockInventary = Inventary::select('cantidad')->where('id_producto',$request->id_producto)->first();
            if($stockInventary->cantidad < $request->cantidad){
                DB::rollBack();
                Alert::error('¡Error!','Solo existen '.$stockInventary->cantidad.' unidades en el inventario de este producto');
                return back();
            }else{
                $table = Inventary::where('id_producto',$request->id_producto)->first();
                $table->cantidad = $table->cantidad - $request->cantidad;
                $table->save();
            }
            if($existProduct != null){
                if(($request->cantidad + $existProduct->cantidad) > 0 ){
                    $table =  Order::find($existProduct->idPedido);
                    $table->cantidad = $table->cantidad + $request->cantidad;
                    $table->total = ($table->cantidad) * $valueProduct;
                    $table->save();
                }else{
                    DB::rollBack();
                    Alert::error('¡Error!', 'Cantidad no admitida');
                    return back();
                }
            }else{
                $validateOrder =  Order::select('cod_pedido')->where('id_mesa',$request->id_mesa)
                ->where('pagado',true)
                ->orderBy('cod_pedido','desc')
                ->first();
                if ($validateOrder != null) {
                    $v = strstr($validateOrder->cod_pedido,"_",true); //trae los caracteres antes del guión
                    $v = $v + 1;
                    $cod_pedido = $v.strstr($validateOrder->cod_pedido,"_"); //trae los caracteres después del guión
                }
                if($request->cantidad <= 0){
                    DB::rollBack();
                    Alert::error('¡Error!', 'Cantidad no admitida');
                    return back();
                }
                $table = new Order();
                $table->cod_pedido = $cod_pedido;
                $table->cantidad = $request->cantidad;
                $table->estado = true;
                $table->pagado = false;
                $table->total = $valueProduct * $request->cantidad;
                $table->id_producto = $request->id_producto;
                $table->id_mesa = $request->id_mesa;
                $table->save();
            }
            DB::commit();
            Alert::toast('Pedido agregado correctamente','success');
            return redirect()->route('waiter.order.showEdit',['cod_pedido' => $table->cod_pedido]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th);
            Alert::error('¡Error!', 'No se pudo agregar el pedido');
            return back();
        }
    }
    public function showEdit(Request $request)
    {
        $products = Product::select('producto.*')
        ->join('inventario as inv','inv.id_producto','producto.idProducto')
        ->where('inv.estado', 1)->get();
        $mesa = Mesa::all();
        $orderEdit = Order::select('pedido.cantidad','p.producto','pedido.total','pedido.id_mesa',
        'pedido.idPedido','p.idProducto')
        ->join('producto as p','p.idProducto','pedido.id_producto')
        ->where('cod_pedido',$request->cod_pedido)
        ->where('estado',true)
        ->get();
        return view('waiter.order_edit',compact('products','mesa','orderEdit'));
    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            Order::where('cod_pedido',$request->cod_pedido)->update([
                'pagado' => true,
                'updated_at' => now()
            ]);
            DB::commit();
            Alert::toast('Pedido pagado correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo pagar el pedido');
            // dd($th);
            return back();
        }


        return redirect()->route('waiter.order.index');
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $stockBack = Order::select('id_producto','cantidad')->where('cod_pedido',$request->cod_pedido)->get();
            foreach ($stockBack as $item) {
                $table = Inventary::where('id_producto',$item->id_producto)->first();
                $table->cantidad = $table->cantidad + $item->cantidad;
            $table->save();
            }
            Order::where('cod_pedido',$request->cod_pedido)->delete();
            DB::commit();
            return response()->json(['message' => 'success','cod_pedido' => $request->cod_pedido], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th], 500);
        }
    }
    public function show(Request $request)
    {
        $showOrder = Order::select('pedido.cantidad','p.producto','pedido.total')
        ->join('producto as p','p.idProducto','pedido.id_producto')
        ->where('cod_pedido',$request->cod_pedido)
        ->where('estado',true)
        ->get();
        return view('waiter.order_show',compact('showOrder'));
    }
    public function deleteProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            Order::where('idPedido', $request->idPedido)->delete();
            DB::commit();
            return response()->json(['message' => 'success','idPedido' => $request->idPedido],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th],500);
        }
    }
}
