<?php

use App\Http\Controllers\pruebaController; /* Controladores */
use Illuminate\Http\Request; /* Parámetros */
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/* Retorna texto y parámetros */
Route::get('/string', function (Request $e) {
    return "<p>Texto String</p>". $e->get('variable'); 
});

/* Retorna vista por otra ruta */
Route::View('/vista-redireccion', 'vista', ['nombre' => 'José Valencia', 'edad' => 24]);

/* Retorna vista por clases (controlador) -> php artisan make:controller xxxxxx */
Route::get('/viewControll', [PruebaController::class, 'mostrar']);

/* Retorna vista por clases (controlador) + parámetros por defecto */
Route::get('/blog/{id}/{num?}', [PruebaController::class, 'verAriculos']);

/* Asignando nombre a la ruta al ser invocado por Blade*/
Route::get('/viewControll', [PruebaController::class, 'mostrar'])->name('viewCont');

/* Agrupamiento de rutas */
Route::prefix('dashboard')->group(function(){
    Route::prefix('users')->group(function(){
        Route::get('/edit', [PruebaController::class, 'mostrar']); // -> dashboard/users/edit
        Route::get('/create', [PruebaController::class, 'mostrar']);
    });

    /* Asiganndo nombres al grupo de rutas */
    Route::name('dashboard.')->group(function(){ 
        Route::get('/cont/pageView', [PruebaController::class, 'mostrar'])->name('cont.pageV');
        Route::get('/cont/pageContent', function () {
            return view('vista2');
        })->name('cont.pageC');
    });
});

/* Rutas con Middleware -> (php artisan make:middleware xxxxxx)(Kernel) */
Route::get('/products', [PruebaController::class, 'mostrarProducts'])->middleware('product_token');
Route::get('/sin_token', [PruebaController::class, 'sinToken'])->name('sin_token');
