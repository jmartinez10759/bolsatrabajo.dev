<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blm_jobs_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cv');
            $table->string('empresa');
            $table->string('puesto');
            $table->string('descripcion',350);
            $table->date('fecha_inicio');
            $table->date('fecha_final');
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
        Schema::dropIfExists('blm_jobs_candidate');
    }
}
