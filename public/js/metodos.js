$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});

//vista editar usuario
function fun_edit(id)
    {
      var view_url = $("#editar").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_usuario").val(result.usuario);
          $("#edit_password").val(result.backup_pass);
          $("#edit_Nombre_usuario").val(result.nombres);
          $("#edit_apellidos").val(result.apellidos);
          $("#edit_nivel").val(result.nivel);
          $("#edit_estatus").val(result.estatus);
          $("#edit_id").val(result.id);
        }
      });
    }

//vista editar grupo
function fun_editg(id)
    {
      var view_url = $("#editarg").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_Nombre_grupo").val(result.nombre);
          $("#edit_estatusg").val(result.estatus);
          $("#edit_idg").val(result.id);
        }
      });
    }

//vista editar asignaturas
function fun_edita(id)
    {
      var view_url = $("#editara").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_Nombre_asignatura").val(result.nombre);
          $("#edit_estatusa").val(result.estatus);
          $("#edit_ida").val(result.id);
        }
      });
    }

//vista editar Periodos
function fun_editp(id)
    {
      var view_url = $("#editarp").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_Nombre_periodo").val(result.periodo);
          $("#edit_estatusp").val(result.estatus);
          $("#edit_idp").val(result.id);
        }
      });
    }

//vista editar relacion
function fun_editr(id)
    {
      var view_url = $("#editarr").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_gruposel").val(result.id_grupo);
          $("#edit_asignaturasel").val(result.id_asignatura);
          $("#edit_periodosel").val(result.id_periodo);
          $("#edit_maestrosel").val(result.id_maestro);
          $("#edit_alumnosel").val(result.id_alumno);
          $("#edit_idr").val(result.id);
        }
      });
    }

//vista editar calificaciones alumnos
function fun_sub(id)
    {
      var view_url = $("#editarsub").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_C1").val(result.C1);
          $("#edit_C2").val(result.C2);
          $("#edit_C3").val(result.C3);
          $("#edit_C4").val(result.C4);
          $("#id_regsub").val(result.id);
        }
      });
    }