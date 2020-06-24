<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registros";

	protected $fillable= [
   		'id',
      'no_operacion',
      'id_cliente',
      'id_razon_datos_fac',
      'ruta_razonsocial',
      'contacto_facturas_pagos',
      'forma_pago',
      'pagamos_mercancia',
      'id_proveedor',
      'ruta_proveedor',
      'valor_factura_ext',
      'ruta_factura_ext',
      'se_emite_factura',
      'se_factura_valor_mercancia',
      'id_aduana',
      'id_ejecutivo',
      'id_estatus',
      'descripcion_operacion',
      'eta',
      'fecha_despacho',
      'cotizacion_cliente_mxp',
      'ruta_cotizacion_cliente',
      'observaciones',
      'fecha_deposito_cliente',
      'importe_deposito_cliente',
      'ruta_importe_deposito_cliente',
      'referencia',
      'no_pedimento',
      'ruta_pedimento',
      'importe_cg',
      'fecha_cg',
      'folio_cg',
      'ruta_folio_cg',
      'importe_facturado_cliente',
      'ruta_facturado_cliente',
      'costeo_total',
      'ruta_costeo',
      'cierre',
      'fecha_cierre',
      'id_user',
      'created_at',
      'updated_at'            

   	

   	];

    public function aduana(){

    	return $this->belongsTo('App\Aduana','id_aduana'); 
    }

    public function cliente(){

    	return $this->belongsTo('App\Cliente','id_cliente'); 
    }

    public function ejecutivo(){

      return $this->belongsTo('App\Ejecutivo','id_ejecutivo'); 
    }

    public function estatus(){

      return $this->belongsTo('App\Estatus','id_estatus'); 
    }

    public function clienter(){

      return $this->belongsTo('App\Cliente','id_razon_datos_fac'); 
    }

    public function user(){

      return $this->belongsTo('App\User','id_usuario'); 
    }

    public function proveedores(){

      return $this->belongsTo('App\Proveedor_externo','id_proveedor'); 
    }
}
