<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterWidgetRatingsTableAddFinalVerdict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('widget_ratings', function (Blueprint $table) {
            $table->text('final_verdict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('widget_ratings', function (Blueprint $table) {
            $table->dropColumn('final_verdict');
        });
    }
}
