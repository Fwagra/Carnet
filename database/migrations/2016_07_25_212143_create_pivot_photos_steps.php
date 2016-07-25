<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotPhotosSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_step', function (Blueprint $table) {
            $table->integer('step_id')->unsigned();
            $table->integer('photos_id')->unsigned();
            $table->foreign('step_id')->references('id')->on('steps');
            $table->foreign('photos_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo_step');
    }
}
