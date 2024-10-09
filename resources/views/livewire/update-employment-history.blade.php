<div>
    <form wire:submit.prevent="updateEmploymentHistory">
        <div>
            <label>Job Title:</label>
            <input type="text" wire:model="employmentHistory.job_title" required>
            @error('employmentHistory.job_title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Company Name:</label>
            <input type="text" wire:model="employmentHistory.company_name" required>
            @error('employmentHistory.company_name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Start Date:</label>
            <input type="date" wire:model="employmentHistory.start_date" required>
            @error('employmentHistory.start_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>End Date:</label>
            <input type="date" wire:model="employmentHistory.end_date">
            @error('employmentHistory.end_date') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Update Employment History</button>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
</div>
