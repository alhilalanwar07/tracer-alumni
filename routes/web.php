<?php

use Illuminate\Support\Facades\{Route, Auth};


// disable register, reset password
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// livewire
// profil
Route::get('/profil', App\Livewire\Profil::class)->name('profil');

    //admin.manajemen-user
    Route::get('/admin/manajemen-user', App\Livewire\Admin\ManajemenUser::class)->name('admin.manajemen-user');
    // admin.dashboard
    Route::get('/home', App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    // admin.mahasiswa
    Route::get('/mahasiswa', App\Livewire\Admin\Mahasiswa::class)->name('admin.mahasiswa');
    // admin.masastudi
    Route::get('/masa-studi', App\Livewire\Admin\Masastudi::class)->name('admin.masastudi');
    // admin.laporan
    Route::get('/laporan-grafik', App\Livewire\Admin\Laporan::class)->name('admin.laporan');
    // admin.riwayatpekerjaan
    Route::get('/riwayat-pekerjaan', App\Livewire\Admin\Riwayatpekerjaan::class)->name('admin.riwayatpekerjaan');
