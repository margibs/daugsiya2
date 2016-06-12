<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinoPreferencesTableAddYtImageAndLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casino_preferences', function (Blueprint $table) {
            $table->string('yt_image_url');
            $table->string('yt_image_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casino_preferences', function (Blueprint $table) {
            $table->dropColumn('yt_image_url');
            $table->dropColumn('yt_image_link');
        });
    }
}
