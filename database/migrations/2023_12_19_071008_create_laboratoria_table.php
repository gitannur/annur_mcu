<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal');
            $table->string('hemoglobin');
            $table->string('eritrosit');
            $table->string('luekosit');
            $table->string('hematokrit');
            $table->string('trombosit');
            $table->string('warna');
            $table->string('kejernihan');
            $table->string('bj');
            $table->string('ph');
            $table->string('leuko');
            $table->string('nitrit');
            $table->string('protein');
            $table->string('glukosa');
            $table->string('keton');
            $table->string('urobil');
            $table->string('bili');
            $table->string('blood');

            $table->string('glukosa_sewaktu');

            $table->string('m_leuko');
            $table->string('eri');
            $table->string('epitel');
            $table->string('kristal');
            $table->string('bakteri');
            $table->string('jamur');
            $table->string('silinder');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratorium');
    }
};
