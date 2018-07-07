<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemandu')->unsigned();
            $table->integer('id_destinasi')->unsigned();
            $table->integer('id_pemanduB')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pemandu')->references('id')->on('pemandus');
            $table->foreign('id_destinasi')->references('id')->on('destinasis');
            $table->foreign('id_pemanduB')->references('id')->on('pemandu_bs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('histories');
    }
}
