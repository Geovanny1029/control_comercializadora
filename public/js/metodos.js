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
          //console.log(result);

          $("#id_registro").val(result.id);
          if(result.ruta_razon == null){
            $("#razz").css("color", "red");
          }else{

          }

          if(result.contacto_facturas_pagos == null){
            $("#contact").css("color", "red");
          }else{
            $("#edit_contacto_facturas_pagos").val(result.contacto_facturas_pagos);
          }
        }
      });

        $('#editModalr').modal({
        keyboard: true,
        backdrop: "static"
    });

};
    