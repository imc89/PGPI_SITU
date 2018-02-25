<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     *IMPORTANTE PARA RESTABLECER AUTONUMERICO 
     *________________________________________
     *ALTER TABLE tablename AUTO_INCREMENT = 1
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('ID_usuario');
            
            $table->string('name');
            $table->string('rol');// CAMPO ROL AÑADIDO POR MI
            $table->dateTime('tiempolog');// CAMPO ROL AÑADIDO POR MI
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
