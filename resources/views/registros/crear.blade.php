 <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Registro</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'registro.store', 'method' => 'POST']) !!}
              <div class="row">
               <div class="form-group col-md-6">
                 {!! Form::label('Aerolinea', 'Aerolinea') !!}  
                 {!! Form::select('aerolinea',$listaAero,null,['class' => 'form-control','id'=>'aerolinea']) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Guia', 'Guia') !!}  
                 {!! Form::text('guia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'guia', 'required' ] ) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('Fecha Asignacion', 'Fecha Asignacion') !!} 
                 {!! Form::date('fecha_asignacion', \Carbon\Carbon::now(),['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'fecha asignacion', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                 {!! Form::label('Agente', 'Agente') !!} 
                {!! Form::select('agente',$listaAgent,null,['class' => 'form-control','id'=>'agente']) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                 {!! Form::label('Fact SCI', 'Fact SCI') !!} 
                 {!! Form::text('fact_sci',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'fact'] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Periodo Cass', 'Periodo Cass') !!} 
                 {!! Form::text('periodo_cass',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'periodo' ] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Ref SCI', 'Ref SCI') !!} 
                 {!! Form::text('ref_sci',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Ref' ] ) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary']) !!} 
                </div>
              </div>

              {!! Form::close()!!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->