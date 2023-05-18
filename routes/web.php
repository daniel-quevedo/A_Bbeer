<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\Admin\HeadquarterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypeProductController;
use App\Http\Controllers\InventaryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Waiter\OrderController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

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
    Route::controller(HeadquarterController::class)->group(function() {
        Route::get('sedes', 'index')->name('admin.headquarter.index');
        Route::get('sedes/agregar', 'store')->name('admin.headquarter.store');
        Route::post('sedes/agregadas', 'add')->name('admin.headquarter.add');
        Route::post('sedes/editar', 'edit')->name('admin.headquarter.edit');
        Route::post('sedes/editadas', 'showEdit')->name('admin.headquarter.showEdit');
        Route::post('sedes/eliminar', 'delete')->name('admin.headquarter.delete');
    });
    Route::controller(TypeProductController::class)->group(function() {
        Route::get('tipo/productos', 'index')->name('admin.typeProduct.index');
        Route::get('tipo/productos/agregar', 'store')->name('admin.typeProduct.store');
        Route::post('tipo/productos/agregados', 'add')->name('admin.typeProduct.add');
        Route::post('tipo/productos/editar', 'edit')->name('admin.typeProduct.edit');
        Route::post('tipo/productos/editados', 'showEdit')->name('admin.typeProduct.showEdit');
        Route::post('tipo/productos/eliminar', 'delete')->name('admin.typeProduct.delete');
    });
    Route::controller(ProductController::class)->group(function() {
        Route::get('productos', 'index')->name('admin.product.index');
        Route::get('productos/agregar', 'store')->name('admin.product.store');
        Route::post('productos/agregados', 'add')->name('admin.product.add');
        Route::post('productos/editar', 'edit')->name('admin.product.edit');
        Route::post('productos/editados', 'showEdit')->name('admin.product.showEdit');
        Route::post('productos/eliminar', 'delete')->name('admin.product.delete');
    });
    Route::controller(InventaryController::class)->group(function() {
        Route::get('inventarios', 'index')->name('inventary.index');
        Route::post('inventarios/editar', 'edit')->name('inventary.edit');
        Route::post('inventarios/editados', 'showEdit')->name('inventary.showEdit');
    });
    Route::controller(ReportController::class)->group(function() {
        Route::get('reportes', 'index')->name('report.index');
        Route::post('reportes', 'show')->name('report.show');
    });
    Route::controller(OrderController::class)->group(function() {
        Route::get('pedidos', 'index')->name('waiter.order.index');
        Route::get('pedidos/agregar', 'store')->name('waiter.order.store');
        Route::post('pedidos/agregados', 'add')->name('waiter.order.add');
        Route::post('pedidos/editar', 'edit')->name('waiter.order.edit');
        Route::post('pedidos/editados', 'showEdit')->name('waiter.order.showEdit');
        Route::post('pedidos/eliminar', 'delete')->name('waiter.order.delete');
        Route::post('pedidos/visualizar', 'show')->name('waiter.order.show');
    });
});

require __DIR__.'/auth.php';
