<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinosTableAddCountryNameAndCountryCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->string('country_name');
            $table->string('country_code');
            
            $table->index('country_code');
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
            $table->dropColumn(['country_code', 'country_name']);
        });
    }
}
