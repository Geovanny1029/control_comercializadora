<!-- Add Modal start -->
    <div class="modal fade" id="editModalcli" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Clientes</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'clientes.actualiza', 'method' => 'POST','files'=>true]) !!}
              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('edit_clientes', 'Nombre Cliente') !!} 
                 {!! Form::text('edit_nombre_cliente',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre Cliente','id' => 'edit_nombre_cliente','required' ] ) !!}
               </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('RFC', 'RFC') !!} 
                 {!! Form::text('edit_rfc',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'RFC','id' => 'edit_rfc', 'required' ] ) !!}
                </div>
              </div>
              <div class="row">      
                <div class="form-group col-md-12">
                 {!! Form::label('Direccion Fiscal', 'Direccion Fiscal') !!} 
                 {!! Form::text('edit_direccion_fiscal',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Direccion Fiscal' ,'id' => 'edit_direccion_fiscal', 'required' ] ) !!}
                </div>   
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="input-group">
                         <span class="input-group-addon" id="razz" >Ruta Razon</span>
                          <input type="file" name="edit_ruta_cliente" class="form-control btndisable" id="edit_ruta_cliente" placeholder="ruta cliente" style="display: inline-block;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idcliente" name="edit_idcliente">
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