<div>
    <form wire:submit.prevent="updateStudent">
        <div>
            <label>Student ID:</label>
            <input type="text" wire:model="student.student_id" class="form-control" required>
            @error('student.student_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Name:</label>
            <input type="text" wire:model="student.name" class="form-control" required>
            @error('student.name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Email:</label>
            <input type="email" wire:model="student.email" class="form-control" required>
            @error('student.email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" wire:model="student.phone" class="form-control">
            @error('student.phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Degree Program:</label>
            <input type="text" wire:model="student.degree_program" class="form-control" required>
            @error('student.degree_program') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Start Date:</label>
            <input type="date" wire:model="student.start_date" class="form-control" required>
            @error('student.start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Graduation Date:</label>
            <input type="date" wire:model="student.graduation_date" class="form-control">
            @error('student.graduation_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </form>
</div>
