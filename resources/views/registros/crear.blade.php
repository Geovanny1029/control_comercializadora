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
              {!! Form::open(['route' => 'registro.store', 'method' => 'POST','files'=>true]) !!}
              <div class="row"> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                      <input type="text" id="newstate" style="text-transform:uppercase;" name="newstate" placeholder="Nuevo Cliente" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-success" id="btn-add-state" type="button">Agregar</button>
                      </span>
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                      <input type="text" id="newprov" style="text-transform:uppercase;" name="newprov" placeholder="Nuevo Proveedor" class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-success" id="btn-add-prov" type="button">Agregar</button>
                      </span>
                    </div>
               </div>               
              </div>
              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Cliente</span>
                        {!! Form::select('id_cliente',$clientes,null,['class' => 'form-control','id'=>'clientes']) !!}
                    </div>

               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon">Razon Social</span>
                        {!! Form::select('id_razon_datos_fac',$clientes,null,['class' => 'form-control','id'=>'razon']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >+</span>
                        <input type="file" name="ruta_razonsocial" class="form-control" placeholder="Username">
                    </div>
               </div>  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Contacto Facturas Pagos</span>
                        <input type="text" style="text-transform:uppercase;" name="contacto_facturas_pagos" class="form-control" placeholder="Username">
                    </div>
               </div>                                           
              </div><br>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Forma Pago</span>
                        {!! Form::select('forma_pago',["1"=>"Efectivo","2"=>"Transferencia"],null,['class' => 'form-control','id'=>'Forma Pago']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Pagamos Mercancia?</span>
                        {!! Form::select('pagamos_mercancia',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'pagamos_mercancia']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Proveedor Ext</span>
                        {!! Form::select('id_proveedor',$proveedores,null,['class' => 'form-control','id'=>'proveedores']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Proveedor</span>
                        <input type="file" name="ruta_proveedor" class="form-control" placeholder="Proveedor">
                    </div>
               </div>                                            
              </div><br>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Valor Fact Ext $</span>
                        <input type="number" name="valor_factura_ext" class="form-control" placeholder="$">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Fact</span>
                        <input type="file" name="ruta_factura_ext" class="form-control" placeholder="Ruta">
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Emite Factura?</span>
                        {!! Form::select('se_emite_factura',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'se_emite_factura']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Se Factura valor Mercancia?</span>
                        {!! Form::select('se_factura_valor_mercancia',["1"=>"Si","2"=>"No"],null,['class' => 'form-control','id'=>'se_factura_valor_mercancia']) !!}
                    </div>
               </div>                                           
              </div> <br>                            

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Aduana</span>
                        {!! Form::select('id_aduana',$aduanas,null,['class' => 'form-control','id'=>'aduanas']) !!}
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ejecutivo</span>
                        {!! Form::select('id_ejecutivo',$ejecutivos,null,['class' => 'form-control','id'=>'ejecutivos']) !!}
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Estatus</span>
                        {!! Form::select('id_estatus',$estatus,null,['class' => 'form-control','id'=>'estatus']) !!}
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Descripcion Ope</span>
                        <input type="text" style="text-transform:uppercase;" name="descripcion_operacion" class="form-control" placeholder="descripcion_operacion">
                    </div>
               </div>                                         
              </div><br>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Eta</span>
                        <input type="date" name="eta" class="form-control" placeholder="Eta">
                    </div>
               </div>  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha Despacho</span>
                        <input type="date" name="fecha_despacho" class="form-control" placeholder="Eta">
                    </div>
               </div>                
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Cotizacion Cliente $</span>
                        <input type="number" name="cotizacion_cliente_mxp" class="form-control" placeholder="$">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Cotizacion</span>
                        <input type="file" name="ruta_cotizacion_cliente" class="form-control" placeholder="ruta">
                    </div>
               </div>                                          
              </div>  <br>


              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Observaciones</span>
                        <input type="text" style="text-transform:uppercase;" name="observaciones" class="form-control" placeholder="observaciones">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha Depo</span>
                        <input type="date" name="fecha_deposito_cliente" class="form-control" placeholder="Fecha Deposito">
                    </div>
               </div>                  
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Importe deposito cliente $</span>
                        <input type="number" name="importe_deposito_cliente" class="form-control" placeholder="$">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Deposito</span>
                        <input type="file" name="ruta_importe_deposito_cliente" class="form-control" placeholder="ruta">
                    </div>
               </div>                                         
              </div> <br>

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Referencia</span>
                        <input type="text" style="text-transform:uppercase;" name="referencia" class="form-control" placeholder="Referencia">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >No Pedimento</span>
                        <input type="text" style="text-transform:uppercase;" name="no_pedimento" class="form-control" placeholder="Pedimento">
                    </div>
               </div>                 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Ruta Pedimento</span>
                        <input type="file" name="ruta_pedimento" class="form-control" placeholder="ruta">
                    </div>
               </div>
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Importe CG $</span>
                        <input type="number" name="importe_cg" class="form-control" placeholder="$">
                    </div>
               </div>                                          
              </div> <br> 

              <div class="row">
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Fecha CG</span>
                        <input type="date" name="fecha_cg" class="form-control" placeholder="Fecha CG">
                    </div>
               </div> 
               <div class="form-group col-md-3">
                    <div class="input-group">
                       <span class="input-group-addon" >Folio CG</span>
                        <input type="text" style="text-transform:uppercase;" name="folio_cg" class="form-control" placeholder="Folio">
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
              </div> <br>

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
              </div> <br>   

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
              </div>                                                           
              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Registrar',[ 'class' => 'btn btn-primary']) !!} 
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