<?php namespace Furroy\Productes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFurroyProductesProductes extends Migration
{
    public function up()
    {
        Schema::table('furroy_productes_productes', function($table)
        {
            $table->decimal('preu', 10, 2)->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('furroy_productes_productes', function($table)
        {
            $table->integer('preu')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
