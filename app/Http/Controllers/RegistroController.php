<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Registro;
use App\Registros_Nproveedores;
use App\Registros_nadicionales;
use App\Registros_nvalor_fac;
use App\Registros_nimpo_depo_cli;
use App\Registros_nfecha_dep_cli;
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
use Mail;


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


    	$registros = Registro::from('registros')->leftjoin('registros_nvalor_fac','registros.id','=','registros_nvalor_fac.id_registro')->groupBy('id')->whereraw('`fecha_cierre` is null')->select(DB::raw('registros.*,group_concat(distinct registros_nvalor_fac.no_factura) as no_factura'))->get();
    
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
      $ejecutivos_dombart = User::orderBY('nombre','ASC')->pluck('nombre','id');


        return view('registros.index')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores)->with('pagos',$pagos)->with('ejecutivos_dombart',$ejecutivos_dombart);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Registro::find($id);
                $usuario = User::find($info->id_user);
                $cliente = Cliente::find($info->id_cliente);
                $valfacext = Registros_nvalor_fac::where('id_registro',$id)->get();
                $fecdepcli = Registros_nfecha_dep_cli::where('id_registro',$id)->get();
                $impdepcli = Registros_nimpo_depo_cli::where('id_registro',$id)->get();
                $tipo_usuario = $usuario->tipo_usuario;
                return response()->json(array('info'=>$info,'usuario'=>$usuario,'cliente'=>$cliente,'valfacext'=>$valfacext,'fecdepcli'=>$fecdepcli,'impdepcli'=>$impdepcli,'tipo_usuario'=>$tipo_usuario));

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
      $consecutivo = DB::table('registros')->orderBy('id', 'DESC')->first()->no_operacion;

      $numero = $this->consecutivo_ref($consecutivo);
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


        // if($request->hasFile('ruta_factura_ext')){
        //     $file = $request->file('ruta_factura_ext');
        //     $original = $file->getClientOriginalName();
        //     $name3 = "facturaext_D".$numero."_".$original;          
        //     $file->move(public_path().'/facturasext/',$name3);
        // }else{
        //     $name3 = $request->ruta_factura_ext;
        // }

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

//rutas de pedimento 1 al 6
        if($request->hasFile('ruta_pedimento')){
            $file = $request->file('ruta_pedimento');
            $original = $file->getClientOriginalName();
            $name6 = "Pedimento_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name6);
        }else{
            $name6 = $request->ruta_pedimento;
        }

        if($request->hasFile('ruta_pedimento2')){
            $file = $request->file('ruta_pedimento2');
            $original = $file->getClientOriginalName();
            $name10 = "Pedimento2_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name10);
        }else{
            $name10 = $request->ruta_pedimento2;
        }

        if($request->hasFile('ruta_pedimento3')){
            $file = $request->file('ruta_pedimento3');
            $original = $file->getClientOriginalName();
            $name11 = "Pedimento3_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name11);
        }else{
            $name11 = $request->ruta_pedimento3;
        }

        if($request->hasFile('ruta_pedimento4')){
            $file = $request->file('ruta_pedimento4');
            $original = $file->getClientOriginalName();
            $name12 = "Pedimento4_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name12);
        }else{
            $name12 = $request->ruta_pedimento4;
        }

        if($request->hasFile('ruta_pedimento5')){
            $file = $request->file('ruta_pedimento5');
            $original = $file->getClientOriginalName();
            $name13 = "Pedimento5_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name13);
        }else{
            $name13 = $request->ruta_pedimento5;
        }

        if($request->hasFile('ruta_pedimento6')){
            $file = $request->file('ruta_pedimento6');
            $original = $file->getClientOriginalName();
            $name14 = "Pedimento6_D".$numero."_".$original;          
            $file->move(public_path().'/pedimentos/',$name14);
        }else{
            $name14 = $request->ruta_pedimento6;
        }

//fin rutas de pedimento

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
     	  $registro->id =$numero;
      	$registro->no_operacion = "D".$yearactual. $monthactual.$numero;
      	$registro->id_cliente = $request->id_cliente;
      	$registro->id_razon_datos_fac = $request->id_razon_datos_fac; 
      	$registro->ruta_razonsocial = $name;
      	$registro->contacto_facturas_pagos = strtoupper($request->contacto_facturas_pagos);
      	$registro->forma_pago = $request->forma_pago;
      	$registro->pagamos_mercancia = $request->pagamos_mercancia;
        $registro->tipo_operacion = $request->tipo_operacion;
      	$registro->ruta_proveedor = $name2;
      	// $registro->ruta_factura_ext = $name3;
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
      	$registro->ruta_importe_deposito_cliente = $name5;
      	$registro->referencia = strtoupper($request->referencia);
      	$registro->no_pedimento = strtoupper($request->no_pedimento);
        $registro->no_pedimento2 = strtoupper($request->no_pedimento2);
        $registro->no_pedimento3 = strtoupper($request->no_pedimento3);
        $registro->no_pedimento4 = strtoupper($request->no_pedimento4);
        $registro->no_pedimento5 = strtoupper($request->no_pedimento5);
        $registro->no_pedimento6 = strtoupper($request->no_pedimento6);
        $registro->obs_pedimento1 = strtoupper($request->obs_pedimento1);
        $registro->obs_pedimento2 = strtoupper($request->obs_pedimento2);
        $registro->obs_pedimento3 = strtoupper($request->obs_pedimento3);
        $registro->obs_pedimento4 = strtoupper($request->obs_pedimento4);
        $registro->obs_pedimento5 = strtoupper($request->obs_pedimento5);
        $registro->obs_pedimento6 = strtoupper($request->obs_pedimento6);
      	$registro->ruta_pedimento = $name6;
        $registro->ruta_pedimento2 = $name10;
        $registro->ruta_pedimento3= $name11;
        $registro->ruta_pedimento4 = $name12;
        $registro->ruta_pedimento5 = $name13;
        $registro->ruta_pedimento6 = $name14;
      	$registro->importe_cg = $request->importe_cg;
      	$registro->fecha_cg = $request->fecha_cg;
      	$registro->folio_cg = strtoupper($request->folio_cg);
      	$registro->ruta_folio_cg = $name7;
        $registro->folio_cfdi=$request->folio_cfdi;
      	$registro->importe_facturado_cliente = $request->importe_facturado_cliente;
      	$registro->ruta_facturado_cliente = $name8;
      	$registro->costeo_total = $request->costeo_total;
      	$registro->ruta_costeo = $name9;
        $registro->condicion_pago=$request->condicion_pago;
        $registro->fecha_condicionp=$request->fecha_condicionp;
        $registro->facturacionxconcepto=$request->facturacionxconcepto;
        $registro->importe_comision=$request->importe_comision;
        $registro->importe_devuelto=$request->importe_devuelto;
        $registro->tipo_importacion=$request->tipo_importacion;
        $registro->fecha_pedimento_importacion=$request->fecha_pedimento_importacion;
      	$registro->cierre = $request->cierre;
        $registro->check_pago=$request->checkpago;
        $registro->check_tipo_imp=$request->checktipoimpo;
      	$registro->fecha_cierre = $request->fecha_cierre;
        $registro->id_user=Auth::User()->id;


        //guardado informacion de contabilidad
        $registro->fecha_factura_fiscal = $request->fecha_factura_fiscal;
        $registro->estatus_contabilidad = $request->estatus_contabilidad;
        $registro->saldo_pendiente_cobro = $request->saldo_pendiente_cobro;
        $registro->moneda_facturacion = $request->moneda_facturacion;
        $registro->tc_contable = $request->tc_contable;
        $registro->ingreso_real_contable = $request->ingreso_real_contable;
        $registro->costo_real_contable = $request->costo_real_contable;
        $registro->ganancia_real_contable = $request->ganancia_real_contable;
        $registro->ejecutivo_dombart = $request->ejecutivo_dombart;


        //guardado de proveedores mas de 1
        $total = sizeof($request->id_proveedor);
        $prov = $request->id_proveedor;
        for($i=0;$i<$total;$i++){
          $proveedores = new Registros_Nproveedores();
          $proveedores->id_registro= $registro->id;
          $proveedores->id_proveedor= $prov[$i];
          $proveedores->save();
        }

        //guardado de valor factura extranjero mas de 1
        if($request->valor_factura_ext[0] == null || $request->valor_factura_ext[0] == "" ){

        }else{
          $totalvalor_fac = sizeof($request->valor_factura_ext);
          $valorf = $request->valor_factura_ext;

          for($j=0;$j<$totalvalor_fac;$j++){
            //guardado de archivos
            $fil = $request->ruta_factura_ext[$j];
            if(is_file($fil)){
              //guardado de archivos
              // $file = $request->file('ruta_factura_ext['.$j.']');
              $original = $fil->getClientOriginalName();
              $namerfe = "facturaext_".$numero."_".$original;          
              $fil->move(public_path().'/facturasext/',$namerfe);
            }else{
              $namerfe = $request->ruta_factura_ext[$j];
            }

            $valorfac = new Registros_nvalor_fac();
            $valorfac->id_registro= $registro->id;
            $valorfac->valor_factura_ext= $valorf[$j];
            $valorfac->ruta_archivo = $namerfe;
            $valorfac->moneda=strtoupper($request->moneda_valorfac[$j]);
            $valorfac->no_factura= strtoupper($request->no_factura[$j]);
            $valorfac->save();
          }          
        }

        //guardado de fecha de deposito mas de 1
        if($request->fecha_deposito_cliente[0] == null){

        }else{
          $totalfecha_dep_cli = sizeof($request->fecha_deposito_cliente);
          $valorfech_dep_cli = $request->fecha_deposito_cliente;
          for($k=0;$k<$totalfecha_dep_cli;$k++){
            $valorfecha_dep = new Registros_nfecha_dep_cli();
            $valorfecha_dep->id_registro= $registro->id;
            $valorfecha_dep->fecha_deposito_cliente= $valorfech_dep_cli[$k];
            $valorfecha_dep->save();
          }
        }

        //guardado de importe deposito cliente mas de 1
        if($request->importe_deposito_cliente[0] ==  null){

        }else{
          $total_dep_cli = sizeof($request->importe_deposito_cliente);
          $valor_dep_cliente = $request->importe_deposito_cliente;
          for($l=0;$l<$total_dep_cli;$l++){
            $valor_dep_cli = new Registros_nimpo_depo_cli();
            $valor_dep_cli->id_registro= $registro->id;
            $valor_dep_cli->importe_deposito_cliente= $valor_dep_cliente[$l];
            $valor_dep_cli->save();
          } 
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

        // if($data->ruta_factura_ext == null || $data->ruta_factura_ext == "" ){
        //   if($request->hasFile('edit_ruta_factura_ext')){
        //       $file = $request->file('edit_ruta_factura_ext');
        //       $original = $file->getClientOriginalName();
        //       $name3 = "facturaext_D".$data->id."_".$original;          
        //       $file->move(public_path().'/facturasext/',$name3);
        //   }else{
        //     $name3 = $request->edit_ruta_factura_ext;
        //   }
        // }else{
        //     $name3 = $data->ruta_factura_ext;
        // }

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

        //rutas file pedimentos del 1 al 6
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

        if($data->ruta_pedimento2 == null || $data->ruta_pedimento2 == "" ){
          if($request->hasFile('edit_ruta_pedimento2')){
              $file = $request->file('edit_ruta_pedimento2');
              $original = $file->getClientOriginalName();
              $name10 = "Pedimento2_D".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name10);
          }else{
            $name10 = $request->edit_ruta_pedimento2;
          }
        }else{
            $name10 = $data->ruta_pedimento2;
        }


        if($data->ruta_pedimento3 == null || $data->ruta_pedimento3 == "" ){
          if($request->hasFile('edit_ruta_pedimento3')){
              $file = $request->file('edit_ruta_pedimento3');
              $original = $file->getClientOriginalName();
              $name11 = "Pedimento3_D".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name11);
          }else{
            $name11 = $request->edit_ruta_pedimento3;
          }
        }else{
            $name11 = $data->ruta_pedimento3;
        }


        if($data->ruta_pedimento4 == null || $data->ruta_pedimento4 == "" ){
          if($request->hasFile('edit_ruta_pedimento4')){
              $file = $request->file('edit_ruta_pedimento4');
              $original = $file->getClientOriginalName();
              $name12 = "Pedimento4_D".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name12);
          }else{
            $name12 = $request->edit_ruta_pedimento4;
          }
        }else{
            $name12 = $data->ruta_pedimento4;
        }


        if($data->ruta_pedimento5 == null || $data->ruta_pedimento5 == "" ){
          if($request->hasFile('edit_ruta_pedimento5')){
              $file = $request->file('edit_ruta_pedimento5');
              $original = $file->getClientOriginalName();
              $name13 = "Pedimento5_D".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name13);
          }else{
            $name13 = $request->edit_ruta_pedimento5;
          }
        }else{
            $name13 = $data->ruta_pedimento5;
        }


        if($data->ruta_pedimento6 == null || $data->ruta_pedimento6 == "" ){
          if($request->hasFile('edit_ruta_pedimento6')){
              $file = $request->file('edit_ruta_pedimento6');
              $original = $file->getClientOriginalName();
              $name14 = "Pedimento6_D".$data->id."_".$original;          
              $file->move(public_path().'/pedimentos/',$name14);
          }else{
            $name14 = $request->edit_ruta_pedimento6;
          }
        }else{
            $name14 = $data->ruta_pedimento6;
        }
        //fin de rutas pedimentos
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
        // $data->ruta_factura_ext = $name3;
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
        $data->ruta_importe_deposito_cliente = $name5;
        $data->referencia = strtoupper($request->edit_referencia);
        $data->no_pedimento = strtoupper($request->edit_no_pedimento);
        $data->no_pedimento2 = strtoupper($request->edit_no_pedimento2);
        $data->no_pedimento3 = strtoupper($request->edit_no_pedimento3);
        $data->no_pedimento4 = strtoupper($request->edit_no_pedimento4);
        $data->no_pedimento5 = strtoupper($request->edit_no_pedimento5);
        $data->no_pedimento6 = strtoupper($request->edit_no_pedimento6);
        $data->obs_pedimento1 = strtoupper($request->edit_obs_pedimento1);
        $data->obs_pedimento2 = strtoupper($request->edit_obs_pedimento2);
        $data->obs_pedimento3 = strtoupper($request->edit_obs_pedimento3);
        $data->obs_pedimento4 = strtoupper($request->edit_obs_pedimento4);
        $data->obs_pedimento5 = strtoupper($request->edit_obs_pedimento5);
        $data->obs_pedimento6 = strtoupper($request->edit_obs_pedimento6);
        $data->ruta_pedimento = $name6;
        $data->ruta_pedimento2 = $name10;
        $data->ruta_pedimento3 = $name11;
        $data->ruta_pedimento4 = $name12;
        $data->ruta_pedimento5 = $name13;
        $data->ruta_pedimento6 = $name14;
        $data->importe_cg = $request->edit_importe_cg;
        $data->fecha_cg = $request->edit_fecha_cg;
        $data->folio_cg = strtoupper($request->edit_folio_cg);
        $data->ruta_folio_cg = $name7;
        $data->folio_cfdi=$request->folio_cfdi_edit;
        $data->importe_facturado_cliente = $request->edit_importe_facturado_cliente;
        $data->ruta_facturado_cliente = $name8;
        $data->costeo_total = $request->edit_costeo_total;
        $data->ruta_costeo = $name9;
        $data->condicion_pago=$request->condicion_pago_edit;
        $data->fecha_condicionp=$request->fecha_condicionp_edit;
        $data->facturacionxconcepto=$request->facturacionxconcepto_edit;
        $data->importe_comision=$request->importe_comision_edit;
        $data->importe_devuelto=$request->importe_devuelto_edit;
        $data->tipo_importacion=$request->tipo_importacion_edit;
        $data->fecha_pedimento_importacion=$request->fecha_pedimento_importacion_edit;
        $data->cierre = $request->edit_cierre;
        $data->fecha_cierre = $request->edit_fecha_cierre;
        $data->check_pago=$request->checkpago_edit;
        $data->check_tipo_imp=$request->checktipoimpo_edit;
        $data->id_user=Auth::User()->id;

        $data->fecha_factura_fiscal = $request->edit_fecha_factura_fiscal;
        $data->estatus_contabilidad = $request->edit_estatus_contabilidad;
        $data->saldo_pendiente_cobro = $request->edit_saldo_pendiente_cobro;
        $data->moneda_facturacion = $request->edit_moneda_facturacion;
        $data->tc_contable = $request->edit_tc_contable;
        $data->ingreso_real_contable = $request->edit_ingreso_real_contable;
        $data->costo_real_contable = $request->edit_costo_real_contable;
        $data->ganancia_real_contable = $request->edit_ganancia_real_contable;
        $data->ejecutivo_dombart = $request->edit_ejecutivo_dombart;

        $data->save();        

        /// valor factura ext
        $numRegval = sizeof(Registros_nvalor_fac::where('id_registro',$id)->get());

        $numReqval = sizeof($request->edit_valor_factura_ext);
        $dataRegval = Registros_nvalor_fac::where('id_registro',$id)->get();
        $requestarchivo = sizeof($request->edit_ruta_factura_ext);
        //si el numero de registros de la BD es igual al numero de arreglo del request soo actualiza valores
      if($request->edit_valor_factura_ext[0] == null || $request->edit_valor_factura_ext[0] == ""){
      }else{
        if($numRegval == $numReqval){
          for ($i=0; $i < $numReqval; $i++) { 

            $numer = Registros_nvalor_fac::find($dataRegval[$i]->id);
            $numer->valor_factura_ext=$request->edit_valor_factura_ext[$i];
            $numer->moneda=strtoupper($request->edit_moneda_valorfac[$i]);
            $numer->no_factura=strtoupper($request->edit_no_factura[$i]);
            
            if($numer->ruta_archivo == null || $numer->ruta_archivo == ""){
              $fil = $request->edit_ruta_factura_ext[$i];
              if(is_file($fil)){
                  //guardado de archivos
                  // $file = $request->file('ruta_factura_ext['.$j.']');
                  $original = $fil->getClientOriginalName();
                  $namerfe = "facturaext_".$data->id."_".$original;          
                  $fil->move(public_path().'/facturasext/',$namerfe);
              }else{
                  $namerfe = $numer->ruta_archivo;
              }
                  $numer->ruta_archivo = $namerfe;
                $numer->save();
            }
          }
        }else{
          // de lo contrario si son mas valores inserta
          // $diferencia = $numReqval - $numRegval;
          $contador = 0;
          for ($j=$numRegval; $j < $numReqval ; $j++) { 
            if($contador < $requestarchivo){
              $fil = $request->edit_ruta_factura_ext[$contador];
              if(is_file($fil)){
                //guardado de archivos
                // $file = $request->file('ruta_factura_ext['.$j.']');
                $original = $fil->getClientOriginalName();
                $namerfe = "facturaext_".$data->id."_".$original;          
                $fil->move(public_path().'/facturasext/',$namerfe);
              }else{
                $name = $request->ruta_factura_ext[$contador];
              } 
            } 
              $contador++;
            $insert = new Registros_nvalor_fac();
            $insert->id_registro = $id;
            $insert->valor_factura_ext = $request->edit_valor_factura_ext[$j];
            $insert->moneda = strtoupper($request->edit_moneda_valorfac[$j]);
            $insert->no_factura = strtoupper($request->edit_no_factura[$j]);
            $insert->ruta_archivo = $namerfe;
            $insert->save();
          }
        }//fin actualiza valor fac ext
      }
        

        /// actualiza fecha deposito cliente
        $numRegvalfdc = sizeof(Registros_nfecha_dep_cli::where('id_registro',$id)->get());

        $numReqvalfdc = sizeof($request->edit_fecha_deposito_cliente);
        $dataRegvalfdc = Registros_nfecha_dep_cli::where('id_registro',$id)->get();
  
        //si el numero de registros de la BD es igual al numero de arreglo del request soo actualiza valores
      if($request->edit_fecha_deposito_cliente[0] == null || $request->edit_fecha_deposito_cliente[0] == ""){
      }else{
        if($numRegvalfdc == $numReqvalfdc){
          for ($ifdc=0; $ifdc < $numReqvalfdc; $ifdc++) { 
            $numerfdc = Registros_nfecha_dep_cli::find($dataRegvalfdc[$ifdc]->id);
            $numerfdc->fecha_deposito_cliente=$request->edit_fecha_deposito_cliente[$ifdc];
            $numerfdc->save();
          }
        }else{
          // de lo contrario si son mas valores inserta
          // $diferencia = $numReqval - $numRegval;
          for ($jfdc=$numRegvalfdc; $jfdc < $numReqvalfdc ; $jfdc++) { 
            $insertfdc = new Registros_nfecha_dep_cli();
            $insertfdc->id_registro = $id;
            $insertfdc->fecha_deposito_cliente = $request->edit_fecha_deposito_cliente[$jfdc];
            $insertfdc->save();
          }
        }//fin actualiza fecha deposito
      }
        
        /// actualiza importe deposito cliente
        $numRegvalidc = sizeof(Registros_nimpo_depo_cli::where('id_registro',$id)->get());

        $numReqvalidc = sizeof($request->edit_importe_deposito_cliente);
        $dataRegvalidc = Registros_nimpo_depo_cli::where('id_registro',$id)->get();
  
        //si el numero de registros de la BD es igual al numero de arreglo del request soo actualiza valores
      if($request->edit_importe_deposito_cliente[0] == null || $request->edit_importe_deposito_cliente[0] == ""){
      }else{
        if($numRegvalidc == $numReqvalidc){
          for ($impdc=0; $impdc < $numReqvalidc; $impdc++) { 
            $numeridc = Registros_nimpo_depo_cli::find($dataRegvalidc[$impdc]->id);
            $numeridc->importe_deposito_cliente=$request->edit_importe_deposito_cliente[$impdc];
            $numeridc->save();
          }
        }else{
          // de lo contrario si son mas valores inserta
          // $diferencia = $numReqval - $numRegval;
          for ($jidc=$numRegvalidc; $jidc < $numReqvalidc ; $jidc++) { 
            $insertidc = new Registros_nimpo_depo_cli();
            $insertidc->id_registro = $id;
            $insertidc->importe_deposito_cliente = $request->edit_importe_deposito_cliente[$jidc];
            $insertidc->save();
          }
        }//fin actualiza importe deposito cliente
      }
        
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


    public function fileadicional(Request $request){
        if($request->ajax()){
          $id = $request->id;
          $req = $request->ruta_archivo_fac;
          $reqcot = $request->ruta_archivo_cot;
          $reqdep = $request->ruta_archivo_dep;
          $reqcg = $request->ruta_archivo_cg;
          $reqfac = $request->ruta_archivo_facturado;
          $reqped = $request->pedimento_adicional;
          $reqpedfile = $request->ruta_pedimento_adicional;


          if($req != null || $req != "" || $reqcot != null || $reqcot != ""  || $reqdep != null || $reqdep != "" || $reqcg != null || $reqcg != "" || $reqfac != null || $reqfac != "" || $reqped[0] != null || $reqped[0] != "" ){
            
            //guardado archivos factura
            if($req != null || $req != ""){
              $total_ad_fac = sizeof($request->ruta_archivo_fac);
              $ad_fac = $request->ruta_archivo_fac;
              for($i=0;$i<$total_ad_fac;$i++){
                if($request->hasFile('ruta_archivo_fac.'.(string)$i)){
                $file = $request->file('ruta_archivo_fac.'.(string)$i);
                $original = $file->getClientOriginalName();
                $name = "Reg_ad_fac_D".$id."_".$original;          
                $file->move(public_path().'/adicionales/',$name);
                  $adiciopnal_fac = new Registros_nadicionales();
                  $adiciopnal_fac->id_registro= $id;
                  $adiciopnal_fac->tipo_archivo = 1;
                  $adiciopnal_fac->ruta_archivo= $name;
                  $adiciopnal_fac->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }//fin guardado factura
            //guardado archivos cotizacion 
            if($reqcot != null || $reqcot != ""){
              $total_ad_cot = sizeof($request->ruta_archivo_cot);
              $ad_fac = $request->ruta_archivo_cot;
              for($j=0;$j<$total_ad_cot;$j++){
                if($request->hasFile('ruta_archivo_cot.'.(string)$j)){
                $file_cot = $request->file('ruta_archivo_cot.'.(string)$j);
                $original_cot = $file_cot->getClientOriginalName();
                $name_cot = "Reg_ad_cot_D".$id."_".$original_cot;          
                $file_cot->move(public_path().'/adicionales/',$name_cot);
                  $adiciopnal_cot = new Registros_nadicionales();
                  $adiciopnal_cot->id_registro= $id;
                  $adiciopnal_cot->tipo_archivo = 2;
                  $adiciopnal_cot->ruta_archivo= $name_cot;
                  $adiciopnal_cot->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }//fin guardado cotizacion

            //guardado archivos deposito 
            if($reqdep != null || $reqdep != ""){
              $total_ad_dep = sizeof($request->ruta_archivo_dep);
              $ad_dep = $request->ruta_archivo_dep;
              for($k=0;$k<$total_ad_dep;$k++){
                if($request->hasFile('ruta_archivo_dep.'.(string)$k)){
                $file_dep = $request->file('ruta_archivo_dep.'.(string)$k);
                $original_dep = $file_dep->getClientOriginalName();
                $name_dep = "Reg_ad_dep_D".$id."_".$original_dep;          
                $file_dep->move(public_path().'/adicionales/',$name_dep);
                  $adiciopnal_dep = new Registros_nadicionales();
                  $adiciopnal_dep->id_registro= $id;
                  $adiciopnal_dep->tipo_archivo = 3;
                  $adiciopnal_dep->ruta_archivo= $name_dep;
                  $adiciopnal_dep->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }//fin guardado deposito

            //guardado archivos cg 
            if($reqcg != null || $reqcg != ""){
              $total_ad_cg = sizeof($request->ruta_archivo_cg);
              $ad_cg = $request->ruta_archivo_cg;
              for($l=0;$l<$total_ad_cg;$l++){
                if($request->hasFile('ruta_archivo_cg.'.(string)$l)){
                $file_cg = $request->file('ruta_archivo_cg.'.(string)$l);
                $original_cg = $file_cg->getClientOriginalName();
                $name_cg = "Reg_ad_cg_D".$id."_".$original_cg;          
                $file_cg->move(public_path().'/adicionales/',$name_cg);
                  $adiciopnal_cg = new Registros_nadicionales();
                  $adiciopnal_cg->id_registro= $id;
                  $adiciopnal_cg->tipo_archivo = 4;
                  $adiciopnal_cg->ruta_archivo= $name_cg;
                  $adiciopnal_cg->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }//fin guardado cg

              //guardado archivos facturado 
            if($reqfac != null || $reqfac != ""){
              $total_ad_facturado = sizeof($request->ruta_archivo_facturado);
              $ad_facturado = $request->ruta_archivo_facturado;
              for($m=0;$m<$total_ad_facturado;$m++){
                if($request->hasFile('ruta_archivo_facturado.'.(string)$m)){
                $file_facturado = $request->file('ruta_archivo_facturado.'.(string)$m);
                $original_facturado = $file_facturado->getClientOriginalName();
                $name_facturado = "Reg_ad_facturado_D".$id."_".$original_facturado;          
                $file_facturado->move(public_path().'/adicionales/',$name_facturado);
                  $adiciopnal_facturado = new Registros_nadicionales();
                  $adiciopnal_facturado->id_registro= $id;
                  $adiciopnal_facturado->tipo_archivo = 5;
                  $adiciopnal_facturado->ruta_archivo= $name_facturado;
                  $adiciopnal_facturado->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }//fin guardado facturado


            //guardado pedimento y archivo 
            if(($reqped[0] != null || $reqped[0] != "") && ($reqpedfile!= null || $reqpedfile!= "")){
              $total_ped = sizeof($request->pedimento_adicional);
              $ad_pedimento = $request->pedimento_adicional;
              for($n=0;$n<$total_ped;$n++){
                if($request->hasFile('ruta_pedimento_adicional.'.(string)$n)){
                $file_pedimento = $request->file('ruta_pedimento_adicional.'.(string)$n);
                $original_pedimento = $file_pedimento->getClientOriginalName();
                $name_pedimento = "Reg_ad_pedimento_D".$id."_".$original_pedimento;          
                $file_pedimento->move(public_path().'/adicionales/',$name_pedimento);
                  $adiciopnal_pedimento = new Registros_nadicionales();
                  $adiciopnal_pedimento->id_registro= $id;
                  $adiciopnal_pedimento->tipo_archivo = 6;
                  $adiciopnal_pedimento->pedimento= $ad_pedimento[$n];
                  $adiciopnal_pedimento->ruta_archivo= $name_pedimento;
                  $adiciopnal_pedimento->save();
                  $info = "Registros guardados correctamente";            
                }else{
                   $info = "Error el tipo de archivo no corresponde revisa";
                }
              }
            }else if(($reqped[0] == null || $reqped[0] == "") && ($reqpedfile== null || $reqpedfile== "")){

            }else{
               $info = "Error para capturar el pedimento necesitas guardar el numero y el archivo revisar";
            }//fin guardado pedimento

          }else{
            $info = "no se encontro registros";
          }

          return response()->json($info);
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
      $ejecutivos_dombart = User::orderBY('nombre','ASC')->pluck('nombre','id');


        return view('registros.cerrados')->with('registros',$registros)->with('clientes',$clientes)->with('aduanas',$aduanas)->with('ejecutivos',$ejecutivos)->with('estatus',$estatus)->with('proveedores',$proveedores)->with('pagos',$pagos)->with('ejecutivos_dombart',$ejecutivos_dombart);
    }

  public function vistareportes(){
    return view('registros.reportes');
  }

  public function reporte_contabilidad(){
   
    $ejecutivos = User::pluck('nombre','id');
    $clientes = Cliente::pluck('nombre_cliente','id');
    return view('registros.reporte_contabilidad')->with('ejecutivos',$ejecutivos)->with('clientes',$clientes);
  }

  public function reporte_operaciones(){
    $clientes = Cliente::pluck('nombre_cliente','id');
    $aduanas = Aduana::pluck('nombre_aduana','id');
    return view('registros.reporte_operaciones')->with('clientes',$clientes)->with('aduanas',$aduanas);
  }

  public function registroexportarpendientes(){
    Excel::create('Registros Pendientes', function($excel) {
            $excel->sheet('Registros Pendientes', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $products = Registro::from('registros')->leftjoin('aduanas','aduanas.id','=','registros.id_aduana')->leftjoin('clientes','clientes.id','=','registros.id_cliente')->leftjoin('clientes as clientes2','clientes2.id','=','registros.id_razon_datos_fac')->leftjoin('forma_pago','forma_pago.id','=','registros.forma_pago')->leftjoin('ejecutivos','ejecutivos.id','=','registros.id_ejecutivo')->leftjoin('users','users.id','=','registros.id_user')->leftjoin('estatus','estatus.id','=','registros.id_estatus')->whereraw('`fecha_cierre` is null')->select(DB::raw('`registros`.id,
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
                $products = Registro::from('registros')->leftjoin('aduanas','aduanas.id','=','registros.id_aduana')->leftjoin('clientes','clientes.id','=','registros.id_cliente')->leftjoin('clientes as clientes2','clientes2.id','=','registros.id_razon_datos_fac')->leftjoin('forma_pago','forma_pago.id','=','registros.forma_pago')->leftjoin('ejecutivos','ejecutivos.id','=','registros.id_ejecutivo')->leftjoin('users','users.id','=','registros.id_user')->leftjoin('estatus','estatus.id','=','registros.id_estatus')->whereraw('`fecha_cierre` is not null')->select(DB::raw('`registros`.id,
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


  public function registroadicional(Request $request){
    if($request->ajax()){
      $id = $request->id;
      $infofac = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',1)->get();
      $infocot = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',2)->get();
      $infodep = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',3)->get();
      $infocg = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',4)->get();
      $infof = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',5)->get();
      $infoped = Registros_nadicionales::where('id_registro',$id)->where('tipo_archivo',6)->get();
            return response()->json(['infofac'=>$infofac,'infocot'=>$infocot,'infodep'=>$infodep,'infocg'=>$infocg,'infof'=>$infof,'infoped'=>$infoped]);
    }    
  }

  public function eliminarvalfac(Request $request){
    if($request->ajax()){
       $id = $request->id;
       $info = Registros_nvalor_fac::destroy($id);
       return response()->json($info);
    }
  }

  public function eliminarvalorfdc(Request $request){
    if($request->ajax()){
       $id = $request->id;
       $info = Registros_nfecha_dep_cli::destroy($id);
       return response()->json($info);
    }
  }

  public function eliminarvaloridc(Request $request){
    if($request->ajax()){
       $id = $request->id;
       $info = Registros_nimpo_depo_cli::destroy($id);
       return response()->json($info);
    }
  }

  public function condicionespago(){
    //creditos vencidos
    
    $date1 = Carbon::now('America/Mexico_City');
    $date1 = $date1->format('Y-m-d');
    $registros = Registro::whereRaw("`fecha_condicionp` < '".$date1."' and (`check_pago` = 0 or `check_pago` is null) ")->get();
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
    
    if(sizeof($registros) != null or sizeof($registros) != ""){
      $user = User::find($registros[0]->id_user)->email;
      $date = "Creditos Vencidos";
        Mail::send("correo",['date'=>$date,'registros'=>$registros], function($message) use ($date,$date1,$user){  $message->from("notificaciones@dombart.mx","Notificaciones Dombart");
                    $message->to($user)->subject("Aviso vencimiento de crédito");
                    $message->cc('trafico@dombart.mx');
                    $message->cc('jorgedavidb@aavs.mx');
                    $message->cc('gerencia@dombart.mx');

        });
    }

  }

  public function operaciontemporal(){
    //operaciones temporales
    $date1 = Carbon::now('America/Mexico_City');
    $date1 = $date1->format('Y-m-d');
    $registros = Registro::whereRaw("`fecha_pedimento_importacion` < '".$date1."' and (`check_tipo_imp` = 0 or `check_tipo_imp` is null )")->get();
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

    
    if(sizeof($registros) != null){
      $user = User::find($registros[0]->id_user)->email;
      $date = "Operaciones Temporales";
          Mail::send("correo_impotemporal",['date'=>$date,'registros'=>$registros], function($message) use ($date,$date1,$user){  $message->from("notificaciones@dombart.mx");
                      $message->to($user)->subject("Aviso vencimiento de Importacion Temporal");
                      $message->cc('jorgedavidb@aavs.mx');
                      $message->cc('gerencia@dombart.mx');                                                     
          });
    }
  }

  public function consecutivo_ref($id){
    $hoy = Carbon::now();
    $today = $hoy->format('Y-m-d');
    $monthactual = $hoy->format('m');
    $yearactual = $hoy->format('y'); 
    $dayactual = $hoy->format('d');
    $sub = substr($id, 5);


    if($dayactual == '01'){
      $dia = 1;
    }else{
      $dia = intval($sub)+1;
    }

    $numero = $this->day_cero($dia);
    return $numero;
  }

  public function day_cero($dia){
    if($dia<10){
      return "0".$dia;
    }else{
      return $dia;
    }
  }

    public function get_usuario(){

        $usuario = Auth::User()->tipo_usuario;

        return response()->json($usuario);
    }


    public function genera_reporte_contabilidad(request $request){

    $clientes = $request->select_clientes;
    $estatus = $request->estatus_contabilidad;
    $ejecutivos = $request->ejecutivo_dombart;
    $fecha_inicio = $request->fecha_inicio_cierre;
    $fecha_fin = $request->fecha_fin_cierre;
    $filename = "Reporte_Contabilidad";
     Excel::create($filename, function($excel) use($ejecutivos,$estatus,$clientes,$fecha_inicio,$fecha_fin){

      //primera pestaña
      $excel->sheet('Reporte_contabilidad', function($sheet) use($ejecutivos,$estatus,$clientes,$fecha_inicio,$fecha_fin) {  
      
      //registros
      $contabilidad = Registro::from('registros')->join('clientes','clientes.id','=','registros.id_cliente')->join('aduanas','aduanas.id','=','registros.id_aduana')->join('forma_pago','forma_pago.id','=','registros.forma_pago')->join('users','users.id','=','registros.ejecutivo_dombart')->whereIn('id_cliente',$clientes)->whereIn('estatus_contabilidad',$estatus)->whereIn('ejecutivo_dombart',$ejecutivos)->whereBetween('registros.fecha_cierre', [$fecha_inicio,$fecha_fin])->select(DB::raw('
        `registros`.no_operacion,
        `clientes`.nombre_cliente,
        `registros`.saldo_pendiente_cobro,
        `registros`.contacto_facturas_pagos,
        `forma_pago`.nombre_pago as forma_pago,
        CASE WHEN `registros`.pagamos_mercancia = 1 then "SI"
        WHEN `registros`.pagamos_mercancia = 2 THEN "NO" END as pagamos_mercancia,
         CASE WHEN `registros`.tipo_operacion = 1 then "IMPORTACION"
        WHEN `registros`.tipo_operacion = 2 THEN "EXPORTACION" END as tipo_operacion,
        `registros`.valor_factura_ext,
        CASE WHEN `registros`.se_emite_factura  = 1 then "SI"
        WHEN `registros`.se_emite_factura  = 2 THEN "NO" END as se_emite_factura,
        `aduanas`.nombre_aduana,
        `registros`.descripcion_operacion,
        `registros`.cotizacion_cliente_mxp,
        `registros`.fecha_deposito_cliente,
        `registros`.importe_deposito_cliente,
        `registros`.referencia,
        `registros`.no_pedimento,
        `registros`.no_pedimento2,
        `registros`.no_pedimento3,
        `registros`.importe_cg,
        `registros`.fecha_cg,
        `registros`.folio_cg,
        `registros`.importe_facturado_cliente,
        `registros`.costeo_total,
        `registros`.condicion_pago,
        CASE WHEN `registros`.condicion_pago  = 1 then "CREDITO"
        WHEN `registros`.condicion_pago  = 2 THEN "ANTICIPO"
        WHEN `registros`.condicion_pago  = 3 THEN "CONTADO" END as condicion_pago,
        CASE WHEN `registros`.Facturacionxconcepto = 1 then "SERVICIO"
        WHEN `registros`.Facturacionxconcepto = 2 THEN "MERCANCIA" END as facturacion_x_concepto,
        `registros`.importe_comision,
        `registros`.importe_devuelto,
        CASE WHEN `registros`.tipo_importacion = 1 then "TEMPORAL"
        WHEN `registros`.tipo_importacion = 2 THEN "DEFINITIVA" END as tipo_importacion,
        `registros`.cierre,
        `registros`.fecha_cierre, 
        `registros`.fecha_factura_fiscal,
        CASE WHEN `registros`.estatus_contabilidad = 1 THEN "PAGADA"
        WHEN `registros`.estatus_contabilidad = 2 THEN "PAGADA A SATISFACCION DEL ACREEDOR"
        WHEN `registros`.estatus_contabilidad = 3 THEN "SALDO PENDIENTE" END as estatus_contabilidad,
        `registros`.saldo_pendiente_cobro,
        `registros`.moneda_facturacion,
        `registros`.tc_contable,
        `registros`.ingreso_real_contable,
        `registros`.costo_real_contable,
        `registros`.ganancia_real_contable,
        `users`.nombre as ejecutivo_dombart

        '))->get();

      $sheet->fromArray($contabilidad);
      $sheet->row(1, function($row) {

      // call cell manipulation methods
      $row->setBackground('#3F3F49');
      $row->setFontColor('#ffffff');
      $row->setValignment('center');

      });
   

      });

    })->export('xls');    
    }

public function genera_reporte_operaciones(request $request){

    $clientes = $request->select_cliente;
    $aduanas =  $request->select_aduanas;

    $filename = "Reporte_Operaciones";
     Excel::create($filename, function($excel) use($clientes,$aduanas){

      //primera pestaña
      $excel->sheet('Reporte_operaciones', function($sheet) use($clientes,$aduanas) {  
      
      //Registros
      $operaciones = Registro::from('registros')->join('clientes','clientes.id','=','registros.id_razon_datos_fac')->join('aduanas','aduanas.id','=','registros.id_aduana')->join('estatus','estatus.id','=','registros.id_estatus')->join('ejecutivos','ejecutivos.id','=','registros.id_ejecutivo')->leftjoin('registros_nvalor_fac','registros.id','=','registros_nvalor_fac.id_registro')->groupBy('registros.id')->whereIn('id_razon_datos_fac',$clientes)->whereIn('id_aduana',$aduanas)->select(DB::raw('
        `registros`.no_operacion,
        `clientes`.nombre_cliente as Razon_social,
        `registros`.saldo_pendiente_cobro,
        `registros`.contacto_facturas_pagos,
        CASE WHEN `registros`.pagamos_mercancia = 1 then "SI"
        WHEN `registros`.pagamos_mercancia = 2 THEN "NO" END as pagamos_mercancia,
        `registros`.tipo_operacion,
        group_concat(distinct registros_nvalor_fac.no_factura) as no_factura,
        `registros`.valor_factura_ext,
        `aduanas`.nombre_aduana,
        `ejecutivos`.nombre_ejecutivo,
        `estatus`.nombre_estatus,
        `registros`.descripcion_operacion,
        `registros`.eta,
        `registros`.fecha_despacho,
        `registros`.cotizacion_cliente_mxp,
        `registros`.observaciones,
        `registros`.fecha_deposito_cliente,
        `registros`.importe_deposito_cliente,
        `registros`.no_pedimento,
        `registros`.no_pedimento2,
        `registros`.no_pedimento3,
        `registros`.no_pedimento4,
        `registros`.no_pedimento5,
        `registros`.no_pedimento6,
        `registros`.importe_cg,
        `registros`.fecha_cg,
        `registros`.folio_cg,
        `registros`.importe_facturado_cliente,
        `registros`.costeo_total,
        `registros`.importe_comision,
        `registros`.fecha_cierre 

        '))->get();

      $sheet->fromArray($operaciones);
      $sheet->row(1, function($row) {

      // call cell manipulation methods
      $row->setBackground('#3F3F49');
      $row->setFontColor('#ffffff');
      $row->setValignment('center');

      });
   
      });

    })->export('xls');    
    }
}
