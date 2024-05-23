<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    
    public function run()
    { 
        
        
        $students = [
            [
                'student_id' => '2024001',
                'first_name' => 'Rainheart',
                'middle_name' => 'Llido',
                'last_name' => 'Galario',
                'course' => 'BSIT',
                'email' => 'galario.rainheart@gmail.com',
            ],
            [
                'student_id' => '2024002',
                'first_name' => 'John',
                'middle_name' => 'Magalino',
                'last_name' => 'Doe',
                'course' => 'TCM',
                'email' => 'john.doe@example.com',
            ],
            [
                'student_id' => '2024003',
                'first_name' => 'Jane',
                'middle_name' => 'Quavo',
                'last_name' => 'Clint',
                'course' => 'EDUC',
                'email' => 'jane.clint@example.com',
            ],
            [
                'student_id' => '2024004',
                'first_name' => 'Maria',
                'middle_name' => 'Villanueva',
                'last_name' => 'Clara',
                'course' => 'HRM',
                'email' => 'maria.clara@example.com',
            ],
            [
                'student_id' => '2024005',
                'first_name' => 'Aurora',
                'middle_name' => 'Kaja',
                'last_name' => 'Blaze',
                'course' => 'BSBM',
                'email' => 'Aurora.blaze@example.com',
            ],

        ];

        DB::table('students')->insert($students);

    }
}