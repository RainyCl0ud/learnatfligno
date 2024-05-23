<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    
    public function index()
    {
       $students = Student::orderBy('student_id')->get();
        return view('student.index', compact('students'));
        
    }

     public function create()
     {

         $students = Student::all();
         return view('student.create', compact('students')); 
     }
 
    
     public function store(Request $request)
     {
        $request->validate([

            'student_id' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'course' => 'required',
            'email' => 'required|email|unique:students',



        ],[

            'student_id.required' => 'Student ID is required',
            'student_id.unique' => 'Student ID already exist',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'course.required' => 'Student course is empty',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exist',
        ]
    
    );

         $students = new Student;

         $students->student_id = $request->student_id;
         $students->first_name = $request->first_name;
         $students->middle_name = $request->middle_name;
         $students->last_name = $request->last_name;
         $students->course = $request->course;
         $students->email = $request->email;

         $students->save();
         return redirect()->route('student.index')->with('success','Student added successfuly');
        }

    public function show(string $id)
    {
        
        $students = Student::find($id);
        return view('student.create', compact('students'));
    }

   
    public function edit(string $id)
    {
        
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
        
    }

    
    public function update(Request $request, string $id)
    {

        $request->validate([

            'student_id' => 'required',
            'first_name' => 'required:students',
            'last_name' => 'required:students',
            'course' => 'required:students',
            'email' => 'required|email',
            
           
        ],[ 

            'student_id.required' => 'Student ID is required',
            'student_id.unique' => 'Student ID already exist',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'course.required' => 'Student course is empty',
            'email.required' => 'email is required',
            'email.unique' => 'Email already exist',

           


        ]);

        $student = Student::findOrFail($id);

        $student->student_id = $request->input('student_id');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->last_name = $request->input('last_name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');

        $student->save();

        return redirect()->route('student.index')->with('success',' Updated Successfuly ');
    }

    
    public function destroy(string $id)
    {
     
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index');
    }
    public function search(Request $request)
    {

        $query = $request->input('query');
    
        $terms = explode(' ', $query);
    
        $students = Student::where(function ($queryBuilder) use ($terms) {
            foreach ($terms as $term) {
                $queryBuilder->where(function ($subQuery) use ($term) {
                    $subQuery->where('first_name', 'LIKE', "%$term%")
                             ->orWhere('middle_name', 'LIKE', "%$term%")
                             ->orWhere('last_name', 'LIKE', "%$term%")
                             ->orWhere('student_id', 'LIKE', "%$term%")
                             ->orWhere('course', 'LIKE', "%$term%");
                       });
                    }
                           })->get();
                           
                         

                           if ($students->isEmpty()) {
                            return redirect()->route('student.index')->with('error', 'No student found!');
                        }
                    
                        return view('student.index', compact('students'));
                    }
                }