<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Wisuda;
use App\Models\Fakultas;
use App\Models\Kuisioner;
use Illuminate\Database\Seeder;
use App\Models\KategoriKuisioner;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'id' => 2,
            'name' => 'Alumni',
            'email' => 'alumni@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'alumni',
        ]);

        User::create([
            'id' => 3,
            'name' => 'Dekan',
            'email' => 'dekan@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'dekan',
        ]);

        User::create([
            'id' => 4,
            'name' => 'Kaprodi',
            'email' => 'kaprodi@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'kaprodi',
        ]);

        User::create([
            'id' => 5,
            'name' => 'Kaprodi Ilmu Komputer',
            'email' => 'kaprodiilkom@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'kaprodi',
        ]);

        Fakultas::create([
            'nama' => 'Fakultas Teknologi Informasi',
            'slug' => 'fakultas-teknologi-informasi',
            'user_id' => 3,
        ]);

        Prodi::create([
            'nama' => 'Sistem Informasi',
            'slug' => 'sistem-informasi',
            'fakultas_id' => 1,
            'user_id' => 4,
        ]);

        Prodi::create([
            'nama' => 'Ilmu Komputer',
            'slug' => 'ilmu-komputer',
            'fakultas_id' => 1,
            'user_id' => 5,
        ]);

        Wisuda::create([
            'angkatan' => 'XII',
            'tanggal' => '2022-11-19',
        ]);

        Wisuda::create([
            'angkatan' => 'XIII',
            'tanggal' => '2023-11-19',
        ]);

        Alumni::create([
            'nama' => 'Alumni',
            'nim' => '202210101',
            'tanggal_lahir' => '1995-05-15',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'alamat' => 'Jl. Merdeka No. 1',
            'no_hp' => '081234567890',
            'email' => 'alumni@gmail.com',
            'foto' => 'no_image.jpg',
            'judul_skripsi' => 'Sistem Penyiraman Tanaman Otomatis Berbasis IoT',
            'ipk' => 3.75,
            'tahun_masuk' => 2022,
            'keterangan' => 'Sudah Bekerja',
            'user_id' => 2,
            'wisuda_id' => 1,
            'prodi_id' => 2,
        ]);

        // buat data kategori_kuisioner : belum-bekerja, sudah-bekerja, dan study-lanjut
        KategoriKuisioner::create([
            'nama_kategori' => 'belum-bekerja',
        ]);

        KategoriKuisioner::create([
            'nama_kategori' => 'sudah-bekerja',
        ]);

        KategoriKuisioner::create([
            'nama_kategori' => 'study-lanjut',
        ]);

    }
}
