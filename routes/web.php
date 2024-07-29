<?php

use Illuminate\Support\Facades\{Route, Auth};


// disable register, reset password
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// livewire
// profil
Route::get('/profil', App\Livewire\Profil::class)->name('profil');

    //admin.manajemen-user
    Route::get('/admin/manajemen-user', App\Livewire\Admin\ManajemenUser::class)->name('admin.manajemen-user');
