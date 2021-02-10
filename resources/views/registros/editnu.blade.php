<!-- Add Modal start -->
    <div class="modal fade" id="editModalNU" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Registro</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'registro.actualizanu', 'method' => 'POST']) !!}
             

              <div class="row">
                <div class="form-group col-md-4">
                 {!! Form::label('Fact SCI', 'Fact SCI') !!} 
                 {!! Form::text('edit_fact_scinu',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_fact_scinu','placeholder' => 'fact' ] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Periodo Cass', 'Periodo Cass') !!} 
                 {!! Form::text('edit_periodo_cassnu',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_periodo_cassnu','placeholder' => 'periodo' ] ) !!}
               </div>
               <div class="form-group col-md-4">
                 {!! Form::label('Ref SCI', 'Ref SCI') !!} 
                 {!! Form::text('edit_ref_scinu',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id'=>'edit_ref_scinu','placeholder' => 'Ref' ] ) !!}
               </div>
              </div>
              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idnu" name="edit_idnu">
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