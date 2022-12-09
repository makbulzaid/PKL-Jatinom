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
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('status');
            $table->string('jumlah_anak');
            $table->string('nama_ibu');
            $table->string('pendidikan');
            $table->string('golongan_darah');
            $table->string('ktp');
            $table->string('nomor_telepon')->nullable();
            // informasi pekerjaan
            $table->string('nomor_induk');
            $table->date('tanggal_masuk');
            $table->string('bagian');
            $table->string('jabatan');
            $table->string('lokasi');
            $table->string('klasifikasi_karyawan');
            $table->string('klasifikasi_gaji');
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
            $table->boolean('keluar')->default('0');
            $table->date('tanggal_keluar')->nullable();
            //foto
            $table->string('foto')->nullable();
            $table->string('berkas')->nullable();
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
