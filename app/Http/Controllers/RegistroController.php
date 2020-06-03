<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Registro;
use App\Aduana;
use App\Cliente;
use App\Ejecutivo;
use App\Estatus;
use App\Proveedor_externo;
use App\Razon_social_proveedor;


class RegistroController extends Controller
{
  public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

        public function index()
    {

    	$registros = Registro::where('fecha_cierre','null')->get();
    	$clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
    	$razon = Razon_social_proveedor::orderBy('nombre_razon','ASC')->pluck('nombre_razon','id');
    	$aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');

    	$ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');

    	$estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');

    	$proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');

        return view('registros.index')->with('registros',$registros)->with('clientes',$clientes)->with('razon',$razon)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores);
    }

	public function store(Request $request)
    {

        $registro = new Registros($request->all());
        $registro->id =
      	$registro->no_operacion =
      	$registro->id_cliente =
      	$registro->id_razon_datos_fac =
      	$registro->ruta_razonsocial =
      	$registro->contacto_facturas_pagos =
      	$registro->forma_pago =
      	$registro->pagamos_mercancia =
      	$registro->id_proveedor =
      	$registro->ruta_proveedor =
      	$registro->valor_factura_ext =
      	$registro->ruta_factura_ext =
      	$registro->se_emite_factura =
      	$registro->se_factura_valor_mercancia =
      	$registro->id_aduana =
      	$registro->id_ejecutivo =
      	$registro->id_estatus =
      	$registro->descripcion_operacion =
      	$registro->eta =
      	$registro->fecha_despacho =
      	$registro->cotizacion_cliente_mxp =
      	$registro->ruta_cotizacion_cliente =
      	$registro->observaciones =
      	$registro->fecha_deposito_cliente =
      	$registro->importe_deposito_cliente =
      	$registro->ruta_importe_deposito_cliente =
      	$registro->referencia =
      	$registro->no_pedimento =
      	$registro->ruta_pedimento =
      	$registro->importe_cg =
      	$registro->fecha_cg =
      	$registro->folio_cg =
      	$registro->ruta_folio_cg =
      	$registro->importe_facturado_cliente =
      	$registro->ruta_facturado_cliente =
      	$registro->costeo_total =
      	$registro->ruta_costeo =
      	$registro->cierre =
      	$registro->fecha_cierre =
        $registro->id_usuario=Auth::User()->id;
        $registro->save();

        $notification = array(
        'message' => 'El Registro se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
