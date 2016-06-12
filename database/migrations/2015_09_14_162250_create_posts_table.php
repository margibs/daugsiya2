<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->longText('content');
            $table->text('title');
            $table->text('slug');
            $table->text('excerpt');
            $table->text('feat_image_url');
            $table->text('thumb_feature_image');
            $table->text('introduction');
            $table->tinyInteger('shared_fb')->default(0);
            $table->tinyInteger('shared_twitter')->default(0);
            $table->tinyInteger('status');
            $table->string('password',20);
            
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
        Schema::drop('posts');
    }
}
