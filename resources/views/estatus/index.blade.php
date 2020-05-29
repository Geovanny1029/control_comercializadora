@extends('index')
@section('title','Estatus')
@section('panel','Lista Estatus')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModales">Crear nuevo Estatus</button>

@include('estatus.crear')

<table class="table table-striped" id="tablarazonsocial">
  <thead>
    <th>ID</th>
    <th>Nombre Estatus</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($estatus as $estate)
    <tr>

      <td> {{$estate->id}} </td>
      <td> {{$estate->nombre_estatus}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModales" onclick="fun_edita('{{$estate->id}}')" id="editara" value="{{route('estatus.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('estatus.edit')
</table>

@endsection