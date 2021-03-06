<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
 protected $table = "clientes";

	protected $fillable= [
   		'id',
   		'nombre_cliente',
   		'estatus',
   		'direccion_fiscal',
   		'rfc',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
