<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TypeProductController extends Controller
{
    public function index()
    {
        $typeProducts = TypeProduct::all();
        return view('administrator.typeProduct_show',compact('typeProducts'));
    }
    public function store()
    {
        return view('administrator.typeProduct_add');
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new TypeProduct();
            $table->tipo_producto = $request->tipo_producto;
            $table->save();
            DB::commit();
            Alert::toast('Tipo de producto agregado correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar este tipo de producto');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.typeProduct.index');
    }
    public function showEdit(Request $request)
    {
        $typeProductEdit = TypeProduct::find($request->id);
        return response()->json(['message' => $typeProductEdit], 200);
    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = TypeProduct::find($request->id);
            $table->tipo_producto = $request->tipo_producto;
            $table->save();
            DB::commit();
            return response()->json(['message' => 'success', 'newTypeProd' => $table->tipo_producto], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th], 500);
            // dd($th);
        }
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            TypeProduct::where('idTipoProducto',$request->id)->delete();
            DB::commit();
            Alert::toast('Tipo de producto eliminado correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar este tipo de producto');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.typeProduct.index');
    }
}
