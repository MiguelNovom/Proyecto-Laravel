<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Idioma extends Model
{
    protected $table = 'idiomas';

    protected $fillable = [
        'idioma', 'nivel_hablado', 'nivel_escrito','titulo_oficial',
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
