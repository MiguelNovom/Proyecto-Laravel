<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

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
    protected $redirectTo = 'Activacion';

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
            'name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'fecha_nac'=> 'required|date',
            'dni' => 'required|string|max:9',
            'password' => 'required|string|min:6|confirmed',
            'foto' => 'image'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['foto'])){
            request()->file('foto')->store('user');
            $filename = request()->file('foto')->hashName();
        }else{
            $filename ="defecto.png";
        }

        $user = User::create([
            'name' => $data['name'],
            'second_name' => $data['second_name'],
            'provincia' => $data['provincia'],
            'localidad' => $data['localidad'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'fecha_nac' => $data['fecha_nac'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'vehiculo' => $data['vehiculo'],
            'foto' => $filename,
        ]);
        return $user;
    }
}
