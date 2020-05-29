<!-- Add Modal start -->
    <div class="modal fade" id="editModalU" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Grupo</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'user.actualiza', 'method' => 'POST']) !!}
              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('edit_Nombre', 'Nombre Completo') !!} 
                 {!! Form::text('edit_nombre',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id' => 'edit_nombre', 'placeholder' => 'Nombre', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Nivel', 'Nivel') !!} 
                {!! Form::select('edit_nivel',['1' => 'Administrador', '2' => 'Usuario'],"Selecciona un nivel",['class' => 'form-control','id' => 'edit_nivel']) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('usuario', 'Usuario') !!} 
                 {!! Form::text('edit_name',null,['class' => 'form-control','style' => 'text-transform:uppercase;' ,'id' => 'edit_name', 'placeholder' => 'Usuario', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('password', 'Contraseña') !!}  
                {!! Form::text('edit_password',null,['class' => 'form-control', 'placeholder' => '*******','id' => 'edit_password', 'required' ] ) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('email', 'Email') !!} 
                 {!! Form::email('edit_email',null,['class' => 'form-control', 'placeholder' => 'email','id' => 'edit_email', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Estatus', 'Estatus') !!} 
                {!! Form::select('edit_estatus',['1' => 'Activo', '2' => 'Inactivo'],"Selecciona",['class' => 'form-control','id' => 'edit_estatus']) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-2">
                 {!! Form::submit('Actualizar',[ 'class' => 'btn btn-primary']) !!} 
                 <input type="hidden" id="edit_idu" name="edit_idu">
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