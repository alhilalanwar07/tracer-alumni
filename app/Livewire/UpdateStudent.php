<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Student;

class UpdateStudent extends Component
{
    public $student;

    protected $rules = [
        'student.student_id' => 'required|unique:students,student_id,' . '{student.id}',
        'student.name' => 'required|string|max:255',
        'student.email' => 'required|email|unique:students,email,' . '{student.id}',
        'student.phone' => 'nullable|string|max:15',
        'student.degree_program' => 'required|string|max:255',
        'student.start_date' => 'required|date',
        'student.graduation_date' => 'nullable|date|after_or_equal:student.start_date',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;
    }

    public function updateStudent()
    {
        $this->validate();

        $this->student->save();

        session()->flash('message', 'Student updated successfully.');
    }

    public function render()
    {
        return view('livewire.update-student');
    }
}
