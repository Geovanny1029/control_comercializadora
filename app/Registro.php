<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registros";

	protected $fillable= [
   		'id',
   	
   	

   	];

    public function aerolinea(){

    	return $this->belongsTo('App\Aerolinea','id_aerolinea'); 
    }

    public function agente(){

    	return $this->belongsTo('App\Agente','id_agente'); 
    }
}
