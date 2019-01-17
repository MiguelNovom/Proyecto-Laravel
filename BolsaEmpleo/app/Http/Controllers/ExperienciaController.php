<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experiencia;

class ExperienciaController extends Controller
{
	public function store()
	{
		$this->validate(request(), [ 
			'puesto' => 'required|string|max:100',
			'funcion_realizada' => 'required|string|max:120',
			'empresa' => 'required|string|max:50',
			'sector_empresa' => 'required|string|max:50',
			'mes_anyo_inicio' => 'required|date_format:m-Y',
			'mes_anyo_fin' => 'required|date_format:m-Y',
		]);
		Experiencia::create(request()->all());
		return back()->with('message', ['success', __("Experiencia insertada correctamente")]);
	}
	public function destroy(Experiencia $id) {
		if(!$id->usuario())
			abort(401);
		$id->delete();
		return redirect('/PanelUsuario')->with('message', ['success', __('Experiencia Eliminada Correctamente')]);
	}

	public function update(Request $request){
		$id=$request->input("id");
		$this->validate(request(), [ 
			'puesto' => 'required|string|max:100',
			'funcion_realizada' => 'required|string|max:120',
			'empresa' => 'required|string|max:50',
			'sector_empresa' => 'required|string|max:200',
			'mes_anyo_inicio' => 'required|date_format:m-Y',
			'mes_anyo_fin' => 'required|date_format:m-Y',
		]);
		Experiencia::find($id)->update($request->all());
		return redirect('/PanelUsuario')->with('message', ['success', __('Experiencia editada correctamente')]);
	}
	
}
