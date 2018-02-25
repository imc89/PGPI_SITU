<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hechos', function (Blueprint $table) {

            $table->increments('ID_hechos');

            $table->integer('ID_alumno')->unsigned();
            $table->foreign('ID_alumno')->references('ID_alumno')->on('alumno');


            $table->integer('ID_etiqueta')->unsigned();
            $table->foreign('ID_etiqueta')->references('ID_etiqueta')->on('tags');


            $table->integer('ID_keyword')->unsigned();
            $table->foreign('ID_keyword')->references('ID_keyword')->on('keywords');



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
        Schema::dropIfExists('hechos');
    }
}
