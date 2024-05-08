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
        try {
            $inventaryEdit = Inventary::select('inventario.idInventario','inventario.cantidad','p.producto')
            ->where('idInventario',$request->id)
            ->join('producto as p','p.idProducto','inventario.id_producto')
            ->first();
            return response()->json(['message' => $inventaryEdit], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th], 500);
        }

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Inventary::find($request->id);
            if (($request->cantidad + $table->cantidad) < 0  ) {
                return response()->json(['message' => 'fail'], 200);
            }else{
                $table->cantidad = $request->cantidad;
                $table->save();
            }


            DB::commit();
            return response()->json(['message' => 'success', 'newCant' => $table->cantidad], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th], 500);
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
            return response()->json(['message' => 'success'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th], 500);
        }
    }
}
