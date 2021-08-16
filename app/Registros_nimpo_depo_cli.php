<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros_nimpo_depo_cli extends Model
{
 protected $table = "registros_nimp_depo_cli";

	protected $fillable= [
   		'id',
   		'id_registro',
   		'importe_deposito_cliente',
   		'created_at',
   		'updated_at',   
   	];
}
