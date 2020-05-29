<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Razon_social_proveedor;

class RazonSocialProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $razon_social = Razon_social_proveedor::all()->orderBy('id','ASC')->get();

        return view('razon_social.index')->with('razon_social', $razon_social);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Razon_social_proveedor::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Razon_social_proveedor($request->all());
        $user->nombre_razon=strtoupper($request->nombre_razon);
        $user->save();

        $notification = array(
        'message' => 'La Razon Social se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idrazon;
        $data= Razon_social_proveedor::find($id);
        $data->nombre_razon= strtoupper($request->edit_nombre_razon);
        $data->save();

        $notification = array(
        'message' => 'La Razon Social se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }



}
