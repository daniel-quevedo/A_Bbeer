<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $table = User::find(Auth::user()->id);
            if ($request->hasFile('foto_perfil')) {
                $photo = $request->file('foto_perfil');
                $nameFile = strtotime(date('Y/m/d H:m:s')).$photo->getClientOriginalName();
                $photo->move(public_path().'/photos/',$nameFile);
                $table->foto_perfil = $nameFile;
            }
            $table->primer_nom = $request->primer_nom;
            $table->segundo_nom = $request->segundo_nom;
            $table->primer_ape = $request->primer_ape;
            $table->segundo_ape = $request->segundo_ape;
            $table->email = $request->email;
            $table->fecha_nac = $request->fecha_nac;
            $table->id_genero = $request->genero;
            $table->cedula = $request->cedula;
            $table->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('¡Error!','No se pudo actualizar los datos');
            dd($th);
            return back();
        }
        Alert::success('¡Actualizado!','Haz actualizado tus datos correctamente');
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
