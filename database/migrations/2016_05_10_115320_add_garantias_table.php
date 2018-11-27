<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantias', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('orden');
            $table->integer('etiqueta');
            $table->integer('it_codigo');
            $table->string('adquirido_a');
            $table->string('factura');
            $table->integer('cuit_adquirido');
            $table->date('fecha_compra');
            $table->integer('user_id')->unsigned();
            $table->integer('id_garantia');    
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('garantias');
    }
}
