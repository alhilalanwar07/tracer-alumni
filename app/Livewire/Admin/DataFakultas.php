<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Fakultas;
use Livewire\WithPagination;

class DataFakultas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;
    public $nama, $fakultas_id;

    public $modal = true;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerpage()
    {
        $this->resetPage();
    }

    public function setPerPage($value)
    {
        $this->perpage = $value;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.data-fakultas', [
            'fakultas' => Fakultas::orderBy('created_at', 'DESC')->where('nama', 'like', '%'.$this->search.'%')->paginate($this->perpage),
        ])->layout('components.layouts.app', ['title' => 'Data Fakultas']);
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->fakultas_id = null;

        $this->modal = false;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
        ]);

        Fakultas::create([
            'nama' => $this->nama,
        ]);

        // jika berhasil di tambah
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Fakultas Berhasil Ditambahkan',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        $this->fakultas_id = $fakultas->id;
        $this->nama = $fakultas->nama;

        $this->modal = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
        ]);

        Fakultas::find($this->fakultas_id)->update([
            'nama' => $this->nama,
        ]);

        // jika berhasil di update
        $this->dispatch('tambahAlert', [
            'title'     => 'Update data berhasil',
            'text'      => 'Data Fakultas Berhasil Diupdate',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    public function delete($id)
    {
        // Check if there are any related records in the 'prodi' table
        $relatedProdi = \DB::table('prodi')->where('fakultas_id', $id)->exists();

        if ($relatedProdi) {
            // If there are related records, dispatch an alert and do not delete
            $this->dispatch('tambahAlert', [
            'title'     => 'Hapus data gagal',
            'text'      => 'Data Fakultas tidak dapat dihapus karena masih memiliki data Prodi terkait',
            'type'      => 'error',
            'timeout'   => 1000
            ]);
            return;
        }

        // If no related records, proceed with deletion
        Fakultas::find($id)->delete();

        // jika berhasil di hapus
        $this->dispatch('tambahAlert', [
            'title'     => 'Hapus data berhasil',
            'text'      => 'Data Fakultas Berhasil Dihapus',
            'type'      => 'success',
            'timeout'   => 1000
        ]);
    }
}
