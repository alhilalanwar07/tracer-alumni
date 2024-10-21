<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Wisuda;
use Livewire\Component;
use Livewire\WithPagination;

class DataAlumni extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;
    public $nama;
    public $nim;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $agama;
    public $alamat;
    public $no_hp;
    public $email;
    public $foto;
    public $judul_skripsi;
    public $ipk;
    public $tahun_masuk;
    public $keterangan;
    public $user_id;
    public $wisuda_id;
    public $prodi_id, $alumni_id;

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
        return view('livewire.admin.data-alumni', [
            'alumni' => Alumni::orderBy('created_at', 'DESC')
                ->where('nama', 'like', '%'.$this->search.'%')
                ->paginate($this->perpage),
            'wisuda' => Wisuda::orderBy('created_at', 'DESC')->get(),
            'prodi' => Prodi::orderBy('created_at', 'DESC')->get(),
        ])->layout('components.layouts.app', ['title' => 'Data Alumni']);
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->nim = null;
        $this->tanggal_lahir = null;
        $this->jenis_kelamin = null;
        $this->agama = null;
        $this->alamat = null;
        $this->no_hp = null;
        $this->email = null;
        $this->foto = null;
        $this->judul_skripsi = null;
        $this->ipk = null;
        $this->tahun_masuk = null;
        $this->keterangan = null;
        $this->user_id = null;
        $this->wisuda_id = null;
        $this->prodi_id = null;
        $this->alumni_id = null;

        $this->modal = false;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:alumnis,email',
            'judul_skripsi' => 'required',
            'ipk' => 'required',
            'tahun_masuk' => 'required',
            'keterangan' => 'required',
            'wisuda_id' => 'required',
            'prodi_id' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'nim.required' => 'NIM tidak boleh kosong',
            'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'agama.required' => 'Agama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_hp.required' => 'No HP tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'judul_skripsi.required' => 'Judul Skripsi tidak boleh kosong',
            'ipk.required' => 'IPK tidak boleh kosong',
            'tahun_masuk.required' => 'Tahun Masuk tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'wisuda_id.required' => 'Wisuda ID tidak boleh kosong',
            'prodi_id.required' => 'Prodi ID tidak boleh kosong',
        ]);

        // Jika foto diisi
        if ($this->foto) {
            $this->validate([
                'foto' => 'image', // 1MB Max
            ]);

            $imageName = \Str::slug($this->nama, '_').'_'.time().'.'.$this->foto->extension();
            $this->foto->storeAs('public/alumni', $imageName);
        } else {
            $imageName = "no_image.jpg";
        }

        // Cek apakah user sudah ada berdasarkan email
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            // Jika user tidak ditemukan, buat user baru
            $user = User::create([
                'name' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt('12345678'),
                'role' => 'alumni',
            ]);

            // Kirim email notifikasi (pastikan email setting sudah benar)
            \Mail::to($user->email)->send(new \App\Mail\WelcomeAlumni($user));
        }

        // Simpan data Alumni dengan user_id
        Alumni::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'foto' => $imageName,
            'judul_skripsi' => $this->judul_skripsi,
            'ipk' => $this->ipk,
            'tahun_masuk' => $this->tahun_masuk,
            'keterangan' => $this->keterangan,
            'wisuda_id' => $this->wisuda_id,
            'prodi_id' => $this->prodi_id,
            'user_id' => $user->id, // Assign user_id dari user yang sudah ditemukan atau dibuat
        ]);

        // Jika berhasil di tambah
        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Alumni Berhasil Ditambahkan',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }


    public function edit($id)
    {
        $alumni = Alumni::find($id);
        $this->alumni_id = $alumni->id;
        $this->nama = $alumni->nama;
        $this->nim = $alumni->nim;
        $this->tanggal_lahir = $alumni->tanggal_lahir;
        $this->jenis_kelamin = $alumni->jenis_kelamin;
        $this->agama = $alumni->agama;
        $this->alamat = $alumni->alamat;
        $this->no_hp = $alumni->no_hp;
        $this->email = $alumni->email;
        $this->foto = $alumni->foto;
        $this->judul_skripsi = $alumni->judul_skripsi;
        $this->ipk = $alumni->ipk;
        $this->tahun_masuk = $alumni->tahun_masuk;
        $this->keterangan = $alumni->keterangan;
        $this->user_id = $alumni->user_id;
        $this->wisuda_id = $alumni->wisuda_id;
        $this->prodi_id = $alumni->prodi_id;

        $this->modal = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'judul_skripsi' => 'required',
            'ipk' => 'required',
            'tahun_masuk' => 'required',
            'keterangan' => 'required',
            'wisuda_id' => 'required',
            'prodi_id' => 'required',
        ]);

        Alumni::find($this->alumni_id)->update([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'foto' => $this->foto,
            'judul_skripsi' => $this->judul_skripsi,
            'ipk' => $this->ipk,
            'tahun_masuk' => $this->tahun_masuk,
            'keterangan' => $this->keterangan,
            'wisuda_id' => $this->wisuda_id,
            'prodi_id' => $this->prodi_id,
        ]);

        // jika berhasil di update
        $this->dispatch('tambahAlert', [
            'title'     => 'Update data berhasil',
            'text'      => 'Data Alumni Berhasil Diupdate',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    public function hapus($id)
    {

        Alumni::find($id)->delete();

        // jika berhasil di hapus
        $this->dispatch('tambahAlert', [
            'title'     => 'Hapus data berhasil',
            'text'      => 'Data Alumni Berhasil Dihapus',
            'type'      => 'success',
            'timeout'   => 1000
        ]);
    }
}
