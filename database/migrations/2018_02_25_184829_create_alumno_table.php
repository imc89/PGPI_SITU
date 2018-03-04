<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unique()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('dni')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('carrera')->nullable();

            $table->string('dato_opcion1')->nullable();
            $table->string('dato_opcion2')->nullable();
            $table->string('dato_opcion3')->nullable();

            $table->string('opcion1_valor')->nullable();
            $table->string('opcion2_valor')->nullable();
            $table->string('opcion3_valor')->nullable();
            

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
        Schema::dropIfExists('alumno');
    }
}
