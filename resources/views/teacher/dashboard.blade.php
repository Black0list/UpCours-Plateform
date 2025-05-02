@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Total Courses -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-primary-100 p-3 mr-4">
                <i class="fas fa-book text-primary-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Courses</h3>
                <p class="text-2xl font-bold">{{ $stats['courses'] }}</p>
            </div>
        </div>

        <!-- Total Students -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-blue-100 p-3 mr-4">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Students</h3>
                <p class="text-2xl font-bold">{{ $stats['students'] }}</p>
            </div>
        </div>

        <!-- Total Earnings -->
        <div class="bg-white rounded-lg shadow-sm p-6 flex items-center">
            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm">Total Earnings</h3>
                <p class="text-2xl font-bold">${{ $stats['cash'] }}</p>
            </div>
        </div>
    </div>

    <div class="">
        <!-- Recent Courses -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Recent Courses</h2>
                <a href="/teacher/courses" class="text-primary-600 hover:text-primary-800 text-sm font-medium">View
                    All</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Course -->
                    @foreach($user->courses as $course)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <img src="{{ url('/storage/'.$course->image) }}" alt="Course"
                                 class="w-12 h-12 rounded-lg object-cover mr-4">
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $course->title }}</h3>
                                <div class="flex items-center text-sm text-gray-500">
                            <span class="flex items-center mr-3">
                                <i class="fas fa-users mr-1"></i> {{ $course->subscribers->count() }}
                            </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-green-600 font-medium">${{ $course->price }}</span>
                                <div class="text-xs text-gray-500">{{ $course->created_at->format('d M, Y') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
