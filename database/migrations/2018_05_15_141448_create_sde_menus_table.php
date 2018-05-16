<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdeMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_padre')->nullable();
            $table->text('texto')->nullable();
            $table->text('link')->nullable();
            $table->text('tipo')->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('estatus')->nullable();
            $table->text('icon')->nullable();
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
        Schema::dropIfExists('sde_menus');
    }
}
