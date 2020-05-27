@extends('index')
@section('title','Registros')
@section('panel','Lista de guias')
@section('content')

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Crear nuevo Registro</button>



<table class="display compact" style="width: 100%" id="tablaregistros">
  <thead>
    <th>ID</th>
    <th>Aerolinea</th>
    <th>Guia</th>
    <th>Fecha_asignacion</th>
    <th>Agente</th>
    <th>Factura SCI</th>
    <th>Periodo Cass</th>
    <th>Referencia SCI</th>
    <th>Accion</th>
  </thead>
  


</table>



@endsection