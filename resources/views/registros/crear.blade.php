 <!-- Add Modal start -->
    <div class="modal fade" id="addModalr" role="dialog">
      <div class="modal-dialog" style="width:1250px; ">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Registro</h4>
          </div>
          <div class="modal-body" style=" background-color: #ffffff;">
              {!! Form::open(['route' => 'registro.store', 'method' => 'POST']) !!}
              <div class="row">
               <div class="form-group col-md-3">
                 {!! Form::label('Cliente', 'Cliente') !!}  
                 {!! Form::select('id_cliente',["arra"=>"a"],null,['class' => 'form-control','id'=>'id_cliente']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('Razon_ social', 'Razon Social datos Fact') !!}  
                 {!! Form::text('razon-social',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'guia', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('Ruta', 'Ruta') !!}  
                 {!! Form::text('ruta_razon',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('Contacto Facturas', 'Ruta') !!}  
                 {!! Form::text('ruta_razon',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                                           
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                 {!! Form::label('forma_pago', 'Forma Pago') !!}  
                 {!! Form::select('forma_pago',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('pagamos_mercancia', 'Pagamos Mercancia?') !!}  
                 {!! Form::text('pagamos_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('proveedor', 'Proveedor') !!}  
                 {!! Form::text('id_proveedor',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_proveedor', 'Ruta Proveedor') !!}  
                 {!! Form::text('ruta_proveedor',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                                           
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'Valor Factura Ext') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'Ruta Factura ext') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'Se Emite Factura?') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'Se factura Valor Mercancia?') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div>                             

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'Aduana') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'Ejecutivo') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'Estatus') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'Descripcion Operacion') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'ETA') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'Fecha Despacho') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'Cotizacion Cliente Mxp') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'ruta_cotizacion_cliente') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div>  


              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'observaciones') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'fecha_deposito_cliente') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'importe_deposito_cliente') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'ruta_importe_deposito_cliente') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'referencia') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'no_pedimento') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'ruta_pedimento') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'importe_cg') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div>  

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'fecha_cg') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'folio_cg') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'ruta_folio_cg') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>
               <div class="form-group col-md-3">
                {!! Form::label('se_factura_valor_mercancia', 'importe_facturado_cliente') !!}  
                 {!! Form::text(' se_factura_valor_mercancia',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Pagamos Mercancia?', 'required' ] ) !!}
               </div>                                          
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'ruta_facturado_cliente') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'costeo_total') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>                  
               <div class="form-group col-md-3">
                 {!! Form::label('se_emite_factura', 'ruta_costeo') !!}  
                 {!! Form::select('se_emite_factura',["arra"=>"a"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
               </div>                                         
              </div>    

              <div class="row">
               <div class="form-group col-md-3">
                {!! Form::label('valor_factura', 'cierre') !!}  
                 {!! Form::text('valor_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Proveedor', 'required' ] ) !!}
               </div> 
               <div class="form-group col-md-3">
                {!! Form::label('ruta_factura_ext', 'fecha_cierre') !!}  
                 {!! Form::text('ruta_factura_ext',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'razon', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" style="background-color: red; color:white;">cliente</span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
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