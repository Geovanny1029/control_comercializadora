<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
 protected $table = "estatus";

	protected $fillable= [
   		'id',
   		'nombre_estatus',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
