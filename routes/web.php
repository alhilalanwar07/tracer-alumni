<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// disable register, reset password
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// livewire
// profil

Route::middleware(['auth'])->group(function () {
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
});
