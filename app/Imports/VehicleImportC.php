<?php

namespace App\Imports;

use App\Models\Vehicle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehicleImportC implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            Vehicle::create([
                'nomor_polisi_bpkb' => $row['nomor_polisi_bpkb'],
                'status' => $row['status'],
                'nomor_polisi_lama' => $row['nomor_polisi_lama'],
                'nama_bpkb' => $row['nama_bpkb'],
                'merk' => $row['merk'],
                'tipe' => $row['tipe'],
                'jenis' => $row['jenis'],
                'model' => $row['model'],
                'tahun' => $row['tahun'],
                'warna' => $row['warna'],
                'tanggal_jatuh_tempo' => $row['tanggal_jatuh_tempo'],
                'bulan_jatuh_tempo' => $row['bulan_jatuh_tempo'],
                'bagian_lokasi' => $row['bagian_lokasi'],
                'riwayat' => $row['riwayat'],
                //peminjaman
                'nama_peminjaman' => $row['nama_peminjaman'],
                'tanggal_peminjaman' => $row['tanggal_peminjaman'],
                'tanggal_kembali_peminjaman' => $row['tanggal_kembali_peminjaman'],
                'keterangan_peminjaman' => $row['keterangan_peminjaman'],
                //penitipan
                'nama_penitipan' => $row['nama_penitipan'],
                'tanggal_penitipan' => $row['tanggal_penitipan'],
                'tanggal_kembali_penitipan' => $row['tanggal_kembali_penitipan'],
                'keterangan_penitipan' => $row['keterangan_penitipan'],
                'keterangan' => $row['keterangan'],
                //dijual
                'tanggal_dijual' => $row['tanggal_dijual'],
            ]);
        }
    }
}
