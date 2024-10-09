<div>
    <form wire:submit.prevent="createJobSearchHistory">
        <div>
            <label>Student ID:</label>
            <input type="number" wire:model="student_id" required>
            @error('student_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Waiting Period (in months):</label>
            <input type="number" wire:model="waiting_period">
            @error('waiting_period') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Job Search Status:</label>
            <input type="text" wire:model="job_search_status" required>
            @error('job_search_status') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Create Job Search History</button>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
</div>
