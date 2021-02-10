@extends('index')
@section('title','Forma de Pago')
@section('panel','Lista Formas de Pagos')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalfp">Crear nueva forma de pago</button>

@include('forma_pago.crear')

<table class="table table-striped" id="tablarazonsocial">
  <thead>
    <th>ID</th>
    <th>Nombre Forma de Pago</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($forma as $forma)
    <tr>

      <td> {{$forma->id}} </td>
      <td> {{$forma->nombre_pago}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalfp" onclick="fun_editfp('{{$forma->id}}')" id="editafp" value="{{route('formapago.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('forma_pago.edit')
</table>

@endsection