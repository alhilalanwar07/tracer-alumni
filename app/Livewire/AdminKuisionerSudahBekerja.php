<?php

namespace App\Livewire;

use App\Models\Jawaban;
use Livewire\Component;
use App\Models\Kuisioner;
use Livewire\WithPagination;
use App\Models\KategoriKuisioner;

class AdminKuisionerSudahBekerja extends Component
{
    use WithPagination;
    protected $kuisioners;
    public $kategori_id;
    public $pertanyaan;
    public $tipe_pertanyaan = 'text';
    public $pilihan_jawaban = '';
    public $editId = null;
    public $kategoriSudahBekerja;


    public $modal = true;
    public $search = '';
    public $perpage = 10;

    public function mount()
    {
        $this->kategoriSudahBekerja = KategoriKuisioner::where('nama_kategori', 'sudah-bekerja')->first();
    }

    public function saveKuisioner()
    {
        $this->validate([
            'pertanyaan' => 'required|string',
            'tipe_pertanyaan' => 'required|in:text,multiple_choice,scale,checkbox,dropdown',
            'pilihan_jawaban' => 'nullable|string',
        ]);

        if ($this->editId) {
            $kuisioner = Kuisioner::find($this->editId);
            $kuisioner->update([
                'pertanyaan' => $this->pertanyaan,
                'tipe_pertanyaan' => $this->tipe_pertanyaan,
                'kategori_id' => $this->kategoriSudahBekerja->id,
                'pilihan_jawaban' => $this->pilihan_jawaban,
            ]);

            // Jika berhasil di update
            $this->dispatch('tambahAlert', [
                'title'     => 'Simpan data berhasil',
                'text'      => 'Data Kuisioner Berhasil Diupdate',
                'type'      => 'success',
                'timeout'   => 1000
            ]);
        } else {
            Kuisioner::create([
                'pertanyaan' => $this->pertanyaan,
                'tipe_pertanyaan' => $this->tipe_pertanyaan,
                'kategori_id' => $this->kategoriSudahBekerja->id,
                'pilihan_jawaban' => $this->pilihan_jawaban,
            ]);

            // Jika berhasil di tambah
            $this->dispatch('tambahAlert', [
                'title'     => 'Simpan data berhasil',
                'text'      => 'Data Kuisioner Berhasil Ditambahkan',
                'type'      => 'success',
                'timeout'   => 1000
            ]);
        }

        $this->resetForm();
        $this->kuisioners = Kuisioner::where('kategori_id', $this->kategori_id)->get();
    }

    public function render()
    {
        $kuisioners = Kuisioner::orderBy('created_at', 'DESC')
            ->where('kategori_id', $this->kategoriSudahBekerja->id)
            ->where('pertanyaan', 'like', '%'.$this->search.'%')
            ->paginate($this->perpage);

        return view('livewire.admin-kuisioner-sudah-bekerja', [
            'kuisioners' => $kuisioners,
        ])->layout('components.layouts.app', ['title' => 'Kuisioner Sudah Bekerja']);
    }

    public function resetForm()
    {
        $this->editId = null;
        $this->pertanyaan = '';
        $this->tipe_pertanyaan = 'text';
        $this->pilihan_jawaban = '';
    }

    public function edit($id)
    {
        $kuisioner = Kuisioner::find($id);
        $this->editId = $id;
        $this->pertanyaan = $kuisioner->pertanyaan;
        $this->tipe_pertanyaan = $kuisioner->tipe_pertanyaan;
        $this->kategori_id = $kuisioner->kategori_id; // Set kategori saat edit
        $this->pilihan_jawaban = $kuisioner->pilihan_jawaban;
    }

    public function delete($id)
    {
        // Check for dependencies
        if (Jawaban::where('kuisioner_id', $id)->exists()) {
            $this->dispatch('tambahAlert', [
                'title' => 'Hapus data gagal',
                'text' => 'Data Kuisioner tidak dapat dihapus karena ada referensi di tabel lain.',
                'type' => 'error',
                'timeout' => 3000
            ]);
            return;
        }

        // Proceed to delete if no dependencies found
        Kuisioner::find($id)->delete();

        // Dispatch success alert
        $this->dispatch('tambahAlert', [
            'title' => 'Hapus data berhasil',
            'text' => 'Data Kuisioner Berhasil Dihapus',
            'type' => 'success',
            'timeout' => 1000
        ]);
    }
}