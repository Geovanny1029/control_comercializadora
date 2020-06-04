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

    function modal(id){

      var view_url = "http://localhost:8000/registroe"

      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);

          $("#id_registro").val(result.id);
          $('#id_registro').attr('readonly', true);
          $('#edit_id_cliente').val(result.id_cliente);
          $('#edit_id_razon_datos_fac').val(result.id_razon_datos_fac);
          
          if(result.ruta_razonsocial == "" || result.ruta_razonsocial == null){
            $('#edit_ruta_razonsocial').val(result.ruta_razonsocial);
            $("#razz").css("color", "red");
          }else{
            $('#edit_ruta_razonsocial').val(result.ruta_razonsocial);
            $("#razz").css("color", "gray");
          }

          if(result.contacto_facturas_pagos == "" || result.contacto_facturas_pagos == null ){
            $("#edit_contacto_facturas_pagos").val(result.contacto_facturas_pagos);
            $("#contact").css("color", "red");
          }else{
            $("#edit_contacto_facturas_pagos").val(result.contacto_facturas_pagos);
            $("#contact").css("color", "gray"); 
          }

          $('#edit_forma_pago').val(result.forma_pago);
          $('#edit_pagamos_mercancia').val(result.pagamos_mercancia);
          $('#edit_proveedores').val(result.id_proveedor);

          if(result.ruta_proveedor == "" || result.ruta_proveedor == null ){
            $('#edit_ruta_proveedor').val(result.ruta_proveedor);
            $("#rutpro").css("color", "red");
          }else{
            $('#edit_ruta_proveedor').val(result.ruta_proveedor);
            $("#rutpro").css("color", "gray");
          }

          if(result.valor_factura_ext == "" || result.valor_factura_ext == null ){
            $('#edit_valor_factura_ext').val(result.valor_factura_ext);
            $("#valfac").css("color", "red");
          }else{
            $('#edit_valor_factura_ext').val(result.valor_factura_ext);
            $("#valfac").css("color", "gray");
          }

          if(result.ruta_factura_ext == "" || result.ruta_factura_ext == null){
            $('#edit_ruta_factura_ext').val(result.ruta_factura_ext);
            $("#rutafact").css("color", "red");
          }else{
            $('#edit_ruta_factura_ext').val(result.ruta_factura_ext);
            $("#rutafact").css("color", "gray");
          }

          $('#edit_se_emite_factura').val(result.se_emite_factura);
          $('#edit_se_factura_valor_mercancia').val(result.se_factura_valor_mercancia);
          $('#edit_aduanas').val(result.id_aduana);
          $('#edit_ejecutivos').val(result.id_ejecutivo);
          $('#edit_estatus').val(result.id_estatus);

          if(result.descripcion_operacion== "" || result.descripcion_operacion== null){
            $('#edit_descripcion_operacion').val(result.descripcion_operacion);
            $("#descope").css("color", "red");
          }else{
            $('#edit_descripcion_operacion').val(result.descripcion_operacion);
            $("#descope").css("color", "gray");
          }

          if(result.eta== "" || result.eta== null){
            $('#edit_eta').val(result.eta);
            $("#feceta").css("color", "red");
          }else{
            $('#edit_eta').val(result.eta);
            $("#feceta").css("color", "gray");
          }

          if(result.fecha_despacho== "" || result.fecha_despacho== null){
            $('#edit_fecha_despacho').val(result.fecha_despacho);
            $("#fecdesp").css("color", "red");
          }else{
            $('#edit_fecha_despacho').val(result.fecha_despacho);
            $("#fecdesp").css("color", "gray");
          }

          if(result.cotizacion_cliente_mxp == "" || result.cotizacion_cliente_mxp == null){
            $('#edit_cotizacion_cliente_mxp').val(result.cotizacion_cliente_mxp);
            $("#cotcli").css("color", "red");
          }else{
            $('#edit_cotizacion_cliente_mxp').val(result.cotizacion_cliente_mxp);
            $("#cotcli").css("color", "gray");
          }

          if(result.ruta_cotizacion_cliente == "" || result.ruta_cotizacion_cliente == null){
            $('#edit_ruta_cotizacion_cliente').val(result.ruta_cotizacion_cliente);
            $("#rutcot").css("color", "red");
          }else{
            $('#edit_ruta_cotizacion_cliente').val(result.ruta_cotizacion_cliente);
            $("#rutcot").css("color", "gray");
          }

          if(result.observaciones == "" || result.observaciones == null){
            $('#edit_observaciones').val(result.observaciones);
            $("#obs").css("color", "red");
          }else{
            $('#edit_observaciones').val(result.observaciones);
            $("#obs").css("color", "gray");
          }

          if(result.fecha_deposito_cliente == "" || result.fecha_deposito_cliente == null){
            $('#edit_fecha_deposito_cliente').val(result.fecha_deposito_cliente);
            $("#fecdep").css("color", "red");
          }else{
            $('#edit_fecha_deposito_cliente').val(result.fecha_deposito_cliente);
            $("#fecdep").css("color", "gray");
          }

          if(result.importe_deposito_cliente == "" || result.importe_deposito_cliente == null){
            $('#edit_importe_deposito_cliente').val(result.importe_deposito_cliente);
            $("#impodep").css("color", "red");
          }else{
            $('#edit_importe_deposito_cliente').val(result.importe_deposito_cliente);
            $("#impodep").css("color", "gray");
          }

          if(result.ruta_importe_deposito_cliente == "" || result.ruta_importe_deposito_cliente == null){
            $('#edit_ruta_importe_deposito_cliente').val(result.ruta_importe_deposito_cliente);
            $("#rutdepo").css("color", "red");
          }else{
            $('#edit_ruta_importe_deposito_cliente').val(result.ruta_importe_deposito_cliente);
            $("#rutdepo").css("color", "gray");
          }

          if(result.referencia == "" || result.referencia == null){
            $('#edit_referencia').val(result.referencia);
            $("#refer").css("color", "red");
          }else{
            $('#edit_referencia').val(result.referencia);
            $("#refer").css("color", "gray");
          }

          if(result.no_pedimento == "" || result.no_pedimento == null){
            $('#edit_no_pedimento').val(result.no_pedimento);
            $("#refer").css("color", "red");
          }else{
            $('#edit_no_pedimento').val(result.no_pedimento);
            $("#refer").css("color", "gray");
          } 

          if(result.ruta_pedimento == "" || result.ruta_pedimento == null){
            $('#edit_ruta_pedimento').val(result.ruta_pedimento);
            $("#rutpedi").css("color", "red");
          }else{
            $('#edit_ruta_pedimento').val(result.ruta_pedimento);
            $("#rutpedi").css("color", "gray");
          } 

          if(result.importe_cg == "" || result.importe_cg == null){
            $('#edit_importe_cg').val(result.importe_cg);
            $("#impcg").css("color", "red");
          }else{
            $('#edit_importe_cg').val(result.importe_cg);
            $("#impcg").css("color", "gray");
          } 

          if(result.fecha_cg == "" || result.fecha_cg == null){
            $('#edit_fecha_cg').val(result.fecha_cg);
            $("#feccg").css("color", "red");
          }else{
            $('#edit_fecha_cg').val(result.fecha_cg);
            $("#feccg").css("color", "gray");
          }   
        }
      });

        $('#editModalr').modal({
        keyboard: true,
        backdrop: "static"
    });

};
    