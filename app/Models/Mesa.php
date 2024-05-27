<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{    
    use HasFactory;
    protected $table='mesa';
    protected $fillable=[
        "numero","estado"
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
