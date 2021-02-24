<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Registro;
use App\Registros_Nproveedores;
use App\Aduana;
use App\Cliente;
use App\Ejecutivo;
use App\Estatus;
use App\Forma_pago;
use App\Proveedor_externo;
use App\Razon_social_proveedor;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class RegistroController extends Controller
{
  public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

        public function index()
    {

        $hoy = Carbon::now();
        $today = $hoy->format('Y-m-d');
        $monthactual = $hoy->format('m');
        $yearactual = $hoy->format('y');
        $dayactual = $hoy->format('d');
        if($dayactual == '01'){
          $ho = "sii";
        }else{
           $ho = "noo";
        }


    	$registros = Registro::whereraw('`fecha_cierre` is null')->get();
      $registros->each(function($registros){
          $registros->aduana;
          $registros->cliente;
          $registros->clienter;
          $registros->ejecutivo;
          $registros->estatus;
          $registros->pago;
          $registros->user;
          $registros->proveedores;
      });      

    	$clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
    	$aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');
    	$ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');
    	$estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');
      $pagos = Forma_pago::orderBY('nombre_pago','ASC')->pluck('nombre_pago','id');
    	$proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');


        return view('registros.index')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores)->with('pagos',$pagos);
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

      $hoy = Carbon::now();
      $today = $hoy->format('Y-m-d');
      $monthactual = $hoy->format('m');
      $yearactual = $hoy->format('y'); 
      $dayactual = $hoy->format('d');     
    	$id = DB::table('registros')->orderBy('id', 'DESC')->first();
      $consecutivo = DB::table('registros')->orderBy('id', 'DESC')->first();

      if($consecutivo == null){$numeroc = 1;}else{$numeroc = $consecutivo->id+1;}
    	if($id == null){$numero = 1;}else{if($dayactual == '01'){$numero = 1;}else{$numero = $id->id+1;}}
      if($numero == 1 || $numero == 2 || $numero == 3 || $numero == 4 || $numero == 5 || $numero == 6 || $numero == 7 || $numero == 8 || $numero == 9){$numero = '0'.$numero;}

/// obtener nombre y archivos
        if($request->hasFile('ruta_razonsocial')){
            $file = $request->file('ruta_razonsocial');
            $original = $file->getClientOriginalName();
            $name = "Razon_D".$numero."_".$original;          
            $file->move(public_path().'/razon_social/',$name);
        }else{
            $name = $request->ruta_razonsocial;
        }

        if($request->hasFile('ruta_proveedor')){
            $file = $request->file('ruta_proveedor');
            $original = $file->getClientOriginalName();
            $name2 = "Proveedor_D".$numero."_".$original;          
            $file->move(public_path().'/proveedores/',$name2);
        }else{
            $name2 = $request->ruta_proveedor;
        }

        if($request->hasFile('ruta_factura_ext')){
            $file = $request->file('ruta_factura_ext');
            $original = $file->getClientOriginalName();
            $name3 = "facturaext_D".$numero."_".$original;          
            $file->move(public_path().'/facturasext/',$name3);
        }else{
            $name3 = $request->ruta_factura_ext;
        }

        if($request->hasFile('ruta_cotizacion_cliente')){
            $file = $request->file('ruta_cotizacion_cliente');
            $original = $file->getClientOriginalName();
            $name4 = "Cotizacion_D".$numero."_".$original;          
            $file->move(public_path().'/cotizaciones/',$name4);
        }else{
            $name4 = $request->ruta_cotizacion_cliente;
        }

        if($request->hasFile('ruta_importe_deposito_cliente')){
            $file = $request->file('ruta_importe_deposito_cliente');
            $original = $file->getClientOriginalName();
            $name5 = "DepositoC_D".$numero."_".$original;          
            $file->move(public_path().'/depositos_cliente/',$name5);
        }else{
            $name5 = $request->ruta_importe_deposito_cliente;
        }

        if($request->hasFile('ruta_pedimento')){
            $file = $request->file('ruta_pedimento');
            $original = $file->getClientOriginalName();
            $name6 = "Pedimento_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name6);
        }else{
            $name6 = $request->ruta_pedimento;
        }

        if($request->hasFile('ruta_folio_cg')){
            $file = $request->file('ruta_folio_cg');
            $original = $file->getClientOriginalName();
            $name7 = "FolioCG_D".$numero."_".$original;          
            $file->move(public_path().'/folios_cg/',$name7);
        }else{
            $name7 = $request->ruta_folio_cg;
        }

        if($request->hasFile('ruta_facturado_cliente')){
            $file = $request->file('ruta_facturado_cliente');
            $original = $file->getClientOriginalName();
            $name8 = "importefac_D".$numero."_".$original;          
            $file->move(public_path().'/importes_facturados/',$name8);
        }else{
            $name8 = $request->ruta_facturado_cliente;
        }

        if($request->hasFile('ruta_costeo')){
            $file = $request->file('ruta_costeo');
            $original = $file->getClientOriginalName();
            $name9 = "Costeo_D".$numero."_".$original;          
            $file->move(public_path().'/costeos_totales/',$name9);
        }else{
            $name9 = $request->ruta_costeo;
        }
///// fin request archivo



        $registro = new Registro();
     	  $registro->id =$numeroc;
      	$registro->no_operacion = "D".$yearactual. $monthactual.$numero;
      	$registro->id_cliente = $request->id_cliente;
      	$registro->id_razon_datos_fac = $request->id_razon_datos_fac; 
      	$registro->ruta_razonsocial = $name;
      	$registro->contacto_facturas_pagos = strtoupper($request->contacto_facturas_pagos);
      	$registro->forma_pago = $request->forma_pago;
      	$registro->pagamos_mercancia = $request->pagamos_mercancia;
        $registro->tipo_operacion = $request->tipo_operacion;
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

        //guardado de proveedores mas de 1
        $total = sizeof($request->id_proveedor);
        $prov = $request->id_proveedor;
        for($i=0;$i<$total;$i++){
          $proveedores = new Registros_Nproveedores();
          $proveedores->id_registro= $registro->id;
          $proveedores->id_proveedor= $prov[$i];
          $proveedores->save();
        }
        

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
              $name = "Razon_D".$data->id."_".$original;          
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
              $name2 = "Proveedor_D".$data->id."_".$original;          
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
              $name3 = "facturaext_D".$data->id."_".$original;          
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
              $name4 = "Cotizacion_D".$data->id."_".$original;          
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
              $name5 = "DepositoC_D".$data->id."_".$original;          
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
              $name6 = "Pedimento_D".$data->id."_".$original;          
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
              $name7 = "FolioCG_D".$data->id."_".$original;          
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
              $name8 = "importefac_D".$data->id."_".$original;          
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
              $name9 = "Costeo_D".$data->id."_".$original;          
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
        $data->tipo_operacion = $request->edit_tipo_operacion;
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


    public function registroproveedor(Request $request){
        if($request->ajax()){
          /// obtener nombre y archivos
          $id = $request->id;

          $regprov = Registros_Nproveedores::find($id);

          if($request->hasFile('ruta_proveedor_registro'.$id)){
            $file = $request->file('ruta_proveedor_registro'.$id);
            $original = $file->getClientOriginalName();

            $name = "Registro_D".$id."_".$original;          
            $file->move(public_path().'/proveedores/',$name);
          }else{
            $name = null;
          }
   
          $regprov->ruta_pdf=$name;
          $regprov->save();
        }      
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
          $registros->pago;
          $registros->razon_social;
          $registros->user;
          $registros->proveedores;
      });      

      $clientes = Cliente::orderBY('nombre_cliente','ASC')->pluck('nombre_cliente','id');
      $aduanas = Aduana::orderBY('nombre_aduana','ASC')->pluck('nombre_aduana','id');
      $ejecutivos = Ejecutivo::orderBY('nombre_ejecutivo','ASC')->pluck('nombre_ejecutivo','id');
      $estatus = Estatus::orderBY('nombre_estatus','ASC')->pluck('nombre_estatus','id');
      $pagos = Forma_pago::orderBY('nombre_pago','ASC')->pluck('nombre_pago','id');
      $proveedores = Proveedor_externo::orderBY('nombre_proveedor','ASC')->pluck('nombre_proveedor','id');


        return view('registros.cerrados')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores)->with('pagos',$pagos);
    }

  public function vistareportes(){
    return view('registros.reportes');
  }

  public function registroexportarpendientes(){
    Excel::create('Registros Pendientes', function($excel) {
            $excel->sheet('Registros Pendientes', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $products = Registro::from('registros')->leftjoin('aduanas','aduanas.id','=','registros.id_aduana')->leftjoin('clientes','clientes.id','=','registros.id_cliente')->leftjoin('clientes as clientes2','clientes2.id','=','registros.id_razon_datos_fac')->leftjoin('forma_pago','forma_pago.id','=','registros.forma_pago')->leftjoin('proveedor_externo','proveedor_externo.id','=','registros.id_proveedor')->leftjoin('ejecutivos','ejecutivos.id','=','registros.id_ejecutivo')->leftjoin('users','users.id','=','registros.id_user')->leftjoin('estatus','estatus.id','=','registros.id_estatus')->whereraw('`fecha_cierre` is null')->select(DB::raw('`registros`.id,
                  `registros`.no_operacion as Folio,
                  `clientes`.nombre_cliente as Cliente,
                  `clientes2`.nombre_cliente as Razon_social,
                  `registros`.contacto_facturas_pagos as Contacto_Facturas,
                  CASE WHEN `registros`.pagamos_mercancia = 1 THEN "SI"
                  ELSE "NO" 
                  END AS pagamos_mercancia,
                  CASE WHEN `registros`.tipo_operacion = 1 THEN "IMPORTACION"
                  ELSE "EXPORTACION" 
                  END AS tipo_operacion,
                  `proveedor_externo`.nombre_proveedor as Proveedor,
                  `registros`.valor_factura_ext as Valor_Factura,
                  CASE WHEN `registros`.se_emite_factura = 1 THEN "SI"
                  ELSE "NO" 
                  END AS se_emite_factura,
                  CASE WHEN `registros`.se_factura_valor_mercancia = 1 THEN "SI"
                  ELSE "NO" 
                  END AS se_factura_valor_mercancia,
                  `aduanas`.nombre_aduana as Aduana,
                  `ejecutivos`.nombre_ejecutivo as Ejecutivo,
                  `estatus`.nombre_estatus as Estatus,
                  `registros`.descripcion_operacion as Descripcion_operacion,
                  `registros`.eta as Eta,
                  `registros`.fecha_despacho as fecha_despacho,
                  `registros`.cotizacion_cliente_mxp as Cotizacion_cliente,
                  `registros`.observaciones as Observaciones,
                  `registros`.fecha_deposito_cliente as Fecha_deposito_cliente,
                  `registros`.importe_deposito_cliente as Importe_deposito_cliente,
                  `registros`.referencia as Referencia,
                  `registros`.no_pedimento as Pedimento,
                  `registros`.importe_cg as Importe_CG,
                  `registros`.fecha_cg as Fecha_CG,
                  `registros`.folio_cg as Folio_CG,
                  `registros`.importe_facturado_cliente as Importe_facturado,
                  `registros`.costeo_total as Costeo_Total,
                  `registros`.cierre as Cierre,
                  `registros`.fecha_cierre as Fecha_Cierre,
                  `users`.nombre as Usuario_Captura
                  '))->get();

                $sheet->setColumnFormat(array(
                    'AD' => '@',
                    'AE' => '@'
                ));  

                $sheet->fromArray($products);
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setBackground('#3F3F49');
                    $row->setFontColor('#ffffff');
                    $row->setValignment('center');
                });
                
                
            });
        })->export('xls');    
  }

  public function registroexportarC(){
    Excel::create('Registros Cerrados', function($excel) {
            $excel->sheet('Registros Cerrados', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $products = Registro::from('registros')->leftjoin('aduanas','aduanas.id','=','registros.id_aduana')->leftjoin('clientes','clientes.id','=','registros.id_cliente')->leftjoin('clientes as clientes2','clientes2.id','=','registros.id_razon_datos_fac')->leftjoin('forma_pago','forma_pago.id','=','registros.forma_pago')->leftjoin('proveedor_externo','proveedor_externo.id','=','registros.id_proveedor')->leftjoin('ejecutivos','ejecutivos.id','=','registros.id_ejecutivo')->leftjoin('users','users.id','=','registros.id_user')->leftjoin('estatus','estatus.id','=','registros.id_estatus')->whereraw('`fecha_cierre` is not null')->select(DB::raw('`registros`.id,
                  `registros`.no_operacion as Folio,
                  `clientes`.nombre_cliente as Cliente,
                  `clientes2`.nombre_cliente as Razon_social,
                  `registros`.contacto_facturas_pagos as Contacto_Facturas,
                  CASE WHEN `registros`.pagamos_mercancia = 1 THEN "SI"
                  ELSE "NO" 
                  END AS pagamos_mercancia,
                  CASE WHEN `registros`.tipo_operacion = 1 THEN "IMPORTACION"
                  ELSE "EXPORTACION" 
                  END AS tipo_operacion,
                  `proveedor_externo`.nombre_proveedor as Proveedor,
                  `registros`.valor_factura_ext as Valor_Factura,
                  CASE WHEN `registros`.se_emite_factura = 1 THEN "SI"
                  ELSE "NO" 
                  END AS se_emite_factura,
                  CASE WHEN `registros`.se_factura_valor_mercancia = 1 THEN "SI"
                  ELSE "NO" 
                  END AS se_factura_valor_mercancia,
                  `aduanas`.nombre_aduana as Aduana,
                  `ejecutivos`.nombre_ejecutivo as Ejecutivo,
                  `estatus`.nombre_estatus as Estatus,
                  `registros`.descripcion_operacion as Descripcion_operacion,
                  `registros`.eta as Eta,
                  `registros`.fecha_despacho as fecha_despacho,
                  `registros`.cotizacion_cliente_mxp as Cotizacion_cliente,
                  `registros`.observaciones as Observaciones,
                  `registros`.fecha_deposito_cliente as Fecha_deposito_cliente,
                  `registros`.importe_deposito_cliente as Importe_deposito_cliente,
                  `registros`.referencia as Referencia,
                  `registros`.no_pedimento as Pedimento,
                  `registros`.importe_cg as Importe_CG,
                  `registros`.fecha_cg as Fecha_CG,
                  `registros`.folio_cg as Folio_CG,
                  `registros`.importe_facturado_cliente as Importe_facturado,
                  `registros`.costeo_total as Costeo_Total,
                  `registros`.cierre as Cierre,
                  `registros`.fecha_cierre as Fecha_Cierre,
                  `users`.nombre as Usuario_Captura
                  '))->get();

                $sheet->setColumnFormat(array(
                    'AD' => '@',
                    'AE' => '@'
                ));  

                $sheet->fromArray($products);
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setBackground('#3F3F49');
                    $row->setFontColor('#ffffff');
                    $row->setValignment('center');
                });
                
                
            });
        })->export('xls');   
  }

  public function registroproveedores(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registros_Nproveedores::where('id_registro',$id)->get();
                $info->each(function($info){
                  $info->proveedores;
                }); 
                return response()->json($info);

            }    
  }
}
