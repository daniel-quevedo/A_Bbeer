<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Mesa;
use App\Models\Headquarter;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::select('mesa.idMesa','mesa.mesa','s.sede','p.pais','c.ciudad')
        ->join('sede as s','s.idSede','mesa.id_sede')
        ->join('pais as p','p.idPais','mesa.id_pais')
        ->join('ciudad as c','c.idCiudad','mesa.id_ciudad')
        ->get();
        return view('administrator.mesa_show',compact('mesas'));
    }

    public function store(Request $request)
    {
        $headquarter = Headquarter::all();
        $city = City::all();
        $country = Country::all();
        return view('administrator.mesa_add',compact('headquarter','city','country'));
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new Mesa();
            $table->mesa = $request->mesa;
            $table->id_sede = $request->id_sede;
            $table->id_pais = $request->id_pais;
            $table->id_ciudad = $request->id_ciudad;
            $table->save();
            DB::commit();
            Alert::toast('Mesa agregada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar la mesa');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.mesa.index');
    }

    public function showEdit(Request $request)
    {
        $mesaEdit = Mesa::find($request->id);
        $headquarter = Headquarter::all();
        $city = City::all();
        $country = Country::all();
        return view('administrator.mesa_edit',compact('mesaEdit','headquarter','city','country'));
    }

    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Mesa::find($request->id);
            $table->mesa = $request->mesa;
            $table->id_sede = $request->id_sede;
            $table->id_pais = $request->id_pais;
            $table->id_ciudad = $request->id_ciudad;
            $table->save();
            DB::commit();
            Alert::toast('Mesa actualizada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo actualizar la mesa');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.mesa.index');
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            Mesa::where('idMesa',$request->id)->delete();
            DB::commit();
            Alert::toast('Mesa eliminada correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar la mesa');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.mesa.index');
    }
}
