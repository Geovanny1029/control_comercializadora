<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros_Nproveedores extends Model
{
 protected $table = "registros_nproveedores";

	protected $fillable= [
   		'id',
   		'id_registro',
   		'id_proveedor',
   		'ruta_pdf',
   		'created_at',
   		'updated_at',   
   	];

   	public function proveedores(){

      return $this->belongsTo('App\Proveedor_externo','id_proveedor'); 
    }
}
