<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ejecutivo;

class EjecutivoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $ejecutivos = Ejecutivo::all()->orderBy('id','ASC')->get();

        return view('ejecutivos.index')->with('ejecutivos', $ejecutivos);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Ejecutivo::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Ejecutivo($request->all());
        $user->nombre_ejecutivo=strtoupper($request->nombre_ejecutivo);
        $user->save();

        $notification = array(
        'message' => 'El Ejecutivo se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_ideje;
        $data= Ejecutivo::find($id);
        $data->nombre_ejecutivo= strtoupper($request->edit_nombre_ejecutivo);
        $data->save();

        $notification = array(
        'message' => 'El Ejecutivo se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }

}
