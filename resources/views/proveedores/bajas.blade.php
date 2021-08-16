@extends('index')
@section('title','Proveedores Externos Inactivos')
@section('panel','Lista Proveedores Externos Inactivos')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<table class="table table-striped" id="tablaaduanas">
  <thead>
    <th>ID</th>
    <th>Nombre Proveedor</th>
    <th>Tax ID</th>
    <th>Direccion Fiscal</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($proveedores as $proveedor)
    <tr>

      <td> {{$proveedor->id}} </td>
      <td> {{$proveedor->nombre_proveedor}} </td>
      <td> {{$proveedor->tax_id}} </td>
      <td> {{$proveedor->direccion_fiscal}} </td>
      <td>


      <a class="btn btn-success" onclick="return confirm('¿Seguro que deseas habilitar este Proveedor?')" href="{{route('proveedoresExt.habilitar', $proveedor->id)}}">Habilitar</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection