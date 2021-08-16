<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros_nvalor_fac extends Model
{
 protected $table = "registros_nvalor_fac";

	protected $fillable= [
   		'id',
   		'id_registro',
   		'valor_factura_ext',
   		'created_at',
   		'updated_at',   
   	];

}
