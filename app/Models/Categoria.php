<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    //Relacion entre categoria y producto
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
