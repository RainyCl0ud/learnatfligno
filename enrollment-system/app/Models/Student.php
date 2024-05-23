<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    protected $fillable = [
        
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'course',
        'email',
    ];
    use HasFactory;

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}


