<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="style" style="position: relative; padding: 20px; border-radius: 5px;">
                            <a href="{{ route('subjects.index') }}" style="position: absolute; top: 10px; right: 10px; padding: 8px 16px; background-color: #dc3545; color: #fff; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;" onmouseover="this.style.backgroundColor='#c82333'" onmouseout="this.style.backgroundColor='#dc3545'">Cancel</a>
                        </div>
                        
                        <div class="mb-4 sm-flex grow">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject ID</label>
                            <input type="text" name="subject_id" id="subject_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$subject->subject_id}}">
                           

                            @error('subject_id')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror


                        </div>
                        <div class="mb-4">
                            <label for="subject_name" class="block text-sm font-medium text-gray-700">Subject name</label>
                            <input type="text" name="subject_name" id="subject_name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{$subject->subject_name}}">
                            @error('subject_name')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>  
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
