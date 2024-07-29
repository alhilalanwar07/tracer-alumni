<?php

namespace App\Livewire;

use Livewire\Component;

class Profil extends Component
{

    public function render()
    {
        return view('livewire.profil',[
            'user' => auth()->user(),
        ])->layout('components.layouts.app', ['title' => 'Profil']);
    }
}
