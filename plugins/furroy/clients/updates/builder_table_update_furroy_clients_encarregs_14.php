<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyClientsEncarregs14 extends Migration
{
    public function up()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->text('descripcio')->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->text('titol')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_clients_encarregs', function($table)
        {
            $table->string('descripcio', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
            $table->string('titol', 255)->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
