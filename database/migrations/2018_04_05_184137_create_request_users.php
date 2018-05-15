<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sde_request_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rol');
            $table->string('name');
            $table->string('first_surname');
            $table->string('second_surname')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->string('api_token');
            $table->boolean('status');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmed_code')->nullable();
            $table->boolean('confirmed_nss')->default(0);
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
        Schema::dropIfExists('sde_request_users');
    }
}
