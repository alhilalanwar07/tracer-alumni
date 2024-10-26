<?php

namespace App\Livewire\Admin;

use App\Models\Prodi;
use App\Models\Alumni;
use App\Models\Wisuda;
use Livewire\Component;
use App\Models\Fakultas;

class Dashboard extends Component
{

    // protected $alumnis;
    // protected $wisudas;
    // protected $users;


    public function render()
    {
        return view('livewire.admin.dashboard', [
            'alumnis' => Alumni::with('wisuda', 'prodi')
                    ->latest()
                    ->take(10)
                    ->get(),
            'jml_alumni' => Alumni::count(),
            'jml_wisuda' => Wisuda::count(),
            'jml_prodi' => Prodi::count(),
            'jml_fakultas' => Fakultas::count(),
        ])->layout('components.layouts.app', ['title' => 'Dashboard']);
    }
}
