<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs4 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->dropColumn('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->timestamp('updated_at')->nullable();
        });
    }
}
