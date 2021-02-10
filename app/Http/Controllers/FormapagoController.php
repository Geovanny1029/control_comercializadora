<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forma_pago;

class FormapagoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $forma= Forma_pago::orderBy('id','ASC')->get();

        return view('forma_pago.index')->with('forma', $forma);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Forma_pago::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Forma_pago($request->all());
        $user->nombre_pago=strtoupper($request->nombre_pago);
        $user->save();

        $notification = array(
        'message' => 'La forma de pago se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idfp;
        $data= Forma_pago::find($id);
        $data->nombre_pago= strtoupper($request->edit_nombre_pago);
        $data->save();

        $notification = array(
        'message' => 'La forma de pago se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }
    //
}
