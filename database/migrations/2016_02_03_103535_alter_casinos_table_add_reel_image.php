<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinosTableAddReelImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->string('reels_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->dropColumn('reels_image');
        });
    }
}
