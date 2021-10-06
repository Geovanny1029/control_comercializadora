<!-- Add Modal start -->
    <div class="modal fade" id="addModalcli" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Nuevo Cliente</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'clientes.store', 'method' => 'POST','files'=>true]) !!}

              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('cliente', 'Nombre Cliente') !!} 
                 {!! Form::text('nombre_cliente',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre Cliente', 'required' ] ) !!}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('RFC', 'RFC') !!} 
                 {!! Form::text('rfc',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'RFC', 'required' ] ) !!}
                </div>
              </div>
              <div class="row">    
                <div class="form-group col-md-12">
                 {!! Form::label('Direccion Fiscal', 'Direccion Fiscal') !!} 
                 {!! Form::text('direccion_fiscal',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Direccion Fiscal', 'required' ] ) !!}
                </div>                             
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                    <div class="input-group">
                       <span class="input-group-addon" >+</span>
                        <input type="file" name="ruta_cliente" class="form-control" placeholder="Username">
                    </div>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->