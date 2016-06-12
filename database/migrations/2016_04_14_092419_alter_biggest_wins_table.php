<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBiggestWinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        if (!Schema::hasColumn('biggest_wins', 'total_wins'))
        {
            Schema::table('biggest_wins', function ($table) {
                $table->decimal('total_wins', 8 ,2)->after('custom_image');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
