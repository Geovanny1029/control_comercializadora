<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor_externo;
use App\Registros_Nproveedores;
use App\Http\Requests\ProveedorRquest;

class ProveedorExternoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }


    public function index()
    {
        $proveedores = Proveedor_externo::where('estatus',1)->orderBy('id','ASC')->get();

        return view('proveedores.index')->with('proveedores', $proveedores);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Proveedor_externo::find($id);
                return response()->json($info);

            }
    }

    public function store(ProveedorRquest $request)
    {
        $user = new Proveedor_externo($request->all());
        $user->nombre_proveedor=strtoupper($request->nombre_proveedor);
        $user->tax_id=strtoupper($request->tax_id);
        $user->direccion_fiscal=strtoupper($request->direccion_fiscal);
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
        $data->tax_id= strtoupper($request->edit_tax_id);
        $data->direccion_fiscal= strtoupper($request->edit_direccion_fiscal);
        $data->save();

        $notification = array(
        'message' => 'El Proveedor externo se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }


    public function proveedorsearch(Request $request){
         
        $search = $request->search;

        if($search == ''){
         $employees = Proveedor_externo::orderby('nombre_proveedor','asc')->select('id','nombre_proveedor')->limit(8)->get();
      }else{
         $employees = Proveedor_externo::orderby('nombre_proveedor','asc')->select('id','nombre_proveedor')->where('nombre_proveedor', 'like', '%' .$search . '%')->limit(8)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array(
              "id"=>$employee->id,
              "text"=>$employee->nombre_proveedor
         );
      }

      echo json_encode($response);
      exit;
    }

    public function timereal(Request $request)
    {
         if($request->ajax()){
            
            $user = new Proveedor_externo();
            $user->nombre_proveedor=strtoupper($request->nombrep);
            $user->save();
             return response()->json($user);
         }


    }

    public function destroy($id){

        $proveedor= Proveedor_externo::find($id);
        $proveedor->estatus = 0;
        $proveedor->save();

        $notification = array(
        'message' => 'El Proveedor '.$proveedor->nombre_proveedor.' se ha dado de baja', 
        'alert-type' => 'warning'
        );  

        return redirect()->route('proveedoresExt.index')->with($notification);

    }


      public function habilitar($id){

        $proveedor= Proveedor_externo::find($id);
        $proveedor->estatus = 1;
        $proveedor->save();

        $notification = array(
        'message' => 'El Proveedor '.$proveedor->nombre_proveedor.' se ha habilitado', 
        'alert-type' => 'success'
        );  

        return redirect()->route('proveedoresExt.index')->with($notification);

    }

    public function baja()
    {
        $proveedores = Proveedor_externo::where('estatus',0)->orderBy('id','ASC')->get();

        return view('proveedores.bajas')->with('proveedores', $proveedores);
    }

    public function getproveedor(){
        $proveedor = Proveedor_externo::where('estatus',1)->orderBy('id','ASC')->get();

        return response()->json($proveedor);
    }

    public function updateproveedor(Request $request){
    if($request->ajax()){
            $id = $request->id;
            $totalprov = sizeof($request->id_proveedor_edit);
            $valorprov = $request->id_proveedor_edit;
          for($k=0;$k<$totalprov;$k++){
            $proveedoredit = new Registros_Nproveedores();
            $proveedoredit->id_registro= $id;
            $proveedoredit->id_proveedor= $valorprov[$k];
            $proveedoredit->save();
          }
            return response()->json($proveedoredit);

    }    
  }

}
