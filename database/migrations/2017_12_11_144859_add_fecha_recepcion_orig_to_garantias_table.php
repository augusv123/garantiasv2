<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaRecepcionOrigToGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garantias', function (Blueprint $table) {
            $table->date('fecha_recepcion_orig');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garantias', function (Blueprint $table) {
            $table->dropColumn('fecha_recepcion_orig');
        });
    }
}
