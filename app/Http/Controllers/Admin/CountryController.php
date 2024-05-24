<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('administrator.country_show',compact('countries'));
    }
    public function store()
    {
        return view('administrator.country_add');
    }
    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = new Country();
            $table->pais = $request->pais;
            $table->save();
            DB::commit();
            Alert::toast('País agregado correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo agregar el país');
            // dd($th);
            return back();
        }
        return redirect()->route('admin.country.index');
    }
    public function showEdit(Request $request)
    {
        $countryEdit = Country::find($request->id);
        return response()->json(['message' => $countryEdit], 200);
    }
    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $table = Country::find($request->id);
            $table->pais = $request->pais;
            $table->save();
            DB::commit();
            return response()->json(['message'=> 'success','newCountry'=> $table->pais],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message'=> $th->getMessage()],500);
            // dd($th);
        }
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            Country::where('idPais',$request->id)->delete();
            DB::commit();
            Alert::toast('País eliminado correctamente','success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!', 'No se pudo eliminar la ciudad');
            // dd($th);
            return back();
        }

        return redirect()->route('admin.country.index');
    }
}
