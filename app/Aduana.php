<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduana extends Model
{
 protected $table = "aduanas";

	protected $fillable= [
   		'id',
   		'nombre_aduana',
   		'created_at',
   		'updated_at',   
   	];

    public function registros(){

        return $this->hasMany('App\Registro'); 
    }
}
