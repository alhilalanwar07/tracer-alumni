<div>
    <form wire:submit.prevent="updateJobSearchHistory">
        <div>
            <label>Waiting Period (in months):</label>
            <input type="number" wire:model="jobSearchHistory.waiting_period">
            @error('jobSearchHistory.waiting_period') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Job Search Status:</label>
            <input type="text" wire:model="jobSearchHistory.job_search_status" required>
            @error('jobSearchHistory.job_search_status') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Update Job Search History</button>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </form>
</div>
