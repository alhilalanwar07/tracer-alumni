<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\JobSearchHistory;

class CreateJobSearchHistory extends Component
{
    public $student_id, $waiting_period, $job_search_status;

    protected $rules = [
        'student_id' => 'required|exists:students,id',
        'waiting_period' => 'nullable|integer',
        'job_search_status' => 'required|string|max:255',
    ];

    public function createJobSearchHistory()
    {
        $this->validate();

        JobSearchHistory::create([
            'student_id' => $this->student_id,
            'waiting_period' => $this->waiting_period,
            'job_search_status' => $this->job_search_status,
        ]);

        session()->flash('message', 'Job search history created successfully.');

        // Reset the form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-job-search-history');
    }
}
