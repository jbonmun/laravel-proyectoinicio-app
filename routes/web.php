<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('community', [App\Http\Controllers\CommunityLinkController::class, 'index']);
Route::post('community', [App\Http\Controllers\CommunityLinkController::class, 'store']);
/* Ejercicio A33. Mas sobre rutas
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
*/
Route::get('/user/{name?}', function ($name = 'Invitado') {
    return "Bienvenido a la página de pruebas {$name}";
});

Route::post('/paginaPruebaPost', function ($name = 'Pruebas') {
    return "Bienvenido a la página de pruebas POST";
});

Route::match(['get', 'post'], '/2metodos', function () {
    return "pagina de pruebas que permite GET y POST";
});

Route::get('/compruebaNombre/{name}', function () {
    return "página a la que puedes acceder al comprobar que el nombre del parámetro está formado solo con letras";
})->where('name', '[A-Za-z]+');

Route::get('/compruebaNumero/{id}', function () {
    return "página a la que puedes acceder al comprobar que el parámetro está formado solo con números";
})->where('id', '[0-9]+');

Route::get('/compruebaNumeroNombre/{id}/{name}', function ($id, $name) {
    return "página a la que puedes acceder al comprobar que el 1er.parámetro está formado solo con números y el 2º parámetro solo con letras";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

require __DIR__.'/auth.php';
