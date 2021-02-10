<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Razon_social_proveedor extends Model
{
 protected $table = "razon_social_datos_fac";

	protected $fillable= [
   		'id',
   		'nombre_razon',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
