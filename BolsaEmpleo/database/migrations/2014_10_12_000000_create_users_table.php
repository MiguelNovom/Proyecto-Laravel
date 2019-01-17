<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('second_name');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('direccion');
            $table->string('telefono');
            $table->date('fecha_nac');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dni');
            $table->tinyInteger('vehiculo')->default(0);
            $table->tinyInteger('tipo')->default(0);
            $table->string('foto')->default('defecto.png');
            $table->tinyInteger('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name'=> 'admin',
            'second_name'=> 'admin',
            'provincia'=> 'cadiz',
            'localidad'=> 'cadiz',
            'direccion'=> 'cadiz',
            'telefono'=> '123456789',
            'fecha_nac'=> '1995-02-03',
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('1234'),
            'dni'=> '12345678A',
            'vehiculo'=> 0,
            'foto'=>'admin.png',
            'tipo'=>1,
            'confirmed'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
