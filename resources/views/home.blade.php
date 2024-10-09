@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-4">
        <!-- Student Management -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Manage Students</h3>
            @livewire('admin.students')
        </div>

        <!-- Employment History Management -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Manage Employment Histories</h3>
            @livewire('admin.employment-history')
        </div>

        <!-- Job Search History Management -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold">Manage Job Search Histories</h3>
            @livewire('admin.job-search-history')
        </div>
    </div>

    <!-- Reports Section -->
    <div class="my-8">
        <h2 class="text-2xl font-bold">Tracer Study Reports</h2>
        @livewire('admin.reports')
    </div>
</div>
@endsection
