<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        DB::table('sectores')->insert([
            'nombre'=> 'Automoción y transporte',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Químico, farmacéutico y sanitario',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Textil, calzado y confección',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Construcción',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Alimentación y restauración',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Siderurgia, metalurgia, fabricación y comercialización de maquinaria',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Servicios a empresas',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Papel, cartón, artes gráficas, edición',
        ]);
        DB::table('sectores')->insert([
            'nombre'=> 'Servicios recreativos, culturales, ocio',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectores');
    }
}
