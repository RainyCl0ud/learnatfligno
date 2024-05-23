<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Enrolled Students') }}
                
            </h2>
            
            <a href="{{ route('enrollment.create') }}" class="btn btn-sm btn-success">Add</a>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @isset($student)
                @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif    
                <b> <h1>Student Name:</b> {{ $student->first_name }} {{$student->middle_name}} {{ $student->last_name}}</h1>
                <b>  <h3>Email: </b>{{ $student->email }}</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Subject Id</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrollments as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->subject->subject_id}}</td>
                                        <td>{{ $enrollment->subject->subject_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($enrollment->created_at)->format('M d, h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No student enrolled yet.</p>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
