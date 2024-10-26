<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumni;
use App\Models\Jawaban;
use App\Models\Kuisioner;
use App\Models\ResponKuisioner;
use Carbon\Carbon;

class KuisionerResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data alumni
        $alumniList = Alumni::whereDoesntHave('jawaban')->get();

        // Loop melalui setiap alumni untuk mengisi data kuesioner
        foreach ($alumniList as $alumni) {
            // Tentukan kategori berdasarkan keterangan alumni
            $kategoriId = match($alumni->keterangan) {
                'belum bekerja' => 1,       // ganti sesuai ID kategori
                'sudah bekerja' => 2,
                'study lanjut' => 3,
            };

            // Buat tanggal acak untuk `tanggal_respon`
            $randomTimestamp = Carbon::create(2024, 10, rand(22, 26), rand(0, 23), rand(0, 59), rand(0, 59));

            // Buat entri di tabel `respon_kuisioners`
            $respon = ResponKuisioner::create([
                'alumni_id' => $alumni->id,
                'tanggal_respon' => $randomTimestamp,
                'kategori_id' => $kategoriId,
            ]);

            // Ambil pertanyaan kuisioner berdasarkan kategori
            $questions = Kuisioner::where('kategori_id', $kategoriId)->get();

            // Loop melalui setiap pertanyaan dan isi jawaban
            foreach ($questions as $question) {
                $jawaban = '';

                // Isi jawaban berdasarkan tipe pertanyaan
                if ($question->tipe_pertanyaan == 'text') {
                    $jawaban = 'Jawaban teks untuk pertanyaan ' . $question->id;
                } elseif ($question->tipe_pertanyaan == 'multiple_choice' || $question->tipe_pertanyaan == 'dropdown') {
                    $options = explode(',', $question->pilihan_jawaban);
                    $jawaban = $options[array_rand($options)]; // Pilih salah satu opsi
                } elseif ($question->tipe_pertanyaan == 'checkbox') {
                    $options = explode(',', $question->pilihan_jawaban);
                    $jawaban = $options[array_rand($options)]; // Pilih satu opsi saja
                }

                // Buat entri di tabel `jawabans`
                Jawaban::create([
                    'alumni_id' => $alumni->id,
                    'kuisioner_id' => $question->id,
                    'jawaban' => $jawaban,
                    'created_at' => $randomTimestamp,
                    'updated_at' => $randomTimestamp,
                ]);
            }
        }
    }
}
