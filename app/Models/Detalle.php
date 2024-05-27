<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $table='detalle_pedido';
    protected $fillable=[
        "cantidad","total"
    ];

    public function pedidos(){
        return $this->belongsTo(Pedido::class);
    }
}
