<x-app-layout>
    <style>
        .body {
            overflow: hidden;
        }
        .table-wrapper {
            max-height: calc(50vh - 100px);
            overflow-y: auto; 
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="py-2 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg" style="padding:10px; width:500px; margin:20px;">
                <div class="p-6 text-gray-900 text-lg">
                    <form action="{{ route('enrollment.store') }}" method="POST">
                        @csrf
                        @error('subject_ids')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <div class="mb-10">
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Student Name</label>
                            <select name="student_id" class="form-control text-lg" id="student-select">
                                <option></option> <!-- For select2 placeholder -->
                                @foreach ($students as $studentId => $studentName)
                                    <option value="{{ $studentId }}">{{ $studentName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Select Subjects</label>
                        <div class="mb-10 table-wrapper">
                            @foreach ($subjects as $subjectId => $subjectName)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subject_ids[]" value="{{ $subjectId }}">
                                    <label class="form-check-label text-lg">{{ $subjectName }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-6">
                            <button type="submit" class="btn btn-primary px-4 py-2 text-lg">Enroll</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .default-option {
            color: rgb(255, 255, 255);
            background-color: #fff8f88c;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#student-select').select2({
                placeholder: "Select a student",
                allowClear: true
            });
        });
    </script>
</x-app-layout>
