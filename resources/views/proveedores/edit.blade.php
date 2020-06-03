<!-- Add Modal start -->
    <div class="modal fade" id="editModalpro" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Nombre Proveedor</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'proveedores.actualiza', 'method' => 'POST']) !!}
              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('edit_proveedor', 'Nombre Proveedor') !!} 
                 {!! Form::text('edit_nombre_proveedor',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre Proveedor','id' => 'edit_nombre_proveedor','required' ] ) !!}
               </div>

               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" style="background-color: red; color:white;">cliente</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
               </div> 

              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idprov" name="edit_idprov">
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