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
            $table->increments('id');

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumno');


            // $table->integer('tags_id')->unsigned();
            // $table->foreign('tags_id')->references('id')->on('tags');


            // $table->integer('keyword_id')->unsigned();
            // $table->foreign('keyword_id')->references('id')->on('keywords');


            $table->string('etiqueta');
            $table->string('titulo');
            $table->integer('curso')->nullable();
            $table->date('fecha')->nullable();
            $table->string('contenido', 5000)->nullable();
            $table->string('proposito', 5000)->nullable();
            $table->integer('autorizacion')->nullable();
            $table->string('video')->nullable();
            $table->string('encuentro', 5000)->nullable();
            $table->string('foto')->nullable();
            $table->string('anexo')->nullable();


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