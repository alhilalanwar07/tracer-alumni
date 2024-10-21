<?php

namespace App\Livewire\Alumni;

use App\Models\Alumni;
use Livewire\Component;
use App\Models\ResponKuisioner;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.alumni.dashboard',[
            'responses' => ResponKuisioner::where('alumni_id', Alumni::where('user_id', auth()->id())->first()->id)->get(),
            'alumnis' => Alumni::orderBy('nama', 'asc')->get(),
            'alumni' => Alumni::where('user_id', auth()->id())->first(),
            'isDataComplete' => $this->cekKelengkapanData(),
            'dataDiri' => Alumni::where('user_id', auth()->id())->first(),
            'hasFilledQuestionnaire' => $this->hasFilledQuestionnaire(),
        ])->layout('layouts.app', ['title' => 'Alumni Dashboard']);
    }

    // function cek kelengkapan data di table alumni
    public function cekKelengkapanData()
    {
        $alumni = Alumni::where('user_id', auth()->id())->first();
        if (!$alumni) {
            return false;
        }

        // Check if all required fields are filled
        $requiredFields = [
            'nama',
            'nim',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'alamat',
            'no_hp',
            'email',
            'foto',
            'judul_skripsi',
            'ipk',
            'tahun_masuk',
            'keterangan',
            'user_id',
            'wisuda_id',
            'prodi_id'
        ];
        foreach ($requiredFields as $field) {
            if (empty($alumni->$field)) {
                return false;
            }
        }

        return true;
    }

    public function hasFilledQuestionnaire()
    {
        // cek di tabel respon_kuisioner apakah alumni sudah pernah mengisi kuisioner
        $alumni = Alumni::where('user_id', auth()->id())->first();
        $responKuisioner = ResponKuisioner::where('alumni_id', $alumni->id)->first();

        // cek katagori_id apa saja yang ada di tabel respon_kuisioner
        $kategoriIds = ResponKuisioner::where('alumni_id', $alumni->id)->pluck('kategori_id')->toArray();

        // cek kategori_id apa saja yang ada di tabel respon_kuisioner
        $kategoriIds = ResponKuisioner::where('alumni_id', $alumni->id)->pluck('kategori_id')->toArray();

        // pisahkan kategori_id yang belum ada di tabel respon_kuisioner
        $belumIsiKuisioner = KategoriKuisioner::whereNotIn('id', $kategoriIds)->get();

    }
}
