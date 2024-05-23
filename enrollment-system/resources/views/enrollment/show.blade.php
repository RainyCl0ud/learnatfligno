<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div><b>Student ID:</b> {{ $student->student_id }}</div>
                <div><b>Student name:</b> {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</div>
            </div>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-danger">BACK</a>
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Enrolled Subjects:</h3>
                    <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Subject ID</th>
                                    <th scope="col">Subject name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrollments as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->subject->subject_id }}</td>
                                        <td>{{ $enrollment->subject->subject_name }}</td>
                                    </tr>  
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            overflow: hidden;
        }
        
        .table-wrapper {    
            max-height: calc(65vh - 100px);
            overflow-y: auto; 
        }
        .thead-dark th {
            position: sticky;
            top: 0;
            z-index: 2; 
            color: rgb(84, 75, 161);
        }
    </style>
</x-app-layout>
