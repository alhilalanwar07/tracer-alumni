<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;

class CreateStudent extends Component
{
    public $student_id, $name, $email, $phone, $degree_program, $start_date, $graduation_date;

    protected $rules = [
        'student_id' => 'required|unique:students',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students',
        'phone' => 'nullable|string|max:15',
        'degree_program' => 'required|string|max:255',
        'start_date' => 'required|date',
        'graduation_date' => 'nullable|date|after_or_equal:start_date',
    ];

    public function createStudent()
    {
        $this->validate();

        Student::create([
            'student_id' => $this->student_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'degree_program' => $this->degree_program,
            'start_date' => $this->start_date,
            'graduation_date' => $this->graduation_date,
        ]);

        session()->flash('message', 'Student created successfully.');

        // Reset the form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-student');
    }
}
