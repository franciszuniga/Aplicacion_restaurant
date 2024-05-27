<?php

namespace App\Models;

use App\Models\Mesa;
use App\Models\Detalle;
use App\Models\Cliente;
use App\Models\Mesero;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{    
    use HasFactory;
    protected $table='pedido';
    protected $fillable=[
        'monto','mesa_id','cliente_id', 'mesero_id'
    ];
    
    public function mesas(){
        return $this->belongsTo('App\Models\Mesa', 'mesa_id');
    }

    public function detallespedidos(){
        return $this->hasMany('App\Models\Detalle');
    }
    
    public function clientes(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function meseros(){
        return $this->belongsTo('App\Models\Mesero', 'mesero_id');
    }
}