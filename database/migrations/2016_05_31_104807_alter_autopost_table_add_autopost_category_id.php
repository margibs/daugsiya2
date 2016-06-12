<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAutopostTableAddAutopostCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('autoposts', function (Blueprint $table) {
            $table->integer('autopost_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('autoposts', function (Blueprint $table) {
            $table->dropColumn('autopost_category_id');
        });
    }
}
