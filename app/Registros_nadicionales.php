<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros_nadicionales extends Model
{
 protected $table = "registros_nadicionales";

	protected $fillable= [
   		'id',
   		'id_registro',
   		'tipo_archivo',
   		'ruta_archivo',
   		'pedimento',
   		'created_at',
   		'updated_at',   
   	];
}
