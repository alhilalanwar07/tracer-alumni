<div>
    <h2>Job Search History Management</h2>

    @if ($updateMode)
        @include('livewire.update-job-search-history')
    @else
        @include('livewire.create-job-search-history')
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Student</th>
                <th>Waiting Period (Months)</th>
                <th>Job Search Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobSearchHistories as $history)
            <tr>
                <td>{{ $history->student->name }}</td>
                <td>{{ $history->waiting_period }}</td>
                <td>{{ $history->job_search_status }}</td>
                <td>
                    <button wire:click="edit({{ $history->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="delete({{ $history->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $jobSearchHistories->links() }}
</div>
