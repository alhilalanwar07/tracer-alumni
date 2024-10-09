<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create students table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('degree_program'); // Example: Bachelor, Master, etc.
            $table->date('start_date'); // Study start date
            $table->date('graduation_date')->nullable(); // Study graduation date
            $table->timestamps();
        });

        // Create employment history table
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->date('start_date'); // Employment start date
            $table->date('end_date')->nullable(); // Employment end date (if applicable)
            $table->timestamps();
        });

        // Create job search history table
        Schema::create('job_search_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->integer('waiting_period')->nullable(); // Time in months to get a job after graduation
            $table->string('job_search_status'); // Example: "Employed", "Unemployed", etc.
            $table->timestamps();
        });

        // Create reports table
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->json('report_data'); // Stores JSON data like charts or other report-related info
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('job_search_histories');
        Schema::dropIfExists('employment_histories');
        Schema::dropIfExists('students');
    }
};
