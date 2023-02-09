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
/* A33. Ejercicio 1. Mas sobre rutas
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
*/
Route::get('/user/{name?}', function ($name = 'Invitado') {
    return "Bienvenido a la página de pruebas {$name}";
});

Route::post('/paginaPruebaPost', function () {
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

/* A33. Ejercicio 2. Helpers
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
*/
Route::get('/host', function () {
    $host = env('DB_HOST');
    return "Bienvenido a la página que muestra la IP de la BBDD: {$host}";
});

Route::get('/timezone', function () {
    $zonahoraria = config('app.timezone');
    return "Bienvenido a la página que muestra la zona horaria: {$zonahoraria}";
});

/* A33. Ejercicio 3. Más sobre vistas
*/

Route::get('/inicio', function () {
    return view('/prueba/home');
})->middleware(['auth', 'verified'])->name('inicio');

Route::get('/fecha', function () {
    $diaSemana = date('D');
    $dia = date('d');
    $mes = date('F');
    $year = date('Y');
    return view('/prueba/fecha', ['diaSemana' => $diaSemana, 'dia' => $dia, 'mes' => $mes, 'year' => $year]);
})->middleware(['auth', 'verified'])->name('fecha');

/*Route::get('/fecha2', function () {
    $diaSemana = date('D');
    $dia = date('d');
    $mes = date('F');
    $year = date('Y');
    $var_fecha = array("diaSemana", "dia", "mes", "year");
    return view('/prueba/fecha2', $res = compact($var_fecha));
})->middleware(['auth', 'verified'])->name('fecha');
*/
// creo slug fechawith que al acceder a esa url me devuelve la fecha usando with
Route::get('/fechawith', function () {
    $diaSemana = date('D');
    $dia = date('d');
    $mes = date('F');
    $year = date('Y');

    return view('/prueba/fechawith')
        ->with('diaSemana', $diaSemana)
        ->with('dia', $dia)
        ->with('mes', $mes)
        ->with('year', $year);
})->middleware(['auth', 'verified'])->name('fecha');
////
/**
 * Añado ruta slug /error404 para que al acceder a este slug o cualquier otra url que no exista por el navegador, 
 * me muestre la vista 404.blade.php que cotiene la direccion de una imagen del 404
 * 
 */
Route::get('/error404', function () {
    return view('/errors/404');
});


/* A33. Ejercicio 4. Más sobre Eloquent
Trabajaremos sobre la tabla users. Lanza artisan tinker: "php artisan tinker"
-Usa el método find de Eloquent para encontrar en la tabla users el registro con id 1: "User::find(1)"
-Prueba el método findOrFail(). ¿Qué diferencia tiene respecto a find() cuando no se encuentra un registro? "User::all()"
-Almacena en una variable $user el usuario con id=1 y accediendo a la propiedad name del objeto cambia el valor por tu nombre.
"$user = User::find(1);"
"$user->name = "Pepito Perez;" 
"$user->password = "newpassword;"
"user::save();"

-Elimina el usuario con id=2 mediante el método delete ($user->delete).
$user = User::find(2);
$user->delete();
User::find(2);
-Crea un usuario nuevo. Primero tendrás que crear un objeto de tipo user ($user = new User) y después añadir valores a sus propiedades ($user->name="Luigi").
-Crea otro usuario pero con el método create del modelo (User::create(array asociativo con los valores)).
$user = new User;
$user->name = "ana";
$user->email = "ana@ana.com";
$user->password = Hash::make("1234");
user::save();
*/



require __DIR__ . '/auth.php';
