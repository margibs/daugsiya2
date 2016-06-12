<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_ratings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->string('image_url');
            $table->tinyInteger('music_sounds')->default(0);
            $table->tinyInteger('long_term_play')->default(0);
            $table->tinyInteger('fun_rate')->default(0);
            $table->tinyInteger('graphics')->default(0);
            $table->tinyInteger('enable')->default(0);

            $table->text('slot_url');

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
        Schema::drop('widget_ratings');
    }
}
