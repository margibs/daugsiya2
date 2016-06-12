<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddEmailConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasColumn('users', 'email_confirm')){
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('email_confirm')->default(0)->after('is_admin');
        }); 

        } 
        if (!Schema::hasColumn('users', 'welcome_package_sent')){
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('welcome_package_sent')->default(0)->after('is_admin');
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
