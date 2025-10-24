<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs10 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->smallInteger('num_client')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->integer('num_client')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
