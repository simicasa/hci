<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreazioneTabellaMarker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Marker', function (Blueprint $table) {
            $table->increments('id');
            $table->float('latitudine');
            $table->float('longitudine');
            $table->string('nome_luogo');
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
        Schema::drop('Marker');
    }
}
