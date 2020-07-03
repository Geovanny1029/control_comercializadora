@extends('index')
@section('title','Proveedores Externos')
@section('panel','Lista Proveedores Externos')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalpro">Crear nuevo Proveedor</button>

@include('proveedores.crear')

<table class="table table-striped" id="tablaaduanas">
  <thead>
    <th>ID</th>
    <th>Nombre Proveedor</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($proveedores as $proveedor)
    <tr>

      <td> {{$proveedor->id}} </td>
      <td> {{$proveedor->nombre_proveedor}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalpro" onclick="fun_editapro('{{$proveedor->id}}')" id="editapro" value="{{route('proveedoresExt.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('proveedores.edit')
</table>

@endsection