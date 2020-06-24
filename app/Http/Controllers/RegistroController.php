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

    	$registros = Registro::whereraw('`fecha_cierre` is null')->get();
      $registros->each(function($registros){
          $registros->aduana;
          $registros->cliente;
          $registros->clienter;
          $registros->ejecutivo;
          $registros->estatus;
          $registros->user;
          $registros->proveedores;
      });      

    	$clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
    	$aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');
    	$ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');
    	$estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');
    	$proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');


        return view('registros.index')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registro::find($id);
                $usuario = User::find($info->id_user);
                $cliente = Cliente::find($info->id_cliente);
                return response()->json(array('info'=>$info,'usuario'=>$usuario,'cliente'=>$cliente));

            }
    }

	public function store(Request $request)
    {
    	$id = DB::table('registros')->orderBy('id', 'DESC')->first();

    	if($id == null){$numero = 1;}else{$numero = $id->id+1; }

/// obtener nombre y archivos
        if($request->hasFile('ruta_razonsocial')){
            $file = $request->file('ruta_razonsocial');
            $original = $file->getClientOriginalName();
            $name = "Razon_TT".$numero."_".$original;          
            $file->move(public_path().'/razon_social/',$name);
        }else{
            $name = $request->ruta_razonsocial;
        }

        if($request->hasFile('ruta_proveedor')){
            $file = $request->file('ruta_proveedor');
            $original = $file->getClientOriginalName();
            $name2 = "Proveedor_TT".$numero."_".$original;          
            $file->move(public_path().'/proveedores/',$name2);
        }else{
            $name2 = $request->ruta_proveedor;
        }

        if($request->hasFile('ruta_factura_ext')){
            $file = $request->file('ruta_factura_ext');
            $original = $file->getClientOriginalName();
            $name3 = "facturaext_TT".$numero."_".$original;          
            $file->move(public_path().'/facturasext/',$name3);
        }else{
            $name3 = $request->ruta_factura_ext;
        }

        if($request->hasFile('ruta_cotizacion_cliente')){
            $file = $request->file('ruta_cotizacion_cliente');
            $original = $file->getClientOriginalName();
            $name4 = "Cotizacion_TT".$numero."_".$original;          
            $file->move(public_path().'/cotizaciones/',$name4);
        }else{
            $name4 = $request->ruta_cotizacion_cliente;
        }

        if($request->hasFile('ruta_importe_deposito_cliente')){
            $file = $request->file('ruta_importe_deposito_cliente');
            $original = $file->getClientOriginalName();
            $name5 = "DepositoC_TT".$numero."_".$original;          
            $file->move(public_path().'/depositos_cliente/',$name5);
        }else{
            $name5 = $request->ruta_importe_deposito_cliente;
        }

        if($request->hasFile('ruta_pedimento')){
            $file = $request->file('ruta_pedimento');
            $original = $file->getClientOriginalName();
            $name6 = "Pedimento_TT".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name6);
        }else{
            $name6 = $request->ruta_pedimento;
        }

        if($request->hasFile('ruta_folio_cg')){
            $file = $request->file('ruta_folio_cg');
            $original = $file->getClientOriginalName();
            $name7 = "FolioCG_TT".$numero."_".$original;          
            $file->move(public_path().'/folios_cg/',$name7);
        }else{
            $name7 = $request->ruta_folio_cg;
        }

        if($request->hasFile('ruta_facturado_cliente')){
            $file = $request->file('ruta_facturado_cliente');
            $original = $file->getClientOriginalName();
            $name8 = "importefac_TT".$numero."_".$original;          
            $file->move(public_path().'/importes_facturados/',$name8);
        }else{
            $name8 = $request->ruta_facturado_cliente;
        }

        if($request->hasFile('ruta_costeo')){
            $file = $request->file('ruta_costeo');
            $original = $file->getClientOriginalName();
            $name9 = "Costeo_TT".$numero."_".$original;          
            $file->move(public_path().'/costeos_totales/',$name9);
        }else{
            $name9 = $request->ruta_costeo;
        }
///// fin request archivos

        $registro = new Registro($request->all());
     	  $registro->id =$numero;
      	$registro->no_operacion = "TT".$numero;
      	$registro->id_cliente = $request->id_cliente;
      	$registro->id_razon_datos_fac = $request->id_razon_datos_fac; 
      	$registro->ruta_razonsocial = $name;
      	$registro->contacto_facturas_pagos = strtoupper($request->contacto_facturas_pagos);
      	$registro->forma_pago = $request->forma_pago;
      	$registro->pagamos_mercancia = $request->pagamos_mercancia;
      	$registro->id_proveedor = $request->id_proveedor;
      	$registro->ruta_proveedor = $name2;
      	$registro->valor_factura_ext = $request->valor_factura_ext;
      	$registro->ruta_factura_ext = $name3;
      	$registro->se_emite_factura = $request->se_emite_factura;
      	$registro->se_factura_valor_mercancia = $request->se_factura_valor_mercancia;
      	$registro->id_aduana = $request->id_aduana;
      	$registro->id_ejecutivo = $request->id_ejecutivo;
      	$registro->id_estatus = $request->id_estatus;
      	$registro->descripcion_operacion = strtoupper($request->descripcion_operacion);
      	$registro->eta = $request->eta;
      	$registro->fecha_despacho = $request->fecha_despacho;
      	$registro->cotizacion_cliente_mxp = $request->cotizacion_cliente_mxp;
      	$registro->ruta_cotizacion_cliente = $name4;
      	$registro->observaciones = strtoupper($request->observaciones);
      	$registro->fecha_deposito_cliente = $request->fecha_deposito_cliente;
      	$registro->importe_deposito_cliente = $request->importe_deposito_cliente;
      	$registro->ruta_importe_deposito_cliente = $name5;
      	$registro->referencia = strtoupper($request->referencia);
      	$registro->no_pedimento = strtoupper($request->no_pedimento);
      	$registro->ruta_pedimento = $name6;
      	$registro->importe_cg = $request->importe_cg;
      	$registro->fecha_cg = $request->fecha_cg;
      	$registro->folio_cg = strtoupper($request->folio_cg);
      	$registro->ruta_folio_cg = $name7;
      	$registro->importe_facturado_cliente = $request->importe_facturado_cliente;
      	$registro->ruta_facturado_cliente = $name8;
      	$registro->costeo_total = $request->costeo_total;
      	$registro->ruta_costeo = $name9;
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

    public function actualiza(Request $request){

        $id = $request->edit_id_registro;
        $data= Registro::find($id);


//// request archivos
        if($data->ruta_razonsocial == null || $data->ruta_razonsocial == "" ){
          if($request->hasFile('edit_ruta_razonsocial')){
              $file = $request->file('edit_ruta_razonsocial');
              $original = $file->getClientOriginalName();
              $name = "Razon_TT".$data->id."_".$original;          
              $file->move(public_path().'/razon_social/',$name);
          }else{
            $name = $request->edit_ruta_razonsocial;
          }
        }else{
            $name = $data->ruta_razonsocial;
        }

        if($data->ruta_proveedor == null || $data->ruta_proveedor == "" ){
          if($request->hasFile('edit_ruta_proveedor')){
              $file = $request->file('edit_ruta_proveedor');
              $original = $file->getClientOriginalName();
              $name2 = "Proveedor_TT".$data->id."_".$original;          
              $file->move(public_path().'/proveedores/',$name2);
          }else{
            $name2 = $request->edit_ruta_proveedor;
          }
        }else{
            $name2 = $data->ruta_proveedor;
        }

        if($data->ruta_factura_ext == null || $data->ruta_factura_ext == "" ){
          if($request->hasFile('edit_ruta_factura_ext')){
              $file = $request->file('edit_ruta_factura_ext');
              $original = $file->getClientOriginalName();
              $name3 = "facturaext_TT".$data->id."_".$original;          
              $file->move(public_path().'/facturasext/',$name3);
          }else{
            $name3 = $request->edit_ruta_factura_ext;
          }
        }else{
            $name3 = $data->ruta_factura_ext;
        }

        if($data->ruta_cotizacion_cliente == null || $data->ruta_cotizacion_cliente == "" ){
          if($request->hasFile('edit_ruta_cotizacion_cliente')){
              $file = $request->file('edit_ruta_cotizacion_cliente');
              $original = $file->getClientOriginalName();
              $name4 = "Cotizacion_TT".$data->id."_".$original;          
              $file->move(public_path().'/cotizaciones/',$name4);
          }else{
            $name4 = $request->edit_ruta_cotizacion_cliente;
          }
        }else{
            $name4 = $data->ruta_cotizacion_cliente;
        }

        if($data->ruta_importe_deposito_cliente == null || $data->ruta_importe_deposito_cliente == "" ){
          if($request->hasFile('edit_ruta_importe_deposito_cliente')){
              $file = $request->file('edit_ruta_importe_deposito_cliente');
              $original = $file->getClientOriginalName();
              $name5 = "DepositoC_TT".$data->id."_".$original;          
              $file->move(public_path().'/depositos_cliente/',$name5);
          }else{
            $name5 = $request->edit_ruta_importe_deposito_cliente;
          }
        }else{
            $name5 = $data->ruta_importe_deposito_cliente;
        }

        if($data->ruta_pedimento == null || $data->ruta_pedimento == "" ){
          if($request->hasFile('edit_ruta_pedimento')){
              $file = $request->file('edit_ruta_pedimento');
              $original = $file->getClientOriginalName();
              $name6 = "Pedimento_TT".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name6);
          }else{
            $name6 = $request->edit_ruta_pedimento;
          }
        }else{
            $name6 = $data->ruta_pedimento;
        }

        if($data->ruta_folio_cg == null || $data->ruta_folio_cg == "" ){
          if($request->hasFile('edit_ruta_folio_cg')){
              $file = $request->file('edit_ruta_folio_cg');
              $original = $file->getClientOriginalName();
              $name7 = "FolioCG_TT".$data->id."_".$original;          
              $file->move(public_path().'/folios_cg/',$name7);
          }else{
            $name7 = $request->edit_ruta_folio_cg;
          }
        }else{
            $name7 = $data->ruta_folio_cg;
        }

        if($data->ruta_facturado_cliente == null || $data->ruta_facturado_cliente == "" ){
          if($request->hasFile('edit_ruta_facturado_cliente')){
              $file = $request->file('edit_ruta_facturado_cliente');
              $original = $file->getClientOriginalName();
              $name8 = "importefac_TT".$data->id."_".$original;          
              $file->move(public_path().'/importes_facturados/',$name8);
          }else{
            $name8 = $request->edit_ruta_facturado_cliente;
          }
        }else{
            $name8 = $data->ruta_facturado_cliente;
        }

        if($data->ruta_costeo == null || $data->ruta_costeo == "" ){
          if($request->hasFile('edit_ruta_costeo')){
              $file = $request->file('edit_ruta_costeo');
              $original = $file->getClientOriginalName();
              $name9 = "Costeo_TT".$data->id."_".$original;          
              $file->move(public_path().'/costeos_totales/',$name9);
          }else{
            $name9 = $request->edit_ruta_costeo;
          }
        }else{
            $name9 = $data->ruta_costeo;
        }
//fin request archivos
      
        $data->id_cliente = $request->edit_id_cliente;
        $data->id_razon_datos_fac = $request->edit_id_razon_datos_fac; 
        $data->ruta_razonsocial = $name;
        $data->contacto_facturas_pagos = strtoupper($request->edit_contacto_facturas_pagos);
        $data->forma_pago = $request->edit_forma_pago;
        $data->pagamos_mercancia = $request->edit_pagamos_mercancia;
        $data->id_proveedor = $request->edit_id_proveedor;
        $data->ruta_proveedor = $name2;
        $data->valor_factura_ext = $request->edit_valor_factura_ext;
        $data->ruta_factura_ext = $name3;
        $data->se_emite_factura = $request->edit_se_emite_factura;
        $data->se_factura_valor_mercancia = $request->edit_se_factura_valor_mercancia;
        $data->id_aduana = $request->edit_id_aduana;
        $data->id_ejecutivo = $request->edit_id_ejecutivo;
        $data->id_estatus = $request->edit_id_estatus;
        $data->descripcion_operacion = strtoupper($request->edit_descripcion_operacion);
        $data->eta = $request->edit_eta;
        $data->fecha_despacho = $request->edit_fecha_despacho;
        $data->cotizacion_cliente_mxp = $request->edit_cotizacion_cliente_mxp;
        $data->ruta_cotizacion_cliente = $name4;
        $data->observaciones = strtoupper($request->edit_observaciones);
        $data->fecha_deposito_cliente = $request->edit_fecha_deposito_cliente;
        $data->importe_deposito_cliente = $request->edit_importe_deposito_cliente;
        $data->ruta_importe_deposito_cliente = $name5;
        $data->referencia = strtoupper($request->edit_referencia);
        $data->no_pedimento = strtoupper($request->edit_no_pedimento);
        $data->ruta_pedimento = $name6;
        $data->importe_cg = $request->edit_importe_cg;
        $data->fecha_cg = $request->edit_fecha_cg;
        $data->folio_cg = strtoupper($request->edit_folio_cg);
        $data->ruta_folio_cg = $name7;
        $data->importe_facturado_cliente = $request->edit_importe_facturado_cliente;
        $data->ruta_facturado_cliente = $name8;
        $data->costeo_total = $request->edit_costeo_total;
        $data->ruta_costeo = $name9;
        $data->cierre = $request->edit_cierre;
        $data->fecha_cierre = $request->edit_fecha_cierre;
        $data->id_user=Auth::User()->id;
        $data->save();        

        $notification = array(
        'message' => 'El Registro se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }

   public function cerrados()
    {

      $registros = Registro::whereraw('`fecha_cierre` is not null')->get();
      $registros->each(function($registros){
          $registros->aduana;
          $registros->cliente;
          $registros->clienter;
          $registros->ejecutivo;
          $registros->estatus;
          $registros->razon_social;
          $registros->user;
          $registros->proveedores;
      });      

      $clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
      $aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');
      $ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');
      $estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');
      $proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');


        return view('registros.cerrados')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores);
    }
}
