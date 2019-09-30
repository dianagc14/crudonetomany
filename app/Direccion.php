<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Direccion extends Model

{
    protected $table="direccions";
   
    protected $fillable = ['calle', 'colonia', 'delegacion','numero'];

    public function user()
    {
        return $this->belongsTo('App\Usuario');
    }
}

