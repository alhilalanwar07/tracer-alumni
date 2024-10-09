<div>
    <h2>Student Management</h2>

    @if ($updateMode)
        @include('livewire.update-student')
    @else
        @include('livewire.create-student')
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Degree Program</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->degree_program }}</td>
                <td>
                    <button wire:click="edit({{ $student->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="delete({{ $student->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>
