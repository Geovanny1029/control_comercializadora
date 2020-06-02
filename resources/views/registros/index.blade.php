@extends('index')
@section('title','Registros')
@section('panel','Lista de guias')
@section('content')

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModalr">Crear nuevo Registro</button>

@include('registros.crear')
<table class="table table-striped" id="tablaregistros">
  <thead>
    <th>ID</th>
    <th>Nombre grupo</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($registros as $registro)
    <tr>

      <td> {{$registro->id}} </td>
      <td> {{$registro->nombre_aerolinea}} </td>
      <td>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>

  


</table>



@endsection