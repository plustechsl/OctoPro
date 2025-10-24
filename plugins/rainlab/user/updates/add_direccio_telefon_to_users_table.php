<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddDireccioTelefonToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('direccio', 255)->nullable()->after('email');
            $table->string('telefon', 100)->nullable()->after('direccio');
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn(['direccio', 'telefon']);
        });
    }
}
