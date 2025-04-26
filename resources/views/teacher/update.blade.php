@extends('layouts.teacher')

@section('title', 'Update Course')
@section('page-title', 'Update Course')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6">
            <form id="courseForm" method="POST" action={{ route("teacher.courses.update", $course->id) }} enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900">Course Information</h3>
                    <p class="mt-1 text-sm text-gray-500">Fill in the details to update your course.</p>
                </div>
{{--                <input type="hidden" name="quiz_id" value="{{ $course->quizzes[0]->id }}">--}}
{{--                <input type="hidden" name="question_id" value="{{ $course->quizzes[0] }}">--}}
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <div class="mt-1">
                            <input value="{{ $course->title }}" type="text" name="title" id="title" required class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md" placeholder="e.g. Introduction to Web Development">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <div class="mt-1">
                            <select id="category_id" name="category_id" required class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" required rows="4" class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md" placeholder="Provide a detailed description of your course">{{ $course->description }}</textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Brief description for your course. This will be displayed on the course listing page.</p>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="price" value="{{ $course->price }}" id="price" required min="0" step="0.01" class="px-4 py-2.5 focus:ring-primary-500 focus:border-primary-500 block w-full pl-7 pr-12 text-sm border border-gray-300 rounded-md" placeholder="0.00">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Course Thumbnail</label>
                        <div class="mt-1">
                            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg" class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: JPEG, PNG, JPG, GIF, SVG. Max size: 2MB</p>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="content" class="block text-sm font-medium text-gray-700">Course Content</label>
                        <div class="mt-1">
                            <input type="file" name="content" id="content" accept=".pdf,.mp4,.mov,.avi,.mkv" class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: PDF, MP4, MOV, AVI, MKV. Max size: 50MB</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-b border-gray-200 py-6">
                    <h3 class="text-lg font-medium text-gray-900 flex items-center justify-between">
                        <span>Course Quiz</span>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Add a quiz to test your students' knowledge.</p>

                    <div class="mt-4 space-y-4">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="quiz_title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                                <div class="mt-1">
                                    <input type="text" value="{{ $course->quizzes[0]->title }}" name="quiz_title" id="quiz_title" required class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md" placeholder="e.g. Chapter 1 Assessment">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="quiz_duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                                <div class="mt-1">
                                    <input type="number" value="{{ $course->quizzes[0]->duration }}" name="quiz_duration" id="quiz_duration" required min="1" class="px-4 py-2.5 shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full text-sm border border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>

                        <div id="questionsList" class="space-y-4 mt-6">
                            <h4 class="text-sm font-medium text-gray-700">Questions</h4>
                            {{-- Questions Block --}}
                            @foreach($course->quizzes[0]->questions as $i => $question)
                                <div class="p-3 border border-gray-200 rounded-md bg-gray-50">
                                    <input type="hidden" name="questions[{{ $i }}][id]" value="{{ $question->id }}">

                                    <input
                                        type="text"
                                        name="questions[{{ $i }}][title]"
                                        value="{{ $question->title }}"
                                        required
                                        class="px-4 py-2.5 block w-full text-sm border border-gray-300 rounded-md"
                                    >

                                    <div class="mt-2 space-y-2">
                                        @foreach($question->choices as $j => $choice)
                                            <div class="flex items-center">
                                                <input
                                                    type="radio"
                                                    name="questions[{{ $i }}][correct]"
                                                    value="{{ $choice->id }}"
                                                    {{ $choice->is_correct ? 'checked' : '' }}
                                                    class="h-4 w-4"
                                                >
                                                <input
                                                    type="hidden"
                                                    name="questions[{{ $i }}][options][{{ $j }}][id]"
                                                    value="{{ $choice->id }}"
                                                >
                                                <input
                                                    type="text"
                                                    name="questions[{{ $i }}][options][{{ $j }}][text]"
                                                    value="{{ $choice->text }}"
                                                    required
                                                    class="ml-2 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md"
                                                >
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="addQuestionBtn" class="mt-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            <i class="fas fa-plus mr-2"></i> Add Question
                        </button>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="submit" class="btn btn-primary inline-flex items-center px-4 py-2.5 border border-primary-700 shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Publish Course
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Add question functionality
        const addQuestionBtn = document.getElementById('addQuestionBtn');
        const questionsList = document.getElementById('questionsList');

        let questionCount = 1;

        // Add a new question
        addQuestionBtn.addEventListener('click', function() {
            const questionDiv = document.createElement('div');
            questionDiv.className = 'p-3 border border-gray-200 rounded-md bg-gray-50 mt-4';
            questionDiv.innerHTML = `
            <div class="flex justify-between items-start">
                <div class="flex-grow">
                    <input type="text" name="questions[${questionCount}][text]" required class="px-4 py-2.5 block w-full text-sm border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="Question text">

                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="radio" name="questions[${questionCount}][correct]" value="0" required class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                            <input type="text" name="questions[${questionCount}][options][0]" required class="ml-2 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="Option 1">
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="questions[${questionCount}][correct]" value="1" class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                            <input type="text" name="questions[${questionCount}][options][1]" required class="ml-2 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="Option 2">
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="questions[${questionCount}][correct]" value="2" class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                            <input type="text" name="questions[${questionCount}][options][2]" required class="ml-2 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="Option 3">
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="questions[${questionCount}][correct]" value="3" class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                            <input type="text" name="questions[${questionCount}][options][3]" required class="ml-2 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="Option 4">
                        </div>
                    </div>
                </div>
                <button type="button" class="ml-2 text-gray-400 hover:text-red-500 remove-question">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;

            questionsList.appendChild(questionDiv);
            questionCount++;

            // Add event listener to remove question button
            const removeButtons = document.querySelectorAll('.remove-question');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.p-3.border').remove();
                });
            });
        });


        // Validate content file when selected
        document.getElementById('content').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file size
                if (file.size > 50 * 1024 * 1024) {
                    alert('Content file size should not exceed 50MB');
                    this.value = '';
                    return;
                }

                // Validate file type
                const fileExt = file.name.split('.').pop().toLowerCase();
                if (!['pdf', 'mp4', 'mov', 'avi', 'mkv'].includes(fileExt)) {
                    alert('Please select a valid content file (PDF, MP4, MOV, AVI, MKV)');
                    this.value = '';
                    return;
                }
            }
        });
    </script>
@endsection
