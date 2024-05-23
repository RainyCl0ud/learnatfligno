<x-app-layout>
    <style>
        body {
           overflow: hidden;
       }
       </style>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('student.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
                            <input readonly type="text" name="student_id" id="student_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->student_id}}">
                            @error('student_id')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->first_name}}">
                            @error('first_name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->middle_name}}">
                            @error('middle_name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->last_name}}">
                            @error('last_name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                            <input type="text" name="course" id="course" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->course}}">
                            @error('course')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$student->email}}">
                            @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex justify-between items-center">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Back</a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
