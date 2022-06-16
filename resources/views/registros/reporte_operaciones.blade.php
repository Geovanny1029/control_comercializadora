@extends('index')
@section('title','Reportes Registros')
@section('panel','Reporte Operaciones')
@section('content')

              {!! Form::open(['route' => 'reporte.genera_operaciones', 'method' => 'POST']) !!}
        
              <div class="row">  
              <center>Parametros</center> <br>
                <div class="form-group col-md-4">
                  <label > Razon Social</label><br>
				  {!!Form::select('select_cliente[]',$clientes, null, ['id'=>'select_clientes','class' => 'multiple-select','multiple'=>'multiple','request'=>'request','style'=>"width: 100%; text-align: left;"])!!}               

                </div>
                <div class="form-group col-md-4">
                  <label >Aduanas</label><br>
				  {!!Form::select('select_aduanas[]',$aduanas, null, ['id'=>'select_aduanas','class' => 'multiple-select','multiple'=>'multiple','request'=>'request','style'=>"width: 100%; text-align: left;"])!!}               

                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Generar',[ 'class' => 'btn btn-primary']) !!} 
                </div>
              </div>
          


              {!! Form::close()!!}

@endsection