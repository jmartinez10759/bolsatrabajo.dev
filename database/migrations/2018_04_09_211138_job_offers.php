<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JobOffers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('title',100);
            $table->string('code',100);
            $table->integer('responsible_user_id');
            $table->integer('created_by_user_id');
            $table->integer('account_id');
            $table->integer('account_client_id');
            $table->string('departament',100);
            $table->string('picture',200);
            $table->string('email',100);
            $table->string('description_short',200);
            $table->string('description_large',270);
            $table->string('other_details',100);
            $table->string('requirements',150);
            $table->datetime('date_from');
            $table->datetime('date_to');
            $table->string('is_active',10);
            $table->string('published',100);
            $table->string('priority',120);
            $table->string('quantity',120);
            $table->integer('state_id');
            $table->string('county',150);
            $table->string('postal_code',100);
            $table->integer('contract_type_id');
            $table->string('salary_min',100);
            $table->string('salary_max',100);
            $table->integer('payment_period_id');
            $table->string('count',100);
            $table->string('created',100);
            $table->string('modified',100);
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
        Schema::dropIfExists('JobOffers');
    }
}
