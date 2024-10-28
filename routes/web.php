<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MesaPedidoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
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
    return view('auth.login');
});

Route::get('/nombre',function (){
    $nombre = config('configuracion.nombre');
    return $nombre;
});

Route::get('/parametro1',function (){
    $nombreparcial = config('parcialconfiguracion.nombre_de_sistema');
    return $nombreparcial;
});

Route::get('/parametro2',function (){
    $nombreparcial = config('parcialconfiguracion.version');
    return $nombreparcial;
});

Route::get('/parametro3',function (){
    $nombreparcial = config('parcialconfiguracion.moneda');
    return $nombreparcial;
});

Route::get('/parametro4',function (){
    $nombreparcial = config('parcialconfiguracion.idioma');
    return $nombreparcial;
});

Route::get('/parametro5',function (){
    $nombreparcial = config('parcialconfiguracion.base_de_datos');
    return $nombreparcial;
});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // Route::get('/main', function () {
    //     return view('admin.desktop');
    // });

    Route::get("/dashboard", [DashboardController::class, "index"])->name("index");
    

    Route::get("/listado_mesas", [MesaController::class, "listado_mesas"])->name("listado_mesass");

    Route::get("/mesa", [MesaController::class, "listar_mesas"])->name("lista_mesass");
    Route::post("/mesa", [MesaController::class, "crear_mesas"])->name("crear_mesass");
    Route::get("/crear_mesa", function () {
        return view('admin.mesas.crear_mesas');
    })->name("crear_mesa");

    Route::get("/listado_producto", [ProductoController::class, "listado_producto"])->name("listado_productoss");

    Route::get("/producto", [ProductoController::class, "listar_productos"])->name("listar_productos");
    Route::post("/producto", [ProductoController::class, "agregar_producto"])->name("agregar_producto");
    
    Route::get("/agregar_producto", [ProductoController::class, "verAgregarProductos"]);
    Route::post("/agregar_producto", [ProductoController::class, "agregar_producto"])->name("agregar_producto");
    
    Route::resource("pedidos",PedidoController::class);
    Route::resource("/mesa.pedido",MesaPedidoController::class);

    Route::resource('cliente', ClienteController::class);

    Route::get("/recerva/{recerva}", [ReservaController::class, "show"])->name("recerva.show");
    Route::post("/recerva", [ReservaController::class, "store"])->name("recerva.store");
});
