<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTabellaImmagini extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Immagini', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Immagine');
            $table->string('Testo');
            $table->date('DataFoto');
            $table->integer('id_marker')->unsigned();
            $table->foreign('id_marker')->references('id')->on('Marker')->onDelete('cascade');
            $table->integer('id_utente')->unsigned();
            $table->foreign('id_utente')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Immagini');
    }
}
