<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor_externo;

class ProveedorExternoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }


    public function index()
    {
        $proveedores = Proveedor_externo::orderBy('id','ASC')->get();

        return view('proveedores.index')->with('proveedores', $proveedores);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Proveedor_externo::find($id);
                return response()->json($info);

            }
    }

    public function store(Request $request)
    {
        $user = new Proveedor_externo($request->all());
        $user->nombre_proveedor=strtoupper($request->nombre_proveedor);
        $user->save();

        $notification = array(
        'message' => 'El Proveedor externo se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idprov;
        $data= Proveedor_externo::find($id);
        $data->nombre_proveedor= strtoupper($request->edit_nombre_proveedor);
        $data->save();

        $notification = array(
        'message' => 'El Proveedor externo se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }

}
