<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('links_id')->unsigned();
            $table->foreign('links_id')->references('id')->on('links');
            $table->char('country_code', 4);
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
        Schema::drop('link_countries');
    }
}
