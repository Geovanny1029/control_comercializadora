@extends('index')
@section('title','Ejecutivos')
@section('panel','Lista Ejecutivos')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModaleje">Crear nuevo Ejecutivo</button>

@include('ejecutivos.crear')

<table class="table table-striped" id="tablaejecutivos">
  <thead>
    <th>ID</th>
    <th>Nombre Ejecutivo</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($ejecutivos as $ejecutivo)
    <tr>

      <td> {{$ejecutivo->id}} </td>
      <td> {{$ejecutivo->nombre_ejecutivo}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModaleje" onclick="fun_editeje('{{$ejecutivo->id}}')" id="editaeje" value="{{route('ejecutivos.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('ejecutivos.edit')
</table>

@endsection