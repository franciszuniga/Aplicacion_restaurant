<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesero extends Model
{    
    use HasFactory;
    protected $table='mesero';
    protected $fillable=[
        "id","Nombre","Apellido","DNI"
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
