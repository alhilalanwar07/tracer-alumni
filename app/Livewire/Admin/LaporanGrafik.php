<?php

namespace App\Livewire\Admin;

use App\Models\Alumni;
use Livewire\Component;
use App\Models\Kuisioner;

class LaporanGrafik extends Component
{
    public $chartData = [];
    public $chartDataAngkatan = [];
    public $chartDataTahunMasuk = [];
    public $chart1and2 = [];

    // belum bekerja
    public $kuisionerData = [];

    // sudah bekerja
    public $sudahBekerja = [];

    // study lanjut
    public $studyLanjut = [];


    public function mount()
    {
        // Menyiapkan data untuk grafik pertama
        $this->chartData = [
            ['Keterangan', 'Jumlah'],
            ['Belum Bekerja', Alumni::where('keterangan', 'belum bekerja')->count()],
            ['Sudah Bekerja', Alumni::where('keterangan', 'sudah bekerja')->count()],
            ['Study Lanjut', Alumni::where('keterangan', 'study lanjut')->count()],
        ];

        // Menyiapkan data untuk grafik kedua berdasarkan angkatan wisuda
        $angkatanWisuda = Alumni::select('wisuda_id', \DB::raw('count(*) as total'))
            ->groupBy('wisuda_id')
            ->get();

        $this->chartDataAngkatan[] = ['Angkatan Wisuda', 'Jumlah'];
        foreach ($angkatanWisuda as $angkatan) {
            $this->chartDataAngkatan[] = [$angkatan->wisuda->angkatan, $angkatan->total];
        }

        // Menyiapkan data untuk grafik ketiga berdasarkan tahun masuk
        $tahunMasuk = Alumni::select('tahun_masuk', \DB::raw('count(*) as total'))
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        $this->chartDataTahunMasuk[] = ['Tahun Masuk', 'Jumlah'];
        foreach ($tahunMasuk as $tahun) {
            $this->chartDataTahunMasuk[] = [$tahun->tahun_masuk, $tahun->total];
        }

        // Menyiapkan data untuk grafik keempat
        $keteranganByTahunMasuk = Alumni::select('tahun_masuk', 'keterangan', \DB::raw('count(*) as total'))
            ->groupBy('tahun_masuk', 'keterangan')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        $this->chart1and2[] = ['Tahun Masuk', 'Belum Bekerja', 'Sudah Bekerja', 'Study Lanjut'];
        $tahunMasukData = [];

        foreach ($keteranganByTahunMasuk as $data) {
            if (!isset($tahunMasukData[$data->tahun_masuk])) {
            $tahunMasukData[$data->tahun_masuk] = [
                'Belum Bekerja' => 0,
                'Sudah Bekerja' => 0,
                'Study Lanjut' => 0,
            ];
            }
            $tahunMasukData[$data->tahun_masuk][$data->keterangan] = $data->total;
        }

        foreach ($tahunMasukData as $tahun => $data) {
            $this->chart1and2[] = [
            (string)$tahun,
            $data['Belum Bekerja'],
            $data['Sudah Bekerja'],
            $data['Study Lanjut'],
            ];
        }


        // Menyiapkan data untuk tabel kuisioner belum bekerja
        $kuisionerData = Kuisioner::select('id', 'pertanyaan', 'tipe_pertanyaan', 'kategori_id', 'pilihan_jawaban')
            ->where('kategori_id', 1)
            ->get();

        $jawabanCounts = \DB::table('jawabans')
            ->select('kuisioner_id', 'jawaban', \DB::raw('count(*) as total'))
            ->groupBy('kuisioner_id', 'jawaban')
            ->get();

        foreach ($kuisionerData as $kuisioner) {
            $pilihanJawaban = explode(',', $kuisioner->pilihan_jawaban);
            $jawabanCountArray = [];

            foreach ($pilihanJawaban as $pilihan) {
                $jawabanCountArray[$pilihan] = $jawabanCounts
                ->where('kuisioner_id', $kuisioner->id)
                ->where('jawaban', $pilihan)
                ->sum('total') ?? 0;
            }

            $kuisioner->jawaban_counts = $jawabanCountArray;
        }

        $this->kuisionerData = $kuisionerData;

        // Menyiapkan data untuk tabel kuisioner sudah bekerja
        $kuisionerDataSudahBekerja = Kuisioner::select('id', 'pertanyaan', 'tipe_pertanyaan', 'kategori_id', 'pilihan_jawaban')
            ->where('kategori_id', 2)
            ->get();

        $jawabanCountsSudahBekerja = \DB::table('jawabans')
            ->select('kuisioner_id', 'jawaban', \DB::raw('count(*) as total'))
            ->groupBy('kuisioner_id', 'jawaban')
            ->get();

        foreach ($kuisionerDataSudahBekerja as $kuisioner) {
            $pilihanJawaban = explode(',', $kuisioner->pilihan_jawaban);
            $jawabanCountArray = [];

            foreach ($pilihanJawaban as $pilihan) {
                $jawabanCountArray[$pilihan] = $jawabanCountsSudahBekerja
                ->where('kuisioner_id', $kuisioner->id)
                ->where('jawaban', $pilihan)
                ->sum('total') ?? 0;
            }

            $kuisioner->jawaban_counts = $jawabanCountArray;
        }

        $this->sudahBekerja = $kuisionerDataSudahBekerja;

        // Menyiapkan data untuk tabel kuisioner study lanjut

        $kuisionerDataStudyLanjut = Kuisioner::select('id', 'pertanyaan', 'tipe_pertanyaan', 'kategori_id', 'pilihan_jawaban')
            ->where('kategori_id', 3)
            ->get();

        $jawabanCountsStudyLanjut = \DB::table('jawabans')
            ->select('kuisioner_id', 'jawaban', \DB::raw('count(*) as total'))
            ->groupBy('kuisioner_id', 'jawaban')
            ->get();

        foreach ($kuisionerDataStudyLanjut as $kuisioner) {
            $pilihanJawaban = explode(',', $kuisioner->pilihan_jawaban);
            $jawabanCountArray = [];

            foreach ($pilihanJawaban as $pilihan) {
                $jawabanCountArray[$pilihan] = $jawabanCountsStudyLanjut
                ->where('kuisioner_id', $kuisioner->id)
                ->where('jawaban', $pilihan)
                ->sum('total') ?? 0;
            }

            $kuisioner->jawaban_counts = $jawabanCountArray;
        }

        $this->studyLanjut = $kuisionerDataStudyLanjut;

    }

    public function render()
    {
        return view('livewire.admin.laporan-grafik', [
            'chartData' => $this->chartData,
            'chartDataAngkatan' => $this->chartDataAngkatan,
            'chartDataTahunMasuk' => $this->chartDataTahunMasuk,
            'chart1and2' => $this->chart1and2,
            'kuisionerData' => $this->kuisionerData,
            'sudahBekerja' => $this->sudahBekerja,
            'studyLanjut' => $this->studyLanjut,
            

        ])->layout('components.layouts.app', ['title' => 'Laporan & Grafik']);
    }
}
