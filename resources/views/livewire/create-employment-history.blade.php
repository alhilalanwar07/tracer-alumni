<div>
    <form wire:submit.prevent="createEmploymentHistory">
        <div>
            <label>Student ID:</label>
            <input type="number" wire:model="student_id" required>
            @error('student_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Job Title:</label>
            <input type="text" wire:model="job_title" required>
            @error('job_title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Company Name:</label>
            <input type="text" wire:model="company_name" required>
            @error('company_name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Start Date:</label>
            <input type="date" wire:model="start_date" required>
            @error('start_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>End Date:</label>
            <input type="date" wire:model="end_date">
            @error('end_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Create Employment History</button>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
</div>
