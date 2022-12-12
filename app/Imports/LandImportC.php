<?php

namespace App\Imports;

use App\Models\Land;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LandImportC implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            Land::create([
            //informasi tanah
            'nomor_sertifikat' => $row['nomor_sertifikat'],
            'status' => $row['status'],
            'posisi_sertifikat' => $row['posisi_sertifikat'],
            'pemilik' => $row['pemilik'],
            'slug_pemilik' => $row['slug_pemilik'],
            'nomor_sppt' => $row['nomor_sppt'],
            'njop' => $row['njop'],
            'luas' => $row['luas'],
            'lokasi' => $row['lokasi'],
            'alamat' => $row['alamat'],
            'harga_pembelian' => $row['harga_pembelian'],
            'tanggal_pembelian' => $row['tanggal_pembelian'],
            'keterangan' => $row['keterangan'],
            //penjaminan
            'penjaminan' => $row['penjaminan'],
            'tanggal_penjaminan' => $row['tanggal_penjaminan'],
            'tanggal_kembali_penjaminan' => $row['tanggal_kembali_penjaminan'],
            'keterangan_penjaminan' => $row['keterangan_penjaminan'],
            'keterangan' => $row['keterangan'],
            //dijual
            'tanggal_dijual' => $row['tanggal_dijual'],
            ]);
        }
    }
}
