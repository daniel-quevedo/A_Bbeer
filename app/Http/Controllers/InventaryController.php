<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventary;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InventaryController extends Controller
{
    public function index()
    {
        $inventaries = Inventary::select('inventario.*','p.producto')
        ->join('producto as p','p.idProducto','inventario.id_producto')
        ->get();
        return view('inventary_show',compact('inventaries'));
    }
    public function store()
    {
        $products = Product::all();
        return view('inventary_add', compact('products'));
    }
    public function showEdit(Request $request)
    {
        $inventaryEdit = Inventary::select('inventario.*','p.producto')->where('idInventario',$request->id)
        ->join('producto as p','p.idProducto','inventario.id_producto')
        ->first();
        return view('inventary_edit',compact('inventaryEdit'));

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Inventary::find($request->id);
            $table->cantidad = $request->cantidad;
            $table->save();
            DB::commit();
            Alert::success('¡Actualizado!', 'Inventario actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el inventario');
            // dd($th);
            return back();
        }

        return redirect()->route('inventary.index');
    }

    public function stateInventary(Request $request)
    {
        try {
            DB::beginTransaction();
            Inventary::where('idInventario',$request->idInv)->update([
                'estado' => ($request->state == "true") ? 1 : 0
            ]);
            DB::commit();
            $message = 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = 'error: '.$th;
        }
        return $message;
    }
}
