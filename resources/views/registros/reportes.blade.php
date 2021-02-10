@extends('index')
@section('title','Reportes Registros')
@section('panel','Exportar Reportes')
@section('content')

<div>
    <a href="{{route('registro.exportarPendientes')}}" class="btn btn-success" >Exportar Registros Pendientes Excel</a>
    <a href="{{route('registro.exportarC')}}" class="btn btn-success" >Exportar Registros Cerrados Excel</a>
</div>



@endsection