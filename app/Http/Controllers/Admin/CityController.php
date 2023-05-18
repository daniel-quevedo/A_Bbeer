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
            Alert::success('¡Agregado!', 'Ciudad agregada correctamente');
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
        return view('administrator.city_edit',compact('cityEdit'));

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = City::find($request->id);
            $table->ciudad = $request->ciudad;
            $table->save();
            DB::commit();
            Alert::success('¡Actualizado!', 'Ciudad actualizada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo actualizar la ciudad');
            // dd($th);
            return back();
        }


        return redirect()->route('admin.city.index');
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            City::where('idCiudad',$request->id)->delete();
            DB::commit();
            Alert::success('Eliminado!', 'Ciudad eliminada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar la ciudad');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.city.index');
    }
}
