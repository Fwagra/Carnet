<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('trip_id');
            $table->text('name');
            $table->integer('image_id');
            $table->mediumtext('md_value');
            $table->mediumtext('html_value');
            $table->text('km');
            $table->text('type');
            $table->text('pois');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('steps');
    }
}
