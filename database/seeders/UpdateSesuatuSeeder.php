<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Alumni;
use App\Models\Jawaban;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdateSesuatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $startDate = Carbon::create(2024, 10, 20);
        // $endDate = Carbon::create(2024, 10, 26);

        // Alumni::all()->each(function ($alumni) use ($startDate, $endDate) {
        //     $randomTimestamp = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));
        //     $alumni->created_at = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));
        //     $alumni->updated_at = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));
        //     $alumni->save();
        // });

        //update jawaban dengan kuisioner_id 20

        // $randomJawabanList = [
        //     'Lebih banyak pelatihan praktis',
        //     'Kerjasama dengan perusahaan untuk magang',
        //     'Peningkatan fasilitas laboratorium',
        //     'Peningkatan kualitas dosen',
        //     'Peningkatan kurikulum sesuai kebutuhan industri',
        //     'Peningkatan soft skills',
        //     'Peningkatan kemampuan bahasa asing',
        //     'Peningkatan program kewirausahaan',
        //     'Peningkatan jaringan alumni',
        //     'Peningkatan kegiatan ekstrakurikuler',
        //     'Peningkatan akses informasi lowongan kerja',
        // ];

        // $jawabanList = Jawaban::where('kuisioner_id', 32)
        //         ->get()
        //         ->groupBy('alumni_id');

        // $jawabanList->each(function ($jawabanGroup) use ($randomJawabanList) {
        //     $randomJawaban = $randomJawabanList[array_rand($randomJawabanList)];
        //     $jawabanGroup->each(function ($jawaban) use ($randomJawaban) {
        //     $jawaban->jawaban = $randomJawaban;
        //     $jawaban->save();
        //     });
        // });

        // $jawabanList = Jawaban::whereIn('kuisioner_id', [1, 20])
        //         ->get()
        //         ->groupBy('alumni_id');

        // $jawabanList->each(function ($jawabanGroup) use ($randomJawabanList) {
        //     $randomJawaban = $randomJawabanList[array_rand($randomJawabanList)];
        //     $jawabanGroup->each(function ($jawaban) use ($randomJawaban) {
        //     $jawaban->jawaban = $randomJawaban;
        //     $jawaban->save();
        //     });
        // });

    }
}
