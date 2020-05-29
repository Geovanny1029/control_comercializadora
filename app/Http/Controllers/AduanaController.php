<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduana;

class AduanaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $aduanas = Aduana::all();

        return view('aduanas.index')->with('aduanas', $aduanas);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Aduana::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Aduana($request->all());
        $user->nombre_aduana=strtoupper($request->nombre_aduana);
        $user->save();

        $notification = array(
        'message' => 'La Aduana se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

   public function actualiza(Request $request){

        $id = $request->edit_idad;
        $data= Aduana::find($id);
        $data->nombre_aduana= strtoupper($request->edit_nombre_aduana);
        $data->save();

        $notification = array(
        'message' => 'La Aduana se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }       

}
