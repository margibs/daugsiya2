<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();

            $table->tinyInteger('activated')->default(1);
            $table->tinyInteger('banned')->default(0);
            $table->string('banned_reason');

            $table->string('avatar');
            $table->text('description');

            $table->string('facebook');
            $table->string('twitter');
            $table->integer('coins');
            
            $table->tinyInteger('is_admin')->default(0);

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
        Schema::drop('users');
    }
}
