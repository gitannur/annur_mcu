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
        Schema::create('medical_check_up', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_pemeriksaan');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('anggota_gerak');
            $table->string('tekanan_darah');
            $table->string('nadi');
            $table->string('imt');
            $table->string('telinga');
            $table->string('hidung');
            $table->string('tenggorokan');
            $table->string('mata');
            $table->string('cardiovaskuler');
            $table->string('pernafasan');
            $table->string('abdomen');
            $table->string('urine');
            $table->string('hematologi');
            $table->string('audiometri');
            $table->string('spirometri');
            $table->text('riwayat_penyakit');
            $table->text('diagnosa');
            $table->text('saran');
            $table->text('hasil_akhir');
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
        Schema::dropIfExists('medical_check_ups');
    }
};
