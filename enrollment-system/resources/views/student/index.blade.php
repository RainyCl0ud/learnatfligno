<x-app-layout>

    <x-slot name="header" class="flex">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List of Students') }}
            </h2>
                <a href="{{ route('student.create') }} " class="btn btn-s btn-success">Add</a>
        </div>

        @if(session('error'))
        <div class="text-red-500 mt-2">{{ session('error') }}</div>
    @endif
        <form action="{{ route('student.search') }}" method="GET" class="mt-3"> 
            <div class="input-group justify-content-end">
                <input type="text" class="form-control" name="query" placeholder="Search students..." >
                <div class="input-group-append">
                    <button class="btn btn-m btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </x-slot>
    <style>

         .scrollable-card {
            max-height: calc(80vh - 100px);
            overflow-y: auto; 
        }

        body {
            overflow: hidden;
            height: 90vh;
            margin: 0;
            padding: 0;

        }
       
        .table-wrapper {
            max-height: calc(70vh - 100px);
            overflow-y: auto; 
            
        }
        .thead-dark th {
            position: sticky;
            top: 0;
            z-index: 2; 
            color: rgb(84, 75, 161);
        }
        
    </style>
    <div class="py-1">
            <div class="bg-white  shadow-m sm:rounded-lg">
                <div class="p-6 text-gray-900">
@if(session('success'))
        <div class="alert alert-success">    
            {{ session('success') }}
        </div>
@endif        

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"><h5>Student ID</h5></th>
                                    <th scope="col"><h5>Student name</h5></th>
                                    <th scope="col"><h5>Course</h5></th>
                                    <th scope="col"><h5>Email</h5></th>
                                    <th scope="col"><h5></h5></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->first_name}} {{$student->middle_name}}. {{$student->last_name}} </td>
                                    <td>{{$student->course}}</td>
                                    <td>{{$student->email}}</td>
                                    <td class="flex">
                                        <a href="{{ route('student.edit',$student->id)}}" class="btn btn-xm btn-success mr-2">Edit</a>
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-s btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>