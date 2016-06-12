<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasinoMaskLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casino_mask_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mask_link');
            $table->string('desktop_redirect_link');
            $table->string('mobile_redirect_link');
            $table->tinyInteger('type');
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
        Schema::drop('casino_mask_links');
    }
}
