<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Registro;
use App\Aduana;
use App\Cliente;
use App\Ejecutivo;
use App\Estatus;
use App\Razon_social_proveedor;


class RegistroController extends Controller
{
  public function __construct(){
        $this->middleware('auth');///se configura en midlewere/autenticate para proteger las rutas
    }

        public function index()
    {

    	$registros = Registro::where('fecha_cierre','null')->get();
        return view('registros.index')->with('registros',$registros);
    }
}
