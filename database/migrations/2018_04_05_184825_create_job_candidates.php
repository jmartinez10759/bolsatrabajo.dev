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
        Schema::create('sde_jobs_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cv');
            $table->string('jobs_empresa')->nullable();
            $table->string('jobs_puesto')->nullable();
            $table->string('jobs_descripcion',350)->nullable();
            $table->integer('jobs_orden')->default(1);
            $table->date('jobs_fecha_inicio')->nullable();
            $table->date('jobs_fecha_final')->nullable();
            $table->string('jobs_jefe_inmediato')->nullable();
            $table->string('jobs_telefono')->nullable();
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
        Schema::dropIfExists('sde_jobs_candidate');
    }
}
