<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use App\Models\EmploymentHistory;
use App\Models\JobSearchHistory;
use App\Models\Report;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public $student_id, $name, $email, $degree_program, $start_date, $graduation_date;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.admin.students', [
            'students' => Student::with('employmentHistories', 'jobSearchHistories', 'reports')->paginate(10),
        ]);
    }

    // Reset input fields
    private function resetInputFields()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->degree_program = '';
        $this->start_date = '';
        $this->graduation_date = '';
    }

    // Create new student
    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required|unique:students,student_id',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'degree_program' => 'required',
            'start_date' => 'required|date',
        ]);

        Student::create($validatedData);

        session()->flash('message', 'Student Created Successfully.');

        $this->resetInputFields();
    }

    // Edit student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $student->student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->degree_program = $student->degree_program;
        $this->start_date = $student->start_date;
        $this->graduation_date = $student->graduation_date;

        $this->updateMode = true;
    }

    // Update student
    public function update()
    {
        $validatedData = $this->validate([
            'student_id' => 'required|unique:students,student_id,' . $this->student_id,
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $this->student_id,
            'degree_program' => 'required',
            'start_date' => 'required|date',
        ]);

        $student = Student::find($this->student_id);
        $student->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();
    }

    // Delete student
    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student Deleted Successfully.');
    }
}
