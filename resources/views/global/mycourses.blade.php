@extends('layouts.app')

@section('title', "My Courses")
@section('meta_description', 'Learn to create complete web applications with modern technologies. This course covers HTML, CSS, JavaScript, PHP and MySQL.')

@section('content')
    <div class="ml-20 p-16">
        @if($courses->count() <= 0)
            <div class="bg-white rounded-xl shadow-md p-10 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No courses found</h3>
            </div>
        @endif
    </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 ml-20 p-16">
                    @foreach($courses as $course)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="relative">
                                <img src="{{ url('/storage/'.$course->image) }}" alt="CourseImage" class="w-full h-48 object-cover">
                                <div class="absolute top-4 left-4">
                                    <span class="text-xs font-semibold px-3 py-1.5 bg-indigo-100 text-indigo-800 rounded-full shadow-sm">Marketing</span>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2 h-14">{{ $course->title }}</h3>
                                <p class="text-gray-600 mb-4 flex-grow line-clamp-3">{{ Str::limit($course->description, 120) }}</p>
                                <div class="flex justify-between items-center pt-4 mt-auto border-t border-gray-100">
                                    <span class="text-gray-900 font-bold text-lg">${{ $course->price }}</span>
                                    <a href="/course/{{ $course->id }}" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-transparent rounded-md text-sm font-medium text-indigo-700 hover:bg-indigo-100 transition-colors duration-300">
                                        View Course
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    <!-- Pagination -->
@endsection
