<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTusuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tusuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',50);
            $table->string('apellidos',70);
            $table->string('usuario',50);
            $table->string('tipo_usuario',30);
            $table->string('contrasenia',50);
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
        Schema::dropIfExists('tusuario');
    }
}
