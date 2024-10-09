<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\JobSearchHistory as JobSearchHistoryModel;
use App\Models\Student;
use Livewire\WithPagination;

class JobSearchHistory extends Component
{
    use WithPagination;

    public $student_id, $waiting_period, $job_search_status;
    public $updateMode = false;

    public function render()
    {
        $students = Student::all();  // To select students for job search history
        return view('livewire.admin.job-search-history', [
            'jobSearchHistories' => JobSearchHistoryModel::with('student')->paginate(10),
            'students' => $students
        ]);
    }

    private function resetInputFields()
    {
        $this->student_id = '';
        $this->waiting_period = '';
        $this->job_search_status = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'waiting_period' => 'required|integer|min:0',
            'job_search_status' => 'required',
        ]);

        JobSearchHistoryModel::create($validatedData);

        session()->flash('message', 'Job Search History Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $jobSearchHistory = JobSearchHistoryModel::findOrFail($id);
        $this->student_id = $jobSearchHistory->student_id;
        $this->waiting_period = $jobSearchHistory->waiting_period;
        $this->job_search_status = $jobSearchHistory->job_search_status;

        $this->updateMode = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'waiting_period' => 'required|integer|min:0',
            'job_search_status' => 'required',
        ]);

        $jobSearchHistory = JobSearchHistoryModel::find($this->student_id);
        $jobSearchHistory->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Job Search History Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        JobSearchHistoryModel::find($id)->delete();
        session()->flash('message', 'Job Search History Deleted Successfully.');
    }
}
