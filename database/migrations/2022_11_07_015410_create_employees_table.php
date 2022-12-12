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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // informasi pribadi
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('status')->nullable();
            $table->string('anak_laki')->nullable();
            $table->string('anak_perempuan')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('ktp')->nullable();
            $table->string('nomor_telepon')->nullable();
            // informasi pekerjaan
            $table->string('nomor_induk')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('bagian')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('klasifikasi_karyawan')->nullable();
            $table->string('klasifikasi_gaji')->nullable();
            $table->string('nomor_bpjsket')->nullable();
            $table->date('tanggal_masuk_bpjsket')->nullable();
            $table->date('tanggal_keluar_bpjsket')->nullable();
            $table->string('nomor_bpjskes')->nullable();
            $table->date('tanggal_masuk_bpjskes')->nullable();
            $table->date('tanggal_keluar_bpjskes')->nullable();
            // riwayat
            $table->text('riwayat_pekerjaan')->nullable();
            $table->text('riwayat_pendidikan')->nullable();
            $table->text('riwayat_pelanggaran')->nullable();
            $table->text('keterangan')->nullable();
            //keluar
            $table->boolean('keluar')->nullable()->default('0');
            $table->string('alasan_keluar')->nullable();
            $table->date('tanggal_keluar')->nullable();
            //foto
            $table->string('foto')->nullable();
            $table->string('berkas')->nullable();
            $table->string('nama_berkas')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
