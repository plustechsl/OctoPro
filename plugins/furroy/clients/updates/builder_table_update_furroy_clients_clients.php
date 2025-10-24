<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsClients extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_clients', function($table)
        {
            $table->smallInteger('num_client');
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_clients', function($table)
        {
            $table->dropColumn('num_client');
        });
    }
}
