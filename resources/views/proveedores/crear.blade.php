<!-- Add Modal start -->
    <div class="modal fade" id="addModalpro" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Nuevo Proveedor Externo</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'proveedoresExt.store', 'method' => 'POST']) !!}

              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('proveedores', 'Nombre Proveedor') !!} 
                 {!! Form::text('nombre_proveedor',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre Proveedor', 'required' ] ) !!}
               </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('tax_id', 'Tax id') !!} 
                 {!! Form::text('tax_id',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Tax Id', 'required' ] ) !!}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                 {!! Form::label('direccion', 'Direccion Fiscal') !!} 
                 {!! Form::text('direccion_fiscal',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Direccion Fiscal', 'required' ] ) !!}
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