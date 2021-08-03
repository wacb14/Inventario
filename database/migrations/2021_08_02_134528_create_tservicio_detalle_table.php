<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTservicioDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tservicio_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idservicio');
            $table->unsignedBigInteger('idresponsable');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
            //Claves foraneas
            $table->foreign("idservicio")->references("idservicio")->on("tservicio");
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
        Schema::dropIfExists('tservicio_detalle');
    }
}
