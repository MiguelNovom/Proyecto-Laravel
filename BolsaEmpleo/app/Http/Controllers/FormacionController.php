<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formacion;

class FormacionController extends Controller
{
    public function store(Request $request)
	{
		$this->validate(request(), [ 
			'titulo' => 'required|string|max:200',
			'centro' => 'required|string|max:50',
			'grado' => 'required|string|max:50',
			'anyo_finalizacion' => 'required|integer|min:1900',
		]);
		Formacion::create(request()->all());
		return back()->with('message', ['success', __("Formacion insertada correctamente")]);
	}
	public function destroy(Formacion $id) {
		if( ! $id->usuario())
			abort(401);
		$id->delete();
		return redirect('/PanelUsuario')->with('message', ['success', __('Formacion Eliminada Correctamente')]);
	}
	public function update(Request $request){
		$id=$request->input("id");
		$this->validate(request(), [ 
			'titulo' => 'required|string|max:50',
			'centro' => 'required|string|max:50',
			'grado' => 'required|string|max:50',
			'anyo_finalizacion' => 'required|integer|min:1900|max:2100',
		]);
		Formacion::find($id)->update($request->all());
		return redirect('/PanelUsuario')->with('message', ['success', __('Formacion editada correctamente')]);
	}
}
