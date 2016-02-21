<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cordova_version');
            $table->string('device_model');
            $table->string('device_platform');
            $table->string('device_uuid');
            $table->string('device_version');
            $table->string('device_manufacturer');
            $table->string('device_isVirtual');
            $table->string('device_serial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mobile_users');
    }
}
