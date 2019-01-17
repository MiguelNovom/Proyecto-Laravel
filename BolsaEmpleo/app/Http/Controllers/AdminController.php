<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\Experiencia;
use App\Formacion;
use App\Idioma;
use App\Oferta;
use App\Sectores;
use App\Inscribe;

class AdminController extends Controller
{
    public function index()
    {
        $fecha_actual = new \DateTime();
        $fecha_actual->format('Y-m-d'); 
        $users = User::all();
        $usersSelect=null;
        $ofertasAct = Oferta::where('fecha_limite','>=',$fecha_actual)->get();
        $ofertasnoAct = Oferta::where('fecha_limite','<',$fecha_actual)->get();
        $sectores = Sectores::all();
        return view('PanelAdministrador', compact('users','ofertasAct','ofertasnoAct','sectores','usersSelect'));
    }
    public function HacerAdmin($id){
        $user = User::where('id', $id)->first();
        $user->tipo = 1;
        $user->save();
         return redirect('/PanelAdmin')->with('message', ['success', __($user->name." ".$user->second_name." se ha convertido administrador.")]);
    }
     public function DeshacerAdmin($id){
        $user = User::where('id', $id)->first();
        $user->tipo = 0;
        $user->save();
         return redirect('/PanelAdmin')->with('message', ['success', __($user->name." ".$user->second_name." se ha convertido en usuario normal.")]);
    }
    public function activarCuenta($id)
    {
        $user = User::where('id', $id)->first();
        $data['name']=$user->name;
        $data['email']=$user->email;
        $data['confirmation_code'] = $user->confirmation_code = str_random(25);
        $user->save();
        Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
        });
        return redirect('/PanelAdmin')->with('message', ['success', __('Se ha enviado un email de confirmacion al usuario: '.$user->name." ".$user->second_name)]);
    }

    public function BorrarUser($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect('/PanelAdmin')->with('message', ['success', __('Se ha eliminado el usuario correctamente')]);
    }

    public function saveDisk($nombre,$ruta,$User,$Experiencias,$Formaciones,$Idiomas){
        $pdf = PDF::loadView('pdf.Diseño', compact('User','Experiencias','Formaciones','Idiomas'));
        $output = $pdf->output();
        $file_to_save=$ruta.'\\'.$nombre.'.pdf';
        if(!file_exists($ruta)){
            if(mkdir($ruta,0777,true)){
                file_put_contents($file_to_save, $output);
            }
        }else{
            file_put_contents($file_to_save, $output);
        }
    }

    public function exportarCurriculums(Request $request)
    {   
        if($request->pdfs === null){
            return redirect('/PanelAdmin')->with('message', ['warning', __('No se han seleccionado usuarios')]);
        }else{
            foreach ($request->pdfs as $id) {
                $User = User::where('id',$id)->first(); 
                $DatosUser= User::select('*')->where('id',$id)->first();
                $Nombre = $DatosUser->name . " " . $DatosUser->second_name;
                $Experiencias = Experiencia::where('id_user',$id)->get();
                $Formaciones = Formacion::where('id_user',$id)->get();
                $Idiomas = Idioma::where('id_user',$id)->get();     
                $ruta = public_path().'\pdf';
                $this->saveDisk($Nombre,$ruta,$User,$Experiencias,$Formaciones,$Idiomas);
            }
            return redirect('/PanelAdmin')->with('message', ['success', __('Curriculums exportados correctamente (Carpeta public del proyecto)')]);
        }
    }

    public function enviarCurriculums(Request $request)
    {

        $this->validate(request(), [ 
            'empresa' => 'required|email|max:255',
            'curriculums' => 'required',
        ]);
        $data['email']=$request['empresa'];
        $data['archivos']=$request['curriculums'];
        Mail::send('emails.curriculums', $data, function($message) use ($data) {
            $message->to($data['email']);
            foreach ($data['archivos'] as $archivo) {
                $nombre = $archivo->getClientOriginalName();
                $message->attach($archivo,['as'=>$nombre]);
            }
            $message->subject('Curriculums ALumnos');
        });
        return redirect('/PanelAdmin')->with('message', ['success', __('Curriculums enviados correctamente')]);
    }
    
    public function ListarUsuariosInscritos($id)
    {   
        $usersInscritos = Inscribe::join('Users','Inscribes.id_user','=','Users.id')->where('Inscribes.id_oferta',$id)->select('Users.*','Inscribes.*')->get();
        return view('SeleccionarUsers', compact('usersInscritos'));
    }
    public function SeleccionarUsuario($id_user, $id_oferta)
    {
        $seleccionar = Inscribe::where('id_user',$id_user)->where('id_oferta',$id_oferta)->first();
        $seleccionar->seleccionado = 1;
        $seleccionar->save();
        return redirect('/PanelAdmin/ListarUsers/'.$id_oferta)->with('message', ['success', __('Usuario seleccionado correctamente')]);
    }  
    public function pdfUserInscrito()
    {   
        $Users = Inscribe::join('Users','Inscribes.id_user','=','Users.id')->join('Ofertas','Inscribes.id_oferta','=','Ofertas.id')->select('Users.*','Ofertas.sector')->get();
        $pdf = PDF::loadView('pdf.UInscrito', compact('Users'));
        return $pdf->download('Usuarios_Inscritos.pdf');
    }
    public function pdfOfertas(Request $request)
    {   
        $fecha_inicio=$request->input("fecha_inicio");
        $fecha_fin=$request->input("fecha_fin");
        $Ofertas = Oferta::whereBetween('fecha_limite',[$fecha_inicio, $fecha_fin])->orderBy('sector')->get();
        $pdf = PDF::loadView('pdf.Ofertas', compact('Ofertas'));
        return $pdf->download('Ofertas.pdf');
    }
    public function pdfUserSeleccionado(Request $request)
    {   
       $fecha_inicio=$request->input("fecha_inicio");
       $fecha_fin=$request->input("fecha_fin");
       $Users = Inscribe::join('Users','Inscribes.id_user','=','Users.id')->join('Ofertas','Inscribes.id_oferta','=','Ofertas.id')->where('Inscribes.seleccionado',1)->whereBetween('fecha_limite',[$fecha_inicio, $fecha_fin])->select('Users.*','Ofertas.*')->get();
       $pdf = PDF::loadView('pdf.USeleccionado', compact('Users'));
       return $pdf->download('Usuarios_Seleccionados.pdf');
   }
}

