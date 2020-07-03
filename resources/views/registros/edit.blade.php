<!-- Add Modal start -->
   <!-- Add Modal start -->
    <div class="modal fade" id="editModalr" role="dialog">
      <div class="modal-dialog" style="width:1250px; ">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Acompletar Registro</h4>
          </div>
          <div class="modal-body" style=" background-color: #ffffff;">
              {!! Form::open(['route' => 'registro.actualiza', 'method' => 'POST','files'=>true]) !!}
              <div class="row">
                <div class="form-group col-md-2">
                    <div class="input-group">
                       <span class="input-group-addon" >Nu registro</span>
                       <input type="text" style="text-transform:uppercase;" name="id_registro" id="id_registro" class="form-control" placeholder="registro">
                    </div> 
                </div>
                <div class="form-group col-md-2">
                    <div class="input-group">
                       <span class="input-group-addon" >Folio</span>
                       <input type="text" style="text-transform:uppercase;" name="folio" id="folio" class="form-control" placeholder="registro">
                    </div> 
                </div>                  
                <div class="form-group col-md-2" style="display: inline-block;" id="check" >
                    <label class="checkbox-inline">
                      <input type="checkbox" id="something" value="">Editar
                    </label>

                </div>               
              </div>
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Cliente</span>
                        {!! Form::select('edit_id_cliente',$clientes,null,['class' => 'form-control','id'=>'edit_id_cliente','placeholder'=>'selecciona']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon">Razon Social</span>
                        {!! Form::select('edit_id_razon_datos_fac',$clientes,null,['class' => 'form-control','id'=>'edit_id_razon_datos_fac']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="razz" >Ruta Razon</span>
                        <input type="file" name="edit_ruta_razonsocial" class="form-control" id="edit_ruta_razonsocial" placeholder="ruta razonsocial" style="display: inline-block;">
                        <div id="showrut" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="forma">Tipo Operacion</span>
                        {!! Form::select('edit_tipo_operacion',["1"=>"IMPORTACION","2"=>"EXPORTACION"],null,['class' => 'form-control','id'=>'edit_tipo_operacion']) !!}
                    </div>
               </div>                                                           
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="forma">Forma Pago</span>
                        {!! Form::select('edit_forma_pago',["1"=>"Efectivo","2"=>"Transferencia","3"=>"Cheque"],null,['class' => 'form-control','id'=>'edit_forma_pago']) !!}
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
                        <input type="file" name="edit_ruta_proveedor" class="form-control" placeholder="Proveedor" id="edit_ruta_proveedor" style="display: inline-block;">
                        <div id="showprov" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                                            
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="contact" >Contacto Facturas Pagos</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_contacto_facturas_pagos" class="form-control" placeholder="contact" id="edit_contacto_facturas_pagos">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="valfac" >Valor Fact Ext $</span>
                        <input type="number" name="edit_valor_factura_ext" class="form-control" id="edit_valor_factura_ext" placeholder="$">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutafact">Ruta Fact</span>
                        <input type="file" name="edit_ruta_factura_ext" id="edit_ruta_factura_ext" class="form-control" placeholder="Ruta" style="display: inline-block;">
                        <div id="showfacext" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Emite Factura?</span>
                        {!! Form::select('edit_se_emite_factura',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_se_emite_factura']) !!}
                    </div>
               </div>                                           
              </div>                             

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Factura valor Mercancia?</span>
                        {!! Form::select('edit_se_factura_valor_mercancia',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_se_factura_valor_mercancia']) !!}
                    </div>
               </div>                 
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
              </div>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="descope">Descripcion Ope</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_descripcion_operacion" id="edit_descripcion_operacion" class="form-control" placeholder="descripcion_operacion">
                    </div>
               </div>                 
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
              </div>  


              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutcot" >Ruta Cotizacion</span>
                        <input type="file" name="edit_ruta_cotizacion_cliente" id="edit_ruta_cotizacion_cliente" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showcot" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="obs" >Observaciones</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_observaciones" id="edit_observaciones" class="form-control" placeholder="observaciones">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="fecdep" >Fecha Depo.</span>
                        <input type="date" name="edit_fecha_deposito_cliente" id="edit_fecha_deposito_cliente" class="form-control" placeholder="Fecha Deposito">
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="impodep" >Importe deposito cliente $</span>
                        <input type="number" name="edit_importe_deposito_cliente" id="edit_importe_deposito_cliente" class="form-control" placeholder="$">
                    </div>
               </div>                                        
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutdepo" >Ruta Deposito</span>
                        <input type="file" name="edit_ruta_importe_deposito_cliente" id="edit_ruta_importe_deposito_cliente" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showdep" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="refer">Referencia</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_referencia" id="edit_referencia" class="form-control" placeholder="Referencia">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi">No Pedimento</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento" id="edit_no_pedimento" class="form-control" placeholder="Pedimento">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutpedi" >Ruta Pedimento</span>
                        <input type="file" name="edit_ruta_pedimento" id="edit_ruta_pedimento" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showped" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                                         
              </div>  

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="impcg" >Importe CG $</span>
                        <input type="number" name="edit_importe_cg" id="edit_importe_cg" class="form-control" placeholder="$">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="feccg" >Fecha CG</span>
                        <input type="date" name="edit_fecha_cg" id="edit_fecha_cg" class="form-control" placeholder="Fecha CG">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="foliocg">Folio CG</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_folio_cg" id="edit_folio_cg" class="form-control" placeholder="Folio">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutfol">Ruta Folio</span>
                        <input type="file" name="edit_ruta_folio_cg" id="edit_ruta_folio_cg" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showfol" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                                          
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="imporfac">Importe Facturado Cliente $</span>
                        <input type="number" name="edit_importe_facturado_cliente" id="edit_importe_facturado_cliente" class="form-control" placeholder="$">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutfaccli" >Ruta Facturado</span>
                        <input type="file" name="edit_ruta_facturado_cliente" id="edit_ruta_facturado_cliente" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showfac" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="costotal">Costeo Total $</span>
                        <input type="number" name="edit_costeo_total" id="edit_costeo_total" class="form-control" placeholder="$">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutcos" >Ruta costeo</span>
                        <input type="file" name="edit_ruta_costeo" id="edit_ruta_costeo" class="form-control" placeholder="ruta" style="display: inline-block;">
                        <div id="showcost" value="0" style="display: none;" class="form-control btn btn-success" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                                        
              </div>    

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="cierr">Cierre $</span>
                        <input type="number" name="edit_cierre" id="edit_cierre" class="form-control" placeholder="$">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="feccierre" >Fecha Cierre</span>
                        <input type="date" name="edit_fecha_cierre" id="edit_fecha_cierre" class="form-control" placeholder="Fecha Cierre">
                    </div>
               </div>
               <div class="form-group col-md-4">
                    <div class="input-group">
                       <span class="input-group-addon" id="usercap">Usuario Captura</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_user" id="edit_user" class="form-control" placeholder="Folio">
                    </div>
               </div>                                                                                
              </div>                                                           
              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary','id' =>'buttonreg','style' => 'display: inline-block;']) !!} 
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