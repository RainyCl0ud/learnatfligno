<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if(session('error'))
        <div class="text-red-500 mt-2">{{session('error')}}</div>
        @endif
        <form action="{{ route('enrollment.search') }}"  method="GET" class="mt-3">
            <div class="input-group justify-content-end">
                <input type="text" name="query" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <button class="btn btn-m btn-primary" type="submit">Search</button>
                 </div>
            </div>
        </form>
    </x-slot>

    <style>
         body {
            overflow: hidden;
        }

        .thead-dark th {
            position: sticky;
            top: 0;
            z-index: 2; 
            color: rgb(84, 75, 161);
        }


      
        .table-wrapper {
            max-height: calc(72vh - 100px);
            overflow-y: auto; 
        }

    </style>

    <div class="py-1">
            <div class="bg-white shadow-m sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-body">
                    <div class="table-responsive table-wrapper">
                        <table class="table">
                            <thead class="thead-dark" >
                                <tr>
                                    <th scope="col"><h5>Student name</h5></th>
                                    <th scope="col"><h5>Course<h5></th>
                                    <th scope="col"><h5>Email<h5></th>
                                    <th scope="col"><h5><h5></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->first_name }} {{$student->middle_name}}. {{ $student->last_name }}</td>
                                        <td>{{$student->course}}</td>
                                        <td>{{ $student->email }}</td>
                                        <td> <a href="{{ route('enrollment.show', $student->id)}}" class="btn btn-xm btn-primary mr-2">View</a></td>
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
