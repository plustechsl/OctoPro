<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs16 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->string('estat_encarreg', 80)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->dropColumn('estat_encarreg');
        });
    }
}
