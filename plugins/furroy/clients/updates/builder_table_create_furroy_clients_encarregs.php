<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFurroyClientsEncarregs extends Migration
{
    public function up()
    {
        Schema::create('furroy_clients_encarregs', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('client_id');
            $table->string('comentari', 255)->nullable();
            $table->date('data');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('furroy_clients_encarregs');
    }
}
