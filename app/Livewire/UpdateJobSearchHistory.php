<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\JobSearchHistory;

class UpdateJobSearchHistory extends Component
{
    public $jobSearchHistory;

    protected $rules = [
        'jobSearchHistory.waiting_period' => 'nullable|integer',
        'jobSearchHistory.job_search_status' => 'required|string|max:255',
    ];

    public function mount(JobSearchHistory $jobSearchHistory)
    {
        $this->jobSearchHistory = $jobSearchHistory;
    }

    public function updateJobSearchHistory()
    {
        $this->validate();

        $this->jobSearchHistory->save();

        session()->flash('message', 'Job search history updated successfully.');
    }

    public function render()
    {
        return view('livewire.update-job-search-history');
    }
}
