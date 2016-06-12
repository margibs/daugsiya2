<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersIgnoreWelcomePack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'ignore_welcome_package')){

            Schema::table('users', function (Blueprint $table) {
                    $table->boolean('ignore_welcome_package')->default(0)->after('is_admin');
                });
            }

        if (!Schema::hasColumn('users', 'welcome_package_address')){

            Schema::table('users', function (Blueprint $table) {
                    $table->string('welcome_package_address')->after('is_admin');
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
