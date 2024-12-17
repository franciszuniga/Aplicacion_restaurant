<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{    
    use HasFactory;
    protected $table='producto';
    protected $fillable=[
        "codigo","nombre","descripcion","precio","stock","categoria_id"
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
