<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbien', function (Blueprint $table) {
            $table->id('idbien');
            $table->unsignedBigInteger('idservicio');
            $table->string('cod_patrimonial')->nullable();
            $table->string('procedencia',30)->nullable();
            $table->string('nombre');
            $table->integer('cantidad')->nullable();
            $table->string('marca',20)->nullable();
            $table->string('modelo',20)->nullable();
            $table->string('num_serie',20)->nullable();
            $table->string('color')->nullable();
            $table->string('medidas',30)->nullable();
            $table->string('estado_conservacion',30)->nullable();
            $table->string('estado',15)->nullable();
            $table->string('observacion',100)->nullable();
            $table->date('fecha_adquisicion')->nullable();    //dateTime?    
            $table->timestamps();
            //Clave foranea
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
        Schema::dropIfExists('tbien');
    }
}
