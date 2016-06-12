<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinoBannersTableAddCasinoMaskId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casino_banners', function (Blueprint $table) {
            $table->integer('casino_mask_id');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casino_banners', function (Blueprint $table) {
            $table->dropColumn('casino_mask_id');
        });
    }
}
