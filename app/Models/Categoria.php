<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table='categoria';
    protected $fillable=[
        "categoria"
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
