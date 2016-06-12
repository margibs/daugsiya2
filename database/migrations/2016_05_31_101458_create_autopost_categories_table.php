<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutopostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autopost_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('max_per_day');
            $table->integer('counter_per_day');
            $table->float('percentage');
            $table->tinyInteger('status');
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
        Schema::drop('autopost_categories');
    }
}
