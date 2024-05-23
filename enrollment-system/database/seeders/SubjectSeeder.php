<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    
    public function run(): void
    {
        $subjects = [
[
'subject_id' => '101',
'subject_name' => 'Networking',
    
],
[
'subject_id' => '102',
'subject_name' => 'Web Development',

],
[
'subject_id' => '103',
'subject_name' => 'Web Design',

],
[
'subject_id' => '104',
'subject_name' => 'Programming',
],
[
'subject_id' => '105',
'subject_name' => 'Database',
],
[
'subject_id' => '106',
'subject_name' => 'Internet of things',
],
[
'subject_id' => '107',
'subject_name' => 'Software Project Management',
],
[
'subject_id' => '108',
'subject_name' => 'Mechanical Engineering',
],
[
'subject_id' => '109',
'subject_name' => 'Civil Engineering',
],
[
'subject_id' => '110',
'subject_name' => 'Chemical Engineering',
],
[
'subject_id' => '111',
'subject_name' => 'Electrical Engineering',
],
[
'subject_id' => '112',
'subject_name' => 'Anatomy',
],
[
'subject_id' => '113',
'subject_name' => 'Physiology',
],
[
'subject_id' => '114',
'subject_name' => 'Microbiology',
],
[
'subject_id' => '115',
'subject_name' => 'Zoology',
],
[
'subject_id' => '201',
'subject_name' => 'Mathematics',
],
[
'subject_id' => '202',
'subject_name' => 'Physics',
]
,
[
'subject_id' => '203',
'subject_name' => 'Business Law',
],
[
'subject_id' => '204',
'subject_name' => 'Economics',
],
[
'subject_id' => '205',
'subject_name' => 'Finance',
],

];
        DB::table('subjects')->insert($subjects);
    }
}
