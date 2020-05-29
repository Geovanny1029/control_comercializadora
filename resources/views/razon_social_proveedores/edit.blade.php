<<!-- Add Modal start -->
    <div class="modal fade" id="editModalra" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Razon Social</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'razon_social.actualiza', 'method' => 'POST']) !!}
              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('edit_razon_social', 'Nombre Razon Social') !!} 
                 {!! Form::text('edit_nombre_razon',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre Razon Social','id' => 'edit_nombre_razon','required' ] ) !!}
               </div>

              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idrazon" name="edit_idrazon">
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