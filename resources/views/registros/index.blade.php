@extends('index')
@section('title','Registros')
@section('panel','Lista de guias')
@section('content')

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalr">Crear nuevo Registro</button>

@include('registros.crear')
@include('registros.edit')
<table class="table table-hover table-striped" id="tablaregistros">
  <thead>
    <th>Num Operacion</th>
    <th>Cliente</th>
    <th>Razon Social</th>
    <th>Forma de pago</th>
    <th>Cierre</th>
  </thead>
  <tbody>
    @foreach($registros as $registro)
    <tr onclick="modal('{{$registro->id}}')" value="{{route('registro.view')}}" id="edit{{$registro->id}}">

      <td> {{$registro->no_operacion}} </td>
      <td> {{$registro->cliente->nombre_cliente}} </td>
      <td> {{$registro->razon_social->nombre_razon}} </td>
      <td> {{$registro->forma_pago}} </td>
      @if($registro->fecha_cierre == null)
        <td style="background-color: red; color: white">Pendiente</td>
      @else
        <td></td>
      @endif
    </tr>
    @endforeach
  </tbody>

</table>

  


</table>



@endsection