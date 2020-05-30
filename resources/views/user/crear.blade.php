 <!-- Add Modal start -->
    <div class="modal fade" id="addModalU" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Nuevo Usuario</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('Nombre', 'Nombre Completo') !!} 
                 {!! Form::text('nombre',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Nombre', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Nivel', 'Nivel') !!} 
                {!! Form::select('nivel',['1' => 'Administrador', '2' => 'Usuario'],"Selecciona un nivel",['class' => 'form-control']) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('usuario', 'Usuario') !!} 
                 {!! Form::text('user',null,['class' => 'form-control','style' => 'text-transform:uppercase;' , 'placeholder' => 'Usuario', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('password', 'Contraseña') !!}  
                {!! Form::password('password',['class' => 'form-control', 'placeholder' => '*******', 'required' ] ) !!}
               </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                 {!! Form::label('email', 'Email') !!} 
                 {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'email', 'required' ] ) !!}
               </div>
               <div class="form-group col-md-6">
                {!! Form::label('Estatus', 'Estatus') !!} 
                {!! Form::select('estatus',['1' => 'Activo', '2' => 'Inactivo'],"Selecciona",['class' => 'form-control']) !!}
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->