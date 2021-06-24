<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmovimiento', function (Blueprint $table) {
            $table->id('idmovimiento');
            $table->unsignedBigInteger('idbien');
            $table->date('fecha');
            $table->unsignedBigInteger('idservicio');
            $table->string('motivo',50);
            $table->string('observaciones',50);
            $table->timestamps();
            //Claves foraneas
            $table->foreign("idbien")->references("idbien")->on("tbien");
            $table->foreign("idservicio")->references("idservicio")->on("tservicio");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmovimiento');
    }
}
