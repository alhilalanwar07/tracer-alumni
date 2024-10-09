<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\EmploymentHistory;

class UpdateEmploymentHistory extends Component
{
    public $employmentHistory;

    protected $rules = [
        'employmentHistory.job_title' => 'required|string|max:255',
        'employmentHistory.company_name' => 'required|string|max:255',
        'employmentHistory.start_date' => 'required|date',
        'employmentHistory.end_date' => 'nullable|date|after_or_equal:employmentHistory.start_date',
    ];

    public function mount(EmploymentHistory $employmentHistory)
    {
        $this->employmentHistory = $employmentHistory;
    }

    public function updateEmploymentHistory()
    {
        $this->validate();

        $this->employmentHistory->save();

        session()->flash('message', 'Employment history updated successfully.');
    }

    public function render()
    {
        return view('livewire.update-employment-history');
    }
}
