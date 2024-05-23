<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('semester_id')->constrained('semesters')->onDelete('cascade')->OnDelete('cascade');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
