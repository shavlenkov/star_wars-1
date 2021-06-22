<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('height')->unsigned()->nullable();
            $table->bigInteger('mass')->unsigned()->nullable();
            $table->string('hair_color');
            $table->string('birth_year');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('gender');
            $table->bigInteger('homeworld_id')->unsigned();
            $table->foreign('homeworld_id')->references('id')->on('homeworld');
            $table->bigInteger('films_id')->unsigned();
            $table->foreign('films_id')->references('id')->on('films');
            $table->string('url');
            $table->text('images');
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
        Schema::dropIfExists('people');
    }
}
