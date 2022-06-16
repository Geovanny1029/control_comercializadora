@extends('index')
@section('title','Clientes Bajas')
@section('panel','Lista Clientes Inactivos')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<table class="table table-striped" id="tabla_clientes_baja">
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
      <td style="width: 20%;">


      <a class="btn btn-success" onclick="return confirm('¿Seguro que deseas habilitar este Cliente?')" href="{{route('clientes.habilitar', $cliente->id)}}">Habilitar</a>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>



@endsection