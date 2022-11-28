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
            $table->string('nomor_telepon');
            // informasi pekerjaan
            $table->string('nomor_induk');
            $table->date('tanggal_masuk');
            $table->string('bagian');
            $table->string('jabatan');
            $table->string('lokasi');
            $table->string('klasifikasi_pegawai');
            $table->string('klasifikasi_gaji');
            $table->string('nomor_bpjsket')->nullable();
            $table->date('tanggal_masuk_bpjsket')->nullable();
            $table->date('tanggal_keluar_bpjsket')->nullable();
            $table->string('nomor_bpjskes')->nullable();
            $table->date('tanggal_masuk_bpjskes')->nullable();
            $table->date('tanggal_keluar_bpjskes')->nullable();
            // riwayat
            $table->boolean('keluar_jig')->default('0');
            $table->date('tanggal_keluar_jig')->nullable();
            $table->string('riwayat_pekerjaan')->nullable();
            $table->string('riwayat_pendidikan')->nullable();
            $table->string('riwayat_pelanggaran')->nullable();
            //foto
            $table->string('foto')->nullable();
            $table->timestamps();
            // $table->foreignId('id_company')->nullable();
            // $table->string('usia_employee');
            // $table->string('masa_kerja_employee');
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
