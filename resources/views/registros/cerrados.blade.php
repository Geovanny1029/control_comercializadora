@extends('index')
@section('title','Registros')
@section('panel','Lista de Registros cerradas')
@section('content')

<!--
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalr">Crear nuevo Registro</button><br>
-->
@include('registros.edit')
<table class="table table-hover table-striped" id="tablaregistroscerrados" cellspacing="0" width="100%">
  <thead>
    <th>Num Operacion</th>
    <th>Cliente</th>
    <th>Razon Social</th>
    <th>Forma de pago</th>
    <th>Cierre</th>
  </thead>
  <tbody>
    @foreach($registros as $registro)
    <tr  onclick="modal('{{$registro->id}}','2')" value="{{route('registro.view')}}" id="edit{{$registro->id}}">

      <td> {{$registro->no_operacion}} </td>
      <td> {{$registro->cliente->nombre_cliente}} </td>
      <td> {{$registro->clienter->nombre_cliente}} </td>
      <td> {{$registro->forma_pago}} </td>
      @if($registro->fecha_cierre != null)
        <td style="background-color: green; color: white">{{$registro->fecha_cierre}}</td>
      @else
        <td></td>
      @endif
    </tr>
    @endforeach
  </tbody>

</table>

  


</table>



@endsection