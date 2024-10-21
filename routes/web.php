<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\AdminKuisionerStudyLanjut;
use App\Livewire\AdminKuisionerBelumBekerja;
use App\Livewire\AdminKuisionerSudahBekerja;

// disable register, reset password
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// livewire
// profil

Route::middleware(['admin'])->group(function () {
    Route::get('/profil', App\Livewire\Profil::class)->name('profil');
    Route::get('/admin/manajemen-user', App\Livewire\Admin\ManajemenUser::class)->name('admin.manajemen-user');
    // admin.dashboard
    Route::get('/home', App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    // admin.mahasiswa
    Route::get('/mahasiswa', App\Livewire\Admin\Mahasiswa::class)->name('admin.mahasiswa');
    Route::get('/fakultas', App\Livewire\Admin\DataFakultas::class)->name('admin.fakultas');
    Route::get('/prodi', App\Livewire\Admin\DataProdi::class)->name('admin.prodi');
    Route::get('/alumni', App\Livewire\Admin\DataAlumni::class)->name('admin.alumni');
    Route::get('/periode-wisuda', App\Livewire\Admin\DataPeriode::class)->name('admin.periode');

    Route::get('/kuisioner/belum-bekerja', AdminKuisionerBelumBekerja::class)->name('admin.kuisioner.belum-bekerja');
    Route::get('/kuisioner/sudah-bekerja', AdminKuisionerSudahBekerja::class)->name('admin.kuisioner.sudah-bekerja');
    Route::get('/kuisioner/study-lanjut', AdminKuisionerStudyLanjut::class)->name('admin.kuisioner.study-lanjut');
});


Route::middleware(['alumni'])->group(function () {
    // alumni.profil
    Route::get('/alumni/profil', App\Livewire\Alumni\Profil::class)->name('alumni.profil');
    Route::get('/alumni/dashboard', App\Livewire\Alumni\Dashboard::class)->name('alumni.dashboard');
    Route::get('/alumni/kuisioner', App\Livewire\Alumni\Kuisioner::class)->name('alumni.kuisioner');
});

Route::get('/alumni/register', App\Livewire\Alumni\Register::class)->name('alumni.register');

