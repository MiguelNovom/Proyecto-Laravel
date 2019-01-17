<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Experiencia extends Model
{
	protected $table = 'experiencias';

	protected $fillable = [
		'puesto', 'funcion_realizada', 'empresa', 'sector_empresa','mes_anyo_inicio','mes_anyo_fin'
	];

	protected static function boot() {
		parent::boot();
		static::creating(function($reply) {
			if( ! App::runningInConsole() ) {
				$reply->id_user = auth()->id(); 
			} 
		}); 
	}
	public function usuario(){
		return $this->belongsTo(User::class, 'id_user');
	}

}
