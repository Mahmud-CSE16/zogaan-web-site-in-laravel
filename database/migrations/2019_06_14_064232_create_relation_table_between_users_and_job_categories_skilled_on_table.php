<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationTableBetweenUsersAndJobCategoriesSkilledOnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skilled_on', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('job_category_id')->unsigned()->index();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skilled_on');
    }
}
