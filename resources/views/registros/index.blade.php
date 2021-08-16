@extends('index')
@section('title','Registros')
@section('panel','Lista de Registros')
@section('content')

<!--
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalr">Crear nuevo Registro</button><br>
-->
@include('registros.crear')
@include('registros.edit')
<table class="table table-hover table-striped" id="tablaregistros" cellspacing="0" width="100%">
  <thead>
    <th>Num Operacion</th>
    <th>Cliente</th>
    <th>Razon Social</th>
    <th>Tipo de Operacion</th>
    <th>Contacto facturas</th>
    <th>Forma de Pago</th>
    <th>Pagamos Mercancia?</th>
    <th>Proveedor</th>
    <th>Valor de Factura Ext (USD)</th>
    <th>Se emite Factura?</th>
    <th>Se Factura valor Mercancia?</th>
    <th>Aduana</th>
    <th>Ejecutivo</th>
    <th>Estatus</th>
    <th>Descripcion Operacion</th>
    <th>Eta</th>
    <th>Fecha Despacho</th>
    <th>Cotizacion Cliente</th>
    <th>Observaciones</th>
    <th>Fecha Deposito Cliente</th>
    <th>Importe Deposito Cliente</th>
    <th>Referencia</th>
    <th>Numero de Pedimento</th>
    <th>Importe CG</th>
    <th>Fecha CG</th>
    <th>Folio CG</th>
    <th>Importe Facturado Cliente</th>
    <th>Costeo Total</th>
    <th>Cierre</th>
    <th>Fecha Cierre</th>
    <th>Usuario Captura</th>
    <th>Estatus</th>
  </thead>
  <tbody>
    @foreach($registros as $registro)
    <tr onclick="modal('{{$registro->id}}','1')" value="{{route('registro.view')}}" id="edit{{$registro->id}}">

      <td> {{$registro->no_operacion}} </td>
      <td> {{$registro->cliente->nombre_cliente}} </td>
      <td> {{$registro->clienter->nombre_cliente}} </td>
      <td>
        @if($registro->tipo_operacion == 1)
        IMPORTACION
        @else
        EXPORTACION
        @endif
      </td>      
      <td> {{$registro->contacto_facturas_pagos}} </td>
      <td> {{$registro->pago->nombre_pago}} </td>
      <td>
        @if($registro->pagamos_mercancia == 1)
          SI
        @else
          NO
        @endif
      </td>
      <td>Cambio</td>
      <td>{{$registro->valor_factura_ext}}</td>
      <td>
        @if($registro->se_emite_factura == 1)
          SI
        @else
          NO
        @endif
      </td>
      <td>
        @if($registro->se_factura_valor_mercancia== 1)
          SI
        @else
          NO
        @endif
      </td>
      <td>{{$registro->aduana->nombre_aduana}}</td>
      <td>{{$registro->ejecutivo->nombre_ejecutivo}}</td>
      <td>{{$registro->estatus->nombre_estatus}}</td>
      <td>{{$registro->descripcion_operacion}}</td>
      <td>{{$registro->eta}}</td>
      <td>{{$registro->fecha_despacho}}</td>
      <td>{{$registro->cotizacion_cliente_mxp}}</td>
      <td>{{$registro->observaciones}}</td>
      <td>{{$registro->fecha_deposito_cliente}}</td>
      <td>{{$registro->importe_deposito_cliente}}</td>
      <td>{{$registro->referencia}}</td>
      <td>{{$registro->no_pedimento}}</td>
      <td>{{$registro->importe_cg}}</td>
      <td>{{$registro->fecha_cg}}</td>
      <td>{{$registro->folio_cg}}</td>
      <td>{{$registro->importe_facturado_cliente}}</td>
      <td>{{$registro->costeo_total}}</td>
      <td>{{$registro->cierre}}</td>
      <td>{{$registro->fecha_cierre}}</td>
      <td>{{$registro->user->nombre}}</td>
      @if($registro->fecha_cierre == null)
        <td style="background-color: red; color: white">Pendiente</td>
      @else
        <td></td>
      @endif
    </tr>
    @endforeach
  </tbody>

</table>
@include('registros.registroproveedores')

  


</table>



@endsection