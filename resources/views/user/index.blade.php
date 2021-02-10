@extends('index')
@section('title','Usuarios')
@section('panel','Lista de Usuarios')
@section('content')

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
        @endif 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalU">Crear nuevo Usuario</button>

@include('user.crear')

<table class="table table-striped" id="tablausuarios" cellspacing="0" width="100%">
  <thead>
    <th>ID</th>
    <th>Nombre </th>
    <th>usuario</th>
    <th>Contraseña</th>
    <th>Nivel</th>
    <th>E-mail</th>
    <th>Estatus</th>
    <th>Accion</th>
  </thead>
  <tbody>
    @foreach($usuarios as $user)
    <tr>

      <td> {{$user->id}} </td>
      <td> {{$user->nombre}} </td>
      <td> {{$user->user}} </td>
      <td> {{$user->backup_password}}</td>
      <td>  @if($user->nivel == 1)
      Administador @else Usuario  @endif</td>
      <td> {{$user->email}}</td>
      <td> @if($user->estatus == 1)
      Activo @else Inactivo @endif</td>
      <td>


      <button class="btn btn-warning" data-toggle="modal" data-target="#editModalU" onclick="fun_editu('{{$user->id}}')" id="editaru" value="{{route('user.view')}}">Editar </button>

      @if($user->estatus == 1)
        <a class="btn btn-danger" onclick="return confirm('¿Seguro que deseas dar de baja este Usuario?')" href="{{route('user.destroy', $user->id)}}">Eliminar</a>
      @else
        <a class="btn btn-success" onclick="return confirm('¿Seguro que deseas Activar este Usuario?')" href="{{route('user.destroy', $user->id)}}">Activar</a>
      @endif
      </td>
    </tr>
    @endforeach
  </tbody>

  @include('user.edit')
</table>





@endsection