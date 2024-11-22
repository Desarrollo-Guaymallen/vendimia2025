<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'dni' => ['required', 'numeric', 'digits_between:7,8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:residentes'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::where('dni', $data['dni'])->first();
        if ($user) {
            return $user->update([
                'email' => $data['email'],
                'clave' => Hash::make($data['password']),
            ]);
        } else {
            return redirect()->route('register');
        }
        // return User::create([
        //     'dni' => $data['dni'],
        //     'email' => $data['email'],
        //     'clave' => Hash::make($data['password']),
        // ]);
    }

    protected function register(Request $request)
    {
        $data = $request->validate([
            'dni' => ['required', 'numeric', 'digits_between:7,8'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::where('dni', $data['dni'])->first();
        if ($user) {
            $user->update([
                'email' => $data['email'],
                'clave' => $data['password'],
            ]);
            return redirect()->route('register')->with('registrado', 'Te has registrado correctamente');
        } else {
            // return redirect()->route('register')->with(['userNoExistente' => 'El usuario con los datos proporcionados no existe']);
            return redirect()->route('register')->with('noRegistrado', 'Al parecer los datos ingresados no existen en nuestros registros, deberás enviar un correo con los datos que se muestran en la página');
        }
    }
}
