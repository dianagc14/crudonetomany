<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Usuario extends Model
{
    protected $table="usuarios";
        
 
    protected $fillable = ['nombre', 'apellidopaterno', 'apellidomaterno','edad'];

    public function direccion() {
        return $this->hasOne('App\Direccion', 'usuario_id');
    }
}


