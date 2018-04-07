<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlmDetailsCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blm_details_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users');
            $table->integer('id_state');
            $table->string('telefono')->nullable();
            $table->string('codigo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('curp');
            $table->string('nss')->nullable();
            $table->string('cargo')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('blm_details_candidate');
    }
}
