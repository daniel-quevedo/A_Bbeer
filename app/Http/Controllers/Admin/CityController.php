<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('administrator.city_show',compact('cities'));
    }
    public function store()
    {
        return view('administrator.city_add');
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new City();
            $table->ciudad = $request->ciudad;
            $table->save();
            DB::commit();
            Alert::toast('Ciudad agregada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar la ciudad');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.city.index');
    }
    public function showEdit(Request $request)
    {
        $cityEdit = City::find($request->id);
        return response()->json(['message' => $cityEdit], 200);

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = City::find($request->id);
            $table->ciudad = $request->ciudad;
            $table->save();
            DB::commit();
            return response()->json(['message' => 'success', 'newCity' => $table->ciudad], 200);
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
            City::where('idCiudad',$request->id)->delete();
            DB::commit();
            Alert::toast('Ciudad eliminada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar la ciudad');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.city.index');
    }
}
