@extends('index')
@section('title','Clientes')
@section('panel','Lista Clientes Activos')
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

<table class="table table-striped" id="tabla_clientes_activos">
  <thead>
    <th>ID</th>
    <th>Nombre Cliente</th>
    <th>RFC</th>
    <th>Direccion Fiscal</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($clientes as $cliente)
    <tr>

      <td> {{$cliente->id}} </td>
      <td> {{$cliente->nombre_cliente}} </td>
      <td> {{$cliente->rfc}} </td>
      <td> {{$cliente->direccion_fiscal}} </td>
      <td style="width: 30%;">
        @if($cliente->ruta_cliente == null or $cliente->ruta_cliente == "" )
          SIN ARCHIVO
        @else
          <div id="showrut" value="0" class="btn btn-primary" data-lity href="/ruta_clientes/{{$cliente->ruta_cliente}}" >
                         VER PDF
          </div>
        @endif

      <button class="btn btn-warning"  data-toggle="modal" data-target="#editModalcli" onclick="fun_editcli('{{$cliente->id}}')" id="editacli" value="{{route('clientes.view')}}">Editar </button>

      <a class="btn btn-danger" onclick="return confirm('¿Seguro que deseas inhabilitar este Cliente?')" href="{{route('clientes.destroy', $cliente->id)}}">Eliminar</a>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>



@endsection