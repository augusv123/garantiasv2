<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSustitutoToGarantiasTable extends Migration
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
          $table->integer('sustituye_orden');
          $table->integer('sustituye_etiq');
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
          $table->dropColumn('sustituye_orden');
          $table->dropColumn('sustituye_etiq');
      });
    }
}
