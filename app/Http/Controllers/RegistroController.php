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
use DB;


class RegistroController extends Controller
{
  public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

        public function index()
    {

    	$registros = Registro::all();

    	$clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
    	$razon = Razon_social_proveedor::orderBy('nombre_razon','ASC')->pluck('nombre_razon','id');
    	$aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');
    	$ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');
    	$estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');
    	$proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');


        return view('registros.index')->with('registros',$registros)->with('clientes',$clientes)->with('razon',$razon)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registro::find($id);
                return response()->json($info);

            }
    }

	public function store(Request $request)
    {
    	$id = DB::table('registros')->orderBy('id', 'DESC')->first();

    	if($id == null){$numero = 1;}else{$numero = $id->id+1; }

        $registro = new Registro($request->all());
     	$registro->id =$numero;
      	$registro->no_operacion = "TT".$numero;
      	$registro->id_cliente = $request->id_cliente;
      	$registro->id_razon_datos_fac = $request->id_razon_datos_fac; 
      	$registro->ruta_razonsocial = $request->ruta_razonsocial;
      	$registro->contacto_facturas_pagos = strtoupper($request->contacto_facturas_pagos);
      	$registro->forma_pago = $request->forma_pago;
      	$registro->pagamos_mercancia = $request->pagamos_mercancia;
      	$registro->id_proveedor = $request->id_proveedor;
      	$registro->ruta_proveedor = $request->ruta_proveedor;
      	$registro->valor_factura_ext = $request->valor_factura_ext;
      	$registro->ruta_factura_ext = $request->ruta_factura_ext;
      	$registro->se_emite_factura = $request->se_emite_factura;
      	$registro->se_factura_valor_mercancia = $request->se_factura_valor_mercancia;
      	$registro->id_aduana = $request->id_aduana;
      	$registro->id_ejecutivo = $request->id_ejecutivo;
      	$registro->id_estatus = $request->id_estatus;
      	$registro->descripcion_operacion = strtoupper($request->descripcion_operacion);
      	$registro->eta = $request->eta;
      	$registro->fecha_despacho = $request->fecha_despacho;
      	$registro->cotizacion_cliente_mxp = $request->cotizacion_cliente_mxp;
      	$registro->ruta_cotizacion_cliente = $request->ruta_cotizacion_cliente;
      	$registro->observaciones = strtoupper($request->observaciones);
      	$registro->fecha_deposito_cliente = $request->fecha_deposito_cliente;
      	$registro->importe_deposito_cliente = $request->importe_deposito_cliente;
      	$registro->ruta_importe_deposito_cliente = $request->ruta_importe_deposito_cliente;
      	$registro->referencia = strtoupper($request->referencia);
      	$registro->no_pedimento = strtoupper($request->no_pedimento);
      	$registro->ruta_pedimento = $request->ruta_pedimento;
      	$registro->importe_cg = $request->importe_cg;
      	$registro->fecha_cg = $request->fecha_cg;
      	$registro->folio_cg = strtoupper($request->folio_cg);
      	$registro->ruta_folio_cg = $request->ruta_folio_cg;
      	$registro->importe_facturado_cliente = $request->importe_facturado_cliente;
      	$registro->ruta_facturado_cliente = $request->ruta_facturado_cliente;
      	$registro->costeo_total = $request->costeo_total;
      	$registro->ruta_costeo = $request->ruta_costeo;
      	$registro->cierre = $request->cierre;
      	$registro->fecha_cierre = $request->fecha_cierre;
        $registro->id_user=Auth::User()->id;
        $registro->save();

        $notification = array(
        'message' => 'El Registro se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
