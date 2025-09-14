<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CarritoController;
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
Route::get('/catalogo', [TiendaController::class, 'index'])->name('catalogo');
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');


// Opcional: también disponible en /tienda
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');

// Carrito (público, sin login)
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::post('/carrito/add/{id}', [CarritoController::class, 'add'])->name('carrito.add');
Route::get('/carrito/remove/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::put('/carrito/update/{id}', [CarritoController::class, 'update'])->name('carrito.update');
Route::post('/carrito/checkout', [CarritoController::class, 'checkout'])->name('carrito.checkout');

Route::resource('productos', ProductoController::class)->middleware(['auth', 'artesano']);;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
