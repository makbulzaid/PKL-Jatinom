<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImportC implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            Employee::create([
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'alamat' => $row['alamat'],
            'status' => $row['status'],
            'anak_laki' => $row['anak_laki'],
            'anak_perempuan' => $row['anak_perempuan'],
            'nama_ibu' => $row['nama_ibu'],
            'pendidikan' => $row['pendidikan'],
            'golongan_darah' => $row['golongan_darah'],
            'ktp' => $row['ktp'],
            'nomor_telepon' => $row['nomor_telepon'],
            // informasi pekerjaan
            'nomor_induk' => $row['nomor_induk'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'bagian' => $row['bagian'],
            'jabatan' => $row['jabatan'],
            'lokasi' => $row['lokasi'],
            'klasifikasi_karyawan' => $row['klasifikasi_karyawan'],
            'klasifikasi_gaji' => $row['klasifikasi_gaji'],
            'nomor_bpjsket' => $row['nomor_bpjsket'],
            'tanggal_masuk_bpjsket' => $row['tanggal_masuk_bpjsket'],
            'tanggal_keluar_bpjsket' => $row['tanggal_keluar_bpjsket'],
            'nomor_bpjskes' => $row['nomor_bpjskes'],
            'tanggal_masuk_bpjskes' => $row['tanggal_masuk_bpjskes'],
            'tanggal_keluar_bpjskes' => $row['tanggal_keluar_bpjskes'],
            // riwayat
            'riwayat_pekerjaan' => $row['riwayat_pekerjaan'],
            'riwayat_pendidikan' => $row['riwayat_pendidikan'],
            'riwayat_pelanggaran' => $row['riwayat_pelanggaran'],
            'keterangan' => $row['keterangan'],
            //keluar
            'keluar' => $row['keluar'],
            'alasan_keluar' => $row['alasan_keluar'],
            'tanggal_keluar' => $row['tanggal_keluar'],
            ])->companies()->sync($row['company_id']);
        }
        
    }
}
