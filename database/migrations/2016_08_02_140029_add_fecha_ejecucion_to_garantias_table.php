<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaEjecucionToGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garantias', function (Blueprint $table) 
        {
            $table->date('fecha_ejecucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garantias', function (Blueprint $table)
        {
            $table->dropColumn('fecha_ejecucion');
        });
    }
}
