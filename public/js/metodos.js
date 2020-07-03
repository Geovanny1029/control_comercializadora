$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});

$(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://localhost:8000/datatable/getdata",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nombre_cliente', name: 'nombre_cliente'},

        {
    
          "createdCell": function(td,cell,d,row,col){
            if (d.status == 1) {
              $(td).attr('class','btn-success');
            }else{
              $(td).attr('class','btn-danger');
            }
          }
        }             
          
        ]
    });
});
//vista editar usuario
function fun_editu(id)
    {
      var view_url = $("#editaru").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_user").val(result.user);
          $("#edit_password").val(result.backup_password);
          $("#edit_nombre").val(result.nombre);
          $("#edit_email").val(result.email);
          $("#edit_nivel").val(result.nivel);
          $("#edit_estatus").val(result.estatus);
          $("#edit_idu").val(result.id);
        }
      });
    }

//vista editar aduana
function fun_editad(id)
    {
      var view_url = $("#editad").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_aduana").val(result.nombre_aduana);
          $("#edit_idad").val(result.id);
        }
      });
    }

//vista editar cliente
function fun_editcli(id)
    {
      var view_url = $("#editacli").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_cliente").val(result.nombre_cliente);
          $("#edit_idcliente").val(result.id);
        }
      });
    }

//vista editar ejecutivo
function fun_editeje(id)
    {
      var view_url = $("#editaeje").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_ejecutivo").val(result.nombre_ejecutivo);
          $("#edit_ideje").val(result.id);
        }
      });
    }

//vista editar estatus
function fun_edites(id)
    {
      var view_url = $("#editaes").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_estatus").val(result.nombre_estatus);
          $("#edit_ides").val(result.id);
        }
      });
    }


//vista editar forma de pago
function fun_editfp(id)
    {
      var view_url = $("#editafp").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_pago").val(result.nombre_pago);
          $("#edit_idfp").val(result.id);
        }
      });
    }

//vista editar razon
function fun_editra(id)
    {
      var view_url = $("#editara").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_razon").val(result.nombre_razon);
          $("#edit_idrazon").val(result.id);
        }
      });
    }

//vista editar proveedor
function fun_editapro(id)
    {
      var view_url = $("#editapro").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_nombre_proveedor").val(result.nombre_proveedor);
          $("#edit_idprov").val(result.id);
        }
      });
    }

    function modal(id,cerr){

      var view_url = "http://dombart.mx/control_comercializadora/public/registroe"
      var tipo =  cerr;
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);
          if(tipo == 1){
            $("#check").css("display",'inline-block');
            $("#buttonreg").css("display",'inline-block');
            $(":input").attr('readonly', true);
            $('#id_registro').attr('readonly', true);
            $('#folio').attr('readonly', true);
            $('input[type=checkbox]').prop('checked', false);

            $('input[type=checkbox]').click(function() {
            if($(this).is(':checked')) {
              $(":input").attr('readonly', false);
              $('#id_registro').attr('readonly', true);
              $('#folio').attr('readonly', true);
            } else {
              $(":input").attr('readonly', true);
              $('#id_registro').attr('readonly', true);
              $('#folio').attr('readonly', true);

            }
          });
          }else{
            $(":input").attr('readonly', true);
            $("#check").css("display",'none');
            $("#buttonreg").css("display",'none');
            $('#id_registro').attr('readonly', true);
            $('#folio').attr('readonly', true);
          }


          $('#edit_id_registro').val(result.info.id);
          $('#folio').val(result.info.no_operacion);
          $("#id_registro").val(result.info.id);
          $('#id_registro').attr('readonly', true);
          $('#edit_id_cliente').val(result.cliente.id);
          $('#edit_id_cliente').attr('readonly', true);
          $('#edit_id_razon_datos_fac').val(result.info.id_razon_datos_fac);
          $('#edit_id_razon_datos_fac').attr('readonly', true);
          
// metodos js lity href archivos
          if(result.info.ruta_razonsocial == "" || result.info.ruta_razonsocial == null){
            $('#edit_ruta_razonsocial').val(result.info.ruta_razonsocial);
            $('#edit_ruta_razonsocial').css("display",'inline-block');
             $('#showrut').css("display",'none');
            $("#razz").css("color", "red");
          }else{
            $('#edit_ruta_razonsocial').css("display",'none');
            $('#showrut').css("display",'inline-block');
            $('#showrut').val('1');
            $('#showrut').attr("href", "/control_comercializadora/public/razon_social/"+result.info.ruta_razonsocial);
            $("#razz").css("color", "gray");
          }

          if(result.info.ruta_proveedor == "" || result.info.ruta_proveedor == null){
            $('#edit_ruta_proveedor').val(result.info.ruta_proveedor);
            $('#edit_ruta_proveedor').css("display",'inline-block');
             $('#showprov').css("display",'none');
            $("#rutpro").css("color", "red");
          }else{
            $('#edit_ruta_proveedor').css("display",'none');
            $('#showprov').css("display",'inline-block');
            $('#showprov').val('1');
             $('#showprov').attr("href", "/control_comercializadora/public/proveedores/"+result.info.ruta_proveedor);
            $("#rutpro").css("color", "gray");
          }

          if(result.info.ruta_factura_ext == "" || result.info.ruta_factura_ext == null){
            $('#edit_ruta_factura_ext').val(result.info.ruta_factura_ext);
            $('#edit_ruta_factura_ext').css("display",'inline-block');
             $('#showfacext').css("display",'none');
            $("#rutafact").css("color", "red");
          }else{
            $('#edit_ruta_factura_ext').css("display",'none');
            $('#showfacext').css("display",'inline-block');
            $('#showfacext').val('1');
             $('#showfacext').attr("href", "/control_comercializadora/public/facturasext/"+result.info.ruta_factura_ext);
            $("#rutafact").css("color", "gray");
          }

          if(result.info.ruta_cotizacion_cliente == "" || result.info.ruta_cotizacion_cliente == null){
            $('#edit_ruta_cotizacion_cliente').val(result.info.ruta_cotizacion_cliente);
            $('#edit_ruta_cotizacion_cliente').css("display",'inline-block');
             $('#showcot').css("display",'none');
            $("#rutcot").css("color", "red");
          }else{
            $('#edit_ruta_cotizacion_cliente').css("display",'none');
            $('#showcot').css("display",'inline-block');
            $('#showcot').val('1');
             $('#showcot').attr("href", "/control_comercializadora/public/cotizaciones/"+result.info.ruta_cotizacion_cliente);
            $("#rutcot").css("color", "gray");
          }

          if(result.info.ruta_importe_deposito_cliente == "" || result.info.ruta_importe_deposito_cliente == null){
            $('#edit_ruta_importe_deposito_cliente').val(result.info.ruta_importe_deposito_cliente);
            $('#edit_ruta_importe_deposito_cliente').css("display",'inline-block');
             $('#showdep').css("display",'none');
            $("#rutdepo").css("color", "red");
          }else{
            $('#edit_ruta_importe_deposito_cliente').css("display",'none');
            $('#showdep').css("display",'inline-block');
            $('#showdep').css('1');
             $('#showdep').attr("href", "/control_comercializadora/public/depositos_cliente/"+result.info.ruta_importe_deposito_cliente);
            $("#rutdepo").css("color", "gray");
          }

          if(result.info.ruta_pedimento == "" || result.info.ruta_pedimento == null){
            $('#edit_ruta_pedimento').val(result.info.ruta_pedimento);
            $('#edit_ruta_pedimento').css("display",'inline-block');
             $('#showped').css("display",'none');
            $("#rutpedi").css("color", "red");
          }else{
            $('#edit_ruta_pedimento').css("display",'none');
            $('#showped').css("display",'inline-block');
            $('#showped').val('1');
             $('#showped').attr("href", "/control_comercializadora/public/pedimentos/"+result.info.ruta_pedimento);
            $("#rutpedi").css("color", "gray");
          }

          if(result.info.ruta_folio_cg == "" || result.info.ruta_folio_cg == null){
            $('#edit_ruta_folio_cg').val(result.info.ruta_folio_cg);
            $('#edit_ruta_folio_cg').css("display",'inline-block');
             $('#showfol').css("display",'none');
            $("#rutfol").css("color", "red");
          }else{
            $('#edit_ruta_folio_cg').css("display",'none');
            $('#showfol').css("display",'inline-block');
            $('#showfol').val('1');
             $('#showfol').attr("href", "/control_comercializadora/public/folios_cg/"+result.info.ruta_folio_cg);
            $("#rutfol").css("color", "gray");
          }

          if(result.info.ruta_facturado_cliente == "" || result.info.ruta_facturado_cliente == null){
            $('#edit_ruta_facturado_cliente').val(result.info.ruta_facturado_cliente);
            $('#edit_ruta_facturado_cliente').css("display",'inline-block');
             $('#showfac').css("display",'none');
            $("#rutfaccli").css("color", "red");
          }else{
            $('#edit_ruta_facturado_cliente').css("display",'none');
            $('#showfac').css("display",'inline-block');
            $('#showfac').val('1');
             $('#showfac').attr("href", "/control_comercializadora/public/importes_facturados/"+result.info.ruta_facturado_cliente);
            $("#rutfaccli").css("color", "gray");
          }

          if(result.info.ruta_costeo == "" || result.info.ruta_costeo == null){
            $('#edit_ruta_costeo').val(result.info.ruta_costeo);
            $('#edit_ruta_costeo').css("display",'inline-block');
             $('#showcost').css("display",'none');
            $("#rutcos").css("color", "red");
          }else{
            $('#edit_ruta_costeo').css("display",'none');
            $('#showcost').css("display",'inline-block');
            $('#showcost').val('1');
             $('#showcost').attr("href", "/control_comercializadora/public/costeos_totales/"+result.info.ruta_costeo);
            $("#rutcos").css("color", "gray");
          }

// fin metodos js lity href archivos
          if(result.info.contacto_facturas_pagos == "" || result.info.contacto_facturas_pagos == null ){
            $("#edit_contacto_facturas_pagos").val(result.info.contacto_facturas_pagos);
            $("#contact").css("color", "red");
          }else{
            $("#edit_contacto_facturas_pagos").val(result.info.contacto_facturas_pagos);
            $("#contact").css("color", "gray"); 
          }

          $('#edit_forma_pago').val(result.info.forma_pago);
          $('#edit_pagamos_mercancia').val(result.info.pagamos_mercancia);
          $('#edit_tipo_operacion').val(result.info.tipo_operacion);
          $('#edit_proveedores').val(result.info.id_proveedor);


          if(result.info.valor_factura_ext == "" || result.info.valor_factura_ext == null ){
            $('#edit_valor_factura_ext').val(result.info.valor_factura_ext);
            $("#valfac").css("color", "red");
          }else{
            $('#edit_valor_factura_ext').val(result.info.valor_factura_ext);
            $("#valfac").css("color", "gray");
          }


          $('#edit_se_emite_factura').val(result.info.se_emite_factura);
          $('#edit_se_factura_valor_mercancia').val(result.info.se_factura_valor_mercancia);
          $('#edit_aduanas').val(result.info.id_aduana);
          $('#edit_ejecutivos').val(result.info.id_ejecutivo);
          $('#edit_estatus').val(result.info.id_estatus);

          if(result.info.descripcion_operacion== "" || result.info.descripcion_operacion== null){
            $('#edit_descripcion_operacion').val(result.info.descripcion_operacion);
            $("#descope").css("color", "red");
          }else{
            $('#edit_descripcion_operacion').val(result.info.descripcion_operacion);
            $("#descope").css("color", "gray");
          }

          if(result.info.eta== "" || result.info.eta== null){
            $('#edit_eta').val(result.info.eta);
            $("#feceta").css("color", "red");
          }else{
            $('#edit_eta').val(result.info.eta);
            $("#feceta").css("color", "gray");
          }

          if(result.info.fecha_despacho== "" || result.info.fecha_despacho== null){
            $('#edit_fecha_despacho').val(result.info.fecha_despacho);
            $("#fecdesp").css("color", "red");
          }else{
            $('#edit_fecha_despacho').val(result.info.fecha_despacho);
            $("#fecdesp").css("color", "gray");
          }

          if(result.info.cotizacion_cliente_mxp == "" || result.info.cotizacion_cliente_mxp == null){
            $('#edit_cotizacion_cliente_mxp').val(result.info.cotizacion_cliente_mxp);
            $("#cotcli").css("color", "red");
          }else{
            $('#edit_cotizacion_cliente_mxp').val(result.info.cotizacion_cliente_mxp);
            $("#cotcli").css("color", "gray");
          }

          if(result.info.observaciones == "" || result.info.observaciones == null){
            $('#edit_observaciones').val(result.info.observaciones);
            $("#obs").css("color", "red");
          }else{
            $('#edit_observaciones').val(result.info.observaciones);
            $("#obs").css("color", "gray");
          }

          if(result.info.fecha_deposito_cliente == "" || result.info.fecha_deposito_cliente == null){
            $('#edit_fecha_deposito_cliente').val(result.info.fecha_deposito_cliente);
            $("#fecdep").css("color", "red");
          }else{
            $('#edit_fecha_deposito_cliente').val(result.info.fecha_deposito_cliente);
            $("#fecdep").css("color", "gray");
          }

          if(result.info.importe_deposito_cliente == "" || result.info.importe_deposito_cliente == null){
            $('#edit_importe_deposito_cliente').val(result.info.importe_deposito_cliente);
            $("#impodep").css("color", "red");
          }else{
            $('#edit_importe_deposito_cliente').val(result.info.importe_deposito_cliente);
            $("#impodep").css("color", "gray");
          }


          if(result.info.referencia == "" || result.info.referencia == null){
            $('#edit_referencia').val(result.info.referencia);
            $("#refer").css("color", "red");
          }else{
            $('#edit_referencia').val(result.info.referencia);
            $("#refer").css("color", "gray");
          }

          if(result.info.no_pedimento == "" || result.info.no_pedimento == null){
            $('#edit_no_pedimento').val(result.info.no_pedimento);
            $("#pedi").css("color", "red");
          }else{
            $('#edit_no_pedimento').val(result.info.no_pedimento);
            $("#pedi").css("color", "gray");
          } 


          if(result.info.importe_cg == "" || result.info.importe_cg == null){
            $('#edit_importe_cg').val(result.info.importe_cg);
            $("#impcg").css("color", "red");
          }else{
            $('#edit_importe_cg').val(result.info.importe_cg);
            $("#impcg").css("color", "gray");
          } 

          if(result.info.fecha_cg == "" || result.info.fecha_cg == null){
            $('#edit_fecha_cg').val(result.info.fecha_cg);
            $("#foliocg").css("color", "red");
          }else{
            $('#edit_fecha_cg').val(result.info.fecha_cg);
            $("#foliocg").css("color", "gray");
          } 

          if(result.info.folio_cg == "" || result.info.folio_cg == null){
            $('#edit_folio_cg').val(result.info.folio_cg);
            $("#foliocg").css("color", "red");
          }else{
            $('#edit_folio_cg').val(result.info.folio_cg);
            $("#foliocg").css("color", "gray");
          }  
 

          if(result.info.importe_facturado_cliente == "" || result.info.importe_facturado_cliente == null){
            $('#edit_importe_facturado_cliente').val(result.info.importe_facturado_cliente);
            $("#imporfac").css("color", "red");
          }else{
            $('#edit_importe_facturado_cliente').val(result.info.importe_facturado_cliente);
            $("#imporfac").css("color", "gray");
          } 


          if(result.info.costeo_total == "" || result.info.costeo_total == null){
            $('#edit_costeo_total').val(result.info.costeo_total );
            $("#costotal").css("color", "red");
          }else{
            $('#edit_costeo_total').val(result.info.costeo_total );
            $("#costotal").css("color", "gray");
          }  
                   

          if(result.info.cierre == "" || result.info.cierre == null){
            $('#edit_cierre').val(result.info.cierre );
            $("#cierr").css("color", "red");
          }else{
            $('#edit_cierre').val(result.info.cierre);
            $("#cierr").css("color", "gray");
          }    

          if(result.info.fecha_cierre == "" || result.info.fecha_cierre == null){
            $('#edit_fecha_cierre').val(result.info.fecha_cierre );
            $("#feccierre").css("color", "red");
          }else{
            $('#edit_fecha_cierre').val(result.info.fecha_cierre);
            $("#feccierre").css("color", "gray");
          }    

          $('#edit_user').val(result.usuario.nombre);          
        }
      });

       $("#edit_fecha_cierre").on("change",function(){
        var revisa =  $('#edit_costeo_total').val();
        var revisa2 =  $('#showcost').val();
        var revisa3 =  $('#edit_importe_facturado_cliente').val();
        var revisa4 =  $('#showfac').val();
        var revisa5 =  $('#edit_cierre').val();


        if(revisa == "" || revisa == null || revisa2 == 0  || revisa3 == "" || revisa3 == null || revisa4 == 0 || revisa5 == "" || revisa5 == null){
          alert("Para Cerrar el Registro debes acompletar los campos: \r -Costeo \r -Archivo Costeo \r -Importe factura \r -Archivo Factura \r -Cierre");
           $('#edit_fecha_cierre').val(""); 
        }else{
          
        }
           
        
          
        // var otro=$('#edit_id_registro').val(result.info.id);
        // var valorSelect=$(this).val()//obtenemos el valor seleccionado en una variable
        // console.log( valorSelect+otro)
      })

        $('#editModalr').modal({
        keyboard: true,
        backdrop: "static"
    });

};
    
function cierre(){
  alert('fecha de cierre');
   $('#edit_fecha_cierre').val("");     
}