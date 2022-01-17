Add Modal start -->
    <div class="modal fade" id="registroproveedores" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Proveedores</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'registro.regiprove', 'method' => 'POST','id'=>'formuploadajax']) !!}

              <div class="row">
                <div class="form-group col-md-12">
               <div id="lista2"></div>
               <div id="agregarprov"></div>
               </div>
              </div>

<!--               <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary']) !!} 
                </div>
              </div> -->

              {!! Form::close()!!}
          </div>
          <div class="modal-footer">
             <button type="button" id="guardaprovedit" class="btn btn-primary">Guardar proveedores</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends