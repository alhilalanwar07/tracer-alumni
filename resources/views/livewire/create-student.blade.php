<div class="container">
    <form wire:submit.prevent="store" class="form">
        <div class="form-group">
            <label class="form-label">Student ID:</label>
            <input type="text" wire:model="student_id" class="form-control" required>
            @error('student_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Name:</label>
            <input type="text" wire:model="name" class="form-control" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" wire:model="email" class="form-control" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Phone:</label>
            <input type="text" wire:model="phone" class="form-control">
            @error('phone') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Degree Program:</label>
            <input type="text" wire:model="degree_program" class="form-control" required>
            @error('degree_program') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Start Date:</label>
            <input type="date" wire:model="start_date" class="form-control" required>
            @error('start_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Graduation Date:</label>
            <input type="date" wire:model="graduation_date" class="form-control">
            @error('graduation_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Student</button>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    </form>
</div>
