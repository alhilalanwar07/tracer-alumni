<?php

namespace App\Livewire\Admin;

use App\Models\Wisuda;
use Livewire\Component;
use Livewire\WithPagination;

class DataPeriode extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;
    public $angkatan, $tanggal, $wisuda_id;

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
        return view('livewire.admin.data-periode', [
            'wisuda' => Wisuda::orderBy('created_at', 'DESC')
                ->where('angkatan', 'like', '%'.$this->search.'%')
                ->paginate($this->perpage),
        ])->layout('components.layouts.app', ['title' => 'Data Wisuda']);
    }

    public function resetInput()
    {
        $this->angkatan = null;
        $this->tanggal = null;

        $this->modal = false;
    }

    public function simpan()
    {
        $this->validate([
            'angkatan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Wisuda::create([
            'angkatan' => $this->angkatan,
            'tanggal' => $this->tanggal,
        ]);

        // jika berhasil di tambah
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Wisuda Berhasil Ditambahkan',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $wisuda = Wisuda::find($id);
        $this->wisuda_id = $wisuda->id;
        $this->angkatan = $wisuda->angkatan;
        $this->tanggal = $wisuda->tanggal;

        $this->modal = true;
    }

    public function update()
    {
        $this->validate([
            'angkatan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Wisuda::find($this->wisuda_id)->update([
            'angkatan' => $this->angkatan,
            'tanggal' => $this->tanggal,
        ]);

        // jika berhasil di update
        $this->dispatch('tambahAlert', [
            'title'     => 'Update data berhasil',
            'text'      => 'Data Wisuda Berhasil Diupdate',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    public function delete($id)
    {
        // jika ada data yang berada di alumni, maka tidak bisa di hapus
        $wisuda = Wisuda::find($id);
        if ($wisuda->alumni->count() > 0) {
            $this->dispatch('tambahAlert', [
                'title'     => 'Hapus data gagal',
                'text'      => 'Data Wisuda Tidak Bisa Dihapus Karena Terdapat Data Alumni',
                'type'      => 'error',
                'timeout'   => 2000
            ]);
            return;
        }

        Wisuda::find($id)->delete();

        // jika berhasil di hapus
        $this->dispatch('tambahAlert', [
            'title'     => 'Hapus data berhasil',
            'text'      => 'Data Wisuda Berhasil Dihapus',
            'type'      => 'success',
            'timeout'   => 1000
        ]);
    }
}
