<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use App\Models\EmploymentHistory;
use App\Models\JobSearchHistory;
use App\Models\Report;
use Livewire\WithPagination;

class Reports extends Component
{
    public $employmentRate, $avgWaitingPeriod;

    public function mount()
    {
        // Calculating Employment Rate
        $totalStudents = Student::count();
        $employedStudents = EmploymentHistory::distinct('student_id')->count('student_id');
        $this->employmentRate = $totalStudents ? ($employedStudents / $totalStudents) * 100 : 0;

        // Calculating Average Waiting Period
        $totalJobSearchHistories = JobSearchHistory::count();
        $totalWaitingPeriods = JobSearchHistory::sum('waiting_period');
        $this->avgWaitingPeriod = $totalJobSearchHistories ? $totalWaitingPeriods / $totalJobSearchHistories : 0;
    }

    public function render()
    {
        return view('livewire.admin.reports', [
            'employmentRate' => $this->employmentRate,
            'avgWaitingPeriod' => $this->avgWaitingPeriod,
        ]);
    }
}
