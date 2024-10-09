<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',   // Foreign key to the students table
        'report_data',  // JSON data for report-related information
    ];

    // Relationship to Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
