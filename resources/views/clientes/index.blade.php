@extends('index')
@section('title','Clientes')
@section('panel','Lista Clientes')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalcli">Crear nuevo Cliente</button>

@include('clientes.crear')
@include('clientes.edit')

<table class="table table-striped" id="tablaejecutivos">
  <thead>
    <th>ID</th>
    <th>Nombre Cliente</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($clientes as $cliente)
    <tr>

      <td> {{$cliente->id}} </td>
      <td> {{$cliente->nombre_cliente}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalcli" onclick="fun_editcli('{{$cliente->id}}')" id="editacli" value="{{route('clientes.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>



@endsection