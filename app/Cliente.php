<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
 protected $table = "clientes";

	protected $fillable= [
   		'id',
   		'nombre_cliente',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
