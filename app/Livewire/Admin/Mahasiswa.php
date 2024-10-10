<?php

namespace App\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Mahasiswa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $studentid, $student_id, $name, $phone, $email, $degree_program, $start_date, $graduation_date;
    public $updateMode = false;

    public $search = '';
    public $perpage = 10;
    public $selectedPerPage = 10;

    public $modal = true;

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
        $searchTerm = '%' . $this->search . '%';
        return view('livewire.admin.mahasiswa', [
            'mahasiswas' => Student::orderBy('created_at', 'DESC')
                ->where('name', 'like', $searchTerm)
                ->orWhere('email', 'like', $searchTerm)
                ->paginate($this->perpage),
        ])->layout('components.layouts.app', ['title' => 'Mahasiswa']);
    }

    public function resetInput()
    {
        $this->student_id = null;
        $this->name = null;
        $this->email = null;
        $this->degree_program = null;
        $this->start_date = null;
        $this->graduation_date = null;


        $this->modal = false;
    }

    // Create new student
    public function store()
    {
        $validatedData = $this->validate([
            'student_id' => 'required|unique:students,student_id',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable',
            'degree_program' => 'required',
            'start_date' => 'required|date',
            'graduation_date' => 'nullable|date',
        ]);

        Student::create($validatedData);

        $this->modal = false;

        $this->dispatch('tambahAlert', [
            'title'     => 'Simpan data berhasil',
            'text'      => 'Data Mahasiswa Berhasil Ditambahkan',
            'type'      => 'success',
            'timeout'   => 1000
        ]);

        $this->resetInput();
    }

    // Edit student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->studentid = $student->id;
        $this->student_id = $student->student_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->degree_program = $student->degree_program;
        $this->start_date = $student->start_date;
        $this->graduation_date = $student->graduation_date;

        $this->updateMode = true;
        $this->modal = true;
    }

    // Update student
    public function update()
    {
        $this->validate([
            'student_id' => [
                'required',
                Rule::unique('students')->ignore($this->studentid), // Ignore ID jika sedang memperbarui
            ],
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($this->studentid),
            ],
            'degree_program' => 'required',
            'start_date' => 'required|date',
        ]);

        $student = Student::find($this->studentid);
        $student->update([
            'student_id' => $this->student_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'degree_program' => $this->degree_program,
            'start_date' => $this->start_date,
            'graduation_date' => $this->graduation_date,
        ]);

        $this->updateMode = false;

        $this->dispatch('updateAlert', [
            'title'     => 'Update data berhasil',
            'text'      => 'Data Mahasiswa Berhasil Diupdate',
            'type'      => 'success',
            'timeout'   => 1000
        ]);
        $this->resetInput();
        $this->modal = false;
    }

    // Delete student
    public function delete($id)
    {
        Student::find($id)->delete();

        $this->dispatch('hapusAlert', [
            'title'     => 'Hapus data berhasil',
            'text'      => 'Data Mahasiswa Berhasil Dihapus',
            'type'      => 'success',
            'timeout'   => 1000
        ]);
    }
}
