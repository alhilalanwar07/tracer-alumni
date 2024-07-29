<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ManajemenUser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;

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
        $users = User::where('name', 'like', '%'.$this->search.'%')->paginate($this->perpage);

        return view('livewire.admin.manajemen-user',[
            'users' => $users
        ])->layout('components.layouts.app', ['title' => 'Manajemen User']);
    }

}
