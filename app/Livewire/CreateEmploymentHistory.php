<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\EmploymentHistory;

class CreateEmploymentHistory extends Component
{
    public $student_id, $job_title, $company_name, $start_date, $end_date;

    protected $rules = [
        'student_id' => 'required|exists:students,id',
        'job_title' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ];

    public function createEmploymentHistory()
    {
        $this->validate();

        EmploymentHistory::create([
            'student_id' => $this->student_id,
            'job_title' => $this->job_title,
            'company_name' => $this->company_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Employment history created successfully.');

        // Reset the form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-employment-history');
    }
}
