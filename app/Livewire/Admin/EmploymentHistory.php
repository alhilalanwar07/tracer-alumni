<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\EmploymentHistory as EmploymentHistoryModel;
use App\Models\Student;
use Livewire\WithPagination;

class EmploymentHistory extends Component
{
    use WithPagination;

    public $student_id, $job_title, $company_name, $start_date, $end_date;
    public $updateMode = false;

    public function render()
    {
        $students = Student::all();  // To select students for employment history
        return view('livewire.admin.employment-history', [
            'employmentHistories' => EmploymentHistoryModel::with('student')->paginate(10),
            'students' => $students
        ]);
    }

    private function resetInputFields()
    {
        $this->student_id = '';
        $this->job_title = '';
        $this->company_name = '';
        $this->start_date = '';
        $this->end_date = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'job_title' => 'required',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        EmploymentHistoryModel::create($validatedData);

        session()->flash('message', 'Employment History Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $employmentHistory = EmploymentHistoryModel::findOrFail($id);
        $this->student_id = $employmentHistory->student_id;
        $this->job_title = $employmentHistory->job_title;
        $this->company_name = $employmentHistory->company_name;
        $this->start_date = $employmentHistory->start_date;
        $this->end_date = $employmentHistory->end_date;

        $this->updateMode = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'student_id' => 'required',
            'job_title' => 'required',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $employmentHistory = EmploymentHistoryModel::find($this->student_id);
        $employmentHistory->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Employment History Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        EmploymentHistoryModel::find($id)->delete();
        session()->flash('message', 'Employment History Deleted Successfully.');
    }
}
