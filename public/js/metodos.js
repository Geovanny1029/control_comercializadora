$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
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