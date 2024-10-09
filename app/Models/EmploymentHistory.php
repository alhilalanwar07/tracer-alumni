<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',  // Foreign key to the students table
        'job_title',    // Title of the job held
        'company_name', // Name of the company
        'start_date',   // Employment start date
        'end_date',     // Employment end date (nullable)
    ];

    // Relationship to Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
