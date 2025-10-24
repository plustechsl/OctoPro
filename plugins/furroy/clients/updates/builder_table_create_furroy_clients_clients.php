<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFurroyClientsClients extends Migration
{
    public function up()
    {
        Schema::create('furroy_clients_clients', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('nom', 255);
            $table->string('email', 255);
            $table->string('telefon', 15);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('furroy_clients_clients');
    }
}
