<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde_skills_candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cv');
            $table->string('habilidad')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('skill_orden')->default(1);
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
        Schema::dropIfExists('sde_skills_candidate');
    }
}
