<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Inventary;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
            $table2->cantidad = 0;
            $table2->id_producto = $table->idProducto;
            $table2->estado = true;
            $table2->save();
            DB::commit();
            Alert::toast('Producto agregado correctamente','success');
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
            Alert::toast('Producto actualizado correctamente','success');
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
            $unidades = Inventary::select('cantidad')->where('id_producto',$request->id)->first()->cantidad;
            if ($unidades > 0) {
                Alert::error('Error','El producto no puede ser eliminado porque aún existen '.$unidades.' unidades');
            }else{
                DB::beginTransaction();
                Inventary::where('id_producto',$request->id)->delete();
                Product::where('idProducto',$request->id)->delete();
                DB::commit();
                Alert::toast('Producto eliminado correctamente','success');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar el producto');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.product.index');
    }

    public function importExcel(Request $request)
    {

        try {
            Excel::import(new ProductImport, $request->file('file'));
            return response()->json(['message' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e,'info' => $e->getMessage()], 422);
        }
    }
    public function downloadExcel()
    {
        $excelProducts = storage_path('plantillas/Products.xlsx');
        return response()->download($excelProducts, 'plantilla productos.xlsx');
    }
}
