<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

class IdiomaController extends Controller
{
    public function store()
	{
		$this->validate(request(), [ 
			'idioma' => 'required|string|max:50',
			'nivel_hablado' => 'required|string|max:50',
			'nivel_escrito' => 'required|string|max:50',
			'titulo_oficial' => 'required|string|max:50',
		]);
		
		Idioma::create(request()->all());
		return back()->with('message', ['success', __("Idioma insertado correctamente")]);
	}
	public function destroy(Idioma $id) {
		if( ! $id->usuario())
			abort(401);
		$id->delete();
		return redirect('/PanelUsuario')->with('message', ['success', __('Idioma Eliminao Correctamente')]);
	}
	public function update(Request $request){
		$id=$request->input("id");
		$this->validate(request(), [ 
			'idioma' => 'required|string|max:50',
			'nivel_hablado' => 'required|string|max:50',
			'nivel_escrito' => 'required|string|max:50',
			'titulo_oficial' => 'required|string|max:50',
		]);
		Idioma::find($id)->update($request->all());
		return redirect('/PanelUsuario')->with('message', ['success', __('Idioma editado correctamente')]);
	}
}
