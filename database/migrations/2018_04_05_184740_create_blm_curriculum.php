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
        Schema::create('sde_curriculum', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_users');
            $table->integer('id_state');
            $table->integer('id_categoria');
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('nombre')->nullable();
            $table->string('puesto')->nullable();
            $table->mediumText('descripcion')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->mediumText('curriculum')->nullable();
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
        Schema::dropIfExists('sde_curriculum');
    }
}
