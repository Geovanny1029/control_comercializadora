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
<!--                <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="razz" >Ruta Razon</span>
                        <input type="file" name="edit_ruta_razonsocial" class="form-control btndisable" id="edit_ruta_razonsocial" placeholder="ruta razonsocial" style="display: inline-block;">
                        <div id="showrut" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div> --> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="forma">Tipo Operacion</span>
                        {!! Form::select('edit_tipo_operacion',["1"=>"IMPORTACION","2"=>"EXPORTACION"],null,['class' => 'form-control','id'=>'edit_tipo_operacion']) !!}
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Emite Factura?</span>
                        {!! Form::select('edit_se_emite_factura',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'edit_se_emite_factura']) !!}
                    </div>
               </div>                                                           
              </div><br>

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
                        <div id="provs" value = ""  class="form-control btn btn-primary" >
                         VER PROVEEDORES
                        </div>
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="fxc" >Facturacion por Concepto</span>
                        {!! Form::select('facturacionxconcepto_edit',["1"=>"Servicio","2"=>"Mercancia"],null,['class' => 'form-control','id'=>'facturacionxconcepto_edit']) !!}
                    </div>
               </div>
              </div><br>
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="condpag" >Condiciones de Pago</span>
                        {!! Form::select('condicion_pago_edit',[""=>"Selecciona","1"=>"Credito","2"=>"Anticipo","3"=>"Contado"],null,['class' => 'form-control','id'=>'condicion_pago_edit']) !!}
                    </div>
               </div>
               <div class="form-group col-md-3" style="display: none;" id="idfcp_edit">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha Condicion</span>
                        <input type="date" name="fecha_condicionp_edit" id="fecha_condicionp_edit" class="form-control" placeholder="Fecha">
                    </div>
                    <input type="checkbox" value="1" name="checkpago_edit" id="checkpago_edit" aria-label="Checkbox for following text input"> Desactivar notificaciones
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="tipoimp" >Tipo de Importacion</span>
                        {!! Form::select('tipo_importacion_edit',[""=>"Selecciona","1"=>"Temporal","2"=>"Definitiva"],null,['class' => 'form-control','id'=>'tipo_importacion_edit']) !!}
                    </div>
               </div>
               <div class="form-group col-md-3" style="display: none;" id="timp_edit">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha</span>
                        <input type="date" name="fecha_pedimento_importacion_edit" class="form-control" id="fecha_pedimento_importacion_edit" placeholder="Fecha">
                    </div>
                    <input type="checkbox" value="1" name="checktipoimpo_edit" id="checktipoimpo_edit" aria-label="Checkbox for following text input"> Desactivar notificaciones
               </div>
              </div><br>
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="contact" >Contacto Facturas Pagos</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_contacto_facturas_pagos" class="form-control" placeholder="contact" id="edit_contacto_facturas_pagos">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                       <div id="edit_valor_fa">
                      </div>
                      <div id="addvalorfacedit">
                        
                      </div>
               </div>
               <div class="form-group col-md-1">
                       <div id="edit_moneda_valorfac">
                      </div>
                      <div id="addmonedavalorfacedit">
                        
                      </div>
               </div>
               <div class="form-group col-md-2">
                       <div id="edit_no_factura_div">
                      </div>
                      <div id="addnofacturaedit">
                        
                      </div>
               </div>
               <div class="form-group col-md-2">
                       <div id="edit_rutafac_div">
                      </div>
                      <div id="addrutafacturaextedit">
                        
                      </div>
               </div>                
<!--                <div class="form-group col-md-4">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutafact">Ruta Fact</span>
                        <input type="file" name="edit_ruta_factura_ext" id="edit_ruta_factura_ext" class="form-control btndisable" placeholder="Ruta" style="display: inline-block;">
                        <div id="showfacext" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div> -->                                                             
              </div> <br>                            

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
              </div><br>

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
                        <input type="number" step="any" name="edit_cotizacion_cliente_mxp" id="edit_cotizacion_cliente_mxp" class="form-control" placeholder="$">
                    </div>
               </div>                                          
              </div>  


              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutcot" >Ruta Cotizacion</span>
                        <input type="file" name="edit_ruta_cotizacion_cliente" id="edit_ruta_cotizacion_cliente" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                        <div id="showcot" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                 
               <div class="form-group col-md-4">
                       <div id="edit_fecha_dep">
                      </div>
                      <div id="addfechadepoedit">
                        
                      </div>
               </div>                   
               <div class="form-group col-md-4">
                       <div id="edit_importe_dep_cli">
                      </div>
                      <div id="addimportedepedit">
                        
                      </div>
               </div>                                         
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutdepo" >Ruta Deposito</span>
                        <input type="file" name="edit_ruta_importe_deposito_cliente" id="edit_ruta_importe_deposito_cliente" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
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
                       <span class="input-group-addon" id="obs" >Observaciones</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_observaciones" id="edit_observaciones" class="form-control" placeholder="observaciones">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="importecomi" >Importe Comision $</span>
                        <input type="number" step="any" name="importe_comision_edit" id="importe_comision_edit" class="form-control" placeholder="$">
                    </div>
               </div>                                           
            </div><br>  
            <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi">Pedimento 1</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento" id="edit_no_pedimento" class="form-control" placeholder="Pedimento1">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento1" id="edit_obs_pedimento1" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento" id="edit_ruta_pedimento" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi4">Pedimento 4</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento4" id="edit_no_pedimento4" class="form-control" placeholder="Pedimento4">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento4" id="edit_obs_pedimento4" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento4" id="edit_ruta_pedimento4" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped4" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div>                             
            </div><br>
            <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi2">Pedimento 2</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento2" id="edit_no_pedimento2" class="form-control" placeholder="Pedimento2">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento2" id="edit_obs_pedimento2" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento2" id="edit_ruta_pedimento2" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped2" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi5">Pedimento 5</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento5" id="edit_no_pedimento5" class="form-control" placeholder="Pedimento5">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento5" id="edit_obs_pedimento5" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento5" id="edit_ruta_pedimento5" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped5" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div>                             
            </div><br>
            <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi3">Pedimento 3</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento3" id="edit_no_pedimento3" class="form-control" placeholder="Pedimento3">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento3" id="edit_obs_pedimento3" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento3" id="edit_ruta_pedimento3" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped3" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="pedi6">Pedimento 6</span>
                        <input type="text" style="text-transform:uppercase;" name="edit_no_pedimento6" id="edit_no_pedimento6" class="form-control" placeholder="Pedimento6">
                    </div>
               </div> 
               <div class="form-group col-md-2">
                  <input type="text" style="text-transform:uppercase;" name="edit_obs_pedimento6" id="edit_obs_pedimento6" class="form-control" placeholder="Observaciones">
               </div> 
               <div class="form-group col-md-1">                
                  <input type="file" name="edit_ruta_pedimento6" id="edit_ruta_pedimento6" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                  <div id="showped6" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                  </div>                    
               </div>                           
            </div><br>                        
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="impcg" >Importe CG $</span>
                        <input type="number" step="any" name="edit_importe_cg" id="edit_importe_cg" class="form-control" placeholder="$">
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
                        <input type="file" name="edit_ruta_folio_cg" id="edit_ruta_folio_cg" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                        <div id="showfol" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>                                          
              </div> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="cfdi">Folio CFDI $</span>
                        <input type="text" step="any" name="folio_cfdi_edit" id="folio_cfdi_edit" class="form-control" placeholder="cfdi">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="imporfac">Importe Fac antes de IVA $</span>
                        <input type="number" step="any" name="edit_importe_facturado_cliente" id="edit_importe_facturado_cliente" class="form-control" placeholder="$">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutfaccli" >Ruta Facturado</span>
                        <input type="file" name="edit_ruta_facturado_cliente" id="edit_ruta_facturado_cliente" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                        <div id="showfac" value="0" style="display: none;" class="form-control btn btn-primary" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="costotal">Costeo Total $</span>
                        <input type="number" step="any" name="edit_costeo_total" id="edit_costeo_total" class="form-control" placeholder="$">
                    </div>
               </div>                                                        
              </div>    

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="rutcos" >Ruta costeo</span>
                        <input type="file" name="edit_ruta_costeo" id="edit_ruta_costeo" class="form-control btndisable" placeholder="ruta" style="display: inline-block;">
                        <div id="showcost" value="0" style="display: none;" class="form-control btn btn-success" data-lity>
                         VER PDF
                        </div>
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="devuelto" >Importe Devuelto Cliente $</span>
                        <input type="number" step="any" name="importe_devuelto_edit" id="importe_devuelto_edit" class="form-control" placeholder="$">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" id="cierr">Cierre $</span>
                        <input type="number" step="any" name="edit_cierre" id="edit_cierre" class="form-control" placeholder="$">
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
               </div>                                           <div class="form-group col-md-2">
                  <div id="infadicional">
                  </div>
              </div>                               
              </div>                                                        
              <div id="edit_form_contabilidad" style="display: none">
                <br>
              <center>Datos Contabilidad</center><hr> 
                <div class="row" >
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_fecha_factura_fiscal" >Fecha factura Fiscal</span>
                            <input type="text" style="text-transform:uppercase;" name="edit_fecha_factura_fiscal" id="edit_fecha_factura_fiscal" class="form-control" placeholder="fecha factura">
                        </div>
                   </div> 
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_estatus_contabilidad" >Estatus Contabilidad</span>
                            {!! Form::select('edit_estatus_contabilidad',["1"=>"Pagada","2"=>"Pagada a satisfaccion del acreedor","3"=>"Saldo pendiente"],null,['class' => 'form-control','id'=>'edit_estatus_contabilidad']) !!}
                        </div>
                   </div>
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_saldo_pendiente_cobro" >Saldo Pendiente Cobro $</span>
                            <input type="number" step="any" name="edit_saldo_pendiente_cobro" id="edit_saldo_pendiente_cobro" class="form-control" placeholder="$">
                        </div>
                   </div> 
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_moneda_facturacion" >Moneda Facturacion</span>
                            <input type="text" style="text-transform:uppercase;" name="edit_moneda_facturacion" id="edit_moneda_facturacion" class="form-control" placeholder="$">
                        </div>
                   </div> 
                </div>
                <div class="row">
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_tc_contable" >TC Contable</span>
                            <input type="number" step="any" name="edit_tc_contable" id="edit_tc_contable" class="form-control" placeholder="$">
                        </div>
                   </div>
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_ingreso_real_contable" >Ingreso real/Contable</span>
                            <input type="number" step="any" name="edit_ingreso_real_contable" id="edit_ingreso_real_contable" class="form-control" placeholder="$">
                        </div>
                   </div>
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_costo_real_contable" >Costo real/ Contable </span>
                            <input type="number" step="any" name="edit_costo_real_contable" id="edit_costo_real_contable" class="form-control" placeholder="$">
                        </div>
                   </div>
                   <div class="form-group col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_ganancia_real_contable" >Ganancia real/ Contable</span>
                            <input type="number" step="any" name="edit_ganancia_real_contable" id="edit_ganancia_real_contable" class="form-control" placeholder="$">
                        </div>
                   </div>                                                         
                </div>
                <div class="row">
                   <div class="form-group col-md-4">
                        <div class="input-group">
                           <span class="input-group-addon" id="span_ejecutivo_dombart" >Ejecutivo Dombart</span>
                            {!! Form::select('edit_ejecutivo_dombart',$ejecutivos_dombart,null,['class' => 'form-control','id'=>'edit_ejecutivo_dombart']) !!}
                        </div>
                   </div>
                </div>
              </div>               

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary btndisable','id' =>'buttonreg','style' => 'display: inline-block;']) !!} 
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