<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCheckInCheckOutToRoomCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_calendars', function (Blueprint $table) {
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_calendars', function (Blueprint $table) {
            $table->dropColumn('check_in', 'check_out');
        });
    }
}
