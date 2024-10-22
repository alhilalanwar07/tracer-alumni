<?php

namespace App\Livewire\Alumni;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Wisuda;
use Livewire\Component;

class Profil extends Component
{
    protected $alumni;
    public $updateMode = false;
    public $updatePasswordMode = false;

    public $nama_edit;
    public $nim_edit;
    public $tanggal_lahir_edit;
    public $jenis_kelamin_edit;
    public $agama_edit;
    public $alamat_edit;
    public $no_hp_edit;
    public $email_edit;
    public $foto_edit;
    public $judul_skripsi_edit;
    public $ipk_edit;
    public $tahun_masuk_edit;
    public $keterangan_edit;
    public $user_id;
    public $wisuda_id;
    public $prodi_id, $alumni_id;
    public $password, $password_confirmation;
     public $new_password;
    public $new_password_confirmation;


    public function mount()
    {
        if (!auth()->check() || auth()->user()->role !== 'alumni') {
            return redirect('/home');
        }

        $this->alumni = Alumni::where('user_id', auth()->id())->first();
    }

    public function render()
    {
        return view('livewire.alumni.profil', [
            'user' => auth()->user(),
            'alumni' => $this->alumni,
            'wisuda' => Wisuda::orderBy('angkatan', 'asc')->get(),

        ])->layout('layouts.app', ['title' => 'Profil']);
    }

    public function edit()
    {
        $this->alumni = Alumni::where('user_id', auth()->id())->first();
        $this->alumni_id = $this->alumni->id;
        $this->updateMode = true;
        $this->nama_edit = $this->alumni->nama;
        $this->nim_edit = $this->alumni->nim;
        $this->tanggal_lahir_edit = $this->alumni->tanggal_lahir;
        $this->jenis_kelamin_edit = $this->alumni->jenis_kelamin;
        $this->agama_edit = $this->alumni->agama;
        $this->alamat_edit = $this->alumni->alamat;
        $this->no_hp_edit = $this->alumni->no_hp;
        $this->email_edit = $this->alumni->email;
        $this->foto_edit = $this->alumni->foto;
        $this->judul_skripsi_edit = $this->alumni->judul_skripsi;
        $this->ipk_edit = $this->alumni->ipk;
        $this->tahun_masuk_edit = $this->alumni->tahun_masuk;
        $this->keterangan_edit = $this->alumni->keterangan;
        $this->user_id = $this->alumni->user_id;
        $this->wisuda_id = $this->alumni->wisuda_id;
        $this->prodi_id = $this->alumni->prodi_id;
    }

    public function updateProfile()
    {
        $this->validate([
            'nama_edit' => 'required',
            'nim_edit' => 'required',
            'tanggal_lahir_edit' => 'required',
            'jenis_kelamin_edit' => 'required',
            'agama_edit' => 'required',
            'alamat_edit' => 'required',

            'no_hp_edit' => 'required',
            'email_edit' => 'required',
            'foto_edit' => 'required',
            'judul_skripsi_edit' => 'required',
            'ipk_edit' => 'required',
            'tahun_masuk_edit' => 'required',
            'keterangan_edit' => 'required',
            'wisuda_id' => 'required',

        ]);

        Alumni::find($this->alumni_id)->update([
            'nama' => $this->nama_edit,
            'nim' => $this->nim_edit,
            'tanggal_lahir' => $this->tanggal_lahir_edit,
            'jenis_kelamin' => $this->jenis_kelamin_edit,
            'agama' => $this->agama_edit,
            'alamat' => $this->alamat_edit,
            'no_hp' => $this->no_hp_edit,
            'email' => $this->email_edit,
            'foto' => $this->foto_edit,
            'judul_skripsi' => $this->judul_skripsi_edit,
            'ipk' => $this->ipk_edit,
            'tahun_masuk' => $this->tahun_masuk_edit,
            'keterangan' => $this->keterangan_edit,
            'user_id' => $this->user_id,
            'wisuda_id' => $this->wisuda_id,
            'prodi_id' => $this->prodi_id,
        ]);

        // jika data berhasil diupdate
        $this->dispatch('tambahAlert', [
            'title' => 'Update Data Berhasil',
            'text' => 'Data Profil Berhasil Diupdate',
            'type' => 'success',
            'timeout' => 1000
        ]);

        // return redirect()->to('/alumni/profil');

    }

    // public function cancelUpdate()
    // {
    //     $this->alumni = Alumni::where('user_id', auth()->id())->first();

    //     $this->updateMode = false;
    // }

    public function editPassword()
    {
        $this->updatePasswordMode = true;
    }

    public function updatePassword()
    {
        $this->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        User::find(auth()->id())->update([
            'password' => bcrypt($this->new_password),
        ]);

        $this->dispatch('tambahAlert', [
            'title' => 'Update Password Berhasil',
            'text' => 'Password Berhasil Diupdate',
            'type' => 'success',
            'timeout' => 1000
        ]);

        $this->reset('new_password', 'new_password_confirmation');

        $this->updatePasswordMode = false;

        // logout
        auth()->logout();
        return redirect('/login');
    }

    public function cancelUpdatePassword()
    {
        $this->reset('new_password', 'new_password_confirmation');

        $this->updatePasswordMode = false;

        return redirect()->to('/alumni/profil');
    }
}
