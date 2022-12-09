<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Land>
 */
class LandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //informasi tanah
            'nomor_sertifikat' => fake()->numberBetween(123456, 456789),
            'status' => fake()->numberBetween(1, 6),
            'posisi_sertifikat' => fake()->randomElement(['Pemilik', 'Jaminan']),
            'pemilik' => fake()->randomElement(['HM. Siswojo']),
            'slug_pemilik' => fake()->randomElement(['HMS']),
            'nomor_sppt' => rand(987, 1900),
            'njop' => fake()->numberBetween(500000, 5000000),
            'luas' => fake()->numberBetween(50, 5000),
            'lokasi' => fake()->city(),
            'alamat' => fake()->address(),
            'harga_pembelian' => fake()->numberBetween(50000000, 2000000000),
            'tanggal_pembelian' => fake()->date(),
            //penjaminan
            'penjaminan' => fake()->randomElement(['BRI', 'BCA', 'Mandiri']),
            'tanggal_penjaminan' => fake()->date(),
            'tanggal_kembali_penjaminan' => fake()->date(),
            'keterangan_penjaminan' => fake()->randomElement(['Jaminan', 'Kembali']),
            'keterangan' => fake()->randomElement(['Wakaf', '']),
            //dijual
            'tanggal_dijual' => fake()->date(),
        ];
    }
}
