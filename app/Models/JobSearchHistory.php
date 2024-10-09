<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSearchHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',       // Foreign key to the students table
        'waiting_period',   // Time in months to get a job after graduation
        'job_search_status', // Current job search status (e.g., "Employed", "Unemployed")
    ];

    // Relationship to Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
