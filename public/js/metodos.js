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
          $("#edit_rfc").val(result.rfc);
          $("#edit_direccion_fiscal").val(result.direccion_fiscal);
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
          $("#edit_tax_id").val(result.tax_id);
          $("#edit_direccion_fiscal").val(result.direccion_fiscal);
          $("#edit_idprov").val(result.id);
        }
      });
    }

    function modal(id,cerr){

      var view_url = "/registroe"
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
              $(".btndisable").attr('disabled',false);
            } else {
              $(":input").attr('readonly', true);
              $('#id_registro').attr('readonly', true);
              $('#folio').attr('readonly', true);
              $(".btndisable").attr('disabled',true);

            }
          });
          }else{
            $(":input").attr('readonly', true);
            $("#check").css("display",'none');
            $("#checkadicional").css("display",'inline-block');
            $("#buttonreg").css("display",'none');
            $('#id_registro').attr('readonly', true);
            $('#folio').attr('readonly', true);
          }

          $('#provs').attr('onclick','mproveedores('+result.info.id+')');
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
            $('#showrut').attr("href", "/razon_social/"+result.info.ruta_razonsocial);
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
             $('#showprov').attr("href", "/proveedores/"+result.info.ruta_proveedor);
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
             $('#showfacext').attr("href", "/facturasext/"+result.info.ruta_factura_ext);
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
             $('#showcot').attr("href", "/cotizaciones/"+result.info.ruta_cotizacion_cliente);
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
             $('#showdep').attr("href", "/depositos_cliente/"+result.info.ruta_importe_deposito_cliente);
            $("#rutdepo").css("color", "gray");
          }
          //rutas pedimentos 1 al 6
          if(result.info.ruta_pedimento == "" || result.info.ruta_pedimento == null){
            $('#edit_ruta_pedimento').val(result.info.ruta_pedimento);
            $('#edit_ruta_pedimento').css("display",'inline-block');
             $('#showped').css("display",'none');
            $("#rutpedi").css("color", "red");
          }else{
            $('#edit_ruta_pedimento').css("display",'none');
            $('#showped').css("display",'inline-block');
            $('#showped').val('1');
             $('#showped').attr("href", "/pedimentos/"+result.info.ruta_pedimento);
            $("#rutpedi").css("color", "gray");
          }

          if(result.info.ruta_pedimento2 == "" || result.info.ruta_pedimento2 == null){
            $('#edit_ruta_pedimento2').val(result.info.ruta_pedimento2);
            $('#edit_ruta_pedimento2').css("display",'inline-block');
             $('#showped2').css("display",'none');
            $("#rutpedi2").css("color", "red");
          }else{
            $('#edit_ruta_pedimento2').css("display",'none');
            $('#showped2').css("display",'inline-block');
            $('#showped2').val('1');
             $('#showped2').attr("href", "/pedimentos/"+result.info.ruta_pedimento2);
            $("#rutpedi2").css("color", "gray");
          }

          if(result.info.ruta_pedimento3 == "" || result.info.ruta_pedimento3 == null){
            $('#edit_ruta_pedimento3').val(result.info.ruta_pedimento3);
            $('#edit_ruta_pedimento3').css("display",'inline-block');
             $('#showped3').css("display",'none');
            $("#rutpedi3").css("color", "red");
          }else{
            $('#edit_ruta_pedimento3').css("display",'none');
            $('#showped3').css("display",'inline-block');
            $('#showped3').val('1');
             $('#showped3').attr("href", "/pedimentos/"+result.info.ruta_pedimento3);
            $("#rutpedi3").css("color", "gray");
          }

          if(result.info.ruta_pedimento4 == "" || result.info.ruta_pedimento4 == null){
            $('#edit_ruta_pedimento4').val(result.info.ruta_pedimento4);
            $('#edit_ruta_pedimento4').css("display",'inline-block');
             $('#showped4').css("display",'none');
            $("#rutpedi4").css("color", "red");
          }else{
            $('#edit_ruta_pedimento4').css("display",'none');
            $('#showped4').css("display",'inline-block');
            $('#showped4').val('1');
             $('#showped4').attr("href", "/pedimentos/"+result.info.ruta_pedimento4);
            $("#rutpedi4").css("color", "gray");
          }

          if(result.info.ruta_pedimento5 == "" || result.info.ruta_pedimento5 == null){
            $('#edit_ruta_pedimento5').val(result.info.ruta_pedimento5);
            $('#edit_ruta_pedimento5').css("display",'inline-block');
             $('#showped5').css("display",'none');
            $("#rutpedi5").css("color", "red");
          }else{
            $('#edit_ruta_pedimento5').css("display",'none');
            $('#showped5').css("display",'inline-block');
            $('#showped5').val('1');
             $('#showped5').attr("href", "/pedimentos/"+result.info.ruta_pedimento5);
            $("#rutpedi5").css("color", "gray");
          }

          if(result.info.ruta_pedimento6 == "" || result.info.ruta_pedimento6 == null){
            $('#edit_ruta_pedimento6').val(result.info.ruta_pedimento6);
            $('#edit_ruta_pedimento6').css("display",'inline-block');
             $('#showped6').css("display",'none');
            $("#rutpedi6").css("color", "red");
          }else{
            $('#edit_ruta_pedimento6').css("display",'none');
            $('#showped6').css("display",'inline-block');
            $('#showped6').val('1');
             $('#showped6').attr("href", "/pedimentos/"+result.info.ruta_pedimento6);
            $("#rutpedi6").css("color", "gray");
          }
          //fin pedimentos
          if(result.info.ruta_folio_cg == "" || result.info.ruta_folio_cg == null){
            $('#edit_ruta_folio_cg').val(result.info.ruta_folio_cg);
            $('#edit_ruta_folio_cg').css("display",'inline-block');
             $('#showfol').css("display",'none');
            $("#rutfol").css("color", "red");
          }else{
            $('#edit_ruta_folio_cg').css("display",'none');
            $('#showfol').css("display",'inline-block');
            $('#showfol').val('1');
             $('#showfol').attr("href", "/folios_cg/"+result.info.ruta_folio_cg);
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
             $('#showfac').attr("href", "/importes_facturados/"+result.info.ruta_facturado_cliente);
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
             $('#showcost').attr("href", "/costeos_totales/"+result.info.ruta_costeo);
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

          //se desplega los n valor fact en edicion
          var tam = result.valfacext.length;
          if(tam == null || tam == ""){
            var valfa='<div id="brsedit'+1+'"><br></div>'+ 
            '<div class="input-group" id="">'+
            '<button type="button" name="add" id="" onclick="addedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Valor Fact Ext $</span>'+
            '<input type="number" step="any" name="edit_valor_factura_ext[]" class="form-control valorfacajax" placeholder="$">'+
            '</div>';
            var valfa2 = "";
          }else if(tam == 1){
            var valfa= '<div id="brsedit'+1+'"><br></div>'+
            '<div class="input-group" id="divedit'+result.valfacext[0].id+'">'+
            '<button type="button" name="add" id="'+result.valfacext[0].id+'" onclick="addedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Valor Fact Ext $</span>'+
            '<input type="number" step="any" name="edit_valor_factura_ext[]" value="'+result.valfacext[0].valor_factura_ext+'" class="form-control valorfacajax" placeholder="$">'+
            '</div>';
            var valfa2 = "";
          }else{
            var valfa= '<div id="brsedit'+1+'"><br></div>'+
            '<div class="input-group" id="divedit'+result.valfacext[0].id+'">'+
            '<button type="button" name="vfe" id="fdc'+result.valfacext[0].id+'" onclick="addedit()" class="btn btn-primary btndisable">+</button>'+
            '<span class="input-group-addon" >Valor Fact Ext $</span>'+
            '<input type="number" step="any" name="edit_valor_factura_ext[]" value="'+result.valfacext[0].valor_factura_ext+'" class="form-control valorfacajax" placeholder="$">'+
            '</div>';
            var valfa2 = "";
            for (var i = 1; i<result.valfacext.length; i++) {
              valfa2+='<div id="brsedit'+(i+1)+'"><br></div>'+
              '<div class="input-group" id="divedit'+result.valfacext[i].id+'">'+
              '<button type="button" name="remove" id="fdc'+result.valfacext[i].id+'" onclick="eliminabtnfac('+result.valfacext[i].id+')" class="btn btn-danger removentnedit btndisable">-</button>'+
              '<span class="input-group-addon" >Valor Fact Ext $</span>'+
              '<input type="number" step="any" name="edit_valor_factura_ext[]" value="'+result.valfacext[i].valor_factura_ext+'" class="form-control valorfacajax" placeholder="$">'+
              '</div>';
            }

          }
          $("#edit_valor_fa").html(valfa);
          $("#addvalorfacedit").html(valfa2);
          $(".valorfacajax").attr('readonly',true);
          $(".btndisable").attr('disabled',true);
          //fin n reg valor factura

          //se desplega los n fecha deposito
          var tamfdp = result.fecdepcli.length;

          if(tamfdp == null || tamfdp == ""){
            var fecdepcli='<div id="brseditfdc'+1+'"><br></div>'+ 
            '<div class="input-group" id="">'+
            '<button type="button" name="add" id="" onclick="addfdcedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Fecha Deposito Cliente</span>'+
            '<input type="date"  name="edit_fecha_deposito_cliente[]" class="form-control fechadepcliajax" placeholder="Fecha Deposito">'+
            '</div>';
            var fecdepcli2 = "";
          }else if(tamfdp == 1){
            var fecdepcli= '<div id="brseditfdc'+1+'"><br></div>'+
            '<div class="input-group" id="diveditfdc'+result.fecdepcli[0].id+'">'+
            '<button type="button" name="add" id="'+result.fecdepcli[0].id+'" onclick="addfdcedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Fecha Deposito Cliente</span>'+
            '<input type="date"  name="edit_fecha_deposito_cliente[]" value="'+result.fecdepcli[0].fecha_deposito_cliente+'" class="form-control fechadepcliajax" placeholder="Fecha Deposito">'+
            '</div>';
            var fecdepcli2 = "";
          }else{
            var fecdepcli= '<div id="brseditfdc'+1+'"><br></div>'+
            '<div class="input-group" id="diveditfdc'+result.fecdepcli[0].id+'">'+
            '<button type="button" name="vfe" id="'+result.fecdepcli[0].id+'" onclick="addfdcedit()" class="btn btn-primary btndisable">+</button>'+
            '<span class="input-group-addon" >Fecha Deposito Cliente</span>'+
            '<input type="date"  name="edit_fecha_deposito_cliente[]" value="'+result.fecdepcli[0].fecha_deposito_cliente+'" class="form-control fechadepcliajax" placeholder="Fecha Deposito">'+
            '</div>';
            var fecdepcli2 = "";
            for (var ifdc = 1; ifdc<result.fecdepcli.length; ifdc++) {
              fecdepcli2+='<div id="brseditfdc'+(ifdc+1)+'"><br></div>'+
              '<div class="input-group" id="diveditfdc'+result.fecdepcli[ifdc].id+'">'+
              '<button type="button" name="remove" id="'+result.fecdepcli[ifdc].id+'" onclick="eliminabtnfdc('+result.fecdepcli[ifdc].id+')" class="btn btn-danger removebtneditfdc btndisable">-</button>'+
              '<span class="input-group-addon" >Fecha Deposito Cliente</span>'+
              '<input type="date"  name="edit_fecha_deposito_cliente[]" value="'+result.fecdepcli[ifdc].fecha_deposito_cliente+'" class="form-control fechadepcliajax" placeholder="Fecha Deposito">'+
              '</div>';
            }

          }
          $("#edit_fecha_dep").html(fecdepcli);
          $("#addfechadepoedit").html(fecdepcli2);
          $(".fechadepcliajax").attr('readonly',true);
          $(".btndisable").attr('disabled',true);
          //fin n reg fecha deposito


          //se desplega los n registros importe deposito cliente
          var tamidc = result.impdepcli.length;

          if(tamidc == null || tamidc == ""){
            var impdepcli='<div id="brseditidc'+1+'"><br></div>'+ 
            '<div class="input-group" id="">'+
            '<button type="button" name="add" id="" onclick="addidcedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Importe Deposito Cliente</span>'+
            '<input type="number"  name="edit_importe_deposito_cliente[]" class="form-control importedepcliajax" placeholder="$">'+
            '</div>';
            var impdepcli2 = "";
          }else if(tamidc == 1){
            var impdepcli= '<div id="brseditidc'+1+'"><br></div>'+
            '<div class="input-group" id="diveditidc'+result.impdepcli[0].id+'">'+
            '<button type="button" name="add" id="idc'+result.impdepcli[0].id+'" onclick="addidcedit()" class="btn btn-primary btndisable">+</button>'+
            ' <span class="input-group-addon" >Importe Deposito Cliente</span>'+
            '<input type="number"  name="edit_importe_deposito_cliente[]" value="'+result.impdepcli[0].importe_deposito_cliente+'" class="form-control importedepcliajax" placeholder="$">'+
            '</div>';
            var impdepcli2 = "";
          }else{
            var impdepcli= '<div id="brseditidc'+1+'"><br></div>'+
            '<div class="input-group" id="diveditidc'+result.impdepcli[0].id+'">'+
            '<button type="button" name="vfe" id="idc'+result.impdepcli[0].id+'" onclick="addidcedit()" class="btn btn-primary btndisable">+</button>'+
            '<span class="input-group-addon" >Importe Deposito Cliente</span>'+
            '<input type="number"  name="edit_importe_deposito_cliente[]" value="'+result.impdepcli[0].importe_deposito_cliente+'" class="form-control importedepcliajax" placeholder="$">'+
            '</div>';
            var impdepcli2 = "";
            for (var impdc = 1; impdc<result.impdepcli.length; impdc++) {
              impdepcli2+='<div id="brseditidc'+(impdc+1)+'"><br></div>'+
              '<div class="input-group" id="diveditidc'+result.impdepcli[impdc].id+'">'+
              '<button type="button" name="remove" id="idc'+result.impdepcli[impdc].id+'" onclick="eliminabtnidc('+result.impdepcli[impdc].id+')" class="btn btn-danger removebtneditidc btndisable">-</button>'+
              '<span class="input-group-addon" >Importe Deposito Cliente</span>'+
              '<input type="number"  name="edit_importe_deposito_cliente[]" value="'+result.impdepcli[impdc].importe_deposito_cliente+'" class="form-control importedepcliajax" placeholder="$">'+
              '</div>';
            }

          }
          $("#edit_importe_dep_cli").html(impdepcli);
          $("#addimportedepedit").html(impdepcli2);
          $(".importedepcliajax").attr('readonly',true);
          $(".btndisable").attr('disabled',true);
          //fin n reg importe deposito cliente


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

          if(result.info.no_pedimento2 == "" || result.info.no_pedimento2 == null){
            $('#edit_no_pedimento2').val(result.info.no_pedimento2);
            $("#pedi2").css("color", "red");
          }else{
            $('#edit_no_pedimento2').val(result.info.no_pedimento2);
            $("#pedi2").css("color", "gray");
          } 

          if(result.info.no_pedimento3 == "" || result.info.no_pedimento3 == null){
            $('#edit_no_pedimento3').val(result.info.no_pedimento3);
            $("#pedi3").css("color", "red");
          }else{
            $('#edit_no_pedimento3').val(result.info.no_pedimento3);
            $("#pedi3").css("color", "gray");
          } 

          if(result.info.no_pedimento4 == "" || result.info.no_pedimento4 == null){
            $('#edit_no_pedimento4').val(result.info.no_pedimento4);
            $("#pedi4").css("color", "red");
          }else{
            $('#edit_no_pedimento4').val(result.info.no_pedimento4);
            $("#pedi4").css("color", "gray");
          } 

          if(result.info.no_pedimento5 == "" || result.info.no_pedimento5 == null){
            $('#edit_no_pedimento5').val(result.info.no_pedimento5);
            $("#pedi5").css("color", "red");
          }else{
            $('#edit_no_pedimento5').val(result.info.no_pedimento5);
            $("#pedi5").css("color", "gray");
          } 

          if(result.info.no_pedimento6 == "" || result.info.no_pedimento6 == null){
            $('#edit_no_pedimento6').val(result.info.no_pedimento6);
            $("#pedi6").css("color", "red");
          }else{
            $('#edit_no_pedimento6').val(result.info.no_pedimento6);
            $("#pedi6").css("color", "gray");
          } 

          //obs pedimento
          if(result.info.obs_pedimento1 == "" || result.info.obs_pedimento1 == null){
            $('#edit_obs_pedimento1').val(result.info.obs_pedimento1);
          }else{
            $('#edit_obs_pedimento1').val(result.info.obs_pedimento1);
          } 

          if(result.info.obs_pedimento2 == "" || result.info.obs_pedimento2 == null){
            $('#edit_obs_pedimento2').val(result.info.obs_pedimento2);
          }else{
            $('#edit_obs_pedimento2').val(result.info.obs_pedimento2);
          }

          if(result.info.obs_pedimento3 == "" || result.info.obs_pedimento3 == null){
            $('#edit_obs_pedimento3').val(result.info.obs_pedimento3);
          }else{
            $('#edit_obs_pedimento3').val(result.info.obs_pedimento3);
          }

          if(result.info.obs_pedimento4 == "" || result.info.obs_pedimento4 == null){
            $('#edit_obs_pedimento4').val(result.info.obs_pedimento4);
          }else{
            $('#edit_obs_pedimento4').val(result.info.obs_pedimento4);
          }

          if(result.info.obs_pedimento5 == "" || result.info.obs_pedimento5 == null){
            $('#edit_obs_pedimento5').val(result.info.obs_pedimento5);
          }else{
            $('#edit_obs_pedimento5').val(result.info.obs_pedimento5);
          }

          if(result.info.obs_pedimento6 == "" || result.info.obs_pedimento6 == null){
            $('#edit_obs_pedimento6').val(result.info.obs_pedimento6);
          }else{
            $('#edit_obs_pedimento6').val(result.info.obs_pedimento6);
          }
          //fin obs
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
            $("#infadicional").html("<div class='btn btn-warning' onclick='adicional("+result.info.id+")'>INF ADICIONAL</div>");
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

function mproveedores(id){
     $("#registroproveedores").modal('show');
       $.ajax({
        url: "/registroproveedores",
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          var tam = result;
        console.log(result);
          var html = "<center><h3>Proveedores</h3></center>";
          html+="<table class='table table-striped' ><thead><th style='width:50%;'>Proveedor</th> <th style='width:25%;'>Accion <div  name='addprv' id='addprov' onclick='addprov("+result[0].id_registro+")' class='btn btn-primary'>+</div></th></thead><tbody>";
          for(i=0;i<tam.length;i++){
            if(result[i].ruta_pdf == null || result[i].ruta_pdf == ""){
              var pdf = "<input type='file' id='ruta_proveedor_registro"+result[i].id+"' name='ruta_proveedor_registro"+result[i].id+"' class='form-control' placeholder='Username'></div>";
              var btn = "<input type='hidden' id='idhidenp"+result[i].id+"' name='idhidenp"+result[i].id+"' value='"+result[i].id+"'><div class='btn btn-primary' onclick='guardapr("+result[i].id+")'>Guardar</div></form>";
            }else{
              var pdf = "<div class='btn btn-success' data-lity href='/proveedores/"+result[i].ruta_pdf+"'>VER PDF</div>";
              var btn = "";
            }
            html+= "<tr><td>"+result[i].proveedores.nombre_proveedor+"</td> <td>"+pdf+btn+"</td></tr>";
           
          }
          html+="</tbody></table>";
        $("#lista2").html(html);
        }
      });
}


function adicional(id){
     $("#info_adicional").modal('show');
     $("#guardainfoadicional").val(id)
       $.ajax({
        url: "/registroadicionales",
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          console.log(result);

        //facturas
        var tamadicf = result.infofac;
        var factura = "";
        var facturan = "";
        if(result.infofac == null || result.infofac == ""){
          factura+= "<div class='input-group'>";
          factura+=" <div type='button' name='add' id='add_fac_adicional' class='btn btn-primary'>+</div>";
          factura+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Factura</span>";
          factura+="<input type='file' name='ruta_archivo_fac[]' class='form-control' placeholder='ruta' required></div>";
        }else{
          if(tamadicf.length == 1){
            factura+= "<div class='input-group'>";
            factura+=" <div type='button' name='add' id='add_fac_adicional' class='btn btn-primary'>+</div>";
            factura+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Factura</span>";
            factura+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infofac[0].ruta_archivo+"'>VER PDF</div></div>";

            facturan = "";
          }else{
            factura+= "<div class='input-group'>";
            factura+=" <div type='button' name='add' id='add_fac_adicional' class='btn btn-primary'>+</div>";
            factura+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Factura</span>";
            factura+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infofac[0].ruta_archivo+"'>VER PDF</div></div><br>";
            facturan = "";
            for(i=1;i<tamadicf.length;i++){
              facturan+= "<div class='input-group'>";
              facturan+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Factura</span>";
              facturan+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infofac[i].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_factura").html(factura);
        $("#add_adicional_factura").html(facturan);
      //fin facturas


      //cotizacion
  var tamacot = result.infocot;
        var cotizacion = "";
        var cotizacionn = "";
        if(result.infocot == null || result.infocot == ""){
          cotizacion+= "<div class='input-group'>";
          cotizacion+=" <div type='button' name='add' id='add_cot_adicional' class='btn btn-primary'>+</div>";
          cotizacion+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Cotizacion</span>";
          cotizacion+="<input type='file' name='ruta_archivo_cot[]' class='form-control' placeholder='ruta' required></div>";

        }else{
          if(tamacot.length == 1){
            cotizacion+= "<div class='input-group'>";
            cotizacion+=" <div type='button' name='add' id='add_cot_adicional' class='btn btn-primary'>+</div>";
            cotizacion+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Cotizacion</span>";
            cotizacion+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocot[0].ruta_archivo+"'>VER PDF</div></div>";

            cotizacionn = "";
          }else{
            cotizacion+= "<div class='input-group'>";
            cotizacion+=" <div type='button' name='add' id='add_cot_adicional' class='btn btn-primary'>+</div>";
            cotizacion+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Cotizacion</span>";
            cotizacion+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocot[0].ruta_archivo+"'>VER PDF</div></div><br>";
            cotizacionn = "";
            for(k=1;k<tamacot.length;k++){
              cotizacionn+= "<div class='input-group'>";
              cotizacionn+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Cotizacion</span>";
              cotizacionn+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocot[k].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_cotizacion").html(cotizacion);
        $("#add_adicional_cotizacion").html(cotizacionn);
        //fin cotizacion


      //deposito
        var tamadep = result.infodep;
        var deposito = "";
        var depositon = "";
        if(result.infodep == null || result.infodep == ""){
          deposito+= "<div class='input-group'>";
          deposito+=" <div type='button' name='add' id='add_dep_adicional' class='btn btn-primary'>+</div>";
          deposito+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Deposito</span>";
          deposito+="<input type='file' name='ruta_archivo_dep[]' class='form-control' placeholder='ruta' required></div>";
        }else{
          if(tamadep.length == 1){
            deposito+= "<div class='input-group'>";
            deposito+=" <div type='button' name='add' id='add_dep_adicional' class='btn btn-primary'>+</div>";
            deposito+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Deposito</span>";
            deposito+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infodep[0].ruta_archivo+"'>VER PDF</div></div>";

            depositon = "";
          }else{
            deposito+= "<div class='input-group'>";
            deposito+=" <div type='button' name='add' id='add_dep_adicional' class='btn btn-primary'>+</div>";
            deposito+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Deposito</span>";
            deposito+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infodep[0].ruta_archivo+"'>VER PDF</div></div><br>";
            depositon = "";
            for(j=1;j<tamadep.length;j++){
              depositon+= "<div class='input-group'>";
              depositon+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Deposito</span>";
              depositon+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infodep[j].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_deposito").html(deposito);
        $("#add_adicional_deposito").html(depositon);
    //fin deposito

    //folio cg
        var tamacg = result.infocg;
        var cg = "";
        var cgn = "";
        if(result.infocg == null || result.infocg == ""){
          cg+= "<div class='input-group'>";
          cg+=" <div type='button' name='add' id='add_cg_adicional' class='btn btn-primary'>+</div>";
          cg+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Folio CG</span>";
          cg+="<input type='file' name='ruta_archivo_cg[]' class='form-control' placeholder='ruta' required></div>";
        }else{
          if(tamacg.length == 1){
            cg+= "<div class='input-group'>";
            cg+=" <div type='button' name='add' id='add_cg_adicional' class='btn btn-primary'>+</div>";
            cg+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Folio CG</span>";
            cg+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocg[0].ruta_archivo+"'>VER PDF</div></div>";

            cgn = "";
          }else{
            cg+= "<div class='input-group'>";
            cg+=" <div type='button' name='add' id='add_cg_adicional' class='btn btn-primary'>+</div>";
            cg+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Folio CG</span>";
            cg+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocg[0].ruta_archivo+"'>VER PDF</div></div><br>";
            cgn = "";
            for(l=1;l<tamacg.length;l++){
              cgn+= "<div class='input-group'>";
              cgn+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta Deposito</span>";
              cgn+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infocg[l].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_foliocg").html(cg);
        $("#add_adicional_foliocg").html(cgn);
    //fin cg


    //facturado
        var tamafacturado = result.infof;
        var facturado = "";
        var facturadon = "";
        if(result.infof == null || result.infof == ""){
          facturado+= "<div class='input-group'>";
          facturado+=" <div type='button' name='add' id='add_facturado_adicional' class='btn btn-primary'>+</div>";
          facturado+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta facturado</span>";
          facturado+="<input type='file' name='ruta_archivo_facturado[]' class='form-control' placeholder='ruta' required></div>";
        }else{
          if(tamafacturado.length == 1){
            facturado+= "<div class='input-group'>";
            facturado+=" <div type='button' name='add' id='add_facturado_adicional' class='btn btn-primary'>+</div>";
            facturado+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta facturado</span>";
            facturado+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infof[0].ruta_archivo+"'>VER PDF</div></div>";

            facturadon = "";
          }else{
            facturado+= "<div class='input-group'>";
            facturado+=" <div type='button' name='add' id='add_facturado_adicional' class='btn btn-primary'>+</div>";
            facturado+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta facturado</span>";
            facturado+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infof[0].ruta_archivo+"'>VER PDF</div></div><br>";
            facturadon = "";
            for(m=1;m<tamafacturado.length;m++){
              facturadon+= "<div class='input-group'>";
              facturadon+="<span class='input-group-addon' id='ruta_fac' value='1' >Ruta facturado</span>";
              facturadon+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infof[m].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_facturado").html(facturado);
        $("#add_adicional_facturado").html(facturadon);
    //fin facturado


    //pedimento
        var tamapedad = result.infoped;
        var pedimento = "";
        var pedimenton = "";
        if(result.infoped == null || result.infoped == ""){
          pedimento+= "<div class='input-group'>";
          pedimento+=" <div type='button' name='add' id='add_ped_adicional' class='btn btn-primary'>+</div>";
          pedimento+="<span class='input-group-addon' id='ruta_fac' value='1' >Pedimento</span>";
          pedimento+="<input type='text' name='pedimento_adicional[]' class='form-control' placeholder='pedimento' required>";
          pedimento+="<input type='file' name='ruta_pedimento_adicional[]' class='form-control' placeholder='ruta' required></div>";
        }else{
          if(tamapedad.length == 1){
            pedimento+= "<div class='input-group'>";
            pedimento+=" <div type='button' name='add' id='add_ped_adicional' class='btn btn-primary'>+</div>";
            pedimento+="<span class='input-group-addon' id='ruta_fac' value='1' >Pedimento</span>";
            pedimento+="<input type='text' value='"+result.infoped[0].pedimento+"' class='form-control' placeholder='pedimento' readonly='readonly'>";
            pedimento+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infoped[0].ruta_archivo+"'>VER PDF</div></div><br>";
          

            pedimenton = "";
          }else{
            pedimento+= "<div class='input-group'>";
            pedimento+=" <div type='button' name='add' id='add_dep_adicional' class='btn btn-primary'>+</div>";
            pedimento+="<span class='input-group-addon' id='ruta_fac' value='1' >Pedimento</span>";
            pedimento+="<input type='text' value='"+result.infoped[0].pedimento+"' class='form-control' placeholder='pedimento' readonly='readonly'>";
            pedimento+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infoped[0].ruta_archivo+"'>VER PDF</div></div><br>";
            pedimenton = "";
            for(n=1;n<tamapedad.length;n++){
              pedimenton+= "<div class='input-group'>";
              pedimenton+="<span class='input-group-addon' id='ruta_fac' value='1' >Pedimento</span>";
              pedimenton+="<input type='text' value='"+result.infoped[n].pedimento+"' class='form-control' placeholder='pedimento' readonly='readonly'>";
              pedimenton+= "<div class='btn btn-success' data-lity href='/adicionales/"+result.infoped[n].ruta_archivo+"'>VER PDF</div></div><br>";
            }
          }
          
        }
        $("#adicional_pedimento").html(pedimento);
        $("#add_adicional_pedimento").html(pedimenton);
    //fin pedimento

        }
      });
}

function guardapr(id){
  var d = $('#ruta_proveedor_registro'+id).val();
  var i = $('#idhidenp'+id).val();  
  var formData = new FormData(document.getElementById("formuploadajax"));
  formData.append("id", i);
  $.ajax({
        url: "/regiprove",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(result){
            $("#registroproveedores").modal('hide');
        }
    })         
}

$("#guardaprovedit").on( "click", (e) => {
  e.preventDefault();
  var id = $("#guardaprovedit").val();
  if(id == null || id == ""){
    alert("para guardar un proveedor selecciona el boton de + y dar clic en guardar");
  }else{
    var form = $("#formuploadajax").serialize()+"&id="+id;
    $.ajax({
      url     : '/updateprove',
      type    : 'POST',
      data    : form,
      success : function(response){
        alert("se han agregado mas proveedores al registro");
        $("#formuploadajax").trigger("reset");
        $("#registroproveedores").modal('hide');
      }
    });
  }
});


$("#guardainfoadicional").on( "click", (e) => {
  e.preventDefault();
  var id = $("#guardainfoadicional").val();
  var formData_adicional = new FormData(document.getElementById("formadicional"));
  formData_adicional.append("id", id);

    $.ajax({
      url     : '/fileadicional',
      type    : 'POST',
      data    : formData_adicional,
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
      success : function(response){
        alert(response);
        $("#info_adicional").modal('hide');
      }
    });

});


$(document).on('keydown', function(event) {
       if (event.key == "Escape") {
          $('#addModalr').modal('hide');
       }
   });

$(document).on('keydown', function(event) {
       if (event.key == "Escape") {
          $('#editModalr').modal('hide');
       }
   });

///////metodos de tablas dinamicas
//funciones agregado valor factura
    var i = 1;
    $("#add").click(function(){
      i++;
      $("#totaltipoc").attr("value",i);
      $('#addvalorfac').append('<div id="brs'+i+'"><br></div><div class="input-group" id="div'+i+'"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button><span class="input-group-addon" >Valor Fact Ext $</span><input type="number" step="any" name="valor_factura_ext[]" class="form-control" placeholder="$"></div>');  
    });

    $(document).on('click', '.btn_remove', function(){  
    var id = $(this).attr("id");
      var button_id = $(this).attr("id");
      $("#div"+button_id).remove(); 
      $("#brs"+button_id).remove(); 
    });




//funciones agregado fecha deposito
    var fd = 1;
    $("#addfd").click(function(){
      fd++;
      $("#totaltipoc").attr("value",fd);
      $('#addfecha_depo').append('<div id="brsdp'+fd+'"><br></div><div class="input-group" id="divfd'+fd+'"><button type="button" name="removefd" id="'+fd+'" class="btn btn-danger btn_removefd">-</button><span class="input-group-addon" >Fecha Depo</span><input type="date"  name="fecha_deposito_cliente[]" class="form-control" placeholder="Fecha Deposito"></div>');  
    });

    $(document).on('click', '.btn_removefd', function(){  
    var id = $(this).attr("id");
      var button_iddc = $(this).attr("id");
      $("#divfd"+button_iddc).remove(); 
      $("#brsdp"+button_iddc).remove(); 
    });

//funciones agregado importe deposito
    var idc = 1;
    $("#addidc").click(function(){
      idc++;
      $("#totaltipoc").attr("value",idc);
      $('#addimporte_deposito_cli').append('<div id="brsidc'+idc+'"><br></div><div class="input-group" id="dividc'+idc+'"><button type="button" name="removeidc" id="'+idc+'" class="btn btn-danger btn_removeidc">-</button><span class="input-group-addon" >Importe deposito cliente $</span><input type="number" step="any"  name="importe_deposito_cliente[]" class="form-control" placeholder="$"></div>');  
    });

    $(document).on('click', '.btn_removeidc', function(){  
    var idc = $(this).attr("id");
      var button_idc = $(this).attr("id");
      $("#dividc"+button_idc).remove(); 
      $("#brsidc"+button_idc).remove(); 
    });

    //funcion de agregago valor factura en edicion 
    var iedit = 1;
    function addedit(){
      iedit++;
      $('#addvalorfacedit').append('<div id="brsedit'+iedit+'"><br></div><div class="input-group" id="divedit'+iedit+'"><button type="button" name="remove" id="'+iedit+'" class="btn btn-danger btn_remove">-</button><span class="input-group-addon" >Valor Fact Ext $</span><input type="number" step="any" name="edit_valor_factura_ext[]" class="form-control" placeholder="$"></div>');  
    }

    //funcion de agregago fecha deposito en edicion 
    var ieditfdc = 1;
    function addfdcedit(){
      ieditfdc++;
      $('#addfechadepoedit').append('<div id="brseditfdc'+ieditfdc+'"><br></div><div class="input-group" id="diveditfdc'+ieditfdc+'"><button type="button" name="remove" id="'+ieditfdc+'" class="btn btn-danger btn_remove">-</button><span class="input-group-addon" >Fecha Deposito Cliente</span><input type="date"  name="edit_fecha_deposito_cliente[]" class="form-control" placeholder="Fecha Deposito"></div>');  
    }

    //funcion de agregago importe deposito en edicion 
    var ieditidc = 1;
    function addidcedit(){
      ieditidc++;
      $('#addimportedepedit').append('<div id="brseditidc'+ieditidc+'"><br></div><div class="input-group" id="diveditidc'+ieditidc+'"><button type="button" name="remove" id="'+ieditidc+'" class="btn btn-danger btn_remove">-</button><span class="input-group-addon" >Importe Deposito Cliente</span><input type="number" step="any" name="edit_importe_deposito_cliente[]" class="form-control" placeholder="$"></div>');  
    }


    //funcion de agregado de proveedores 

    function addprov($id){
     var id = $id;
     $("#guardaprovedit").val(id);
     $.ajax({
        url: "/getproveedor",
        type:"GET", 
        data: {"id":id}, 
        success: function(result){

            var select = "<select name = 'id_proveedor_edit[]' id='id_proveedor_edit' class='form-control' data-live-search='true' multiple>";
            // var totalpr = 
            for (var i = 0; i < result.length; i++) {
              select+="<option value='"+result[i].id+"'>"+result[i].nombre_proveedor+"</option>"; 
            }
            select+="</select>"
           $('#agregarprov').append("<div class='input-group'> <span class='input-group-addon' >Proveedor Ext</span>"+select+"</div>");  
           $("#id_proveedor_edit").select2();
           $("#id_proveedor_edit").select2("refresh");

        }
      });
      
    }

  //funcion agregado archivo adicional factura
    var adicional_fac = 1;
  $(document).on('click', '#add_fac_adicional', function(){
      adicional_fac++;
      $('#add_adicional_factura').append('<div id="br_adicional_fac'+adicional_fac+'"><br></div><div class="input-group" id="div_adicional_fac'+adicional_fac+'"><button type="button" name="remove" id="'+adicional_fac+'" class="btn btn-danger btn_remove_ad_fac">-</button><span class="input-group-addon" >Ruta Factura</span><input type="file"  name="ruta_archivo_fac[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_fac', function(){  
      var button_adicional_fac= $(this).attr("id");
      $("#div_adicional_fac"+button_adicional_fac).remove(); 
      $("#br_adicional_fac"+button_adicional_fac).remove(); 
    });

  //funcion agregado archivo adicional cotizacion
    var adicional_cot = 1;
  $(document).on('click', '#add_cot_adicional', function(){
      adicional_cot++;
      $('#add_adicional_cotizacion').append('<div id="br_adicional_cot'+adicional_cot+'"><br></div><div class="input-group" id="div_adicional_cot'+adicional_cot+'"><button type="button" name="remove" id="'+adicional_cot+'" class="btn btn-danger btn_remove_ad_cot">-</button><span class="input-group-addon" >Ruta Cotizacion</span><input type="file"  name="ruta_archivo_cot[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_cot', function(){  
      var button_adicional_cot= $(this).attr("id");
      $("#div_adicional_cot"+button_adicional_cot).remove(); 
      $("#br_adicional_cot"+button_adicional_cot).remove(); 
    });


  //funcion agregado archivo adicional deposito
    var adicional_dep = 1;
  $(document).on('click', '#add_dep_adicional', function(){
      adicional_dep++;
      $('#add_adicional_deposito').append('<div id="br_adicional_dep'+adicional_dep+'"><br></div><div class="input-group" id="div_adicional_dep'+adicional_dep+'"><button type="button" name="remove" id="'+adicional_dep+'" class="btn btn-danger btn_remove_ad_dep">-</button><span class="input-group-addon" >Ruta Deposito</span><input type="file"  name="ruta_archivo_dep[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_dep', function(){  
      var button_adicional_dep= $(this).attr("id");
      $("#div_adicional_dep"+button_adicional_dep).remove(); 
      $("#br_adicional_dep"+button_adicional_dep).remove(); 
    });


  //funcion agregado archivo adicional cuenta de gastos
    var adicional_cg = 1;
  $(document).on('click', '#add_cg_adicional', function(){
      adicional_cg++;
      $('#add_adicional_foliocg').append('<div id="br_adicional_cg'+adicional_cg+'"><br></div><div class="input-group" id="div_adicional_cg'+adicional_cg+'"><button type="button" name="remove" id="'+adicional_cg+'" class="btn btn-danger btn_remove_ad_cg">-</button><span class="input-group-addon" >Ruta Folio CG</span><input type="file"  name="ruta_archivo_cg[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_cg', function(){  
      var button_adicional_cg= $(this).attr("id");
      $("#div_adicional_cg"+button_adicional_cg).remove(); 
      $("#br_adicional_cg"+button_adicional_cg).remove(); 
    });


  //funcion agregado archivo adicional facturado
    var adicional_facturado = 1;
  $(document).on('click', '#add_facturado_adicional', function(){
      adicional_facturado++;
      $('#add_adicional_facturado').append('<div id="br_adicional_facturado'+adicional_facturado+'"><br></div><div class="input-group" id="div_adicional_facturado'+adicional_facturado+'"><button type="button" name="remove" id="'+adicional_facturado+'" class="btn btn-danger btn_remove_ad_facturado">-</button><span class="input-group-addon" >Ruta Facturado</span><input type="file"  name="ruta_archivo_facturado[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_facturado', function(){  
      var button_adicional_facturado= $(this).attr("id");
      $("#div_adicional_facturado"+button_adicional_facturado).remove(); 
      $("#br_adicional_facturado"+button_adicional_facturado).remove(); 
    });


  //funcion agregado archivo adicional pedimento
    var adicional_pedimento = 1;
  $(document).on('click', '#add_ped_adicional', function(){
      adicional_pedimento++;
      $('#add_adicional_pedimento').append('<div id="br_adicional_pedimento'+adicional_pedimento+'"><br></div><div class="input-group" id="div_adicional_pedimento'+adicional_pedimento+'"><button type="button" name="remove" id="'+adicional_pedimento+'" class="btn btn-danger btn_remove_ad_pedimento">-</button><span class="input-group-addon" >Pedimento</span><input type="text"  name="pedimento_adicional" class="form-control" placeholder="pedimento" ><input type="file"  name="ruta_pedimento_adicional[]" class="form-control" placeholder="ruta" required></div>');  
    });

    $(document).on('click', '.btn_remove_ad_pedimento', function(){  
      var button_adicional_pedimento= $(this).attr("id");
      $("#div_adicional_pedimento"+button_adicional_pedimento).remove(); 
      $("#br_adicional_pedimento"+button_adicional_pedimento).remove(); 
    });

    //elimina registros ajax valor factura ext
    function eliminabtnfac($id){
      if (confirm('Deseas eliminar este registro se borrara de la base de datos')) {
          var datastring = "id="+$id;
            $.ajax({
                  url: "/borrarvalorfac",
                  type:"POST", 
                  data: datastring, 
                  success: function(result){
                    alert("Registro Eliminado correctamente");
                    $("#divedit"+$id).remove(); 
                    $("#brsedit"+$id).remove();
                  }
                });
      } else {
        
      }
    }// fin metodo

    //elimina registros ajax fecha deposito cliente
    function eliminabtnfdc($id){
      if (confirm('Deseas eliminar este registro se borrara de la base de datos')) {
          var datastring = "id="+$id;
            $.ajax({
                  url: "/borrarvalorfdc",
                  type:"POST", 
                  data: datastring, 
                  success: function(result){
                    alert("Registro Eliminado correctamente");
                    $("#diveditfdc"+$id).remove(); 
                    $("#brseditfdc"+$id).remove();
                  }
                });
      } else {
        
      }
    }// fin metodo

//elimina registros ajax fecha deposito cliente
    function eliminabtnidc($id){
      if (confirm('Deseas eliminar este registro se borrara de la base de datos')) {
          var datastring = "id="+$id;
            $.ajax({
                  url: "/borrarvaloridc",
                  type:"POST", 
                  data: datastring, 
                  success: function(result){
                    alert("Registro Eliminado correctamente");
                    $("#diveditidc"+$id).remove(); 
                    $("#brseditidc"+$id).remove();
                  }
                });
      } else {
        
      }
    }// fin metodo


