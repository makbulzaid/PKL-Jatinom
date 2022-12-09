<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //informasi kendaraan
            'nomor_bpkb' => fake()->numberBetween(158258, 158900),
            'status' => fake()->numberBetween(1, 4),
            'nomor_polisi_bpkb' => fake()->bothify('?-####-??'),
            'nomor_polisi_lama' => fake()->bothify('?-####-??'),
            'nama_bpkb' => fake()->name(),
            'merk' => fake()->randomElement(['Toyota', 'Daihatsu', 'Mitsubishi', 'Honda', 'Yamaha']),
            'tipe' => fake()->randomElement(['Carry', 'FE', 'Supra']),
            'jenis' => fake()->randomElement(['Mobil Pribadi', 'Mobil Barang', 'Sepeda Motor']),
            'model' => fake()->randomElement(['Mobil Pribadi', 'Pickup', 'Truk', 'Sepeda Motor']),
            'tahun' => fake()->numberBetween(1995, 2022),
            'warna' => fake()->randomElement(['Hitam', 'Biru', 'Merah']),
            'tanggal_jatuh_tempo' => fake()->date(),
            'bulan_jatuh_tempo' => fake()->randomElement(['Januari', 'Februari', 'Maret', 'April', 'Mei']),
            'bagian_lokasi' => fake()->randomElement(['FM Jimble', 'Godang Telur', 'IP Blitar']),
            //peminjaman
            'nama_peminjaman' => fake()->name(),
            'tanggal_peminjaman' => fake()->date(),
            'tanggal_kembali_peminjaman' => fake()->date(),
            'keterangan_peminjaman' => fake()->randomElement(['Sedang Di Bengkel', '']),
            //penitipan
            'nama_penitipan' => fake()->name(),
            'tanggal_penitipan' => fake()->date(),
            'tanggal_kembali_penitipan' => fake()->date(),
            'keterangan_penitipan' => fake()->randomElement(['Digunakan', '']),
            'keterangan' => fake()->randomElement(['Sedang Di Bengkel', '']),
            //dijual
            'tanggal_dijual' => fake()->date(),
        ];
    }
}
