<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracker_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('type');
            $table->string('image_url');
            $table->string('site_url');
            $table->integer('casino_id');
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
        Schema::drop('tracker_clicks');
    }
}
