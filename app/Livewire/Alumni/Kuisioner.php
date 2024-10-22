<?php

namespace App\Livewire\Alumni;

use App\Models\Alumni;
use Livewire\Component;
use App\Models\KategoriKuisioner;
use App\Models\Kuisioner as KuisionerModel;

class Kuisioner extends Component
{

    public function render()
    {
        $ket = [
            'belum', 'sudah', 'study'
        ];

        $dataAlumni = Alumni::where('user_id', auth()->id())->first();
        $dataAlumniKet = strtolower($dataAlumni->keterangan);

        // dd($dataAlumniKet);

        // apakah alumni sudah, belum, atau sedang study
        $kategori = KategoriKuisioner::where('nama_kategori', $dataAlumniKet)->first();

        return view('livewire.alumni.kuisioner', [
            'kuisioners' => KuisionerModel::where('kategori_id', $kategori->id)
                          ->get(),
        ])->layout('layouts.app', ['title' => 'Kuisioner']);
    }

    public $answers = [];

    public function resetInput(){
        $this->answers = [];
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'answers.*' => 'required',
        ], [
            'answers.*.required' => 'Jawaban tidak boleh kosong.',
        ]);

        $alumniID = Alumni::where('user_id', auth()->id())->first()->id;

        \DB::transaction(function () use ($validatedData, $alumniID) {
            foreach ($validatedData['answers'] as $questionId => $answer) {
                \App\Models\Jawaban::create([
                    'alumni_id' => $alumniID,
                    'kuisioner_id' => $questionId,
                    'jawaban' => is_array($answer) ? implode(',', $answer) : $answer,
                ]);
            }

            \App\Models\ResponKuisioner::create([
                'alumni_id' => $alumniID,
                'tanggal_respon' => now(),
                'kategori_id' => KategoriKuisioner::where('nama_kategori', Alumni::where('user_id', auth()->id())->first()->keterangan)->first()->id,
            ]);
        });

        // jika berhasil
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Pengisian Kuisioner Berhasil Disimpan',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
        return redirect()->route('alumni.dashboard');
    }
}
