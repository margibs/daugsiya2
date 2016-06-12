<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasinoBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casino_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url');
            $table->string('image_link');
            $table->text('banner_description');
            $table->tinyInteger('show_banner');
            $table->tinyInteger('banner_type');
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
        Schema::drop('casino_banners');
    }
}
