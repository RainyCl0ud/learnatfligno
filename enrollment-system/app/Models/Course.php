<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [

        'course_id',
        'course_name',
        'course_description',
    
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
