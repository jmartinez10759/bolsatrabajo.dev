<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlmCurriculum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blm_curriculum', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('id_users');
            $table->integer('id_state');
            $table->integer('id_categoria');
            $table->string('email');
            $table->string('email2');
            $table->string('nombre');
            $table->string('puesto');
            $table->string('descripcion',350);
            $table->integer('telefono');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('url_cv');
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
        Schema::dropIfExists('blm_curriculum');
    }
}
