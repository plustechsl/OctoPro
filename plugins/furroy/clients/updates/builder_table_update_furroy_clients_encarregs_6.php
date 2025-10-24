<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs6 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->dateTime('data')->nullable(false)->change();
            $table->text('nom_client')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->dateTime('data')->nullable()->change();
            $table->text('nom_client')->nullable(false)->change();
        });
    }
}
