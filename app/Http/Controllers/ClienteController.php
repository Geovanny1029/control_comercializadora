<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $clientes = Cliente::all()->orderBy('id','ASC')->get();

        return view('clientes.index')->with('clientes', $clientes);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Cliente::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Cliente($request->all());
        $user->nombre_cliente=strtoupper($request->nombre_cliente);
        $user->save();

        $notification = array(
        'message' => 'El Cliente se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idcli;
        $data= Cliente::find($id);
        $data->nombre_cliente= strtoupper($request->edit_nombre_cliente);
        $data->save();

        $notification = array(
        'message' => 'El Cliente se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }   
}
