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
            $table->string('nama_employee');
            $table->string('nik_employee');
            // $table->foreignId('id_company')->nullable();
            $table->string('nama_lokasi')->nullable();
            $table->string('ktp_employee');
            $table->text('alamat_employee');
            $table->string('tempat_lahir_employee');
            $table->date('tgl_lahir_employee');
            // $table->string('usia_employee');
            $table->string('pendidikan_employee');
            $table->string('golongan_darah_employee');
            $table->string('jenis_kelamin_employee');
            $table->string('status_employee');
            $table->string('jumlah_anak_employee');
            $table->string('ibu_employee');
            $table->date('tgl_masuk_employee');
            // $table->string('masa_kerja_employee');
            $table->string('klasifikasi_employee');
            $table->string('bagian_employee');
            $table->string('gaji_employee');
            $table->string('no_kpj_employee')->nullable();
            $table->date('tgl_masuk_bpjsket_employee')->nullable();
            $table->date('tgl_keluar_bpjsket_employee')->nullable();
            $table->string('no_peserta_employee')->nullable();
            $table->date('tgl_masuk_bpjskes_employee')->nullable();
            $table->date('tgl_keluar_bpjskes_employee')->nullable();
            $table->boolean('keluar_employee')->default('0');
            $table->date('tgl_keluar_employee')->nullable();
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
