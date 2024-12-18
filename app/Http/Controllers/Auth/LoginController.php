<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $usuario = $request->input('dni');
        $clave = $request->input('clave');
        $type = $request->input('type') ?? $request->query('type');

        if (is_numeric($usuario)) {
            $user = User::where('dni', $usuario)->where('clave', $clave)->first();
        } else {
            $admin = Admin::where('usuario', $usuario)->where('clave', $clave)->first();
        }


        if (isset($user)) {
            Auth::guard('web')->login($user);
            request()->session()->regenerate();
            if ($type == 'reinas') {
                return redirect()->route('votacion');
            } else {
                return redirect()->route('votacion.cultores');
            }
        } else if (isset($admin)) {
            Auth::guard('admin')->login($admin);
            request()->session()->regenerate();
            if ($type == 'reinas') {
                return redirect()->route('resultados');
            } else {
                return redirect()->route('resultados.cultores');
            }
        }

        // Autenticación fallida
        return redirect()->back()->withErrors(['dni' => 'Credenciales incorrectas']);
    }
}
