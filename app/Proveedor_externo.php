<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor_externo extends Model
{
 protected $table = "proveedor_externo";

	protected $fillable= [
   		'id',
   		'nombre_proveedor',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registros_Nproveedores'); 
    }
}
