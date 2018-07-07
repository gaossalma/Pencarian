<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBahasaPemandusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahasa_pemandus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemanduB')->unsigned();
            $table->integer('id_bahasa')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pemanduB')->references('id')->on('pemandu_bs');
            $table->foreign('id_bahasa')->references('id')->on('bahasas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bahasa_pemandus');
    }
}
