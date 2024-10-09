<div>
    <h2>Employment History Management</h2>

    @if ($updateMode)
        @include('livewire.update-employment-history')
    @else
        @include('livewire.create-employment-history')
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Student</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employmentHistories as $history)
            <tr>
                <td>{{ $history->student->name }}</td>
                <td>{{ $history->job_title }}</td>
                <td>{{ $history->company_name }}</td>
                <td>{{ $history->start_date }}</td>
                <td>{{ $history->end_date ?? 'Still Working' }}</td>
                <td>
                    <button wire:click="edit({{ $history->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="delete({{ $history->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employmentHistories->links() }}
</div>
