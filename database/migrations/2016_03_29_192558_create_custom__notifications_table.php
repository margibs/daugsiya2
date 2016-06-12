<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('global_notification_id')->unsigned();
            $table->foreign('global_notification_id')->references('id')->on('global_notifications');
            $table->string('description');
            $table->string('link');
            $table->dateTime('date_posting');
            $table->boolean('executed')->default(0);
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
        Schema::drop('custom_notifications');
    }
}
