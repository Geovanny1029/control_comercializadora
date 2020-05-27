<!-- Add Modal start -->
    <div class="modal fade" id="editModalr" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Registro</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'registro.actualiza', 'method' => 'POST']) !!}
             
              <div class="row">
               <div class="form-group col-md-6">
                 {!! Form::label('Aerolinea', 'Aerolinea') !!}  
                 {!! Form::select('edit_aerolinea',$listaAero,null,['class' => 'form-control','id'=>'edit_aerolinea']) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Guia', 'Guia') !!}  
                 {!! Form::text('edit_guia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'guia','id'=>'edit_guia', 'required' ] ) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('Fecha Asignacion', 'Fecha Asignacion') !!} 
                 {!! Form::date('edit_fecha_asignacion', \Carbon\Carbon::now(),['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'fecha asignacion','id'=>'edit_fecha_asignacion', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                 {!! Form::label('Agente', 'Agente') !!} 
                {!! Form::select('edit_agente',$listaAgent,null,['class' => 'form-control','id'=>'edit_agente']) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                 {!! Form::label('Fact SCI', 'Fact SCI') !!} 
                 {!! Form::text('edit_fact_sci',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_fact_sci','placeholder' => 'fact', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Periodo Cass', 'Periodo Cass') !!} 
                 {!! Form::text('edit_periodo_cass',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_periodo_cass','placeholder' => 'periodo', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Ref SCI', 'Ref SCI') !!} 
                 {!! Form::text('edit_ref_sci',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_ref_sci','placeholder' => 'Ref', 'required' ] ) !!}
               </div>
              </div>
              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idr" name="edit_idr">
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