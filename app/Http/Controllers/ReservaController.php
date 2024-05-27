<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Producto;
use Facade\FlareClient\Http\Response;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificar si la mesa esta disponible
        $mesa = Mesa::find($request['mesa']);
        $producto = Producto::find($request['producto']);
        //var_dump($mesa->estado);
        if ($mesa->estado == 'disponible') {
            if ($producto->stock > 0) {
                $producto->stock = ($producto->stock) - $request['cantidad'];
                $producto->save();
            }
        }
        //Verificar si hay platos disponibles

        //Resevar mesa

        $lista_productos = Producto::where('stock', '>', 0)->get();
        $listado_mesas = Mesa::all();
        return view("admin.platos.index", compact('listado_mesas', 'lista_productos')); //la funcion compact esta pasando datos de las variables lista_productos y listado_mesas a la vista
        // guardar reserva en la tabla pedidos
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $producto = Producto::where('codigo', $codigo)->get();
        return response()->json($producto, 201); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function searchProduct($codigo)
    {
        
    }
}
