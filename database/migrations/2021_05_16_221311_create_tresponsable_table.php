<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTresponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tresponsable', function (Blueprint $table) {
            $table->id('idresponsable');
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('cargo',100)->nullable();
            $table->string('modalidad',20)->nullable();
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
        Schema::dropIfExists('tresponsable');
    }
}
