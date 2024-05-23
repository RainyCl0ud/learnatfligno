<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    
    public function create()
    {
        return view('subjects.create');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'subject_id' => 'required|unique:subjects',
        'subject_name' => 'required|unique:subjects',
    ], [
        'subject_id.required' => 'Subject ID is required.',
        'subject_id.unique' => 'Subject ID already exists.',
        'subject_name.required' => 'Subject Name is required.',
        'subject_name.unique' => 'Subject name already exists.',
    ]);

   
    Subject::create([
        'subject_id' => $request->input('subject_id'),
        'subject_name' => $request->input('subject_name'),
    ]);

    return redirect()->route('subjects.index')->with('success', 'Subject Added Successfully.');
}

  
    public function show(string $id)
    {
        $subject = Subject::find($id);
        return view('subjects.create', compact('subject'));
    }

    
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));

    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject_id' => 'required|unique:subjects,subject_id,' . $id,
            'subject_name' => 'required|unique:subjects,subject_name,' . $id,
        ], [
            'subject_id.required' => 'Subject ID is required.',
            'subject_id.unique' => 'Subject ID already exists.',
            'subject_name.required' => 'Subject name is required.',
            'subject_name.unique' => 'Subject name already exists.',
        ]);
    
   
        $subject = Subject::findOrFail($id);
    
 
        $subject->subject_id = $request->input('subject_id');
        $subject->subject_name = $request->input('subject_name');
      
        $subject->save();
    
        return redirect()->route('subjects.index')->with('success', 'Updated Successfully.');
    }
    
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }

    public function search(Request $request)
    {

        $query = $request->input('query');
    
        $terms = explode(' ', $query);
    
        $subjects = Subject::where(function ($queryBuilder) use ($terms) {
            foreach ($terms as $term) {
                $queryBuilder->where(function ($subQuery) use ($term) {
                    $subQuery->where('subject_id', 'LIKE', "%$term%")
                             ->orWhere('subject_name', 'LIKE', "%$term%");
                           
                       });
                    }
                           })->get();

                           if ($subjects->isEmpty()) {
                            return redirect()->route('subjects.index')->with('error', 'No subject found!');
                        }
                    
                        return view('subjects.index', compact('subjects'));
                    }
}
