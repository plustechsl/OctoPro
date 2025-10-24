<?php namespace Furroy\Productes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFurroyProductesProductes extends Migration
{
    public function up()
    {
        Schema::create('furroy_productes_productes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('nom', 255);
            $table->decimal('preu', 10, 0);
            $table->integer('client_id')->unsigned();
            
             $table->foreign('client_id')
                  ->references('id')
                  ->on('furroy_clients_clients')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('furroy_productes_productes');
    }
}
