<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Formacion extends Model
{
    protected $table = 'formacions';

    protected $fillable = [
        'titulo', 'grado', 'centro','finalizado', 'anyo_finalizacion',
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
