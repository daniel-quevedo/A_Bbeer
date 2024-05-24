<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Headquarter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HeadquarterController extends Controller
{
    public function index()
    {
        $heardquarters = Headquarter::all();
        return view('administrator.headquarter_show',compact('heardquarters'));
    }
    public function store()
    {
        return view('administrator.headquarter_add');
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new Headquarter();
            $table->sede = $request->sede;
            $table->save();
            DB::commit();
            Alert::toast('Sede agregada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar la sede');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.headquarter.index');
    }
    public function showEdit(Request $request)
    {
        $headquarterEdit = Headquarter::find($request->id);
        return response()->json(['message' => $headquarterEdit], 200);
    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Headquarter::find($request->id);
            $table->sede = $request->sede;
            $table->save();
            DB::commit();
            return response()->json(['message' => 'success', 'newHeadQuarter' => $table->sede], 200);
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
            Headquarter::where('idSede',$request->id)->delete();
            DB::commit();
            Alert::toast('Sede eliminada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar la sede');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.headquarter.index');
    }
}
