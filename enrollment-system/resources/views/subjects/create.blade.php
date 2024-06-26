<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">            
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Subject ID</label>
                            <input type="text" name="subject_id" id="subject_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                          
                          
                            @error('subject_id')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror

                            
                        </div>
                        <div class="mb-4">
                            <label for="subject_name" class="block text-sm font-medium text-gray-700">Subject Name</label>
                            <input type="text" name="subject_name" id="subject_name" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                          

                            @error('subject_name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror


                        </div>
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
