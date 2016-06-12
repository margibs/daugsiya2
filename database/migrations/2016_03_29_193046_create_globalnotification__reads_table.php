<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalnotificationReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalnotification_reads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('global_notification_id')->unsigned();
            $table->foreign('global_notification_id')->references('id')->on('global_notifications');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('globalnotification_reads');
    }
}
