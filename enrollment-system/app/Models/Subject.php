<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
       'subject_id',
       'subject_name',
    ];
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }
}

