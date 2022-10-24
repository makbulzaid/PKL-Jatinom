<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_office';
    protected $fillable = ['id_office', 'nama_office', 'nik_office', 'ktp_office', 'alamat_office', 'tempat_lahir_office', 'tgl_lahir_office', 
                            'usia_office', 'riwayat_pendidikan_office', 'golongan_darah_office', 'jenis_kelamin_office', 'status_office',
                            'jumlah_anak_office', 'ibu_office', 'tgl_masuk_office', 'masa_kerja_office', 'pekerja_office', 'bagian_office',
                            'gaji_office', 'no_kpj_office', 'tgl_masuk_bpjsket_office', 'tgl_keluar_bpjsket_office', 'no_peserta_office',
                            'tgl_masuk_bpjskes_office', 'tgl_keluar_bpjskes_office'];
}
