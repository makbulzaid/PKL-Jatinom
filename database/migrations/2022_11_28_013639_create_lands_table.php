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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            //informasi tanah
            $table->string('nomor_sertifikat');
            $table->integer('status');
            $table->string('posisi_sertifikat');
            $table->string('pemilik');
            $table->string('slug_pemilik');
            $table->string('nomor_sppt')->nullable();
            $table->string('njop')->nullable();
            $table->string('luas');
            $table->string('lokasi');
            $table->text('alamat');
            $table->string('harga_pembelian');
            $table->date('tanggal_pembelian');
            //penjaminan
            $table->string('penjaminan')->nullable();
            $table->date('tanggal_penjaminan')->nullable();
            $table->date('tanggal_kembali_penjaminan')->nullable();
            $table->string('keterangan_penjaminan')->nullable();
            $table->text('keterangan')->nullable();
            //dijual
            $table->date('tanggal_dijual')->nullable();
            //file
            $table->text('foto')->nullable();
            $table->text('berkas')->nullable();
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
        Schema::dropIfExists('lands');
    }
};
