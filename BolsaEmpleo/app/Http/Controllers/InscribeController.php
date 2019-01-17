<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscribe;

class InscribeController extends Controller
{
	public function store($id){
		$comprobar = Inscribe::where('id_user',Auth()->id())->where('id_oferta',$id)->first();
		if($comprobar === null){
			$inscribe = New Inscribe;
			$inscribe->id_user = Auth()->id();
			$inscribe->id_oferta = $id;
			$inscribe->save();
		}
		return redirect('/PanelUsuario/Ofertas')->with('message', ['success', __('Se inscrito correctamente en la oferta')]);
	}    
}
