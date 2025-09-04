<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PedidoController; /*pdf*/
use App\Http\Controllers\PedidoExportController;/**EXCEL */


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
    return view('welcome');
});
Auth::routes();



Route::get('pedidos/{id}/pdf', [PedidoController::class, 'generarPDF'])->name('pedidos.pdf');// Ruta para generar el PDF

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/addcart', [\App\Http\Controllers\AddcartController::class, 'index'])->name('addcart');

Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'add'])->name('add');
Route::get('/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/clear', [\App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route::post('/cart/remove', [\App\Http\Controllers\CartController::class, 'removeitem'])->name('removeitem');
//Route::get('/cart/store', [\App\Http\Controllers\CartController::class, 'cartstore'])->name('cartstore');//
Route::post('/cart/store', [\App\Http\Controllers\CartController::class, 'cartstore'])->name('cartstore');
//EXCEL
Route::get('/export-pedidos', [PedidoExportController::class, 'export'])->name('export.pedidos');


Route::get('pedido/export', [PedidoController::class, 'exportForm'])->name('pedido.exportForm');
Route::get('pedido/export-excel', [PedidoController::class, 'exportExcel'])->name('export.pedidos');


//3 SON EXCEL




Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::resource('/pedidos', App\Http\Controllers\PedidoController::class);
Route::resource('/pedidos', App\Http\Controllers\PedidoController::class);
Route::resource('/pedidetalles', App\Http\Controllers\PedidetalleController::class);
Route::resource('/categoris', App\Http\Controllers\CategoriController::class);




//Solicita login para iniciar 
// Módulos que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::resource('/products', App\Http\Controllers\ProductController::class);
    Route::resource('/clients', App\Http\Controllers\ClientController::class); // 🔒 Protegido con login
    Route::resource('/categoris', App\Http\Controllers\CategoriController::class);
   
});
//Solicita login para editar si no esta logueado 
// (solo admins pueden acceder a editar)
//Route::middleware(['auth', 'admin'])->group(function () {
    //Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    //Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');});//editar




