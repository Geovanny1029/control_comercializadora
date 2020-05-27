<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 public function login(Request $request)
    {

        if (Auth::attempt(['user' =>$request['user'], 'password' => $request['password']])) {

            if (Auth::User()->estatus == 2) {
                $notification = array(
                    'message' => '¡ERROR! EL USUARIO ESTA DESACTIVO, COMUNIQUESE CON EL ADMINISTRADOR PARA TENER ACCESO', 
                    'alert-type' => 'error');  
                Auth::logout();
                return redirect('/')->with($notification);
            }

            $notification = array('message' => 'Bienvenido'." ".Auth::User()->nombre,'alert-type' => 'success');
            return redirect()->route('registro.index')->with($notification);
        }else{
            $notification = array(
            'message' => '¡ERROR! EL USUARIO O LA CONTRASEÑA NO COINCIDEN', 
            'alert-type' => 'error'
                );  
            return redirect('/')->with($notification);
        }
    }//fin de funcion login
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' =>['logout','login'] ]);
    }
}
