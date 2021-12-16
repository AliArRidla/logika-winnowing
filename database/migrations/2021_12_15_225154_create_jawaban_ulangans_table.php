<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUlangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_ulangans', function (Blueprint $table) {
            $table->id();
            $table->string('idSoal');
            $table->longText('jawabanSiswa');
            $table->timestamps();

            // $table->foreign('idSoal')->references('idSoal')->on('ulangans')
            // ->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_ulangans');
    }
}
