<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus;

class EstatusController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $estatus = Estatus::orderBy('id','ASC')->get();

        return view('estatus.index')->with('estatus', $estatus);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Estatus::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Estatus($request->all());
        $user->nombre_estatus=strtoupper($request->nombre_estatus);
        $user->save();

        $notification = array(
        'message' => 'El Estatus se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_ides;
        $data= Estatus::find($id);
        $data->nombre_estatus= strtoupper($request->edit_nombre_estatus);
        $data->save();

        $notification = array(
        'message' => 'El estatus se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }

}
