<div class="modal fade" id="info_adicional" role="dialog">
      <div class="modal-dialog" style="width:950px;">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">INFORMACION ADICIONAL</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'registro.fileadicional', 'method' => 'POST','id'=>'formadicional']) !!}

              <div class="row">
                <div class="form-group col-md-4">
                  <div id="adicional_factura"></div>
                  <div id="add_adicional_factura"></div>
                </div>
                <div class="form-group col-md-4">
                  <div id="adicional_cotizacion"></div>
                  <div id="add_adicional_cotizacion"></div>
                </div>
                <div class="form-group col-md-4">
                  <div id="adicional_deposito"></div>
                  <div id="add_adicional_deposito"></div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <div id="adicional_foliocg"></div>
                  <div id="add_adicional_foliocg"></div>
                </div>
                <div class="form-group col-md-4">
                  <div id="adicional_facturado"></div>
                  <div id="add_adicional_facturado"></div>
                </div>
                <div class="form-group col-md-4">
                  <div id="adicional_pedimento"></div>
                  <div id="add_adicional_pedimento"></div>
                </div>
                
              </div>


              {!! Form::close()!!}
          </div>
          <div class="modal-footer">
             <button type="button" id="guardainfoadicional" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
