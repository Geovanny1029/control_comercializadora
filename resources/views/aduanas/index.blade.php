@extends('index')
@section('title','Aduanas')
@section('panel','Lista Aduanas')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalad">Crear nueva Aduana</button>

@include('aduanas.crear')

<table class="table table-striped" id="tablaaduanas">
  <thead>
    <th>ID</th>
    <th>Nombre Aduana</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($aduanas as $aduana)
    <tr>

      <td> {{$aduana->id}} </td>
      <td> {{$aduana->nombre_aduana}} </td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalad" onclick="fun_editad('{{$aduana->id}}')" id="editad" value="{{route('aduanas.view')}}">Editar </button>

      </td>
    </tr>
    @endforeach
  </tbody>

  @include('aduanas.edit')
</table>

@endsection