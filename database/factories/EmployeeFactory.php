<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $gender = fake()->randomElement(['male', 'female']);
        // $status = fake()->randomElement(['Menikah', 'Janda/Duda', 'Belum Menikah']);
        // $pendidikan = fake()->randomElement(['Tidak Bersekolah', 'SD', 'SMP', 'SMA', 'D1/D2/D3', 'D4/S1', 'S2', 'S3']);
        // $darah = fake()->randomElement(['O', 'A', 'B', 'AB']);
        // $bagian = fake()->randomElement(['Personalia', 'Pemasaran', 'Umum', 'Administrasi']);
        // $jabatan = fake()->randomElement(['Kepala Bagian/Lokasi', 'Wakil Kepala Bagian/Lokasi', 'Manajer', 'Direktur', 'Staff']);
        // $lokasi = fake()->randomElement(['Office', 'Aulia PS', 'JIF Blitar']);
        // $pegawai = fake()->randomElement(['Kontrak', 'Tetap', 'Harian']);
        // $gaji = fake()->randomElement(['Bulanan', 'Harian']);
        // $kantor = fake()->randomElement(['Indofood', 'Gojek', 'BRI']);
        // $jabatanx = fake()->randomElement(['Staff', 'Kepala', 'Direktur']);
        
        return [
            // informasi pribadi
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['male', 'female']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'alamat' => fake()->streetAddress(),
            'status' => fake()->randomElement(['Menikah', 'Janda/Duda', 'Belum Menikah']),
            'jumlah_anak' => rand(0, 5),
            'nama_ibu' => fake()->name('female'),
            'pendidikan' => fake()->randomElement(['Tidak Bersekolah', 'SD', 'SMP', 'SMA', 'D1/D2/D3', 'D4/S1', 'S2', 'S3']),
            'golongan_darah' => fake()->randomElement(['O', 'A', 'B', 'AB']),
            'ktp' => rand(3514512601010008, 3814502663218887),
            // informasi pekerjaan
            'nomor_induk' => rand(3514512601010008, 3814502663218887),
            'tanggal_masuk' => fake()->date(),
            'bagian' => fake()->randomElement(['Personalia', 'Pemasaran', 'Umum', 'Administrasi']),
            'jabatan' => fake()->randomElement(['Kepala Bagian/Lokasi', 'Wakil Kepala Bagian/Lokasi', 'Manajer', 'Direktur', 'Staff']),
            'lokasi' => fake()->randomElement(['Office', 'Aulia PS', 'JIF Blitar']),
            'klasifikasi_pegawai' => fake()->randomElement(['Kontrak', 'Tetap', 'Harian']),
            'klasifikasi_gaji' => fake()->randomElement(['Bulanan', 'Harian']),
            'nomor_bpjsket' => rand(3514512601010008, 3814502663218887),
            'tanggal_masuk_bpjsket' => fake()->date(),
            'tanggal_keluar_bpjsket' => fake()->date(),
            'nomor_bpjskes' => rand(3514512601010008, 3814502663218887),
            'tanggal_masuk_bpjskes' => fake()->date(),
            'tanggal_keluar_bpjskes' => fake()->date(),
            // riwayat
            'keluar_jig' => rand(0, 1),
            'tanggal_keluar_jig' => fake()->date(),
            'riwayat_kantor1' => fake()->randomElement(['Indofood', 'Gojek', 'BRI']),
            'riwayat_jabatan1' => fake()->randomElement(['Staff', 'Kepala', 'Direktur']),
            'riwayat_kantor2' => fake()->randomElement(['Indofood', 'Gojek', 'BRI']),
            'riwayat_jabatan2' => fake()->randomElement(['Staff', 'Kepala', 'Direktur']),
            'riwayat_kantor3' => fake()->randomElement(['Indofood', 'Gojek', 'BRI']),
            'riwayat_jabatan3' => fake()->randomElement(['Staff', 'Kepala', 'Direktur']),
        ];
    }
}
