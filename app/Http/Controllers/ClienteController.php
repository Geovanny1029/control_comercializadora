<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Cliente;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\ClienteRequest;


class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

    public function index()
    {
        $clientes = Cliente::where('estatus',1)->orderBy('id','ASC')->get();

        return view('clientes.index')->with('clientes', $clientes);
    }

    public function view(Request $request){
        if($request->ajax()){
                $id = $request->id;
                $info = Cliente::find($id);
                return response()->json($info);

            }
    }

    public function searchcliente(Request $request){

         $search = $request->search;

        if($search == ''){
         $employees = Cliente::orderby('nombre_cliente','asc')->select('id','nombre_cliente')->limit(8)->get();
      }else{
         $employees = Cliente::orderby('nombre_cliente','asc')->select('id','nombre_cliente')->where('nombre_cliente', 'like', '%' .$search . '%')->limit(8)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array(
              "id"=>$employee->id,
              "text"=>$employee->nombre_cliente
         );
      }

      echo json_encode($response);
      exit;

    }

    public function store(ClienteRequest $request)
    {
        $user = new Cliente($request->all());
        $user->nombre_cliente=strtoupper($request->nombre_cliente);
        $user->rfc=strtoupper($request->rfc);
        $user->direccion_fiscal=strtoupper($request->direccion_fiscal);
        $user->save();

        $notification = array(
        'message' => 'El Cliente se ha Guardado Exitosamente', 
        'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function actualiza(Request $request){

        $id = $request->edit_idcliente;
        $data= Cliente::find($id);
        $data->nombre_cliente= strtoupper($request->edit_nombre_cliente);
        $data->rfc= strtoupper($request->edit_rfc);
        $data->direccion_fiscal= strtoupper($request->edit_direccion_fiscal);
        $data->save();

        $notification = array(
        'message' => 'El Cliente se ha Actualizado Exitosamente', 
        'alert-type' => 'success'
        );        

        return back()->with($notification);
    }  

    public function datatable()
    {
        return view('clientes.index');
    }

    public function timereal(Request $request)
    {
         if($request->ajax()){
            
            $user = new Cliente();
            $user->nombre_cliente=strtoupper($request->nombre);
            $user->save();
             return response()->json($user);
         }


    }

    public function destroy($id){

        $clientes= Cliente::find($id);
        $clientes->estatus = 0;
        $clientes->save();

        $notification = array(
        'message' => 'El Cliente '.$clientes->nombre_cliente.' se ha dado de baja', 
        'alert-type' => 'warning'
        );  

        return redirect()->route('clientes.index')->with($notification);

    }


      public function habilitar($id){

        $clientes= Cliente::find($id);
        $clientes->estatus = 1;
        $clientes->save();

        $notification = array(
        'message' => 'El Cliente '.$clientes->nombre_cliente.' se ha habilitado', 
        'alert-type' => 'success'
        );  

        return redirect()->route('clientes.index')->with($notification);

    }

    public function baja()
    {
        $clientes = Cliente::where('estatus',0)->orderBy('id','ASC')->get();

        return view('clientes.bajas')->with('clientes', $clientes);
    }

    public function getPosts()
    {
         return \DataTables::of(Cliente::query())->make(true);
    } 
}
