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
        Schema::create('offices', function (Blueprint $table) {
            $table->id('id_office');
            $table->string('nama_office');
            $table->string('nik_office')->nullable();
            $table->string('ktp_office')->nullable();
            $table->text('alamat_office');
            $table->string('tempat_lahir_office');
            $table->date('tgl_lahir_office');
            $table->string('usia_office');
            $table->string('riwayat_pendidikan_office');
            $table->string('golongan_darah_office')->nullable();
            $table->string('jenis_kelamin_office');
            $table->string('status_office');
            $table->string('jumlah_anak_office');
            $table->string('ibu_office');
            $table->date('tgl_masuk_office');
            $table->string('masa_kerja_office');
            $table->string('pekerja_office');
            $table->string('bagian_office');
            $table->string('gaji_office');
            $table->string('no_kpj_office')->nullable();
            $table->date('tgl_masuk_bpjsket_office')->nullable();
            $table->date('tgl_keluar_bpjsket_office')->nullable();
            $table->string('no_peserta_office')->nullable();
            $table->date('tgl_masuk_bpjskes_office')->nullable();
            $table->date('tgl_keluar_bpjskes_office')->nullable();
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
        Schema::dropIfExists('offices');
    }
};
