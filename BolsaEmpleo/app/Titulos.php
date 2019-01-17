<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulos extends Model
{
    protected $table = 'titulos';
    protected $fillable = [
		'nombre',
	];

	protected static function boot() {
		parent::boot();
		static::creating(function($reply) {
			if( ! App::runningInConsole() ) {
				$reply->id_user = auth()->id(); 
			} 
		}); 
	}
}
