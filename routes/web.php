<?php

use App\Http\Controllers\GenerarPdfController;
use App\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Inventario\InvActaDevolucion\ActaDevolucion;
use App\Http\Livewire\Inventario\InvActaDevolucion\ActaDevolucionCreate;
use App\Http\Livewire\Inventario\InvActaDevolucion\ActaDevolucionShow;
use App\Http\Livewire\Inventario\InvActaEntrega\ActaEntrega;
use App\Http\Livewire\Inventario\InvActaEntrega\ActaEntregaCreate;
use App\Http\Livewire\Inventario\InvActaEntrega\ActaEntregaShow;
use App\Http\Livewire\Inventario\InvBodegas\Bodegas;
use App\Http\Livewire\Inventario\InvMarcas\Marcas;
use App\Http\Livewire\Inventario\InvProductos\Productos;
use App\Http\Livewire\Inventario\InvProductos\ProductosHistorial;
use App\Http\Livewire\Users\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('sign-in');
});
/* Route::get('forgot-password', ForgotPassword::class)
    ->middleware('guest')
    ->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)
    ->middleware('signed')
    ->name('reset-password');
Route::get('sign-up', Register::class)
    ->middleware('guest')
    ->name('register'); */
Route::get('sign-in', Login::class)
    ->middleware('guest')
    ->name('login');

/* Route::get('user-profile', UserProfile::class)
    ->middleware('auth')
    ->name('user-profile');
Route::get('user-management', UserManagement::class)
    ->middleware('auth')
    ->name('user-management'); */

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('bodegas', Bodegas::class)->name('inv.bodegas');
    Route::get('marcas', Marcas::class)->name('inv.marcas');
    Route::get('articulos', Productos::class)->name('inv.productos');
    Route::get('articulos/{producto}/historial', ProductosHistorial::class)->name('inv.productos.historial');
    Route::get('actas-de-entrega', ActaEntrega::class)->name('inv.actas-entrega');
    Route::get('actas-de-entrega/nueva', ActaEntregaCreate::class)->name('inv.actas-entrega.create');
    Route::get('actas-de-entrega/{invActaEntrega}', ActaEntregaShow::class)->name('inv.actas-entrega.show');
    Route::get('actas-de-devolucion', ActaDevolucion::class)->name('inv.acta-devolucion');
    Route::get('actas-de-devolucion/nueva', ActaDevolucionCreate::class)->name('inv.actas-devolucion.create');
    Route::get('actas-de-devolucion/{invActaDevolucion}', ActaDevolucionShow::class)->name('inv.actas-devolucion.show');

    Route::prefix('generar-pdf')->name('pdf.')->group(function () {
        Route::get('/acta-de-entrega/{actaEntrega}', [GenerarPdfController::class, 'generarActaEntrega'])->name('acta-entrega');
        Route::get('/acta-de-devolucion/{actaDevolucion}', [GenerarPdfController::class, 'generarActaDevolucion'])->name('acta-devolucion');
    });


    Route::get('usuarios', Users::class)->name('usuarios.index');

    /*   Route::get('billing', Billing::class)->name('billing');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('tables', Tables::class)->name('tables');
    Route::get('notifications', Notifications::class)->name('notifications');
    Route::get('virtual-reality', VirtualReality::class)->name(
        'virtual-reality'
    );
    Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
    Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('rtl', RTL::class)->name('rtl'); */
});


Route::get('ldap', function () {
    return "hos";
});
