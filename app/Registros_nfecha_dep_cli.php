<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros_nfecha_dep_cli extends Model
{
 protected $table = "registros_nfecha_dep_cli";

	protected $fillable= [
   		'id',
   		'id_registro',
   		'fecha_deposito_cliente',
   		'created_at',
   		'updated_at',   
   	];
}
