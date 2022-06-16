@extends('index')
@section('title','Generador de Reportes')
@section('panel','Reporte Contabilidad')
@section('content')


              {!! Form::open(['route' => 'reporte.genera_contabilidad', 'method' => 'POST']) !!}
        
              <div class="row">  
              	<center>Parametros</center> <br>
                <div class="form-group col-md-4">
                  <label >Cliente</label><br>
				  {!!Form::select('select_clientes[]',$clientes, null, ['id'=>'select_clientes','class' => 'multiple-select','multiple'=>'multiple','request'=>'request','style'=>"width: 100%; text-align: left;"])!!}               

                </div>
                <div class="form-group col-md-4">
                  <label >Estatus Contabilidad</label><br>
                  <select id="estatus_c" class="multi-select" name="estatus_contabilidad[]" multiple="multiple" style="width: 100%; text-align: left;" required="required">
                    <option value="1">Pagada</optio 		n>
                    <option value="2">Pagada a satisfaccion del acreedor</option>
                    <option value="3">Saldo pendiente</option>
                  </select>             

                </div>
                <div class="form-group col-md-4">
                  <label>Ejecutivo Dombart</label><br>
                    {!!Form::select('ejecutivo_dombart[]',$ejecutivos, null, ['id'=>'ejecutivo_d','class' => 'multiple-select','multiple'=>'multiple','request'=>'request','style'=>"width: 100%; text-align: left;"])!!}                  

                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Fecha cierre inicio</label><br> 
                  {!! Form::date('fecha_inicio_cierre',null,['class' => 'form-control', 'placeholder' => 'Fecha inicio', 'required' ] ) !!}                 

                </div>
                <div class="form-group col-md-4">
                  <label>Fecha cierre fin</label><br> 
                  {!! Form::date('fecha_fin_cierre',null,['class' => 'form-control', 'placeholder' => 'Fecha fin', 'required' ] ) !!}                 

                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Generar',[ 'class' => 'btn btn-primary']) !!} 
                </div>
              </div>
          


              {!! Form::close()!!}		




@endsection