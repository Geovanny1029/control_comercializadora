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

 <table class="table table-striped   datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nombre_cliente</th>
                                <th>estatus</th>
                            </tr>
                        </thead>
                    </table>

@endsection