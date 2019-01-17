<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Sectores;
use App\Inscribe;

class OfertaController extends Controller
{
	public function index(){         
		$sectores_select = Request()->input('sectores');
		$ofertas =  null;
		$sectores = Sectores::all();
		return view('Ofertas', compact('sectores','ofertas'));
	}
	
	public function buscarOfertas(){
		$ofertas_inscritas=Inscribe::select('id_oferta')->where('id_user',Auth()->id())->get();
		$fecha_actual = new \DateTime();
		$fecha_actual->format('Y-m-d'); 
		$sectores_select = Request()->input('sectores');
		$ofertas = Oferta::whereIn('sector',$sectores_select)->where('fecha_limite','>=',$fecha_actual)->whereNotIn('id',$ofertas_inscritas)->get();
		$sectores = Sectores::all();
		return view('Ofertas', compact('sectores','ofertas'));
	}
	public function BorrarOferta($id)
    {
        $user = Oferta::where('id', $id)->delete();
        return redirect('/PanelAdmin')->with('message', ['success', __('Se ha eliminado la oferta correctamente')]);
    }
    public function update(Request $request){
		$id=$request->input("id");
		$this->validate(request(), [ 
			'titulo' => 'required|string|max:50',
			'descripcion' => 'required|string|max:250',
			'empresa' => 'required|string|max:50',
			'sector' => 'required|string|max:100',
			'fecha_limite' => 'required|date',
		]);
		Oferta::find($id)->update($request->all());
		return redirect('/PanelAdmin')->with('message', ['success', __('Oferta editada correctamente')]);
	}

	public function store(Request $request)
	{
		$this->validate(request(), [ 
			'titulo' => 'required|string|max:50',
			'descripcion' => 'required|string|max:250',
			'empresa' => 'required|string|max:50',
			'sector' => 'required|string|max:100',
			'fecha_limite' => 'required|date',
		]);
		Oferta::create($request->all());
		return redirect('/PanelAdmin')->with('message', ['success', __("Oferta insertada correctamente")]);
	}
}
