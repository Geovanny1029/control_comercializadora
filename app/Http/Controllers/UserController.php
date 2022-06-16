<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $usuarios = User::where('estatus',1)->orderBy('id','ASC')->get();

        return view('user.index')->with('usuarios', $usuarios);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = User::find($id);
                return response()->json($info);

            }
    }  

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->nombre=strtoupper($request->nombre);
        $user->user=strtoupper($request->user);
        $user->nivel=$request->nivel; 
        $user->email=$request->email;
        $user->estatus=$request->estatus;
        $user->tipo_usuario=$request->tipo_usuario;
        $user->backup_password=$request->password;
        $user->password=bcrypt($request->password);
        $user->save();

        $notification = array(
        'message' => 'El Usuario se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idu;
        $data= User::find($id);
        $data->nombre= strtoupper($request->edit_nombre);
        $data->nivel= $request->edit_nivel;
        $data->user=$request->edit_user;
        $data->backup_password=$request->edit_password;
        $data->password=bcrypt($request->edit_password);
        $data->email=$request->edit_email;
        $data->estatus=$request->edit_estatus;
        $data->tipo_usuario=$request->edit_tipo_usuario;
        $data->save();

        $notification = array(
        'message' => 'El Usuario se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }


    public function destroy($id)
    {
        $users = User::where('id',$id)->first();
        if($users->estatus == 2){
            $users->estatus = 1;
            $users->save();

        $notification = array(
        'message' => 'El Usuario se ha Activado Exitosamente', 
        'alert-type' => 'success'
        );
            return redirect()->route('user.index')->with($notification);
        }else{
            $users->estatus = 2;
            $users->save();

        $notification = array(
        'message' => 'El Usuario ha sido dado de baja Exitosamente', 
        'alert-type' => 'error'
        );            
            return redirect()->route('user.index')->with($notification);
        }

    }

}
