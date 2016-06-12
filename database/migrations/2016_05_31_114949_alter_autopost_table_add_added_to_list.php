<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAutopostTableAddAddedToList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('autoposts', function (Blueprint $table) {
            $table->tinyInteger('added_to_list');
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
            $table->dropColumn('added_to_list');
        });
    }
}
