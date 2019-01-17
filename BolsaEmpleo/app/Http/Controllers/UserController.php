<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Experiencia;
use App\Formacion;
use App\Idioma;
use App\Sectores;
use App\Titulos;
use App\Oferta;

class UserController extends Controller
{   
    public function index()
    {
        $user = Auth::user(); 
        $experiencias = Experiencia::all();
        $formaciones = Formacion::all();
        $idiomas = Idioma::all();
        $sectores = Sectores::all();
        $titulos = Titulos::all();
        return view('PanelUsuario', compact('user','experiencias','formaciones','idiomas','sectores','titulos'));
    }

    public function controlInicio()
    {
        if (Auth::guest()){
            return view('auth.login');
        }else{
            $user = Auth::user();
            if($user->tipo ===1){
                return redirect('/PanelAdmin');
            }else{
                if($user->confirmed===0){
                    return redirect('/Activacion');
                }else{
                    return redirect('/PanelUsuario');
                }
            }
        }
        
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        if (! $user)
            return redirect('/');
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        if (Auth::guest()){
            return view('auth.login');
        }else{
            return redirect('/PanelUsuario')->with('message', ['success', __('Has confirmado correctamente tu correo!')]);
        }
    }
    public function pdf()
    {   
        $User = Auth::user(); 
        $Experiencias = Experiencia::where('id_user',Auth()->id())->get();
        $Formaciones = Formacion::where('id_user',Auth()->id())->get();
        $Idiomas = Idioma::where('id_user',Auth()->id())->get();
        $pdf = PDF::loadView('pdf.Diseño', compact('User','Experiencias','Formaciones','Idiomas'));
        return $pdf->download('Curriculum.pdf');
    }
    public function destroyCurriculum()
    {
        $user_id = Auth()->id();
        $Experiencias = Experiencia::where('id_user',$user_id)->delete();
        $Formacion = Formacion::where('id_user',$user_id)->delete();
        $Idiomas = Idioma::where('id_user',$user_id)->delete();
        return redirect('/PanelUsuario')->with('message', ['success', __('Curriculum Eliminado Correctamente')]);
    }

    public function update(Request $request){
        $id = Auth()->id();
        $usuario = User::find($id);
        $this->validate(request(), [ 
            'name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'foto'=> 'image',
        ]);
        $file = $request->file('foto');
        $usuario->fill($request->except('foto'));
        if(isset($file)) {
            $request->file('foto')->store('user');
            $filename = request()->file('foto')->hashName();
            $usuario->foto = $filename ;
        }
        $usuario->save();
        return redirect('/PanelUsuario')->with('message', ['success', __('Perfil editado correctamente')]);
    }
    public function peticionEliminar($id)
    {
        $user = User::where('id', $id)->first();
        $data['id']=$id;
        $data['name']=$user->name;
        $data['email']=$user->email;
        Mail::send('emails.eliminarUser', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Peticion de Eliminar Cuenta');
        });
        return redirect('/PanelUsuario')->with('message', ['success', __('Peticion de eliminar cuenta enviada al correo.')]);
    }
    public function BorrarUser($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect('/')->with('message', ['success', __('Se ha eliminado el usuario')]);
    }
}
