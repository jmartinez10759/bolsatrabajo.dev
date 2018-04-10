<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blm_jobs_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();
            $table->string('title',100)->nullable();
            $table->string('code',100)->nullable(); 
            $table->integer('responsible_user_id')->nullable();
            $table->integer('created_by_user_id')->nullable();
            $table->integer('account_id')->nullable();
            $table->integer('account_client_id')->nullable();
            $table->string('departament',100)->nullable();
            $table->string('picture',200)->nullable();
            $table->string('email',100)->nullable();
            $table->string('description_short',200)->nullable();
            $table->string('description_large',270)->nullable();
            $table->string('other_details',100)->nullable();
            $table->string('requirements',150)->nullable();
            $table->datetime('date_from')->nullable();
            $table->datetime('date_to')->nullable();
            $table->string('is_active',10)->nullable();
            $table->string('published',100)->nullable();
            $table->string('priority',120)->nullable();
            $table->string('quantity',120)->nullable();
            $table->integer('state_id')->nullable();
            $table->string('county',150)->nullable();
            $table->string('postal_code',100)->nullable();
            $table->integer('contract_type_id')->nullable();
            $table->string('salary_min',100)->nullable();
            $table->string('salary_max',100)->nullable();
            $table->integer('payment_period_id')->nullable();
            $table->string('count',100)->nullable();
            $table->string('created',100)->nullable();
            $table->string('modified',100)->nullable();
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
        Schema::dropIfExists('blm_jobs_offers');
    }
}
