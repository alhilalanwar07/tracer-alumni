<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', // Unique student identifier
        'name',       // Student name
        'email',      // Student email
        'phone',      // Student phone number
        'degree_program', // Degree program (e.g., Bachelor, Master)
        'start_date', // Study start date
        'graduation_date', // Study graduation date
    ];

    // Example: Relationship with EmploymentHistory if applicable
    public function employmentHistories()
    {
        return $this->hasMany(EmploymentHistory::class);
    }

    // Example: Relationship with JobSearchHistory
    public function jobSearchHistories()
    {
        return $this->hasMany(JobSearchHistory::class);
    }

    // Example: Relationship with Report if applicable
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
