<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCategoriaToGarantiasTable extends Migration
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
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id')->on('cat_garantias')->onDelete('cascade');
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
            $table->dropColumn('id_categoria');
        });
    }
}
