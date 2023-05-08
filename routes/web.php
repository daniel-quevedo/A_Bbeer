<?php

use App\Http\Controllers\Admin\UserController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

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


});

require __DIR__.'/auth.php';
