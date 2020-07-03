<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma_pago extends Model
{
 protected $table = "forma_pago";

	protected $fillable= [
   		'id',
   		'nombre_pago',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
