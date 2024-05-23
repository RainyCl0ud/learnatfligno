<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Subject;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrolledStudentId = session('enrolled_student_id');
    
        if ($enrolledStudentId) {
            $student = Student::findOrFail($enrolledStudentId);
            $enrollments = Enrollment::where('student_id', $enrolledStudentId)->get();
            
            return view('enrollment.index', compact('student', 'enrollments'));
        } else {
            return redirect()->route('enrollment.create');
        }

    }
    
 

    public function create()
    {
        
        $students = Student::all()->map(function ($student) {
     return  
     [ 'id' => $student->id,'full_name' => $student->first_name . ' ' . $student->middle_name. ' ' . $student->last_name ];

     })->pluck('full_name', 'id');
    
        $subjects = Subject::pluck('subject_name', 'id');
    
        return view('enrollment.create', compact('students', 'subjects'));
    }


    public function store(Request $request)
{
     $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject_ids' => ['required','array',
            Rule::unique('enrollments', 'subject_id')
                ->where('student_id', $request->input('student_id'))
                ->ignore($request->input('enrollment_id')),
        ],
    ], [
        'student_id.required' => 'Please select a student.',
        'subject_ids.required' => 'Please select at least one subject.',
        'subject_ids.unique' => 'Already enrolled to this subject',
        'student_id.exists' => 'There is no student. Please add student first',
    ]);
    

    $studentId = $request->input('student_id');
    $subjectIds = $request->input('subject_ids');

    $enrollments = [];
    foreach ($subjectIds as $subjectId) {
        $enrollments[] = [
            'student_id' => $studentId,
            'subject_id' => $subjectId,
            'created_at' => now()
            
        ];
        
    }

    Enrollment::insert($enrollments);

    return redirect()->route('enrollment.index')->with('enrolled_student_id', $studentId)->with('success','Added Successfully');
}


    public function update(Request $request, Enrollment $enrollment)
    {
        

        $enrollment->update([
            'student_id' => $request->input('student_id'),
            'subject_id' => $request->input('subject_id'),
        ]);

        return redirect()->route('enrollment.index')->with('success', 'Enrollment updated successfully!');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollment.index')->with('success', 'Enrollment deleted successfully!');
    }
    public function dashboard()
    {
       
        $students = Student::
                      has('enrollments')
                    ->with('enrollments')
                    ->orderBy('first_name')
                    ->get();


    
        return view('dashboard', compact('students'));
    }
    public function show($studentId)
    {
        $student = Student::findOrFail($studentId);

       
        $enrollments = Enrollment::where('student_id', $studentId)->get()->sortBy('subject_id');
       


        return view('enrollment.show', compact('student', 'enrollments'));

    }
    public function search(Request $request)
    {
        $query = $request->input('query');
    
       
        $terms = explode(' ', $query);
    
        $students = Student::whereHas('enrollments', function ($enrollmentQuery) use ($terms) {
            $enrollmentQuery->where(function ($subQuery) use ($terms) {
                foreach ($terms as $term) {
                    $subQuery->where('first_name', 'LIKE', "%$term%")
                             ->orWhere('middle_name', 'LIKE', "%$term%")
                             ->orWhere('last_name', 'LIKE', "%$term%")
                             ->orWhere('student_id', 'LIKE', "%$term%")
                             ->orWhere('course', 'LIKE', "%$term%");
                }
            });
        })->get();
    
        if ($students->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'Student not found!');
        }
       
        return view('dashboard', compact('students'));
    }
    
}

