<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//$table->foreign('user_id')->references('id')->on('users')
    Schema::create('invitado', function (Blueprint $table) {

        $table->increments('ID_invitado');

        $table->integer('ID_usuario')->unsigned();
        $table->foreign('ID_usuario')->references('ID_usuario')->on('users');


        $table->integer('ID_alumno')->unsigned();
        $table->foreign('ID_alumno')->references('ID_alumno')->on('alumno');

        $table->dateTime('Tpermiso');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('descripcion');
        $table->string('acceso');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitado');
    }
}
