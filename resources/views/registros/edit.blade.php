<!-- Add Modal start -->
   <!-- Add Modal start -->
    <div class="modal fade" id="editModalr" role="dialog">
      <div class="modal-dialog" style="width:1250px; ">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Acompletar Registro Registro</h4>
          </div>
          <div class="modal-body" style=" background-color: #ffffff;">
              {!! Form::open(['route' => 'registro.actualiza', 'method' => 'POST']) !!}
              <div class="row">
                <div class="form-group col-md-2">
                    <div class="input-group">
                       <span class="input-group-addon" >Nu registro</span>
                       <input type="text" name="id_registro" id="id_registro" class="form-control" placeholder="registro">
                    </div> 
                </div>               
              </div>
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Cliente</span>
                        {!! Form::select('edit_id_cliente',$clientes,null,['class' => 'form-control','id'=>'edit_id_cliente']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon">Razon Social</span>
                        {!! Form::select('edit_id_razon_datos_fac',$razon,null,['class' => 'form-control','id'=>'edit_id_razon_datos_fac']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="razz" >Ruta Razon</span>
                        <input type="file" name="edit_ruta_razonsocial" class="form-control" id="edit_ruta_razonsocial" placeholder="ruta razonsocial">
                    </div>
               </div>  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="contact" >Contacto Facturas Pagos</span>
                        <input type="text" name="edit_contacto_facturas_pagos" class="form-control" placeholder="Username" id="edit_contacto_facturas_pagos">
                    </div>
               </div>                                           
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="forma">Forma Pago</span>
                        {!! Form::select('edit_forma_pago',["1"=>"Efectivo","2"=>"Transferencia"],null,['class' => 'form-control','id'=>'edit_forma_pago']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Pagamos Mercancia?</span>
                        {!! Form::select('edit_pagamos_mercancia',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_pagamos_mercancia']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Proveedor Ext</span>
                        {!! Form::select('edit_id_proveedor',$proveedores,null,['class' => 'form-control','id'=>'edit_proveedores']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutpro">Ruta Proveedor</span>
                        <input type="file" name="edit_ruta_proveedor" class="form-control" placeholder="Proveedor" id="edit_ruta_proveedor">
                    </div>
               </div>                                            
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="valfac" >Valor Fact Ext $</span>
                        <input type="number" name="edit_valor_factura_ext" class="form-control" id="edit_valor_factura_ext" placeholder="$">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutafact">Ruta Fact</span>
                        <input type="file" name="edit_ruta_factura_ext" id="edit_ruta_factura_ext" class="form-control" placeholder="Ruta">
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Emite Factura?</span>
                        {!! Form::select('edit_se_emite_factura',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_se_emite_factura']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Factura valor Mercancia?</span>
                        {!! Form::select('edit_se_factura_valor_mercancia',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_se_factura_valor_mercancia']) !!}
                    </div>
               </div>                                           
              </div>                             

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Aduana</span>
                        {!! Form::select('edit_id_aduana',$aduanas,null,['class' => 'form-control','id'=>'edit_aduanas']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ejecutivo</span>
                        {!! Form::select('edit_id_ejecutivo',$ejecutivos,null,['class' => 'form-control','id'=>'edit_ejecutivos']) !!}
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Estatus</span>
                        {!! Form::select('edit_id_estatus',$estatus,null,['class' => 'form-control','id'=>'edit_estatus']) !!}
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="descope">Descripcion Ope</span>
                        <input type="text" name="edit_descripcion_operacion" id="edit_descripcion_operacion" class="form-control" placeholder="descripcion_operacion">
                    </div>
               </div>                                         
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="feceta" >Eta</span>
                        <input type="date" name="edit_eta" id="edit_eta" class="form-control" placeholder="Eta">
                    </div>
               </div>  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="fecdesp" >Fecha Despacho</span>
                        <input type="date" name="edit_fecha_despacho" id="edit_fecha_despacho" class="form-control" placeholder="Eta">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="cotcli" >Cotizacion Cliente $</span>
                        <input type="number" name="edit_cotizacion_cliente_mxp" id="edit_cotizacion_cliente_mxp" class="form-control" placeholder="$">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutcot" >Ruta Cotizacion</span>
                        <input type="file" name="edit_ruta_cotizacion_cliente" id="edit_ruta_cotizacion_cliente" class="form-control" placeholder="ruta">
                    </div>
               </div>                                          
              </div>  


              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="obs" >Observaciones</span>
                        <input type="text" name="edit_observaciones" id="edit_observaciones" class="form-control" placeholder="observaciones">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="fecdep" >Fecha Deposito Cliente</span>
                        <input type="date" name="edit_fecha_deposito_cliente" id="edit_fecha_deposito_cliente" class="form-control" placeholder="Fecha Deposito">
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="impodep" >Importe deposito cliente $</span>
                        <input type="number" name="edit_importe_deposito_cliente" id="edit_importe_deposito_cliente" class="form-control" placeholder="$">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutdepo" >Ruta Deposito</span>
                        <input type="file" name="edit_ruta_importe_deposito_cliente" id="edit_ruta_importe_deposito_cliente" class="form-control" placeholder="ruta">
                    </div>
               </div>                                         
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="refer">Referencia</span>
                        <input type="text" name="edit_referencia" id="edit_referencia" class="form-control" placeholder="Referencia">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi">No Pedimento</span>
                        <input type="text" name="edit_no_pedimento" id="edit_no_pedimento" class="form-control" placeholder="Pedimento">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutpedi" >Ruta Pedimento</span>
                        <input type="file" name="edit_ruta_pedimento" id="edit_ruta_pedimento" class="form-control" placeholder="ruta">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="impcg" >Importe CG $</span>
                        <input type="number" name="edit_importe_cg" id="edit_importe_cg" class="form-control" placeholder="$">
                    </div>
               </div>                                          
              </div>  

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="feccg" >Fecha CG</span>
                        <input type="date" name="edit_fecha_cg" id="edit_fecha_cg" class="form-control" placeholder="Fecha CG">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Folio CG</span>
                        <input type="text" name="folio_cg" class="form-control" placeholder="Folio">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Folio</span>
                        <input type="file" name="ruta_folio_cg" class="form-control" placeholder="ruta">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Importe Facturado Cliente $</span>
                        <input type="number" name="importe_facturado_cliente" class="form-control" placeholder="$">
                    </div>
               </div>                                          
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Facturado</span>
                        <input type="file" name="ruta_facturado_cliente" class="form-control" placeholder="ruta">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Costeo Total $</span>
                        <input type="number" name="costeo_total" class="form-control" placeholder="$">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta costeo</span>
                        <input type="file" name="ruta_costeo" class="form-control" placeholder="ruta">
                    </div>
               </div>                                        
              </div>    

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Cierre $</span>
                        <input type="number" name="cierre" class="form-control" placeholder="$">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha Cierre</span>
                        <input type="date" name="fecha_cierre" class="form-control" placeholder="Fecha Cierre">
                    </div>
               </div>                                                               
              </div>                                                           <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary']) !!} 
                  <input type="hidden" id="edit_id_registro" name="edit_id_registro">
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