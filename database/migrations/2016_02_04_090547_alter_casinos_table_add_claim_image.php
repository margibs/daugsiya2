<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCasinosTableAddClaimImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casinos', function (Blueprint $table) {
            $table->string('claim_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casino', function (Blueprint $table) {
            $table->dropColumn('claim_image');
        });
    }
}
