<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_winners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prize_code_id');
            $table->integer('prize_id');
            $table->integer('user_id');
            $table->integer('redeem')->default(0);
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
        Schema::drop('prize_winners');
    }
}
