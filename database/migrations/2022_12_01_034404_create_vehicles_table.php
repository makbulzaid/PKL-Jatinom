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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            //informasi kendaraan
            $table->string('nomor_bpkb');
            $table->integer('status');
            $table->string('nomor_polisi_bpkb');
            $table->string('nomor_polisi_lama')->nullable();
            $table->string('nama_bpkb');
            $table->string('merk');
            $table->string('tipe');
            $table->string('jenis');
            $table->string('model');
            $table->string('tahun');
            $table->string('warna');
            $table->date('tanggal_jatuh_tempo');
            $table->string('bulan_jatuh_tempo');
            $table->string('bagian_lokasi');
            //peminjaman
            $table->string('nama_peminjaman')->nullable();
            $table->date('tanggal_peminjaman')->nullable();
            $table->date('tanggal_kembali_peminjaman')->nullable();
            $table->text('keterangan_peminjaman')->nullable();
            //penitipan
            $table->string('nama_penitipan')->nullable();
            $table->date('tanggal_penitipan')->nullable();
            $table->date('tanggal_kembali_penitipan')->nullable();
            $table->text('keterangan_penitipan')->nullable();
            $table->text('keterangan')->nullable();
            //dijual
            $table->string('tanggal_dijual')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
