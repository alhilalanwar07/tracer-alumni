<?php

namespace App\Livewire\Alumni;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Wisuda;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Register extends Component
{
    public $nama, $email, $password, $nim, $keterangan, $prodi, $angkatan, $tahun_masuk;

    public function render()
    {
        return view('livewire.alumni.register', [
            'prodis' => Prodi::orderBy('nama', 'asc')->get(),
            'angkatans' => Wisuda::orderBy('angkatan', 'asc')->get(),
        ])->layout('layouts.auth', ['title' => 'Register Alumni']);
    }

    public function resetInput(){
        $this->nama = '';
        $this->email = '';
        $this->password = '';
        $this->nim = '';
        $this->keterangan = '';
        $this->prodi = '';
        $this->angkatan = '';
        $this->tahun_masuk = '';
    }

    public function registerAlumni(){
        $validator = \Validator::make([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => $this->password,
            'nim' => $this->nim,
            'keterangan' => $this->keterangan,
            'prodi' => $this->prodi,
            'angkatan' => $this->angkatan,
            'tahun_masuk' => $this->tahun_masuk,
        ], [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nim' => 'required|unique:alumnis',
            'keterangan' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'tahun_masuk' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'nim.required' => 'NIM harus diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'keterangan.required' => 'Keterangan harus diisi',
            'prodi.required' => 'Prodi harus diisi',
            'angkatan.required' => 'Angkatan harus diisi',
            'tahun_masuk.required' => 'Tahun masuk harus diisi',
        ]);

        if ($validator->fails()) {
            $this->dispatch('updateAlertToast', [
            'title'     => 'Error',
            'text'      => 'Terjadi kesalahan: ' . implode(', ', $validator->errors()->all()),
            'type'      => 'error',
            'timeout'   => 2000
            ]);
            return;
        }

        try {
            $user = User::create([
                'name' => $this->nama,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role' => 'alumni',
            ]);

            $alumni = Alumni::create([
                'user_id' => $user->id,
                'nama' => $this->nama,
                'nim' => $this->nim,
                'email' => $this->email,
                'keterangan' => $this->keterangan,
                'prodi_id' => $this->prodi,
                'wisuda_id' => $this->angkatan,
                'tahun_masuk' => $this->tahun_masuk,
            ]);

            // Jika berhasil di tambah
            $this->dispatch('updateAlertToast', [
                'title'     => 'Simpan data berhasil',
                'text'      => 'Data Berhasil Ditambahkan',
                'type'      => 'success',
                'timeout'   => 1000
            ]);

            $this->resetInput();

            return redirect('/login');

        } catch (\Exception $e) {
            $this->dispatch('tambahAlert', [
                'title'     => 'Error',
                'text'      => 'Terjadi kesalahan: ' . $e->getMessage(),
                'type'      => 'error',
                'timeout'   => 1000
            ]);
        }
    }
}
