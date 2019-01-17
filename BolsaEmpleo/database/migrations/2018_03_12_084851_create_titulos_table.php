<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

    DB::table('titulos')->insert([
            'nombre'=> 'ESO',
        ]);
    DB::table('titulos')->insert([
            'nombre'=> 'Bachillerato',
        ]);
    DB::table('titulos')->insert([
            'nombre'=> 'FP Basica',
        ]);
    DB::table('titulos')->insert([
            'nombre'=> 'Ciclo Formativo',
        ]);
    DB::table('titulos')->insert([
            'nombre'=> 'Carrera',
        ]);
    DB::table('titulos')->insert([
            'nombre'=> 'Master',
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
}
