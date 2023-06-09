<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Models\Inventary;
use App\Models\Mesa;
use App\Models\Order;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('cod_pedido','m.mesa','pagado',DB::raw('sum(cantidad) as cantidad , sum(total) as total'))
        ->join('mesa as m','m.idMesa','pedido.id_mesa')
        ->where('estado',true)
        ->groupBy('cod_pedido','m.mesa','pagado')
        ->get();
        return view('waiter.order_index',compact('orders'));
    }
    public function store(Request $request)
    {
        // dd($request->cod_pedido);
        $products = Product::all();
        $mesa = Mesa::all();
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
            $currentOrder = Order::select('cod_pedido')->where('pagado',false)
            ->where('id_mesa',$request->mesa)
            ->orderBy('cod_pedido','desc')
            ->first();
            if($currentOrder != null){
                $cod_pedido = $currentOrder->cod_pedido;
            }else $cod_pedido = $request->cod_pedido;

            $existProduct = Order::select('idPedido')
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
            }
            if($existProduct != null){
                $table =  Order::find($existProduct->idPedido);
                $table->cantidad = $table->cantidad + $request->cantidad;
                $table->total = ($table->cantidad) * $valueProduct;
                $table->save();
            }else{
                $validateOrder =  Order::select('cod_pedido')->where('id_mesa',$request->id_mesa)
                ->where('pagado',true)
                ->orderBy('cod_pedido','desc')
                ->first();
                if ($validateOrder != null) {
                    $v = substr($validateOrder->cod_pedido,0,1);
                    $v = $v + 1;
                    $cod_pedido = $v.'_cod_M01';
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
            Alert::success('¡Agregado!', 'Pedido agregado correctamente');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el pedido');
            // dd($th);
            return back();
        }
        $cod_order = $table->cod_pedido;

        return redirect()->route('waiter.order.store',['cod_pedido' => $cod_order]);
    }
    public function showEdit(Request $request)
    {
        $products = Product::all();
        $mesa = Mesa::all();
        $orderEdit = Order::select('pedido.cantidad','p.producto','pedido.total')
        ->join('producto as p','p.idProducto','pedido.id_producto')
        ->where('cod_pedido',$request->cod_pedido)
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
            Alert::success('¡Actualizado!', 'Pedido pagado correctamente');
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
            Order::where('cod_pedido',$request->cod_pedido)->update([
                'estado' => false,
                'updated_at' => now()
            ]);
            DB::commit();
            Alert::success('Eliminado!', 'Pedido eliminado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar el pedido');
            // dd($th);
            return back();
        }

        return redirect()->route('waiter.order.index');
    }
    public function show(Request $request)
    {

        $showOrder = Order::select('pedido.cantidad','p.producto','pedido.total')
        ->join('producto as p','p.idProducto','pedido.id_producto')
        ->where('cod_pedido',$request->cod_pedido)
        ->get();
        return view('waiter.order_show',compact('showOrder'));
    }
}
