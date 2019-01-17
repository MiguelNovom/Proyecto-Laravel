<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Inscribe extends Model
{
    protected $table = 'inscribes';

    protected static function boot() {
		parent::boot();
		static::creating(function($reply) {
			if( ! App::runningInConsole() ) {
				$reply->id_user = auth()->id(); 
			} 
		}); 
	}
}
