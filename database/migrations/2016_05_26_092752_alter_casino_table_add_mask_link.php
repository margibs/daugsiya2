<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinoTableAddMaskLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->string('mask_link');

            $table->index('mask_link');
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
            $table->dropColumn('mask_link');
        });
    }
}
