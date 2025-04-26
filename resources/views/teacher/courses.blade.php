@extends('layouts.teacher')

@section('title', 'Manage Courses - Teacher')
@section('page-title', 'My Courses')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">All Your Courses</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage your courses, track performance and update content</p>
                </div>
                <a href="/teacher/course" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <i class="fas fa-plus mr-2"></i> Add New Course
                </a>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center">
                        <div class="rounded-full bg-blue-100 p-3 mr-4">
                            <i class="fas fa-book text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Courses</p>
                            <p class="text-2xl font-bold">{{ $user->courses()->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center">
                        <div class="rounded-full bg-green-100 p-3 mr-4">
                            <i class="fas fa-users text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Students</p>
                            <p class="text-2xl font-bold">{{ $totalStudents ?? 248 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center">
                        <div class="rounded-full bg-yellow-100 p-3 mr-4">
                            <i class="fas fa-star text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Average Rating</p>
                            <p class="text-2xl font-bold">{{ $averageRating ?? '4.8' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
            <div class="flex flex-col md:flex-row gap-4 mb-6">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="search" form="filter-form" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm" placeholder="Search courses...">
                </div>

                <form id="filter-form" action="{{ route('teacher.courses.main') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                    <select name="category" onchange="this.form.submit()" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <option value="">All Categories</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($user->courses as $course)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow h-full flex flex-col">
                        <!-- Image + Status -->
                        <div class="relative">
                            <img src="{{ url('/storage/'.$course->image) }}" alt="Course" class="w-full h-40 object-cover">
                            <div class="absolute top-2 right-2">
                                <span class="text-xs font-semibold px-3 py-1.5 bg-indigo-100 text-indigo-800 rounded-full shadow-sm">{{ $course->category->name }}</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 flex flex-col flex-grow">
                            <!-- Title -->
                            <h3 class="font-semibold text-lg mb-1 line-clamp-1">{{ $course->title }}</h3>

                            <!-- Students Count -->
                            <div class="flex items-center text-sm text-gray-500 mb-3">
            <span class="flex items-center mr-3">
                <i class="fas fa-users mr-1"></i> 45 students
            </span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($course->description, 120) }}</p>

                            <!-- Price & Date -->
                            <div class="mt-auto mb-4 flex justify-between items-center">
                                <span class="text-green-600 font-medium">${{ $course->price }}</span>
                                <div class="text-xs text-gray-500">Published {{ $course->created_at->format('d, M Y') }}</div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-2">
                                <!-- View Button -->
                                <a href="/course/{{ $course->id }}" class="flex-1 inline-flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-eye mr-1"></i> View
                                </a>

                                <!-- Update Button -->
                                <a href="/teacher/course/{{ $course->id }}" class="flex-1 inline-flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-edit mr-1"></i> Update
                                </a>

                                <!-- Delete Button -->
                                <form action="/teacher/course/{{ $course->id }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full inline-flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
