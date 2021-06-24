<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTservicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tservicio', function (Blueprint $table) {
            $table->id('idservicio');
            $table->string('nombre',70);
            $table->unsignedBigInteger('idresponsable');
            $table->timestamps();
            //Clave foranea
            $table->foreign("idresponsable")->references("idresponsable")->on("tresponsable");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tservicio');
    }
}
