<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs17 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->string('fet', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->boolean('fet')->nullable(false)->unsigned(false)->default(0)->comment(null)->change();
        });
    }
}
