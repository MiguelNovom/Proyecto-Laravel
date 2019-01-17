<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Oferta extends Model
{
    protected $table = 'ofertas';

     protected $fillable = [
        'titulo','descripcion', 'empresa','sector', 'fecha_limite',
    ];
    
}
