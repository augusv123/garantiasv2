<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFallaCliasignadoEstadoGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garantias', function($table)
        {
            $table->integer('cli_asignado');
            $table->integer('estado');
            $table->integer('falla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garantias', function($table)
        {
            $table->dropColumn('cli_asignado');
            $table->dropColumn('estado');
            $table->dropColumn('falla');
        });
    }
}
