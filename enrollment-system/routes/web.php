<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EnrollmentController::class, 'dashboard']) 
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::resource('student', StudentController::class);
Route::get('student/{student}/edit',[StudentController::class, 'edit'])->name('student.edit');
Route::resource('subjects', SubjectController::class);
Route::get('subjects/{subjects}/edit',[StudentController::class, 'edit'])->name('subject.edit');
Route::resource('enrollment', EnrollmentController::class);
Route::get('enrollment/{enrollment}/edit',[StudentController::class, 'edit'])->name('enrollment.edit');
Route::get('/students/search', [StudentController::class, 'search'])->name('student.search');
Route::get('/subject/search', [SubjectController::class, 'search'])->name('subjects.search');
Route::get('/enrollments/search', [EnrollmentController::class, 'search'])->name('enrollment.search');
});

require __DIR__.'/auth.php';