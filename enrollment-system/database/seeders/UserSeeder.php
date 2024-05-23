<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
       DB::table('Users')->insert([

        'name' => 'Rainheart Galario',
        'email' => 'galario.rainheart16@gmail.com',
        'password' => Hash::make('rainheart'),
       ]);
    }
}
