<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventary;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('producto.*','tp.tipo_producto')
        ->join('tipo_producto as tp','tp.idTipoProducto','producto.id_tipoProducto')
        ->get();
        return view('administrator.product_show',compact('products'));
    }
    public function store()
    {
        $typeProduct = TypeProduct::all();
        return view('administrator.product_add',compact('typeProduct'));
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new Product();
            $table->cod_producto = $request->cod_producto;
            $table->producto = $request->producto;
            $table->costo_venta_producto = $request->costo_venta_producto;
            $table->costo_producto = $request->costo_producto;
            $table->id_tipoProducto = $request->id_tipoProducto;
            $table->save();

            $table2 = new Inventary();
            $table2->cantidad = 1;
            $table2->id_producto = $table->idProducto;
            $table2->estado = true;
            $table2->save();
            DB::commit();
            Alert::success('¡Agregado!', 'Producto agregado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el producto');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.product.index');
    }
    public function showEdit(Request $request)
    {
        $productEdit = Product::find($request->id);
        $typeProduct = TypeProduct::all();
        return view('administrator.product_edit',compact('productEdit','typeProduct'));

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Product::find($request->id);
            $table->cod_producto = $request->cod_producto;
            $table->producto = $request->producto;
            $table->costo_venta_producto = $request->costo_venta_producto;
            $table->costo_producto = $request->costo_producto;
            $table->id_tipoProducto = $request->id_tipoProducto;
            $table->save();
            DB::commit();
            Alert::success('¡Actualizado!', 'Producto actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo actualizar el producto');
            // dd($th);
            return back();
        }


        return redirect()->route('admin.product.index');
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            Product::where('idProducto',$request->id)->delete();
            DB::commit();
            Alert::success('Eliminado!', 'Producto eliminado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar el producto');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.product.index');
    }
}
