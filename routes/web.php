<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/inicio', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home',[])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UserController::class)->group(function() {
        Route::get('usuarios', 'index')->name('admin.users.index');
        Route::get('usuarios/agregar', 'store')->name('admin.users.store');
        Route::post('usuarios/agregados', 'add')->name('admin.users.add');
        Route::post('usuarios/editar', 'edit')->name('admin.users.edit');
        Route::post('usuarios/editados', 'showEdit')->name('admin.users.showEdit');
        Route::post('usuarios/eliminar', 'delete')->name('admin.users.delete');
    });
    Route::controller(CityController::class)->group(function() {
        Route::get('ciudades', 'index')->name('admin.city.index');
        Route::get('ciudades/agregar', 'store')->name('admin.city.store');
        Route::post('ciudades/agregadas', 'add')->name('admin.city.add');
        Route::post('ciudades/editar', 'edit')->name('admin.city.edit');
        Route::post('ciudades/editadas', 'showEdit')->name('admin.city.showEdit');
        Route::post('ciudades/eliminar', 'delete')->name('admin.city.delete');
    });
    Route::controller(CountryController::class)->group(function() {
        Route::get('paises', 'index')->name('admin.country.index');
        Route::get('paises/agregar', 'store')->name('admin.country.store');
        Route::post('paises/agregados', 'add')->name('admin.country.add');
        Route::post('paises/editar', 'edit')->name('admin.country.edit');
        Route::post('paises/editados', 'showEdit')->name('admin.country.showEdit');
        Route::post('paises/eliminar', 'delete')->name('admin.country.delete');
    });
    Route::controller(MesaController::class)->group(function() {
        Route::get('mesas', 'index')->name('admin.mesa.index');
        Route::get('mesas/agregar', 'store')->name('admin.mesa.store');
        Route::post('mesas/agregadas', 'add')->name('admin.mesa.add');
        Route::post('mesas/editar', 'edit')->name('admin.mesa.edit');
        Route::post('mesas/editadas', 'showEdit')->name('admin.mesa.showEdit');
        Route::post('mesas/eliminar', 'delete')->name('admin.mesa.delete');
    });
});

require __DIR__.'/auth.php';
