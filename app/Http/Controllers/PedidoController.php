<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Mesero;
use App\Models\Producto;
use App\Models\Detalle;
use Illuminate\Http\Request;
use Illuminate\Http\Model;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos=Pedido::all();
        return response()->json(['datos'=>$pedidos],202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $listado_mesas = Mesa::get();
            $clientes = Cliente::get();
            return view('admin.Platos.index', compact('clientes','listado_mesas'));
        } catch (\Exception $ex) {
            return back()->with('warning', 'ocurrio un error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::find(1);
        $mesa = Mesa::find($request->input("numeroMesa"));
        $mesero = Mesero::find(1);
        //$mesa = Mesa::find($request['mesa']);
        //$nuevopedido = $request->all();
        /*Pedido::create([
            'monto' => $request->input("#total{{ $mesa->id }}"),
            'mesa_id' => $mesa->id
        ]);*/
        $pedido = new Pedido;
        //$pedido->id = 1;
        $pedido->monto = $request->input("total_pedido");
        $pedido->mesa_id = $mesa->id;
        $pedido->cliente_id = $cliente->id;
        $pedido->mesero_id = $mesero->id;
        //$pedido->cliente_id = 4;
        $pedido->save();

        $objetopedido = $request->all();
        $productos = Producto::all();

        foreach($objetopedido as $nombre_evento=>$cantidad){
            foreach($productos as $producto){
                if($producto->codigo == $nombre_evento){
                    $producto->stock = $producto->stock - $cantidad;
                    $producto->save();
                }
            }
        }

        foreach($objetopedido as $detalleProd=>$id){
            foreach($productos as $producto){
                if("detalle_".$producto->codigo == $detalleProd){
                    $detalle = new Detalle;
                    $detalle->producto_id = $id;
                    $detalle->pedido_id = $pedido->id;
                    //$detalle->save();
                }
                if($detalleProd == $producto->codigo){
                    $detalle->cantidad = $request->input("$producto->codigo");
                    $detalle->total = ($detalle->cantidad)*($producto->precio);
                    $detalle->save();
                }
            }
        }

        return $request->toArray();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesa=Mesa::find($id);
        $pedidos=$mesa->pedidos;
        return response()->json(['datos'=>$pedidos],202);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}