<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutopostCheckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autopost_checkers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('autopost_id');
            $table->tinyInteger('fb');
            $table->tinyInteger('twitter');
            $table->tinyInteger('pinterest');
            $table->tinyInteger('instagram');
            $table->tinyInteger('autopost_executed');
            $table->dateTime('date_posting');
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
        Schema::drop('autopost_checkers');
    }
}
