<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    const MENSAJE_ERROR = 'Ocurrió un error';
    public function index(){
        $clientes=Cliente::get();
        return view('admin.cliente.index', compact('clientes'));
    }
    public function create() {
        return view('admin.cliente.crear');
     }
     public function edit($id)
    {
        try {
            $cliente = Cliente::get();
            return view('admin.cliente.edit', compact('clientes'));
        } catch (\Exception $ex) {
            return back()->with('warning', self::MENSAJE_ERROR);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $cliente = Cliente::findOrfail($id);
            $cliente->fill($request->all());
            $cliente->save();
            return redirect()->route('cliente.index')->with('success', 'La persona ha sido actualizado correctamente.');
        } catch (\Exception $ex) {
            return back()->with('warning', self::MENSAJE_ERROR);
        }
    }
    public function store(Request $request){
        try {
            $cliente = new Cliente($request->all());
            $cliente->save();
            return redirect()->route('cliente.index')->with('success', 'El usuario ha sido creado correctamente.');
        } catch (\Exception $ex) {
            return back()->with('warning', self::MENSAJE_ERROR);
        }

    }
    public function destroy($id){
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
