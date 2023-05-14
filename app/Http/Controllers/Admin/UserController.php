<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Rol;
use App\Models\Headquarter;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('users.id as id','users.*','r.rol','g.genero','p.pais','c.ciudad','s.sede')
        ->join('rol as r','r.idRol','users.id_rol')
        ->join('genero as g','g.idGenero','users.id_genero')
        ->join('pais as p','p.idPais','users.id_pais')
        ->join('ciudad as c','c.idCiudad','users.id_ciudad')
        ->join('sede as s','s.idSede','users.id_sede')
        ->get();
        return view('administrator.users_show',compact('users'));
    }
    public function store()
    {
        $rol = Rol::all();
        $gender = Gender::all();
        $country = Country::all();
        $city = City::all();
        $headquarter = Headquarter::all();

        return view('administrator.users_add',compact('rol','gender','country','city','headquarter'));
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new User();
            $table->primer_nom = $request->primer_nom;
            $table->segundo_nom = $request->segundo_nom;
            $table->primer_ape = $request->primer_ape;
            $table->segundo_ape = $request->segundo_ape;
            $table->cedula = $request->cedula;
            $table->email = $request->email;
            $table->edad = Carbon::parse($request->fecha_nac)->age;
            $table->fecha_nac = $request->fecha_nac;
            $table->id_rol = $request->id_rol;
            $table->id_genero = $request->id_genero;
            $table->id_pais = $request->id_pais;
            $table->id_ciudad = $request->id_ciudad;
            $table->id_sede = $request->id_sede;
            $table->password = Hash::make('123456');
            $table->save();
            DB::commit();
            Alert::success('¡Agregado!', 'Usuario agregado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el usuario');
            return back();
        }
        return redirect()->route('admin.users.index');
    }
    public function showEdit(Request $request)
    {
        $rol = Rol::all();
        $gender = Gender::all();
        $country = Country::all();
        $city = City::all();
        $headquarter = Headquarter::all();
        $userEdit = User::find($request->id);
        return view('administrator.users_edit',compact('rol','gender','country','city','headquarter','userEdit'));

    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = User::find($request->id);
            $table->primer_nom = $request->primer_nom;
            $table->segundo_nom = $request->segundo_nom;
            $table->primer_ape = $request->primer_ape;
            $table->segundo_ape = $request->segundo_ape;
            $table->cedula = $request->cedula;
            $table->email = $request->email;
            $table->edad = Carbon::parse($request->fecha_nac)->age;
            $table->fecha_nac = $request->fecha_nac;
            $table->id_rol = $request->id_rol;
            $table->id_genero = $request->id_genero;
            $table->id_pais = $request->id_pais;
            $table->id_ciudad = $request->id_ciudad;
            $table->id_sede = $request->id_sede;
            $table->password = Hash::make('123456');
            $table->save();
            DB::commit();
            Alert::success('¡Actualizado!', 'Usuario actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el usuario');
            return back();
        }


        return redirect()->route('admin.users.index');
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            User::where('id',$request->id)->delete();
            DB::commit();
            Alert::success('Eliminado!', 'Usuario eliminado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar el usuario');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.users.index');
    }
}
