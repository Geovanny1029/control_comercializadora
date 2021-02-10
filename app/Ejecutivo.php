<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejecutivo extends Model
{
 protected $table = "ejecutivos";

	protected $fillable= [
   		'id',
   		'nombre_ejecutivo',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
