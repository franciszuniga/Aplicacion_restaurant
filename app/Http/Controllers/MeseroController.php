<?php

namespace App\Http\Controllers;
use App\Models\Mesero;
use Illuminate\Http\Request;

class MeseroController extends Controller 
{
    public function listar_Meseros(){
      $lista_productos=Mesero::all();
      return view("admin.Mesero.listar_Mesero")->with(["lista_Mesero"=>$lista_Mesero]);
    }

    public function verAgregarMeseros(){
      return view('admin.Mesero.agregar_Mesero');
    }

    public function agregar_Mesero(Request $request){
      Mesero::create($request->all());
      return redirect()->route("listar_Mesero");
    }
/*
        public function listado_productos(){

          $listado_mesas=Producto::all();
          return view("admin.platos.index")->with(["listado_mesas"=>$listado_mesas]);
    
        }*/
}
