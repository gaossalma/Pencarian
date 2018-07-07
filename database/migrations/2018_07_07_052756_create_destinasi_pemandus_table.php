<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDestinasiPemandusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasi_pemandus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemanduB')->unsigned();
            $table->integer('id_destinasi')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pemanduB')->references('id')->on('pemandu_bs');
            $table->foreign('id_destinasi')->references('id')->on('destinasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('destinasi_pemandus');
    }
}
