<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Prodi;
use Livewire\Component;
use App\Models\Fakultas;
use Livewire\WithPagination;

class DataProdi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;
    public $nama, $prodi_id, $fakultas_id, $user_id;

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
        return view('livewire.admin.data-prodi',[
            'prodi' => Prodi::orderBy('created_at', 'DESC')->where('nama', 'like', '%'.$this->search.'%')->paginate($this->perpage),
            'fakultas' => Fakultas::orderBy('nama', 'ASC')->get(),
            'user' => User::orderBy('name', 'ASC')->get(),
        ])->title('Data Prodi');
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->prodi_id = null;
        $this->fakultas_id = null;
        $this->user_id = null;

        $this->modal = false;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'fakultas_id' => 'required',
            'user_id' => 'required',
        ]);

        Prodi::create([
            'nama' => $this->nama,
            'fakultas_id' => $this->fakultas_id,
            'user_id' => $this->user_id,
        ]);

        // jika berhasil di tambah
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Program Studi Berhasil Ditambahkan',
            'type'      => 'success',
            'timeout'   => 2000
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $prodi = Prodi::find($id);
        $this->prodi_id = $prodi->id;
        $this->nama = $prodi->nama;
        $this->fakultas_id = $prodi->fakultas_id;
        $this->user_id = $prodi->user_id;

        $this->modal = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'fakultas_id' => 'required',
            'user_id' => 'required',
        ]);

        Prodi::find($this->prodi_id)->update([
            'nama' => $this->nama,
            'fakultas_id' => $this->fakultas_id,
            'user_id' => $this->user_id,
        ]);

        // jika berhasil di tambah
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Program Studi Berhasil Diupdate',
            'type'      => 'success',
            'timeout'   => 2000
        ]);

        $this->resetInput();
    }

    public function hapus($id)
    {
        // jika prodi memiliki data mahasiswa
        if (Mahasiswa::where('prodi_id', $id)->count() > 0) {
            $this->dispatch('tambahAlert', [
                'title'     => 'Hapus data gagal',
                'text'      => 'Data Program Studi tidak bisa dihapus karena memiliki data mahasiswa',
                'type'      => 'error',
                'timeout'   => 2000
            ]);
            return;
        }

        Prodi::find($id)->delete();

        // jika berhasil di hapus
        $this->dispatch('tambahAlert', [
            'title'     => 'Hapus data berhasil',
            'text'      => 'Data Program Studi Berhasil Dihapus',
            'type'      => 'success',
            'timeout'   => 2000
        ]);
    }



}
