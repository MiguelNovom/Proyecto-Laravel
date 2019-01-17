<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectores extends Model
{
	protected $table = 'sectores';

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
