@extends('index')
@section('title','Razon Social')
@section('panel','Lista Razon Social')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalra"> Crear nueva Razon social </button>

@include('razon_social_proveedores.crear')

<table class="table table-striped" id="tablarazonsocial">
  <thead>
    <th>ID</th>
    <th>Nombre razon social</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($razon_social as $razon)
    <tr>

      <td> {{$razon->id}} </td>
      <td> {{$razon->nombre_razon}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalra" onclick="fun_editra('{{$razon->id}}')" id="editara" value="{{route('razon_social.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('razon_social_proveedores.edit')
</table>





@endsection