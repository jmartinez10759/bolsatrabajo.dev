<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde_study_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cv');
            $table->integer('id_nivel')->nullable();
            $table->integer('id_categorias_educativas')->nullable();
            $table->integer('id_estatus_academico')->nullable();
            $table->string('escuela')->nullable();
            $table->string('cedula')->nullable();
            $table->string('otra_categoria')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
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
        Schema::dropIfExists('sde_study_candidate');
    }
}
