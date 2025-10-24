<?php namespace Furroy\Clients\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFurroyProductesProductes extends Migration
{
    public function up()
    {
        Schema::dropIfExists('furroy_productes_productes');
    }
    
    public function down()
    {
        Schema::create('furroy_productes_productes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->string('nom', 255);
            $table->decimal('preu', 10, 0);
        });
    }
}
