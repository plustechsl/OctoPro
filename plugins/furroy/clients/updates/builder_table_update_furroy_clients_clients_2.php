<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsClients2 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_clients', function($table)
        {
            $table->smallInteger('num_client')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_clients', function($table)
        {
            $table->smallInteger('num_client')->nullable(false)->change();
        });
    }
}
