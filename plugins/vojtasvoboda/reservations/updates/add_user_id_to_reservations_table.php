<?php namespace VojtaSvoboda\Reservations\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddUserIdToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('vojtasvoboda_reservations_reservations', function($table)
        {
            $table->integer('user_id')->unsigned()->nullable()->after('phone');
        });
    }

    public function down()
    {
        Schema::table('vojtasvoboda_reservations_reservations', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}