<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdeRelRolMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde_rol_menu', function (Blueprint $table) {
            $table->integer('id_rol');
            $table->integer('id_users');
            $table->integer('id_empresa');
            $table->integer('id_sucursal');
            $table->integer('id_menu');
            $table->integer('id_permiso');
            $table->boolean('estatus');
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
        Schema::dropIfExists('sde_rol_menu');
    }
}
