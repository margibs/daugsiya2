<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutopostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoposts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->default(0);
            $table->string('description');
            $table->tinyInteger('fb')->default(0);
            $table->tinyInteger('twitter')->default(0);
            $table->tinyInteger('pinterest')->default(0);
            $table->tinyInteger('instagram')->default(0);
            $table->tinyInteger('google_plus')->default(0);
            $table->boolean('autopost_executed')->default(0);
            $table->string('custom_image');
            $table->string('link');
            $table->string('video_link');
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
        Schema::drop('autoposts');
    }
}
